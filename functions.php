<?php
/**
 * Cazuela functions and definitions
 *
 * @package Cazuela
 * @since Cazuela 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Cazuela 1.0
 */
if ( !isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( !function_exists( 'thsp_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Cazuela 1.0
 */
function thsp_theme_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Cazuela, use a find and replace
	 * to change 'thsp_cazuela' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'thsp_cazuela', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 *
	 * @since Cazuela 1.0
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 *
	 * @since Cazuela 1.0
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable Custom Backgrounds
	 *
	 * @since Cazuela 1.0
	 */
	add_theme_support( 'custom-background' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 *
	 * @since Cazuela 1.0
	 */
	register_nav_menus( array(
		'main'		=> __( 'Main Menu', 'thsp_cazuela' ),
		'footer'	=> __( 'Footer Menu', 'thsp_cazuela' ),
	) );

	/**
	 * Add support for Post Formats
	 *
	 * @since Cazuela 1.0
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'link',
		'gallery',
		'status',
		'quote',
		'chat',
		'image',
		'video',
		'audio'
	) );

	/**
	 * Adds the Customize page to the WordPress admin area
	 */
	add_action( 'admin_menu', 'thsp_customizer_menu' );
	function thsp_customizer_menu() {
	
	    add_theme_page(
	    	'Customization',
	    	'Customization',
	    	'edit_theme_options',
	    	'customize.php'
	    );
	    
	}

	
}
endif; // thsp_setup
add_action( 'after_setup_theme', 'thsp_theme_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @uses	thsp_get_footer_sidebars	Defined in inc/extras.php
 * @since	Cazuela 1.0
 */
function thsp_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'thsp_cazuela' ),
		'id' => 'primary-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Secondary Sidebar', 'thsp_cazuela' ),
		'id' => 'secondary-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'thsp_cazuela' ),
		'id' => 'footer-widget-area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Before Header', 'thsp_cazuela' ),
		'id' => 'before-header-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'After Header', 'thsp_cazuela' ),
		'id' => 'after-header-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Before Content', 'thsp_cazuela' ),
		'id' => 'before-content-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'After Content', 'thsp_cazuela' ),
		'id' => 'after-content-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Before Footer', 'thsp_cazuela' ),
		'id' => 'before-footer-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'After Footer', 'thsp_cazuela' ),
		'id' => 'after-footer-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

}
add_action( 'widgets_init', 'thsp_widgets_init' );


/**
 * Attach widget areas to theme action hooks
 *
 * @since Cazuela 1.0
 */
add_action( 'thsp_before_header', 'thsp_attach_before_header_sidebar' );
function thsp_attach_before_header_sidebar() {
	if ( is_active_sidebar( 'before-header-sidebar' ) ) { ?>
		<div id="before-header" class="clearfix">
			<div class="inner">
				<?php dynamic_sidebar( 'before-header-sidebar' ); ?>
			</div>
			<!-- .inner -->
		</div>
		<!-- #before-header -->
	<?php }
}
add_action( 'thsp_after_header', 'thsp_attach_after_header_sidebar' );
function thsp_attach_after_header_sidebar() {
	if ( is_active_sidebar( 'after-header-sidebar' ) ) { ?>
		<div id="after-header" class="clearfix">
			<div class="inner">
				<?php dynamic_sidebar( 'after-header-sidebar' ); ?>
			</div>
			<!-- .inner -->
		</div>
		<!-- #after-header -->
	<?php }
}
add_action( 'thsp_before_content', 'thsp_attach_before_content_sidebar' );
function thsp_attach_before_content_sidebar() {
	if ( is_active_sidebar( 'before-content-sidebar' ) ) { ?>
		<div id="before-content" class="clearfix">
			<?php dynamic_sidebar( 'before-content-sidebar' ); ?>
		</div>
		<!-- #before-contet -->
	<?php }
}
add_action( 'thsp_after_content', 'thsp_attach_after_content_sidebar' );
function thsp_attach_after_content_sidebar() {
	if ( is_active_sidebar( 'after-content-sidebar' ) ) { ?>
		<div id="after-content" class="clearfix">
			<?php dynamic_sidebar( 'after-content-sidebar' ); ?>
		</div>
		<!-- #after-content -->
	<?php }
}
add_action( 'thsp_before_footer', 'thsp_attach_before_footer_sidebar' );
function thsp_attach_before_footer_sidebar() {
	if ( is_active_sidebar( 'before-footer-sidebar' ) ) { ?>
		<div id="before-footer" class="clearfix">
			<div class="inner">
				<?php dynamic_sidebar( 'before-footer-sidebar' ); ?>
			</div>
			<!-- .inner -->
		</div>
		<!-- #before-footer -->
	<?php }
}
add_action( 'thsp_after_footer', 'thsp_attach_after_footer_sidebar' );
function thsp_attach_after_footer_sidebar() {
	if ( is_active_sidebar( 'after-footer-sidebar' ) ) { ?>
		<div id="after-footer" class="clearfix">
			<div class="inner">
				<?php dynamic_sidebar( 'after-footer-sidebar' ); ?>
			</div>
			<!-- .inner -->
		</div>
		<!-- #after-footer -->
	<?php }
}


/**
 * Enqueue scripts and styles
 *
 * @since Cazuela 1.0
 */
function thsp_theme_scripts() {

	/*
	 * Enqueue Google Fonts
	 *
	 * Check if fonts set in theme options require loading
	 * of Google scripts
	 */
	$theme_options = thsp_get_theme_options();
	$theme_options_fields = thsp_get_theme_options_fields();
	$body_font_value = $theme_options['body_font'];
	$heading_font_value = $theme_options['heading_font'];
	$body_font_options = $theme_options_fields['thsp_typography_section']['fields']['body_font']['choices'];
	$heading_font_options = $theme_options_fields['thsp_typography_section']['fields']['heading_font']['choices'];
	// Check if it's a Google Font
	if( isset( $body_font_options[$body_font_value]['google_font'] ) ) {
		wp_enqueue_style(
			'font_' . $body_font_value,
			'http://fonts.googleapis.com/css?family=' . $body_font_options[$body_font_value]['google_font']
		);
	}	
	// Check if it's a Google Font
	if( isset( $heading_font_options[$heading_font_value]['google_font'] ) ) {
		wp_enqueue_style(
			'font_' . $heading_font_value,
			'http://fonts.googleapis.com/css?family=' . $heading_font_options[$heading_font_value]['google_font']
		);
	}

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'thsp_theme_scripts' );


/**
 * Dynamically generated CSS (link color)
 *
 * @since Cazuela 1.0
 */
function thsp_dynamic_css() {

	$theme_options = thsp_get_theme_options();
	$links_color = $theme_options['links_color']; ?>
	
	<style type="text/css">
		#main a { color: <?php echo $links_color; ?> }
	</style>

<?php }
add_action( 'wp_head', 'thsp_dynamic_css' );


/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );


/**
 * Add post meta box
 */
if( is_admin() ) {
	 require( get_template_directory() . '/inc/post-meta-box.php' );
}


/**
 * Helper functions that return arrays of theme options,
 * theme option default values and all the fields
 */	
require( get_template_directory() . '/inc/get-options.php' );


/**
 * Customizer options
 */	
global $wp_customize;
if( isset( $wp_customize ) ) {

	require( get_template_directory() . '/inc/customizer.php' );

}


/**
 * Theme documentation page
 */	
if( is_admin() ) {

	require( get_template_directory() . '/inc/documentation-page.php' );

}