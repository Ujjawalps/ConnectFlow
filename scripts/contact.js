document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");
  const successMessage = document.getElementById("form-message-success");
  const warningMessage = document.getElementById("form-message-warning");

  // Hide success message initially
  successMessage.style.display = "none";
  warningMessage.style.display = "none"; // Also hide the warning message initially

  form.addEventListener("submit", function (event) {
      event.preventDefault(); // Prevent the default form submission

      // Example: Validate form fields here (optional)
      const name = document.getElementById("name").value;
      const email = document.getElementById("email").value;
      const subject = document.getElementById("subject").value;
      const message = document.getElementById("message").value;

      if (name && email && subject && message) {
          // Simulating a successful form submission
          setTimeout(() => {
              successMessage.style.display = "block"; // Show success message
              warningMessage.style.display = "none"; // Hide warning message

              // Reset the form fields
              form.reset();
          }, 1000); // Simulate a delay for AJAX call (1 second)
      } else {
          warningMessage.textContent = "Please fill in all fields.";
          warningMessage.style.display = "block"; // Show warning message
      }
  });
});
