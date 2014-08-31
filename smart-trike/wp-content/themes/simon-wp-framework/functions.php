<?php
/**
 * The template for Function. Make changes at your own risk.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */
// Set Content Width
if ( ! isset( $content_width ) )
	$content_width = 960;
	
function simonwpframework_setup() {
	// Add RSS links to <head> section
		add_theme_support( 'automatic-feed-links' );
			
	// Add Custom BG
		add_theme_support( 'custom-background' );
	
	// Enable post thumbnails
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(280, 280, true);

	// ADD POST FORMATS
		add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );

	// Editor Support
		add_editor_style();
		
	// Menu Support
		register_nav_menu('header-menu',__( 'Header Menu' ));		
}
add_action( 'after_setup_theme', 'simonwpframework_setup' );

include('inc/helper.php');
include('inc/woocommerce-helper.php');
include('inc/custom-post-type-helper-class.php');

$features = new Custom_Post_Type( 'features' );
$features->add_taxonomy( 'category' );

$sefety = new Custom_Post_Type( 'sefety' );
$sefety->add_taxonomy( 'category' );

// Enqueue scripts and styles
function simonwpframework_scripts() {
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		wp_enqueue_script( "jquery" );
		wp_enqueue_style( 'normalize', get_template_directory_uri() .'/inc/css/normalize.css' );
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style( 'media-queries', get_template_directory_uri() .'/inc/css/mediaqueries.css' );
		wp_enqueue_style( 'to-top', get_template_directory_uri() .'/inc/css/to-top-jquery.css' );
		wp_enqueue_script( 'retina', get_template_directory_uri() .'/inc/js/retina.js' );
		wp_enqueue_script( 'menu', get_template_directory_uri() .'/inc/js/menu.js' );
		wp_enqueue_script( 'to-top', get_template_directory_uri() .'/inc/js/to-top-jquery.js' );
		wp_enqueue_script( 'fade-in', get_template_directory_uri() .'/inc/js/fadein.js' );
		wp_enqueue_script( 'flow-type', get_template_directory_uri() . '/inc/js/flowtype.js' );
}
add_action( 'wp_enqueue_scripts', 'simonwpframework_scripts' );
	
// Add Bread Crumbs
function simonwpframework_breadcrumb() {
	echo bloginfo('name');
	if (!is_front_page()) {
		echo ' <a href="';
		echo home_url();
		echo '">Home';
		echo "</a> / ";
		if (is_category() || is_single()) {
			the_category(' ');
			if (is_single()) {
				echo " / ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
	else {
		echo 'Home';
	}
}

// Add Widgets
function simonwpframework_widgets_init() {
	register_sidebar(array(
		'id' => 'main-sidebar',
		'name' => 'Main Sidebar',
		'before_widget' => '<div class="flex_100">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'id' => 'footer-1',
		'name' => 'Footer1',
		'before_widget' => '<div class="flex_33">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'id' => 'footer-2',
		'name' => 'Footer2',
		'before_widget' => '<div class="flex_33">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'id' => 'footer-3',
		'name' => 'Footer3',
		'before_widget' => '<div class="flex_33">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
	'id' => 'widget-product',
	'name' => 'product_widget',
	'before_widget' => '<div class="flex_33">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
	));
	register_sidebar(array(
	'id' => 'widget-cat',
	'name' => 'product cat',
	'before_widget' => '<div class="flex_33">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
	));
}
add_action ( 'widgets_init', 'simonwpframework_widgets_init' );


// Add Template for comments and pingbacks

	if ( ! function_exists( 'simonwpframework_comment' ) ) :

function simonwpframework_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard"> <?php echo get_avatar( $comment, 40 ); ?> <?php printf( __( '%s <span class="says">says:</span>', 'simonwpframework' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?> </div>
		<!-- .comment-author .vcard -->
    <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation">
    <?php echo 'Your comment is awaiting moderation.' ?>
    </em> <br />
    <?php endif; ?>
    <div class="comment-meta commentmetadata">
			<a
				href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
      <?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'simonwpframework' ), get_comment_date(),  get_comment_time() ); ?>
      </a>
      <?php edit_comment_link( __( '(Edit)', 'simonwpframework' ), ' ' );
			?>
    </div>
		<!-- .comment-meta .commentmetadata -->

		<div class="comment-body">
      <?php comment_text(); ?>
    </div>
		<div class="reply">
      <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
		<!-- .reply -->
	</div> <!-- #comment-##  -->
  
  <?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>

<li class="post pingback">
	<p>
    <?php echo 'Pingback:' ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'simonwpframework' ), ' ' ); ?>
  </p>
  <?php
			break;
	endswitch;
}
endif;
	



?>
