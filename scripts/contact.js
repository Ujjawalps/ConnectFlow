$(document).ready(function() {
    $("#contactForm").on("submit", function(e) {
        e.preventDefault(); // Prevent default form submission

        const formData = $(this).serialize(); // Serialize form data

        $.ajax({
            type: "POST",
            url: "send_email.php", // URL to your send_email.php file
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    $("#form-message-warning").hide();
                    $("#form-message-success").text(response.message).show();
                    $("#contactForm")[0].reset(); // Reset form fields
                } else {
                    $("#form-message-success").hide();
                    $("#form-m essage-warning").text(response.message).show();
                }
            },
            error: function() {
                $("#form-message-warning").text("An error occurred. Please try again.").show();
            }
        });
    });
});
