/* global jQuery, _, wp, RectifyPBTemplates */
/**
 * Rectify Page Builder admin app.
 *
 * Plain jQuery + Underscore, no build step (matches the rest of this
 * project). Renders a draggable list of "blocks" (one per homepage
 * section), each with a field form generated from the localized block-type
 * schema, and serializes the whole app state into the hidden
 * #rectify_pb_data textarea right before the post form submits so it saves
 * through the normal save_post flow.
 */
(function ($, _) {
	'use strict';

	var config = null;
	var state = [];
	var $app = null;
	var $list = null;
	var mediaFrames = {};

	function readConfig() {
		var $script = $('#rectify-pb-config');

		if (!$script.length) {
			return null;
		}

		try {
			return JSON.parse($script.text());
		} catch (e) {
			return null;
		}
	}

	function readInitialState() {
		var $textarea = $('#rectify_pb_data');
		var raw = $textarea.length ? $textarea.val() : '';

		if (!raw) {
			return [];
		}

		try {
			var parsed = JSON.parse(raw);

			return _.isArray(parsed) ? parsed : [];
		} catch (e) {
			return [];
		}
	}

	function emptyValueForField(fieldSchema) {
		switch (fieldSchema.type) {
			case 'image':
				return 0;
			case 'repeater':
				return [];
			default:
				return '';
		}
	}

	function emptyFieldsForType(type) {
		var schema = config.blockTypes[type];
		var fields = {};

		if (!schema) {
			return fields;
		}

		_.each(schema.fields, function (fieldSchema, key) {
			fields[key] = emptyValueForField(fieldSchema);
		});

		return fields;
	}

	function sanitizeKey(value) {
		return (value || '')
			.toString()
			.toLowerCase()
			.replace(/[^a-z0-9]+/g, '-')
			.replace(/^-+|-+$/g, '');
	}

	function uniqueId(prefix) {
		return prefix + '-' + Date.now() + '-' + Math.floor(Math.random() * 10000);
	}

	/* ---------------------------------------------------------------
	 * Rendering
	 * -------------------------------------------------------------*/

	function renderApp() {
		$app.empty();

		var $toolbar = $('<div class="rpb-toolbar"></div>');

		var $typeSelect = $('<select class="rpb-add-type"></select>');
		_.each(config.blockTypes, function (schema, key) {
			$typeSelect.append($('<option></option>').attr('value', key).text(schema.label));
		});

		var $sectionKeyInput = $('<input type="text" class="rpb-add-section-key" placeholder="section_key (e.g. custom-section)">');
		var $addButton = $('<button type="button" class="button button-primary rpb-add-block"></button>').text(config.i18n.addBlock);

		$toolbar.append($typeSelect, $sectionKeyInput, $addButton);

		if (!state.length) {
			var $loadButton = $('<button type="button" class="button rpb-load-seed"></button>').text(config.i18n.loadCurrentContent);
			$toolbar.append($loadButton);
		}

		$app.append($toolbar);

		$list = $('<div class="rpb-block-list"></div>');
		$app.append($list);

		renderBlockList();
	}

	function renderBlockList() {
		$list.empty();

		_.each(state, function (block) {
			// "removed" tombstones (left behind by the Remove Section button
			// so the front end hides that section instead of falling back to
			// the theme's hardcoded default) carry no editable fields and are
			// intentionally kept out of the visible list; re-adding a section
			// with the same section_key naturally supersedes the tombstone.
			if (block.type === 'removed') {
				return;
			}

			$list.append(buildBlockElement(block));
		});

		initSortableBlocks();
	}

	function blockTypeLabel(type) {
		return config.blockTypes[type] ? config.blockTypes[type].label : type;
	}

	function buildBlockElement(block) {
		var $block = $(
			RectifyPBTemplates.blockCard({
				index: 0,
				id: block.id,
				label: block.label || blockTypeLabel(block.type),
				typeLabel: blockTypeLabel(block.type),
				sectionKey: block.section_key || '',
				toggleLabel: config.i18n.expand,
				bodyStyle: 'display:none;',
			})
		);

		$block.data('blockRef', block);

		var $body = $block.find('.rpb-block-body');
		renderBlockBody($body, block);

		return $block;
	}

	function renderBlockBody($body, block) {
		$body.empty();

		var schema = config.blockTypes[block.type];

		if (!schema) {
			return;
		}

		if (!block.fields || !_.isObject(block.fields)) {
			block.fields = emptyFieldsForType(block.type);
		}

		_.each(schema.fields, function (fieldSchema, key) {
			renderField($body, fieldSchema, key, block.fields);
		});
	}

	/**
	 * Renders one field into $container. `fieldsObj` is the object the
	 * field's value lives on (either block.fields, or a repeater row object)
	 * so this function works for both top-level and repeater sub-fields.
	 */
	function renderField($container, fieldSchema, key, fieldsObj) {
		var value = fieldsObj[key];
		var $field;

		switch (fieldSchema.type) {
			case 'text':
				$field = $(RectifyPBTemplates.textField({ label: fieldSchema.label, key: key, value: value || '' }));
				break;

			case 'url':
				$field = $(RectifyPBTemplates.urlField({ label: fieldSchema.label, key: key, value: value || '' }));
				break;

			case 'email':
				$field = $(RectifyPBTemplates.emailField({ label: fieldSchema.label, key: key, value: value || '' }));
				break;

			case 'richtext':
				$field = $(RectifyPBTemplates.richtextField({ label: fieldSchema.label, key: key, value: value || '' }));
				break;

			case 'embed':
				$field = $(RectifyPBTemplates.embedField({ label: fieldSchema.label, key: key, value: value || '' }));
				break;

			case 'image':
				$field = buildImageField(fieldSchema, key, value);
				break;

			case 'icon-picker':
				$field = buildIconPickerField(fieldSchema, key, value);
				break;

			case 'repeater':
				$field = buildRepeaterField(fieldSchema, key, fieldsObj);
				break;

			default:
				return;
		}

		if ($field) {
			$field.data('fieldsObj', fieldsObj);
			$container.append($field);
		}
	}

	function buildImageField(fieldSchema, key, attachmentId) {
		var $field = $(
			RectifyPBTemplates.imageField({
				label: fieldSchema.label,
				key: key,
				value: attachmentId || 0,
				imageUrl: '',
				chooseLabel: config.i18n.chooseImage,
				removeLabel: config.i18n.removeImage,
				removeStyle: attachmentId ? '' : 'display:none;',
			})
		);

		if (attachmentId) {
			var $preview = $field.find('.rpb-image-preview');

			wp.media.attachment(attachmentId).fetch().done(function () {
				var model = wp.media.attachment(attachmentId);
				var url = model.get('sizes') && model.get('sizes').medium ? model.get('sizes').medium.url : model.get('url');

				if (url) {
					$preview.html($('<img>').attr('src', url));
				}
			});
		}

		return $field;
	}

	function buildIconPickerField(fieldSchema, key, iconKey) {
		var isUpload = typeof iconKey === 'string' && iconKey.indexOf('upload:') === 0;
		var isPasted = typeof iconKey === 'string' && iconKey.indexOf('paste:') === 0;
		var isCustom = isUpload || isPasted;

		var $field = $(
			RectifyPBTemplates.iconPickerField({
				label: fieldSchema.label,
				key: key,
				value: iconKey || '',
				uploadLabel: config.i18n.uploadIcon,
				pasteLabel: config.i18n.pasteIconSvg,
				pastePlaceholder: config.i18n.pasteIconSvgPlaceholder,
				useSvgLabel: config.i18n.useIconSvg,
				cancelLabel: config.i18n.cancelIconSvg,
				removeLabel: config.i18n.removeIcon,
				removeStyle: isCustom ? '' : 'display:none;',
			})
		);

		var $grid = $field.find('.rpb-icon-grid');

		_.each(config.iconLibrary, function (icon) {
			var markup = icon.type === 'svg' ? icon.svg : '<img src="' + icon.url + '" alt="">';

			$grid.append(
				RectifyPBTemplates.iconOption({
					key: icon.key,
					label: icon.label,
					markup: markup,
					activeClass: !isCustom && icon.key === iconKey ? 'is-active' : '',
				})
			);
		});

		if (isUpload) {
			var attachmentId = parseInt(iconKey.slice(7), 10);
			var $preview = $field.find('.rpb-icon-custom-preview');

			if (attachmentId) {
				wp.media.attachment(attachmentId).fetch().done(function () {
					var url = wp.media.attachment(attachmentId).get('url');

					if (url) {
						$preview.html($('<img>').attr('src', url));
					}
				});
			}
		}

		if (isPasted) {
			var $pastedPreview = $field.find('.rpb-icon-custom-preview');
			var svgMarkup = decodePastedSvg(iconKey);

			if (svgMarkup) {
				$pastedPreview.html(svgMarkup);
			}
		}

		return $field;
	}

	/**
	 * Decode a "paste:<base64>" icon value back into raw SVG markup for
	 * preview purposes. Uses the same UTF-8-safe base64 decoding as
	 * encodePastedSvg(). Returns '' if the value isn't decodable.
	 */
	function decodePastedSvg(iconKey) {
		try {
			return decodeURIComponent(escape(window.atob(iconKey.slice(6))));
		} catch (e) {
			return '';
		}
	}

	/**
	 * Encode raw SVG markup into a "paste:<base64>" icon value. UTF-8 safe
	 * (handles non-ASCII characters some pasted SVGs contain, e.g. in titles).
	 */
	function encodePastedSvg(svgMarkup) {
		return 'paste:' + window.btoa(unescape(encodeURIComponent(svgMarkup)));
	}

	function buildRepeaterField(fieldSchema, key, parentFieldsObj) {
		var $field = $(
			RectifyPBTemplates.repeaterField({
				label: fieldSchema.label,
				key: key,
				addLabel: config.i18n.addItem,
			})
		);

		if (!_.isArray(parentFieldsObj[key])) {
			parentFieldsObj[key] = [];
		}

		var $rows = $field.find('.rpb-repeater-rows');
		renderRepeaterRows($rows, fieldSchema, parentFieldsObj[key]);

		$field.data('repeaterArray', parentFieldsObj[key]);
		$field.data('repeaterSchema', fieldSchema);

		return $field;
	}

	function renderRepeaterRows($rows, fieldSchema, rowsArray) {
		$rows.empty();

		_.each(rowsArray, function (rowRef) {
			var $row = $(RectifyPBTemplates.repeaterRow({ index: 0 }));
			$row.data('rowRef', rowRef);

			var $rowFields = $row.find('.rpb-repeater-row-fields');

			_.each(fieldSchema.fields, function (subFieldSchema, subKey) {
				renderField($rowFields, subFieldSchema, subKey, rowRef);
			});

			$rows.append($row);
		});

		initSortableRepeater($rows);
	}

	/* ---------------------------------------------------------------
	 * Sortable
	 * -------------------------------------------------------------*/

	function initSortableBlocks() {
		if (!$.fn.sortable) {
			return;
		}

		$list.sortable({
			handle: '.rpb-block-handle',
			axis: 'y',
			update: function () {
				var newOrder = [];
				$list.children('.rpb-block').each(function () {
					newOrder.push($(this).data('blockRef'));
				});
				state = newOrder;
			},
		});
	}

	function initSortableRepeater($rows) {
		if (!$.fn.sortable) {
			return;
		}

		$rows.sortable({
			handle: '.rpb-repeater-handle',
			axis: 'y',
			update: function () {
				var field = $rows.closest('.rpb-field-repeater');
				var newOrder = [];

				$rows.children('.rpb-repeater-row').each(function () {
					newOrder.push($(this).data('rowRef'));
				});

				var parentFieldsObj = field.data('fieldsObj');
				var key = $rows.data('fieldKey');

				if (parentFieldsObj && key) {
					parentFieldsObj[key] = newOrder;
					field.data('repeaterArray', newOrder);
				}
			},
		});
	}

	/* ---------------------------------------------------------------
	 * Event handling (delegated)
	 * -------------------------------------------------------------*/

	function bindEvents() {
		$app.on('click', '.rpb-add-block', function () {
			var type = $app.find('.rpb-add-type').val();
			var sectionKeyInput = $app.find('.rpb-add-section-key').val();
			var sectionKey = sanitizeKey(sectionKeyInput) || sanitizeKey(type) + '-' + Date.now();

			var block = {
				id: uniqueId('block'),
				type: type,
				section_key: sectionKey,
				label: blockTypeLabel(type),
				fields: emptyFieldsForType(type),
			};

			state.push(block);
			renderApp();
		});

		$app.on('click', '.rpb-load-seed', function () {
			state = JSON.parse(JSON.stringify(config.seedBlocks));
			renderApp();
		});

		$app.on('click', '.rpb-remove-block', function () {
			if (!window.confirm(config.i18n.confirmRemoveBlock)) {
				return;
			}

			var $block = $(this).closest('.rpb-block');
			var ref = $block.data('blockRef');
			var index = state.indexOf(ref);

			if (index > -1) {
				// Replace with a tombstone rather than deleting outright, so
				// saving actually hides this section on the front end instead
				// of reverting to the theme's hardcoded default content.
				state[index] = {
					id: ref.id,
					type: 'removed',
					section_key: ref.section_key || '',
					label: ref.label || '',
					fields: {},
				};
			}

			$block.remove();
		});

		$app.on('click', '.rpb-toggle-block', function () {
			var $button = $(this);
			var $body = $button.closest('.rpb-block').find('.rpb-block-body');
			var isHidden = $body.is(':hidden');

			$body.slideToggle(120);
			$button.text(isHidden ? config.i18n.collapse : config.i18n.expand);
		});

		$app.on('click', '.rpb-repeater-add', function () {
			var $field = $(this).closest('.rpb-field-repeater');
			var array = $field.data('repeaterArray');
			var schema = $field.data('repeaterSchema');

			var row = {};
			_.each(schema.fields, function (subSchema, subKey) {
				row[subKey] = emptyValueForField(subSchema);
			});

			array.push(row);

			var $rows = $field.find('.rpb-repeater-rows');
			renderRepeaterRows($rows, schema, array);
		});

		$app.on('click', '.rpb-repeater-remove', function () {
			var $row = $(this).closest('.rpb-repeater-row');
			var $field = $row.closest('.rpb-field-repeater');
			var array = $field.data('repeaterArray');
			var ref = $row.data('rowRef');

			var index = array.indexOf(ref);
			if (index > -1) {
				array.splice(index, 1);
			}

			$row.remove();
		});

		$app.on('change input', '.rpb-input', function () {
			var $input = $(this);

			if ($input.hasClass('rpb-image-id') || $input.hasClass('rpb-icon-value')) {
				return; // handled explicitly where set programmatically
			}

			var key = $input.data('fieldKey');
			var $row = $input.closest('.rpb-repeater-row');
			var target;

			if ($row.length) {
				target = $row.data('rowRef');
			} else {
				var blockRef = $input.closest('.rpb-block').data('blockRef');
				target = blockRef ? blockRef.fields : null;
			}

			if (target) {
				target[key] = $input.val();
			}
		});

		$app.on('click', '.rpb-image-choose', function (e) {
			e.preventDefault();

			var $picker = $(this).closest('.rpb-image-picker');
			var $hidden = $picker.find('.rpb-image-id');
			var $preview = $picker.find('.rpb-image-preview');
			var $removeBtn = $picker.find('.rpb-image-remove');
			var pickerId = _.uniqueId('rpb-media-');

			var frame = wp.media({
				title: config.i18n.chooseImage,
				multiple: false,
			});

			mediaFrames[pickerId] = frame;

			frame.on('select', function () {
				var attachment = frame.state().get('selection').first().toJSON();
				$hidden.val(attachment.id).trigger('rpb:image-selected');
				$preview.html($('<img>').attr('src', (attachment.sizes && attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url)));
				$removeBtn.show();

				applyImageValue($picker);
			});

			frame.open();
		});

		$app.on('click', '.rpb-image-remove', function (e) {
			e.preventDefault();

			var $picker = $(this).closest('.rpb-image-picker');
			$picker.find('.rpb-image-id').val(0);
			$picker.find('.rpb-image-preview').empty();
			$(this).hide();

			applyImageValue($picker);
		});

		$app.on('click', '.rpb-icon-option', function () {
			var $option = $(this);
			var $grid = $option.closest('.rpb-icon-grid');
			var $field = $option.closest('.rpb-field-icon-picker');
			var iconKey = $option.data('iconKey');

			$grid.find('.rpb-icon-option').removeClass('is-active');
			$option.addClass('is-active');
			$field.find('.rpb-icon-value').val(iconKey);
			$field.find('.rpb-icon-custom-preview').empty();
			$field.find('.rpb-icon-remove-custom').hide();
			$field.find('.rpb-icon-paste-panel').hide();

			applyIconValue($field);
		});

		$app.on('click', '.rpb-icon-upload', function (e) {
			e.preventDefault();

			var $field = $(this).closest('.rpb-field-icon-picker');
			var pickerId = _.uniqueId('rpb-icon-media-');

			var frame = wp.media({
				title: config.i18n.uploadIcon,
				multiple: false,
				library: { type: 'image/svg+xml' },
			});

			mediaFrames[pickerId] = frame;

			frame.on('select', function () {
				var attachment = frame.state().get('selection').first().toJSON();
				var value = 'upload:' + attachment.id;

				$field.find('.rpb-icon-grid .rpb-icon-option').removeClass('is-active');
				$field.find('.rpb-icon-value').val(value);
				$field.find('.rpb-icon-custom-preview').html($('<img>').attr('src', attachment.url));
				$field.find('.rpb-icon-remove-custom').show();
				$field.find('.rpb-icon-paste-panel').hide();

				applyIconValue($field);
			});

			frame.open();
		});

		$app.on('click', '.rpb-icon-remove-custom', function (e) {
			e.preventDefault();

			var $field = $(this).closest('.rpb-field-icon-picker');

			$field.find('.rpb-icon-value').val('');
			$field.find('.rpb-icon-custom-preview').empty();
			$field.find('.rpb-icon-paste-panel').hide();
			$field.find('.rpb-icon-paste-input').val('');
			$(this).hide();

			applyIconValue($field);
		});

		$app.on('click', '.rpb-icon-paste-toggle', function (e) {
			e.preventDefault();

			var $field = $(this).closest('.rpb-field-icon-picker');
			var $panel = $field.find('.rpb-icon-paste-panel');
			var isOpen = $panel.is(':visible');

			$panel.toggle(!isOpen);

			if (!isOpen) {
				var currentValue = $field.find('.rpb-icon-value').val();

				if (typeof currentValue === 'string' && currentValue.indexOf('paste:') === 0) {
					$panel.find('.rpb-icon-paste-input').val(decodePastedSvg(currentValue));
				}

				$panel.find('.rpb-icon-paste-input').trigger('focus');
			}
		});

		$app.on('click', '.rpb-icon-paste-cancel', function (e) {
			e.preventDefault();

			var $field = $(this).closest('.rpb-field-icon-picker');

			$field.find('.rpb-icon-paste-panel').hide();
			$field.find('.rpb-icon-paste-input').val('');
		});

		$app.on('click', '.rpb-icon-paste-apply', function (e) {
			e.preventDefault();

			var $field = $(this).closest('.rpb-field-icon-picker');
			var svgMarkup = $field.find('.rpb-icon-paste-input').val().trim();

			if (!svgMarkup || svgMarkup.toLowerCase().indexOf('<svg') === -1) {
				window.alert(config.i18n.invalidIconSvg);
				return;
			}

			var value = encodePastedSvg(svgMarkup);

			$field.find('.rpb-icon-grid .rpb-icon-option').removeClass('is-active');
			$field.find('.rpb-icon-value').val(value);
			$field.find('.rpb-icon-custom-preview').html(svgMarkup);
			$field.find('.rpb-icon-remove-custom').show();
			$field.find('.rpb-icon-paste-panel').hide();

			applyIconValue($field);
		});
	}

	function applyImageValue($picker) {
		var key = $picker.data('fieldKey');
		var value = parseInt($picker.find('.rpb-image-id').val(), 10) || 0;
		var $row = $picker.closest('.rpb-repeater-row');

		if ($row.length) {
			$row.data('rowRef')[key] = value;
		} else {
			$picker.closest('.rpb-block').data('blockRef').fields[key] = value;
		}
	}

	function applyIconValue($field) {
		var key = $field.data('fieldKey') || $field.find('.rpb-icon-value').data('fieldKey');
		var value = $field.find('.rpb-icon-value').val();
		var $row = $field.closest('.rpb-repeater-row');

		if ($row.length) {
			$row.data('rowRef')[key] = value;
		} else {
			$field.closest('.rpb-block').data('blockRef').fields[key] = value;
		}
	}

	/* ---------------------------------------------------------------
	 * Serialize into the hidden field before the post form submits.
	 * Direct DOM population (not preventDefault) so normal submission,
	 * including the native Publish/Update button, still proceeds and
	 * save_post picks up #rectify_pb_data via $_POST as usual.
	 * -------------------------------------------------------------*/

	function serializeState() {
		var $textarea = $('#rectify_pb_data');

		if ($textarea.length) {
			// Pull the current DOM values into state once more at submit time.
			// This covers browser autofill and programmatic field updates that
			// may not have emitted an input/change event before Update is clicked.
			$app.find('.rpb-input').each(function () {
				var $input = $(this);

				if ($input.hasClass('rpb-image-id') || $input.hasClass('rpb-icon-value')) {
					return;
				}

				var key = $input.data('fieldKey');
				var $row = $input.closest('.rpb-repeater-row');
				var target = $row.length
					? $row.data('rowRef')
					: ($input.closest('.rpb-block').data('blockRef') || {}).fields;

				if (target && key) {
					target[key] = $input.val();
				}
			});

			$textarea.val(JSON.stringify(state));
		}
	}

	function bindSerializeOnSubmit() {
		$('#post').on('submit', serializeState);
		$(document).on('click', '#publish, #save-post, .editor-post-publish-button, .editor-post-save-draft', serializeState);
	}

	$(function () {
		config = readConfig();
		$app = $('#rectify-pb-app');

		if (!config || !$app.length) {
			return;
		}

		state = readInitialState();

		renderApp();
		bindEvents();
		bindSerializeOnSubmit();
	});
})(jQuery, _);
