<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<main id="content" class="site-main" role="main">
  <?php if (apply_filters('bruno_page_title', true)) : ?>

    <section class="hero_banner_section hero_banner3  d-flex align-items-center" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/img/bg/bigimg3.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="hero_banner_inner">
              <!--breadcrumbs area start-->
              <div class="breadcrumb_content breadcrumb_portfolio text-center">
                <h2 class="text-white"><?php esc_html_e('The page can&rsquo;t be found.', 'bruno'); ?></h2>
                <p><?php esc_html_e('It looks like nothing was found at this location.', 'bruno'); ?></p>
              </div>
              <!--breadcrumbs area end-->
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
</main>