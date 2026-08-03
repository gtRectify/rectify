/* global _ */
/**
 * Underscore templates used by builder.js. Kept in a separate file so
 * builder.js (application logic) stays focused on state/behaviour.
 *
 * Each template is registered on window.RectifyPBTemplates so builder.js can
 * call RectifyPBTemplates.block(data), RectifyPBTemplates.field(data), etc.
 * Templates use Underscore's default <%= %> / <% %> / <%- %> delimiters via
 * wp.template-style settings (_.templateSettings), matching core WP admin
 * conventions.
 */
(function ($, _) {
	'use strict';

	_.templateSettings = {
		evaluate: /<#([\s\S]+?)#>/g,
		interpolate: /\{\{\{([\s\S]+?)\}\}\}/g,
		escape: /\{\{([^\}]+?)\}\}(?!\})/g,
	};

	var templates = {};

	templates.blockCard = _.template(
		'<div class="rpb-block" data-block-index="{{ index }}" data-block-id="{{ id }}">' +
			'<div class="rpb-block-head">' +
				'<span class="rpb-block-handle" title="Drag to reorder">&#9776;</span>' +
				'<span class="rpb-block-title">{{ label }} <em class="rpb-block-type">({{ typeLabel }} &middot; {{ sectionKey }})</em></span>' +
				'<span class="rpb-block-actions">' +
					'<button type="button" class="button-link rpb-toggle-block">{{ toggleLabel }}</button>' +
					'<button type="button" class="button-link rpb-remove-block">&times;</button>' +
				'</span>' +
			'</div>' +
			'<div class="rpb-block-body"' + ' style="{{ bodyStyle }}"></div>' +
		'</div>'
	);

	templates.textField = _.template(
		'<div class="rpb-field rpb-field-text">' +
			'<label>{{ label }}</label>' +
			'<input type="text" class="widefat rpb-input" data-field-key="{{ key }}" value="{{ value }}">' +
		'</div>'
	);

	templates.urlField = _.template(
		'<div class="rpb-field rpb-field-url">' +
			'<label>{{ label }}</label>' +
			'<input type="url" class="widefat rpb-input" data-field-key="{{ key }}" value="{{ value }}">' +
		'</div>'
	);

	templates.emailField = _.template(
		'<div class="rpb-field rpb-field-email">' +
			'<label>{{ label }}</label>' +
			'<input type="email" class="widefat rpb-input" data-field-key="{{ key }}" value="{{ value }}">' +
		'</div>'
	);

	templates.richtextField = _.template(
		'<div class="rpb-field rpb-field-richtext">' +
			'<label>{{ label }}</label>' +
			'<textarea class="widefat rpb-input" rows="4" data-field-key="{{ key }}">{{ value }}</textarea>' +
		'</div>'
	);

	// Provider form embeds are multi-line <script> snippets, so this needs to
	// be a textarea (a single-line input makes pasting one unreadable) and
	// monospaced, so a malformed paste is easy to spot.
	templates.embedField = _.template(
		'<div class="rpb-field rpb-field-embed">' +
			'<label>{{ label }}</label>' +
			'<textarea class="widefat rpb-input rpb-embed-input" rows="6" spellcheck="false" data-field-key="{{ key }}">{{ value }}</textarea>' +
		'</div>'
	);

	templates.imageField = _.template(
		'<div class="rpb-field rpb-field-image">' +
			'<label>{{ label }}</label>' +
			'<div class="rpb-image-picker" data-field-key="{{ key }}">' +
				'<div class="rpb-image-preview"><# if ( imageUrl ) { #><img src="<#- imageUrl #>" alt=""><# } #></div>' +
				'<input type="hidden" class="rpb-input rpb-image-id" data-field-key="{{ key }}" value="{{ value }}">' +
				'<button type="button" class="button rpb-image-choose">{{ chooseLabel }}</button> ' +
				'<button type="button" class="button rpb-image-remove"' + ' style="{{ removeStyle }}">{{ removeLabel }}</button>' +
			'</div>' +
		'</div>'
	);

	templates.iconPickerField = _.template(
		'<div class="rpb-field rpb-field-icon-picker">' +
			'<label>{{ label }}</label>' +
			'<input type="hidden" class="rpb-input rpb-icon-value" data-field-key="{{ key }}" value="{{ value }}">' +
			'<div class="rpb-icon-grid"></div>' +
			'<div class="rpb-icon-custom">' +
				'<div class="rpb-icon-custom-preview"></div>' +
				'<button type="button" class="button rpb-icon-upload">{{ uploadLabel }}</button> ' +
				'<button type="button" class="button rpb-icon-paste-toggle">{{ pasteLabel }}</button> ' +
				'<button type="button" class="button-link rpb-icon-remove-custom" style="{{ removeStyle }}">{{ removeLabel }}</button>' +
				'<div class="rpb-icon-paste-panel" style="display:none;">' +
					'<textarea class="rpb-icon-paste-input" rows="4" placeholder="{{ pastePlaceholder }}"></textarea>' +
					'<div class="rpb-icon-paste-actions">' +
						'<button type="button" class="button button-primary rpb-icon-paste-apply">{{ useSvgLabel }}</button> ' +
						'<button type="button" class="button-link rpb-icon-paste-cancel">{{ cancelLabel }}</button>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>'
	);

	templates.iconOption = _.template(
		'<button type="button" class="rpb-icon-option {{ activeClass }}" data-icon-key="{{ key }}" title="{{ label }}">' +
			'<span class="rpb-icon-preview">{{{ markup }}}</span>' +
			'<span class="rpb-icon-label">{{ label }}</span>' +
		'</button>'
	);

	templates.repeaterField = _.template(
		'<div class="rpb-field rpb-field-repeater">' +
			'<label>{{ label }}</label>' +
			'<div class="rpb-repeater-rows" data-field-key="{{ key }}"></div>' +
			'<button type="button" class="button rpb-repeater-add" data-field-key="{{ key }}">{{ addLabel }}</button>' +
		'</div>'
	);

	templates.repeaterRow = _.template(
		'<div class="rpb-repeater-row" data-row-index="{{ index }}">' +
			'<span class="rpb-repeater-handle" title="Drag to reorder">&#9776;</span>' +
			'<div class="rpb-repeater-row-fields"></div>' +
			'<button type="button" class="button-link rpb-repeater-remove">&times;</button>' +
		'</div>'
	);

	window.RectifyPBTemplates = templates;
})(jQuery, _);
