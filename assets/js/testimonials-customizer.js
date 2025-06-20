jQuery(document).ready(function($) {
    // Initialize repeater
    $('.maxoliv-testimonials-repeater').each(function() {
        var $container = $(this).find('.testimonials-container');
        var $hiddenInput = $(this).parent().find('input[type="hidden"]');
        
        // Add new testimonial
        $(this).find('[data-repeater-create]').on('click', function() {
            var $newItem = $container.find('[data-repeater-item]').first().clone();
            $newItem.find('textarea, input[type="text"], input[type="hidden"]').val('');
            $newItem.find('.image-preview').hide().find('img').remove();
            $newItem.find('.remove-image-button').hide();
            $container.append($newItem);
            updateHiddenValue();
        });
        
        // Remove testimonial
        $container.on('click', '[data-repeater-delete]', function() {
            if ($container.find('[data-repeater-item]').length > 1) {
                $(this).closest('[data-repeater-item]').remove();
                updateHiddenValue();
            }
        });
        
        // Image upload
        $container.on('click', '.upload-image-button', function(e) {
            e.preventDefault();
            var $button = $(this);
            var $preview = $button.siblings('.image-preview');
            var $input = $button.siblings('.image-url');
            var $removeBtn = $button.siblings('.remove-image-button');
            
            var frame = wp.media({
                title: 'Select Author Image',
                button: { text: 'Use this image' },
                multiple: false
            });
            
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $input.val(attachment.url);
                $preview.show().html('<img src="' + attachment.url + '" style="max-width:100px;">');
                $removeBtn.show();
                updateHiddenValue();
            });
            
            frame.open();
        });
        
        // Image remove
        $container.on('click', '.remove-image-button', function() {
            var $button = $(this);
            $button.siblings('.image-url').val('');
            $button.siblings('.image-preview').hide().find('img').remove();
            $button.hide();
            updateHiddenValue();
        });
        
        // Update hidden input value
        function updateHiddenValue() {
            var testimonials = [];
            $container.find('[data-repeater-item]').each(function() {
                testimonials.push({
                    text: $(this).find('textarea[name="text"]').val(),
                    author: $(this).find('input[name="author"]').val(),
                    image: $(this).find('input[name="image"]').val()
                });
            });
            $hiddenInput.val(JSON.stringify(testimonials)).trigger('change');
        }
        
        // Initialize change tracking
        $container.on('change keyup', 'textarea, input[type="text"]', updateHiddenValue);
    });
});