jQuery(document).ready(function ($) {
    $("#contactForm").submit(function (e) {
        e.preventDefault();
        let formData = {
            action: "submit_contact_form",
            nonce: $("#contact_nonce").val(),
            name: $("#name").val(),
            email: $("#email").val(),
            message: $("#message").val(),
        };

        $.ajax({
            type: "POST",
            url: ajax_object.ajax_url,
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("#formResponse").html("<p style='color: green;'>" + response.data.message + "</p>");
                    $("#contactForm")[0].reset();
                } else {
                    $("#formResponse").html("<p style='color: red;'>" + response.data.message + "</p>");
                }
            },
            error: function () {
                $("#formResponse").html("<p style='color: red;'>AJAX request failed.</p>");
            },
        });
    });
});
