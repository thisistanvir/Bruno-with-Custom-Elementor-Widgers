<?php

/**
 * Theme functions and definitions
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

if (!defined('BRUNO_VERSION')) {
  // Replace the version number of the theme on each release.
  define('BRUNO_VERSION', '1.0.0');
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if (!function_exists('bruno_support')) {
  /**
   * Set up theme support.
   *
   */
  function bruno_support() {

    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
    load_theme_textdomain('bruno', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
      'html5',
      [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
      ]
    );

    // Editor Style.
    add_editor_style('classic-editor.css');

    // Gutenberg wide images.
    add_theme_support('align-wide');

    /**
     * Woocommerce
     */

    // WooCommerce in general.
    add_theme_support('woocommerce');
    // Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
    // zoom.
    add_theme_support('wc-product-gallery-zoom');
    // lightbox.
    add_theme_support('wc-product-gallery-lightbox');
    // swipe.
    add_theme_support('wc-product-gallery-slider');



    // Add support for core custom logo.
    add_theme_support(
      'custom-logo',
      [
        'height'      => 100,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
      ]
    );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'main-menu'   => __('Header Menu', 'bruno'),
      'footer-menu'   => __('Footer Menu', 'bruno'),
    ));
  }
}
add_action('after_setup_theme', 'bruno_support');


/**
 * Theme Scripts & Styles.
 *
 * @return void
 *
 */
