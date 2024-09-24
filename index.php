<?php
get_header();
?>

<div class="container mx-auto px-4 py-8">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <article class="mb-8">
                <h2 class="text-2xl font-semibold mb-2">
                    <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
                </h2>
                <p class="text-gray-500">Published on <?php echo get_the_date(); ?> in <?php the_category( ', ' ); ?></p>
                <?php
                if ( has_post_thumbnail() ) : ?>
                    <div class="my-4">
                        <?php the_post_thumbnail( 'medium', ['class' => 'w-full h-auto'] ); ?>
                    </div>
                <?php endif; ?>
                <div class="text-gray-700">
                    <?php the_excerpt(); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:underline">Read More</a>
            </article>
        <?php endwhile;

        // Pagination
        the_posts_pagination( array(
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;',
        ) );

    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>

<?php
get_footer();
?>
