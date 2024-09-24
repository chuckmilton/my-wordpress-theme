<?php
/**
 * Template Name: Blog
 */

get_header();
?>

<div class="bg-[#C0C78C] min-h-screen py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-bold text-center mb-12 opacity-0 animate-fade-in-down">Blog</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            if ( have_posts() ) :
                $delay = 0; // Initialize delay for animation
                while ( have_posts() ) : the_post();
                    $delay += 100; // Increase delay by 100ms for each post
                    ?>
                    <div class="border rounded-lg overflow-hidden shadow-lg bg-[#FEFAE0] opacity-0 animate-fade-in-up" style="animation-delay: <?php echo $delay; ?>ms;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="h-48 overflow-hidden">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium', ['class' => 'w-full h-full object-cover'] ); ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="h-48 bg-gray-300 flex items-center justify-center">
                                <p>No Image</p>
                            </div>
                        <?php endif; ?>

                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-3">
                                <a href="<?php the_permalink(); ?>" class="hover:underline text-gray-900"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-gray-700 mb-4 line-clamp-3"><?php echo get_the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-[#B99470] font-bold hover:underline">Read More</a>
                        </div>
                    </div>
                <?php endwhile;

                // Pagination
                echo '<div class="mt-12">';
                the_posts_pagination( array(
                    'prev_text' => '<span class="bg-[#B99470] text-white px-4 py-2 rounded">&laquo; Previous</span>',
                    'next_text' => '<span class="bg-[#B99470] text-white px-4 py-2 rounded">Next &raquo;</span>',
                    'before_page_number' => '<span class="px-4 py-2 text-[#B99470] font-bold">',
                    'after_page_number' => '</span>',
                ) );
                echo '</div>';

            else :
                echo '<p class="text-center">No posts found.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
