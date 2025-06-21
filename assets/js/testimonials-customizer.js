jQuery(document).ready(function ($) {
  // Initialize repeater
  $(".maxoliv-testimonials-repeater").each(function () {
    var $repeater = $(this);
    var $container = $repeater.find(".testimonials-container");
    var $hiddenInput = $repeater.parent().find('input[type="hidden"]');
    var $errorMsg = $repeater.find(".testimonial-error-message");

    // Add new testimonial
    $repeater.find("[data-repeater-create]").on("click", function () {
      var $newItem = $container.find("[data-repeater-item]").first().clone();
      $newItem
        .find('textarea, input[type="text"], input[type="hidden"]')
        .val("");
      $newItem.find(".image-preview").hide().find("img").remove();
      $newItem.find(".remove-image-button").hide();
      $newItem.removeClass("has-error");
      $container.append($newItem);
      updateHiddenValue();
    });

    // Remove testimonial
    $container.on("click", "[data-repeater-delete]", function () {
      if ($container.find("[data-repeater-item]").length > 1) {
        $(this).closest("[data-repeater-item]").remove();
        updateHiddenValue();
      }
    });

    // Image upload
    $container.on("click", ".upload-image-button", function (e) {
      e.preventDefault();
      var $button = $(this);
      var $preview = $button.siblings(".image-preview");
      var $input = $button.siblings(".image-url");
      var $removeBtn = $button.siblings(".remove-image-button");

      var frame = wp.media({
        title: "Select Author Image",
        button: { text: "Use this image" },
        multiple: false,
      });

      frame.on("select", function () {
        var attachment = frame.state().get("selection").first().toJSON();
        $input.val(attachment.url);
        $preview
          .show()
          .html('<img src="' + attachment.url + '" style="max-width:100px;">');
        $removeBtn.show();
        $(this).closest("[data-repeater-item]").removeClass("has-error");
        updateHiddenValue();
      });

      frame.open();
    });

    // Image remove
    $container.on("click", ".remove-image-button", function () {
      var $button = $(this);
      $button.siblings(".image-url").val("");
      $button.siblings(".image-preview").hide().find("img").remove();
      $button.hide();
      updateHiddenValue();
    });

    // Validate individual testimonial
    function validateTestimonialItem(item, index) {
      var errors = [];
      if (!item.text.trim()) errors.push("Text is required");
      if (!item.author.trim()) errors.push("Author is required");
      if (!item.image.trim()) errors.push("Image is required");
      return {
        isValid: errors.length === 0,
        errors: errors,
        index: index,
      };
    }

    // Update hidden input value
    function updateHiddenValue() {
      var testimonials = [];
      var allErrors = [];

      $container.find("[data-repeater-item]").each(function (index) {
        var $item = $(this);
        var itemData = {
          text: $item.find('textarea[name="text"]').val().trim(),
          author: $item.find('input[name="author"]').val().trim(),
          image: $item.find('input[name="image"]').val().trim(),
        };

        var validation = validateTestimonialItem(itemData, index);
        if (validation.isValid) {
          testimonials.push(itemData);
          $item.removeClass("has-error");
        } else {
          allErrors = allErrors.concat(
            validation.errors.map((e) => `Testimonial ${index + 1}: ${e}`)
          );
          $item.addClass("has-error");
        }
      });

      // Update UI
      if (allErrors.length > 0) {
        $errorMsg.html(allErrors.join("<br>")).show();
      } else {
        $errorMsg.hide();
      }

      // Always update the hidden field (invalid items will be filtered server-side)
      $hiddenInput.val(JSON.stringify(testimonials)).trigger("change");
      return allErrors.length === 0;
    }

    // Handle Customizer save
    wp.customize.bind("ready", function () {
      // Validate before saving
      wp.customize.previewer.bind("before-send", function () {
        var isValid = updateHiddenValue();

        if (!isValid) {
          wp.customize.notifications.add(
            "testimonial_validation",
            new wp.customize.Notification("testimonial_validation", {
              type: "error",
              message:
                "Some testimonials have errors. Incomplete items won't be displayed.",
              dismissible: true,
            })
          );
        } else {
          wp.customize.notifications.remove("testimonial_validation");
        }
      });
    });

    // Clear errors when editing
    $container.on("input change", "textarea, input", function () {
      $(this).closest("[data-repeater-item]").removeClass("has-error");
      wp.customize.notifications.remove("testimonial_validation");
    });

    // Initial update
    updateHiddenValue();
  });
});
