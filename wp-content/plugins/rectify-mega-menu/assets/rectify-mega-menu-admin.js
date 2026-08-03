jQuery(function ($) {
  function bindUploadButtons() {
    $('.rectify-mega-menu-upload-btn').off('click').on('click', function (e) {
      e.preventDefault();
      var button = $(this);
      var fieldId = button.data('target-id');
      var fieldUrl = button.data('target-url');
      var preview = button.closest('.rectify-mega-menu-field').find('.rectify-mega-menu-preview');
      var frame = wp.media({
        title: 'Select an icon or image',
        button: { text: 'Use this image' },
        multiple: false,
        library: { type: 'image' }
      });

      frame.on('select', function () {
        var attachment = frame.state().get('selection').first().toJSON();
        $('#' + fieldId).val(attachment.id);
        $('#' + fieldUrl).val(attachment.url);
        preview.html('<img src="' + attachment.url + '" alt="" />');
      });

      frame.open();
    });

    $('.rectify-mega-menu-clear-btn').off('click').on('click', function (e) {
      e.preventDefault();
      var button = $(this);
      var fieldId = button.data('target-id');
      var fieldUrl = button.data('target-url');
      var preview = button.closest('.rectify-mega-menu-field').find('.rectify-mega-menu-preview');
      $('#' + fieldId).val('');
      $('#' + fieldUrl).val('');
      preview.empty();
    });
  }

  bindUploadButtons();
  $(document).on('click', '.menu-item-bar', bindUploadButtons);
});
