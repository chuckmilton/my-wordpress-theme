<?php
get_header();
?>

<div class="bg-[#C0C78C] min-h-screen py-12">
    <div class="container mx-auto px-4">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
                <article class="bg-[#FEFAE0] rounded-lg shadow-lg p-8 mb-12">
                    <h1 class="text-4xl font-bold mb-4"><?php the_title(); ?></h1>
                    <p class="text-gray-600 mb-6">Published on <?php echo get_the_date(); ?> in <?php the_category( ', ' ); ?></p>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="my-6">
                            <?php the_post_thumbnail( 'large', ['class' => 'w-full h-auto rounded' ] ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="prose lg:prose-xl max-w-none">
                        <?php the_content(); ?>
                    </div>
                    <div class="mt-8">
                        <span class="font-semibold">Tags:</span>
                        <?php the_tags( '', ', ', '' ); ?>
                    </div>
                </article>

                <div class="bg-white rounded-lg shadow p-8 mb-12">
                    <h3 class="text-2xl font-semibold mb-4">About the Author</h3>
                    <div class="flex items-center">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
                        <div class="ml-4">
                            <p class="font-semibold"><?php the_author(); ?></p>
                            <p class="text-gray-600"><?php the_author_meta( 'description' ); ?></p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-8 mb-12">
                    <h3 class="text-2xl font-semibold mb-4">Comments</h3>
                    <?php if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif; ?>
                </div>

                <div class="flex justify-between">
                    <div>
                        <?php previous_post_link( '%link', '← Previous Post' ); ?>
                    </div>
                    <div>
                        <?php next_post_link( '%link', 'Next Post →' ); ?>
                    </div>
                </div>
            <?php endwhile;
        else :
            echo '<p>No content found.</p>';
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
?>