if (!function_exists('bruno_scripts_styles')) {
  function bruno_scripts_styles() {
    // Load CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/vendor/bootstrap.min.css', [], '1.0', 'all');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', [], '1.0', 'all');
    wp_enqueue_style('owlCarousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', [], '1.0', 'all');
    wp_enqueue_style('elegantIcons', get_template_directory_uri() . '/assets/css/elegant-icons.min.css', [], '1.0', 'all');
    wp_enqueue_style('simpleLineIcons', get_template_directory_uri() . '/assets/css/simple-line-icons.css', [], '1.0', 'all');
    wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', [], '1.0', 'all');
    wp_enqueue_style('fontAwesome', get_template_directory_uri() . '/assets/css/font.awesome.css', [], '1.0', 'all');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', [], '1.0', 'all');
    wp_enqueue_style('niceSelect', get_template_directory_uri() . '/assets/css/nice-select.css', [], '1.0', 'all');
    wp_enqueue_style('magnificPopup', get_template_directory_uri() . '/assets/css/magnific-popup.css', [], '1.0', 'all');
    wp_enqueue_style('bruno-main', get_template_directory_uri() . '/assets/css/style.css', [], BRUNO_VERSION, 'all');

    wp_enqueue_style('bruno-style', get_stylesheet_uri(), [], BRUNO_VERSION);

    // Load JS
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.7.1.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/vendor/popper.js', ['jquery'], '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('owlCarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('scrollup', get_template_directory_uri() . '/assets/js/jquery.scrollup.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('imageLoaded', get_template_directory_uri() . '/assets/js/images-loaded.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('niceSelect', get_template_directory_uri() . '/assets/js/jquery.nice-select.js', ['jquery'], '1.0', true);
    wp_enqueue_script('tippy-bundle', get_template_directory_uri() . '/assets/js/tippy-bundle.umd.js', ['jquery'], '1.0', true);
    wp_enqueue_script('magnificPopup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('mailchimp', get_template_directory_uri() . '/assets/js/mailchimp-ajax.js', ['jquery'], '1.0', true);

    wp_enqueue_script('bruno-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], BRUNO_VERSION, true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }
  }
}
add_action('wp_enqueue_scripts', 'bruno_scripts_styles');

/**
 * Register Elementor Locations.
 *
 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
 *
 * @return void
 */
function bruno_register_elementor_locations($elementor_theme_manager) {

  $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'bruno_register_elementor_locations');


/**
 * Elementor notice about the plugin is not activated.
 */
if (is_admin()) {
  require get_template_directory() . '/inc/admin-functions.php';
}


/**
 * Check hide title.
 *
 * @param bool $val default value.
 *
 * @return bool
 */
if (!function_exists('bruno_check_hide_title')) {
  function bruno_check_hide_title($val) {
    if (defined('ELEMENTOR_VERSION')) {
      $current_doc = Elementor\Plugin::instance()->documents->get(get_the_ID());
      if ($current_doc && 'yes' === $current_doc->get_settings('hide_title')) {
        $val = false;
      }
    }
    return $val;
  }
}
add_filter('bruno_page_title', 'bruno_check_hide_title');


/**
 * Wrapper function to deal with backwards compatibility.
 */
if (!function_exists('bruno_body_open')) {
  function bruno_body_open() {
    if (function_exists('wp_body_open')) {
      wp_body_open();
    } else {
      do_action('wp_body_open');
    }
  }
}


/**
 * Register Custom Post Type
 */

add_action('init', 'bruno_custom_post');
function bruno_custom_post() {
  // Register Custom Post for Portfolio
  register_post_type(
    'portfolio',
    array(
      'labels' => array(
        'name' => __('Portfolios', 'bruno'),
        'singular_name' => __('Portfolio', 'bruno'),
        'add_new' => __('Add New Portfolio', 'bruno'),
        'add_new_item' => __('Add New Portfolio', 'bruno'),
      ),
      'supports' => array('title', 'editor', 'thumbnail'),
      'public'       => true,
      'show_ui'      => true,
      'show_in_rest' => false,
      'menu_icon'    => 'dashicons-portfolio',
    )
  );
  /**
   * Register Taxonomy
   */
  register_taxonomy('portfolio_category', 'portfolio', [
    'labels' => [
      'name'              => __('Categories', 'bruno'),
      'singular_name'     => __('Category', 'bruno'),
      'add_new_item'      => __('Add New Category', 'bruno'),
    ],
    'hierarchical'      => true,
    'public'            => false,
    'show_ui'           => true,
    'show_admin_column' => true,
  ]);
}

/**
 * Better Comments
 */
include_once('inc/better-comments.php');

/**
 * Custom Elementor Widgets
 */
include_once('inc/custom-elementor/custom-elementor.php');


/**
 * TGM Plugin Activator
 */
if (!class_exists('TGM_Plugin_Activation')) {
  include_once('inc/tgm-plugin-activation.php');
  include_once('inc/required-plugins.php');
}


/**
 * One Click Demo Import
 */
if (!function_exists('bruno_import_files')) {
  function bruno_import_files() {
    return array(
      array(
        'import_file_name'             => esc_html__('Bruno Demo Import', 'bruno'),
        'local_import_file'            => trailingslashit(get_template_directory()) . '/inc/demo-data/content.xml',
        'local_import_widget_file'     => trailingslashit(get_template_directory()) . '/inc/demo-data/widgets.wie',
        'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-data/customize.dat',
        'import_preview_image_url'     => get_template_directory_uri() . '/screenshot.png',
        'import_notice'                => esc_html__('After import demo, just set static homepage from settings > reading, Check widgets and menu. You will be done! :-)', 'bruno'),
        // 'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
      ),
    );
  }
  add_filter('ocdi/import_files', 'bruno_import_files');
}


/**
 * ACF Options
 */
if (class_exists('ACF')) {
  include_once('inc/acf/metabox-and-options.php');
  include_once('inc/acf/acf-data.php');
}

/**
 * custom comments form order
 */
function bruno_comment_field($fields) {
  $comment = $fields['comment'];
  $author  = $fields['author'];
  $email   = $fields['email'];
  $url     = $fields['url'];
  $cookies = $fields['cookies'];

  unset($fields['comment']);
  unset($fields['author']);
  unset($fields['email']);
  unset($fields['url']);
  unset($fields['cookies']);

  $fields['author']  = $author;
  $fields['email']   = $email;
  $fields['url']     = $url;
  $fields['comment'] = $comment;
  $fields['cookies'] = $cookies;

  return $fields;
}
add_action('comment_form_fields', 'bruno_comment_field');
