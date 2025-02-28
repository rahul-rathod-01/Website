<?php
/* Template Name: Contact Form Page */
get_header();
?>
<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="contact-view">
                <div class="title-one">
                    <h2>Contact From.</h2>
                </div>
                <form action="" method="post">
                    <div class="input-wrapper">                        
                        <input type="text" name="name" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="input-wrapper">                        
                        <input type="email" name="email" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="input-wrapper">                        
                        <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="input-wrapper">                        
                        <label for="rating">Rating:</label>
                        <div class="star-rating">
                            <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
                            <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                            <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                            <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                            <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
                        </div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contactForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("action", "submit_contact_form");

        fetch("<?php echo admin_url('admin-ajax.php'); ?>", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            let responseDiv = document.getElementById("formResponse");
            responseDiv.innerHTML = data.success ? 
                `<p style="color: green;">${data.data.message}</p>` : 
                `<p style="color: red;">${data.data.message}</p>`;
        })
        .catch(error => console.error("Error:", error));
    });
});
</script>

<?php get_footer(); ?>
