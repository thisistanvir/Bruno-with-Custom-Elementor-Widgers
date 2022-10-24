<?php

/**
 * The template for displaying the Theme Metabox and Options
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// inline css by acf
function acf_css() {
?>
  <style>
    /* .header-top {
      background-color: ;
    } */
  </style>
<?php
}
add_filter('wp_head', 'acf_css');



/********************
 * Meta Box
 ******************************************************/
if (function_exists('acf_add_local_field_group')) {

  acf_add_local_field_group(
    array(
      'key' => 'group_taxonomy_thumbnail',
      // 'title' => 'Taxonomy Thumbnail Group',
      'location' => array(
        array(
          array(
            'param' => 'taxonomy',
            'operator' => '==',
            'value' => 'category',
          ),
        ),
      ),
      'fields' => array(
        array(
          'key' => 'field_taxonomy_thumbnail_id',
          'name' => 'taxonomy_thumbnail_id',
          'label' => __('Thumbnail', 'bruno'),
          'type' => 'image',
          'return_format' => 'id',
        )
      ),
    ),
  );
};

// Portfolio Meta
if (function_exists('acf_add_local_field_group')) {
  acf_add_local_field_group(array(
    'key' => 'group_portfolio_meta',
    'title' => 'Portfolio Meta',
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'portfolio',
        ),
      ),
    ),
    'fields' => array(
      // subtitle
      array(
        'key' => 'field_portfolio_subtitle',
        'name' => 'portfolio_subtitle',
        'type' => 'text',
        'label' => __('Subtitle', 'bruno'),
        'placeholder' => __('Tye subtitle here.', 'bruno'),
        'required' => 1,
      ),
      // gallery
      array(
        'key' => 'field_portfolio_gallery',
        'name' => 'portfolio_gallery',
        'type' => 'gallery',
        'label' => __('Gallery', 'bruno'),
        'preview_size' => 'thumbnail',
      ),
      // solutions
      array(
        'key' => 'field_portfolio_solution',
        'name' => 'portfolio_solution',
        'type' => 'textarea',
        'label' => __('Solution', 'bruno'),
        'placeholder' => __('Tye solution here.', 'bruno'),
      ),
      // works
      array(
        'key' => 'field_portfolio_works',
        'name' => 'portfolio_works',
        'type' => 'gallery',
        'label' => __('Works', 'bruno'),
        'preview_size' => 'thumbnail',
      ),
    ),
  ));
}



/********************
 * Option Page
 ******************************************************/
add_action('acf/init', 'bruno_acf_op_init');
function bruno_acf_op_init() {

  // Check function exists.
  if (function_exists('acf_add_options_page')) {

    // Add parent.
    $parent = acf_add_options_page(array(
      'page_title'   => __('Bruno Theme Settings', 'bruno'),
      'menu_title'  => __('Bruno Settings', 'bruno'),
      'menu_slug'   => 'bruno-settings',
      'capability'  => 'edit_posts',
      'redirect'    => true
    ));

    // Top Header Setting
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Top Header Settings', 'bruno'),
      'menu_title'  => __('Top Header', 'bruno'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    // Footer
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Footer Settings', 'bruno'),
      'menu_title'  => __('Footer', 'bruno'),
      'parent_slug'  => $parent['menu_slug'],
    ));
  }
}


// ACF Jason Save
add_filter('acf/settings/save_json', 'bruno_acf_json_save_point');
function bruno_acf_json_save_point($path) {

  // update path
  $path = dirname(__FILE__) . '/acf-jason';


  // return
  return $path;
}


// ACF Jason Load
add_filter('acf/settings/load_json', 'bruno_acf_json_load_point');
function bruno_acf_json_load_point($paths) {

  // remove original path (optional)
  unset($paths[0]);


  // append path
  $paths[] = dirname(__FILE__) . '/acf-jason';


  // return
  return $paths;
}
