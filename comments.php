<?php
/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password, we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="bg-white rounded-lg p-8 mb-12">
    <?php if ( have_comments() ) : ?>
        <h3 class="text-2xl font-semibold mb-6">
            <?php
                $comments_number = get_comments_number();
                if ( '1' === $comments_number ) {
                    printf( 'One Comment on &ldquo;%s&rdquo;', get_the_title() );
                } else {
                    printf(
                        '%s Comments on &ldquo;%s&rdquo;',
                        number_format_i18n( $comments_number ),
                        get_the_title()
                    );
                }
            ?>
        </h3>

        <ul class="space-y-6">
            <?php
                wp_list_comments( array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'avatar_size'=> 64,
                    'callback'   => 'my_custom_comments',
                ) );
            ?>
        </ul>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
                <div class="nav-next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    // If comments are closed and there are comments, let's leave a note.
    if ( ! comments_open() && get_comments_number() ) :
    ?>
        <p class="no-comments">Comments are closed.</p>
    <?php endif; ?>

    <?php
    // Custom comment form arguments
    $comment_form_args = array(
        'title_reply'          => '<h3 class="text-2xl font-semibold mb-4">Leave a Comment</h3>',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'fields'               => array(
            'author' => '<div class="mb-4"><label for="author" class="block text-gray-700 mb-2">Name</label>' .
                        '<input id="author" name="author" type="text" class="w-full border border-gray-300 rounded p-2" value="' . esc_attr( $commenter['comment_author'] ) . '" required /></div>',
            'email'  => '<div class="mb-4"><label for="email" class="block text-gray-700 mb-2">Email</label>' .
                        '<input id="email" name="email" type="email" class="w-full border border-gray-300 rounded p-2" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required /></div>',
            'url'    => '<div class="mb-4"><label for="url" class="block text-gray-700 mb-2">Website</label>' .
                        '<input id="url" name="url" type="url" class="w-full border border-gray-300 rounded p-2" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
        ),
        'comment_field'        => '<div class="mb-4"><label for="comment" class="block text-gray-700 mb-2">Comment</label>' .
                                  '<textarea id="comment" name="comment" class="w-full border border-gray-300 rounded p-2 h-32" required></textarea></div>',
        'submit_button'        => '<button type="submit" class="bg-[#B99470] text-white font-bold py-2 px-6 rounded hover:bg-opacity-80">Post Comment</button>',
    );
    comment_form( $comment_form_args );
    ?>
</div>
