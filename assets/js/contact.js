document.addEventListener("DOMContentLoaded", function () {
  const contactOptions = document.querySelectorAll(".contact-option");
  const modalContainer = document.getElementById("contact-modal-container");

  // Modal data
  const modalData = {
    booking: {
      title: "I'd like to book you in",
      icon: "<?php echo get_template_directory_uri(); ?>/images/icon-working.png",
      color: "#fd8e8e",
    },
    quote: {
      title: "I'd like a quote for a project",
      icon: "<?php echo get_template_directory_uri(); ?>/images/icon-money.png",
      color: "#fde58e",
    },
    hello: {
      title: "I'd just like to say Hello",
      icon: "<?php echo get_template_directory_uri(); ?>/images/icon-wave.png",
      color: "#8efdb0",
    },
  };

  // Handle option clicks
  contactOptions.forEach((option) => {
    option.addEventListener("click", function () {
      const optionType = this.dataset.option;
      const data = modalData[optionType];
      openModal(data);
    });
  });

  // Open modal function
  function openModal(data) {
    const modalHTML = `
            <div class="contact-modal-overlay">
                <div class="contact-modal">
                    <div class="contact-modal-close">X</div>
                    <div class="contact-modal-content">
                        <div class="contact-modal-header">
                            <div class="contact-circle" style="background-color: ${data.color}">
                                <img src="${data.icon}" alt="${data.title}" class="contact-icon">
                            </div>
                            <h3>${data.title}</h3>
                        </div>
                        
                        <form id="contact-form" class="contact-form">
                            <input type="hidden" name="contact_type" value="${data.title}">
                            
                            <div class="contact-form-group">
                                <label for="contact-name" class="contact-form-label">Name</label>
                                <input type="text" id="contact-name" name="name" class="contact-form-input" placeholder="Alex Jones" required>
                            </div>
                            
                            <div class="contact-form-group">
                                <label for="contact-email" class="contact-form-label">Email</label>
                                <input type="email" id="contact-email" name="email" class="contact-form-input" placeholder="hello@example.com" required>
                            </div>
                            
                            <div class="contact-form-group">
                                <label for="contact-company" class="contact-form-label">Company</label>
                                <input type="text" id="contact-company" name="company" class="contact-form-input" placeholder="Google Inc">
                            </div>
                            
                            <div class="contact-form-group">
                                <label for="contact-message" class="contact-form-label">Message</label>
                                <textarea id="contact-message" name="message" class="contact-form-textarea" placeholder="I heard you are the best in this field..." required></textarea>
                            </div>
                            
                            <div class="contact-form-checkbox">
                                <input type="checkbox" id="contact-agreement" name="agreement" required>
                                <label for="contact-agreement">I agree to be a nice and kind person😊</label>
                            </div>
                            
                            <button type="submit" class="contact-form-submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        `;

        modalContainer.innerHTML = modalHTML;
        document.body.style.overflow = "hidden";

    

        // Add close event
        const closeBtn = document.querySelector(".contact-modal-close");
        const overlay = document.querySelector(".contact-modal-overlay");

        closeBtn.addEventListener("click", closeModal);
        overlay.addEventListener("click", function (e) {
        if (e.target === overlay) {
            closeModal();
        }
        });

        // Form submission
        const form = document.getElementById("contact-form");
        form.addEventListener("submit", handleFormSubmit);
    };

  // Close modal function
  function closeModal() {
    modalContainer.innerHTML = "";
    document.body.style.overflow = "";
  }

  // Handle form submission
  function handleFormSubmit(e) {
    e.preventDefault();

    // Here you would typically send the form data to your server
    // For WordPress, you would use AJAX to a custom endpoint

    // Example success message
    const form = e.target;
    const successHTML = `
            <div class="contact-form-success">
                Message sent successfully! 🎉
            </div>
        `;

    form.insertAdjacentHTML("beforeend", successHTML);

    // Reset form after delay
    setTimeout(() => {
      form.reset();
      closeModal();
    }, 3000);
  }

  // Close modal on ESC key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && modalContainer.innerHTML) {
      closeModal();
    }
  });

});
