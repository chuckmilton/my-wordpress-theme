<?php
// Enqueue Styles and Scripts
function custom_theme_enqueue_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_style( 'tailwindcss', get_template_directory_uri() . '/dist/tailwind.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'main-style', get_stylesheet_uri(), array( 'tailwindcss' ), '1.0', 'all' );

    // Enqueue JavaScript for menu toggle
    wp_enqueue_script( 'menu-toggle', get_template_directory_uri() . '/js/menu-toggle.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_scripts' );

function custom_theme_setup() {
    // Enable support for menus
    add_theme_support( 'menus' );

    // Register primary menu location
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'custom-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150 ); // Default thumbnail size

function my_custom_comments( $comment, $args, $depth ) {
    $tag       = ( 'div' === $args['style'] ) ? 'div' : 'li';
    $commenter = wp_get_current_commenter();

    // Calculate indentation based on depth
    $indent_class = '';
    if ( $depth > 1 ) {
        $indent_level = ($depth - 1) * 4; // Adjust multiplier for desired indentation
        $indent_class = 'ml-' . min($indent_level, 20); // Limit max indentation to ml-20
    }

    // Alternate background colors for replies
    $bg_color = $depth % 2 == 0 ? 'bg-gray-50' : 'bg-white';

    // Add left border for replies
    $border_class = $depth > 1 ? 'border-l-2 border-gray-300 pl-4' : '';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" class="pb-6 <?php echo $indent_class; ?> <?php echo $bg_color; ?>">
        <div class="flex items-start <?php echo $border_class; ?>">
            <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'class' => 'rounded-full mr-4' ) ); ?>
            <div>
                <div class="flex items-center">
                    <h4 class="text-lg font-semibold mr-2"><?php comment_author_link(); ?></h4>
                    <span class="text-gray-500 text-sm"><?php printf( '%1$s at %2$s', get_comment_date(), get_comment_time() ); ?></span>
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="text-red-500">Your comment is awaiting moderation.</em>
                <?php endif; ?>
                <div class="mt-2 text-gray-800">
                    <?php comment_text(); ?>
                </div>
                <div class="mt-2">
                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'reply_text' => 'Reply',
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'],
                        'before'     => '',
                        'after'      => '',
                        'add_below'  => 'comment',
                        'class'      => 'text-blue-500 hover:underline',
                    ) ) );
                    ?>
                </div>
            </div>
        </div>
    </<?php echo $tag; ?>>
    <?php
}

?>
