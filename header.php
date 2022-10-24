<?php

/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <?php $viewport_content = apply_filters('bruno_viewport_content', 'width=device-width, initial-scale=1'); ?>
  <meta name="viewport" content="<?php echo esc_attr($viewport_content); ?>">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php bruno_body_open();

  $header_nav_menu = wp_nav_menu([
    'theme_location' => 'main-menu',
    'container'            => 'nav',
    'menu_class'           => 'menu d-flex',
    'fallback_cb' => false,
    'echo' => false,
  ]);
  ?>

  <!--offcanvas menu area start-->
  <div class="body_overlay"></div>

  <div class="offcanvas_menu">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="offcanvas_menu_wrapper">
            <div class="canvas_close">
              <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
            </div>
            <div id="menu" class="text-left ">
              <div class="offcanvas_main_menu">
                <?php
                echo $header_nav_menu;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--offcanvas menu area end-->

  <!-- page search box -->
  <div class="page_search_box">
    <div class="search_close">
      <i class="ion-close-round"></i>
    </div>

    <form role="search" method="get" id="search-form" action="<?php echo esc_url(home_url('/')); ?>" class="border-bottom">
      <input class="form-control border-0" type="search" placeholder="Search..." aria-label="search" name="s" id="search-input" value="<?php echo esc_attr(get_search_query()); ?>">
      <button type="submit"><i class="ei ei-search"></i></button>
    </form>

  </div>

  <?php
  if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) {
    get_template_part('./template-parts/header');
  }
  ?>