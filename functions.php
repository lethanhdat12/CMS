<?php 
define('TPL_DIR_URI', get_template_directory_uri());
define('TPL_DIR', get_stylesheet_directory());
function svh_enqueue_styles() {
	wp_enqueue_style( 'bootstrap', TPL_DIR_URI .
	'/assets/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'core', TPL_DIR_URI . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'svh_enqueue_styles');
function svh_enqueue_scripts() {
wp_enqueue_script( 'popper', TPL_DIR_URI .
'/assets/vendor/popper/popper.min.js', ['jquery']);
wp_enqueue_script( 'bootstrap', TPL_DIR_URI .
'/assets/vendor/bootstrap/js/bootstrap.min.js', ['jquery']);
}
add_action( 'wp_enqueue_scripts', 'svh_enqueue_scripts');

function register_navwalker(){
	require_once TPL_DIR . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

//khai báo menu
function register_svh_menus() {
    register_nav_menus([
        'main-menu' => __( 'Main Menu' )
    ]);
}
add_action('init', 'register_svh_menus');


//footer
function svh_widgets_init() {
	
	register_sidebar(
		[
			'name'          => 'Header',
			'id'            => 'sidebar-header',
			'description'   => 'Add widgets here to appear in your header.',
			'before_widget' => '<div id="%1$s" class="col-12 col-lg-4 footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="footer-widget__title">',
			'after_title'   => '</h2>',
        ]
    );

	register_sidebar(
		[
			'name'          => 'Footer',
			'id'            => 'sidebar-footer',
			'description'   => 'Add widgets here to appear in your footer.',
			'before_widget' => '<div id="%1$s" class="col-12 col-lg-4 footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="footer-widget__title">',
			'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
		[
			'name'          => 'Sidebar',
			'id'            => 'sidebar-main',
			'description'   => 'Add widgets here to appear in your sidebar.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
        ]
	);

}
add_action( 'widgets_init', 'svh_widgets_init' );

// custom logo
function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );
function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}
?>