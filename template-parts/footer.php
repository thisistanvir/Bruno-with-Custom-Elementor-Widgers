<?php

/**
 * The template for displaying footer.
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$footer_nav_menu = wp_nav_menu([
  'theme_location' => 'footer-menu',
  'fallback_cb' => false,
  'echo' => false,
]);

$custom_logo_id = get_theme_mod('custom-logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');
?>


<!--footer area start-->
<footer class="footer_widgets">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="footer_bottom d-flex justify-content-between align-items-center">
          <div class="footer_bottom_left d-flex align-items-end">
            <div class="footer_logo">
              <?php if (has_custom_logo()) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
              <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>""><img src=" <?php echo get_template_directory_uri() ?>/assets/img/logo/logo.png" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
              <?php endif; ?>
            </div>
            <div class="copyright_right">
              <p><?php echo sprintf(esc_html__(' &copy; %s Bruno. made with %s by %s', 'bruno'), '<script> document.write(new Date().getFullYear()) </script>', '<i class="ion-heart"></i>', '<a target="_blank" href="https://itanvir.net/">' . esc_html__('iTanvir', 'bruno') . '</a>')  ?></p>
            </div>
          </div>
          <div class="footer_menu">
            <?php
            echo $footer_nav_menu;
            ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer area end-->