<?php
// Register shortcode
function website_submission_form_shortcode() {
    ob_start(); ?>
    <div id="website-submission-form">
        <form id="website-submission" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="website_url">Website URL:</label><br>
            <input type="text" id="website_url" name="website_url"><br>
            <input type="submit" value="Submit">
        </form>
        <div id="submission-message" style="display: none;"></div>
    </div>
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('website-submission');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); 
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var messageContainer = document.getElementById('submission-message');
                    if (response.success) {
                        messageContainer.innerHTML = 'Form successfully submitted.';
                        messageContainer.style.display = 'block';
                    } else {
                        messageContainer.innerHTML = 'An error occurred. Please try again later.';
                        messageContainer.style.display = 'block';
                    }
                }
            };

            xhr.send(formData);
        });
    });
</script> -->
    <?php
    return ob_get_clean();
}
add_shortcode('website_submission_form', 'website_submission_form_shortcode');

