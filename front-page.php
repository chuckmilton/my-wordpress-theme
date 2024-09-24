<?php
/**
 * Template Name: Front Page
 */

get_header();
?>

<div class="bg-[#C0C78C] min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <section class="text-center">
            <h1 class="text-5xl font-bold mb-4 opacity-0 animate-fade-in-down">Welcome to My Blog</h1>
            <p class="text-xl mb-8 opacity-0 animate-fade-in-down animation-delay-200">Sharing my thoughts on web development, programming, and more.</p>
            <a href="<?php echo get_permalink( get_page_by_title( 'Blog' ) ); ?>" class="bg-[#B99470] hover:bg-opacity-80 text-white font-bold py-3 px-6 rounded inline-block opacity-0 animate-fade-in-up animation-delay-400">
                Read My Blog
            </a>
        </section>
    </div>
</div>

<?php
get_footer();
?>
