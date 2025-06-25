document.addEventListener("DOMContentLoaded", function () {
  const contactOptions = document.querySelectorAll(".contact-option");
  const modalContainer = document.getElementById("contact-modal-container");

  // Modal data
  const modalData = {
    booking: {
      title: "I'd like to book you in",
      icon: maxoliv_vars.icons.working,
      color: "#fd8e8e",
    },
    quote: {
      title: "I'd like a quote for a project",
      icon: maxoliv_vars.icons.money,
      color: "#fde58e",
    },
    hello: {
      title: "I'd just like to say Hello",
      icon: maxoliv_vars.icons.wave,
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
                    <div class="contact-modal-close">
                      <img src="${maxoliv_vars.closeButton}" alt="Close" style="width: 30px" />
                    </div>
                    <div class="contact-modal-content">
                        <div class="contact-modal-header">
                            <div class="contact-circle" style="background-color: ${data.color}">
                                <img src="${data.icon}" alt="${data.title}" class="contact-icon">
                            </div>
                            <h3 style="color: #2e304b">${data.title}</h3>
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
                                <label for="contact-agreement" style="color: #2e304b">I agree to be a nice and kind person😊</label>
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
    const form = e.target;

 

    //Create FormData object  
    const formData = new FormData(form);
    // Add wordpress AJAX security nonce
    formData.append("action", "maxoliv_handle_contact_form");
    formData.append("security", maxoliv_vars.ajax_nonce);

    //Debug: Log what we are sending
    console.log("Form Data:", Object.fromEntries(formData));

    //show loading state
    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.textContent = "Sending...";

    //Send via AJAX
    fetch(maxoliv_vars.ajax_url, {
      method: "POST",
      body: formData,
      headers: {
            'Accept': 'application/json' // Tell WordPress we want JSON back
      }
    })
      .then((response) => {
        console.log('Raw response:', response);
        return response.json(); //Then try to pasrse the response as JSON
      })
      .then((data) => {
        console.log('Parsed response:', data);
        if (data.success) {
          // Show success message
          form.insertAdjacentHTML(
            "beforeend",
            `
            <div class="contact-form-success">
                // Message sent successfully! 🎉
                ${data.data} 🎉
            </div>
          `
          );

          // Reset form after delay
          setTimeout(() => {
            form.reset();
            closeModal();
          }, 4000);
        } else {
          // Show error message
          alert("Error sending message: " + data.data);
        }
      })
      .catch((error) => {
        console.error("Full Error:", error);
        alert("Failed to connect to server. Check console for details.😢");
      })
      .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = "Send Message";
      });     
  }

  // Close modal on ESC key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && modalContainer.innerHTML) {
      closeModal();
    }
  });

});
