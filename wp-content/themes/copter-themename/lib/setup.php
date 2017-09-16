<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  
  // Panel background srcset sizes
  add_image_size('1440w', 1440);
  add_image_size('2880w', 2880);
  add_image_size('1024w', 1024);
  add_image_size('640w', 640);
  add_image_size('320w', 320);  

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-flex.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('rellax/js', Assets\asset_path('scripts/rellax.js'), ['jquery'], null, false);

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


function admin_assets() {
  wp_enqueue_style('sage/admin_css', Assets\asset_path('styles/admin.css'), false, null);
}
add_action('admin_head', __NAMESPACE__ . '\\admin_assets');


/**
 * Custom Post Types
 */
function add_product_support() {
  $labels = array(
    'name'               => _x( 'Products', 'post type general name', 'sage' ),
    'singular_name'      => _x( 'Product', 'post type singular name', 'sage' ),
    'menu_name'          => _x( 'Products', 'admin menu', 'sage' ),
    'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'sage' ),
    'add_new'            => _x( 'Add New', 'product', 'sage' ),
    'add_new_item'       => __( 'Add New Product', 'sage' ),
    'new_item'           => __( 'New Product', 'sage' ),
    'edit_item'          => __( 'Edit Product', 'sage' ),
    'view_item'          => __( 'View Product', 'sage' ),
    'all_items'          => __( 'All Products', 'sage' ),
    'search_items'       => __( 'Search Products', 'sage' ),
    'parent_item_colon'  => __( 'Parent Products:', 'sage' ),
    'not_found'          => __( 'No products found.', 'sage' ),
    'not_found_in_trash' => __( 'No products found in Trash.', 'sage' )
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'label'  => 'Products',
    'has_archive' => true,
    'capability_type' => 'post',
    'supports' => array('title', 'thumbnail'),
    'rewrite' => array('slug' => 'products')
  );
  register_post_type( 'product', $args );
  register_taxonomy_for_object_type( 'category', 'product' );
}
add_action( 'init', __NAMESPACE__ . '\\add_product_support' );
