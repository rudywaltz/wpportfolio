<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
if (function_exists('pll_register_string')) {
  pll_register_string( 'prev_string', 'Volt', 'homepage');
  pll_register_string( 'actual_string', 'Most', 'homepage');
  pll_register_string( 'next_string', 'Majd', 'homepage');
  pll_register_string( 'action_button', 'Megnéz', 'View');
  pll_register_string( 'education', 'Tanulmányok', 'Education');
  pll_register_string( 'exhibitions_group', 'Csoportos Kiállítások', 'Group exhibitions');
  pll_register_string( 'exhibitions_solo', 'Önálló Kiállítások', 'Solo exhibitions');
  pll_register_string( 'awards', 'Díjak', 'Awards');
  pll_register_string( 'membership', 'Tagság', 'Membership');
}

add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );

add_image_size( 'xlarge', 2000, 2000 );

function blankslate_load_scripts()
{
wp_enqueue_script( 'main', get_template_directory_uri() . '/js/app.js', false, 1, true);
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}


add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}

if (function_exists('blankslate_widgets_init')) {
  add_action( 'widgets_init', 'blankslate_widgets_init' );
}

function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
