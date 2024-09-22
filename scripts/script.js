document.addEventListener('DOMContentLoaded', function() {
    // Common function to handle form submissions
    function handleFormSubmission(formId, actionUrl, successCallback) {
        const form = document.getElementById(formId);
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this); // Collect form data

            fetch(actionUrl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    successCallback(); // Call the success callback on success
                } else {
                    // Display error message
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    }

    // Handle sign-up form submission
    handleFormSubmission('signupForm', 'signup.php', function() {
        // Hide the signup modal
        const signupModalElement = document.getElementById('signupModal');
        const signupModal = bootstrap.Modal.getInstance(signupModalElement);
        signupModal.hide();

        // Show the signin modal
        const signinModalElement = document.getElementById('signinModal');
        const signinModal = new bootstrap.Modal(signinModalElement);
        signinModal.show();
    });

    // Handle sign-in form submission
    handleFormSubmission('signinForm', 'signin.php', function() {
        // Update the navbar button with user info
        const userIcon = document.getElementById('userIcon');
        const userName = data.username; // Assuming your response contains the username

        // Change the navbar button to show user icon and name
        const navbarButton = document.getElementById('navbarButton'); // Replace with your actual button ID
        navbarButton.innerHTML = `
            <img src="img/user-icon.png" alt="User Icon" id="userIcon" />
            ${userName}
        `;

        // Hide the sign-in modal
        const signinModalElement = document.getElementById('signinModal');
        const signinModal = bootstrap.Modal.getInstance(signinModalElement);
        signinModal.hide();

        // Optionally reload the page to reflect changes
        location.reload();
    });

    // Check if userIcon exists before adding event listeners
    const userIcon = document.getElementById('userIcon');
    if (userIcon) {
        const userDetails = document.getElementById('userDetails');
        userIcon.addEventListener('mouseenter', function() {
            userDetails.classList.remove('hidden');
        });
        userIcon.addEventListener('mouseleave', function() {
            userDetails.classList.add('hidden');
        });
    } else {
        console.warn('userIcon not found in the DOM');
    }

    // Handle logout button click
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            fetch('logout.php', {
                method: 'POST'
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = 'index.php'; // Redirect to index.php
                } else {
                    alert('Error logging out. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    } else {
        console.warn('logoutBtn not found in the DOM');
    }
});
