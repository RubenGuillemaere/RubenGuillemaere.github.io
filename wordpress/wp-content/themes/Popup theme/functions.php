<?php
    /**
 * functions and definitions
 *
 */

function theme_custom_post_formats_setup() {
        add_post_type_support( 'page', 'post-formats' );
        //add_post_type_support( 'my_custom_post_type', 'post-formats' );
}

// Controle of onze functie bestaat als deze nog niet bestaat dan gaan ze onze functie inladen
if ( ! function_exists( 'theme_setup' ) ) :
function theme_setup() {

    /**
     * Toevoegen van default posts and comments RSS feed links in de <head>.
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Volgende post formaten inschakelen voor het thema cmp2theme:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

    add_action( 'init', 'cmp2theme_custom_post_formats_setup' );

    /**
     * Inschakelen van post thumbnails en featured images voor het thema
     */
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'title-tag' );

    //add_theme_support( 'custom-logo' );

add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 50,
		'flex-width' => true,
	));
    add_theme_support( 'custom-background' );

     //2 custom menu locations toevoegen...*/
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'popup' ),
        'secondary' => __('Secondary Menu', 'popup' )
    ) );
}
endif; //
/**
 * Onze functie zal uitgevoerd worden in de after_setup_theme hook deze zal uitgevoerd
 * worden voor de init hook. De init hook is te laat voor sommige functionaliteiten
 * zoals enable post thumbnails,...
 */
add_action( 'after_setup_theme', 'cmp2theme_setup' );

// In de functie add_theme_style gaan we een stylesheet toevoegen zodat WordPress deze gaat injecteren in de <head> van onze pagina...
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  //wp_enqueue_script( 'script', get_template_directory_uri() . '/test.js');
  //( $handle, $src, $deps, $ver, $in_footer );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
// In welke hook voeren we add_theme_scripts uit?


function register_sidebar_locations() {
  /* Register the 'primary' sidebar. */
  register_sidebar(
      array(
          'id'            => 'primary-sidebar',
          'name'          => __( 'Primary Sidebar' ),
          'description'   => __( 'A short description of the sidebar.' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-title">',
          'after_title'   => '</h3>',
      )
  );
  /* Repeat register_sidebar() code for additional sidebars. */

	register_sidebar( array(
		'name'          => __( 'Social media sidebar'),
		'id'            => 'social-sidebar',
		'description'   => __( 'Add widgets here.'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'register_sidebar_locations' );

function custom_post_type_product()
{
	$labels = array(
		'name'               => _x( 'Product', 'post type general name' ),
		'singular_name'      => _x( 'Product item', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'product' ),
		'add_new_item'       => __( 'Add New Product item' ),
		'edit_item'          => __( 'Edit Product item' ),
		'new_item'           => __( 'New Product item' ),
		'all_items'          => __( 'All Product items' ),
		'view_item'          => __( 'View Product item' ),
		'search_items'       => __( 'Search Product items' ),
		'not_found'          => __( 'No Image Product found' ),
		'not_found_in_trash' => __( 'No Image Product found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Product'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our products',
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-pressthis',
		'supports'      => array(  'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'afbeelding'),
		'has_archive'   => true
	);
	register_post_type( 'product', $args );
}

add_action( 'init', 'custom_post_type_product' );

function taxonomies_product() {
  $labels = array(
    'name'              => _x( 'Product Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Product Categories' ),
    'all_items'         => __( 'All Product Categories' ),
    'parent_item'       => __( 'Parent Product Category' ),
    'parent_item_colon' => __( 'Parent Product Category:' ),
    'edit_item'         => __( 'Edit Product Category' ),
    'update_item'       => __( 'Update Product Category' ),
    'add_new_item'      => __( 'Add New Product Category' ),
    'new_item_name'     => __( 'New Product Category' ),
    'menu_name'         => __( 'Product Categories' )
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'product_category', 'product', $args );
}
add_action( 'init', 'taxonomies_product', 0 );


// Custom login
function my_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . 'style.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Jupiler 0.0';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function login_error_override()
{
    return 'Incorrect login details.';
}
add_filter('login_errors', 'login_error_override');

function my_login_head() {
    remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'my_login_head');

function admin_login_redirect( $redirect_to, $request, $user )
{
global $user;
if( isset( $user->roles ) && is_array( $user->roles ) ) {
    if( in_array( "administrator", $user->roles ) ) {
        return $redirect_to;
    } else {
        return home_url();
    }
}
    else
    {
        return $redirect_to;
    }
}
add_filter("login_redirect", "admin_login_redirect", 10, 3);
