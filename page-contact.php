<?php
/**
 * Template Name: Contact
 */

get_header();
?>

<div class="bg-[#C0C78C] min-h-screen py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8">Contact Me</h1>
        <div class="max-w-lg mx-auto bg-[#FEFAE0] p-8 rounded-lg shadow-lg">
            <?php
            // Display the contact form shortcode
            echo do_shortcode( '[contact-form-7 id="ef80796" title="Contact form 1"]' );
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
