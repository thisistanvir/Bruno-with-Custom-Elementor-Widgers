<?php

/**
 * The template for displaying header.
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
$custom_logo_id = get_theme_mod('custom-logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');

$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
$header_nav_menu = wp_nav_menu([
  'theme_location' => 'main-menu',
  'container'            => 'nav',
  'menu_class'           => 'menu d-flex',
  'fallback_cb' => false,
  'echo' => false,
]); ?>

<!--header area start-->
<header class="header_section header_transparent">
  <div class="main_header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="header_container d-flex justify-content-between align-items-center">

            <div class="header_logo">
              <?php if (has_custom_logo()) : ?>
                <a class="sticky_none" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($site_name); ?>"></a>
              <?php else : ?>
                <a class="sticky_none" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo/logo.png" alt="<?php echo esc_attr($site_name); ?>"></a>
              <?php endif; ?>
            </div>
            <!--main menu start-->
            <div class="main_menu d-none d-lg-block">
              <?php
              echo $header_nav_menu;
              ?>
            </div>

            <div class="main_header_right d-flex align-items-center">
              <div class="header_account">
                <ul class="d-flex">
                  <li class="header_search"><a href="javascript:void(0)"><i class="ei ei-search"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</header>
<!--header area end-->