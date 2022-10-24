<?php

/**
 * The template for displaying search results.
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
                <h2 class="text-white">
                  <?php esc_html_e('Search results for: ', 'bruno'); ?>
                  <span><?php echo get_search_query(); ?></span>
                </h2>
                <ul>
                  <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'bruno'); ?> </a>/ </li>
                  <li><?php echo get_search_query(); ?></li>
                </ul>
              </div>
              <!--breadcrumbs area end-->
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif;


  $args = array(
    'post_type' => 'post',
    'order' => 'DESC'
  );
  $blog = new WP_Query($args);
  ?>

  <div class="blog_page_bg">
    <div class="container">
      <?php if ($blog->have_posts()) : ?>
        <!--blog page section start-->
        <div class="blog_page_section">
          <div class="row blog_page_gallery">
            <?php
            $n = 0;
            while ($blog->have_posts()) : $blog->the_post();
              $n++;
              $cats = get_the_terms(get_the_ID(), 'category');
            ?>

              <div class="col-lg-4 col-md-6 col-sm-6 gird_item <?php foreach ($cats as $cat) : echo esc_attr($cat->slug . ' ');
                                                                endforeach; ?>">
                <article class="single_blog wow fadeInUp" data-wow-delay="0.<?php echo $n; ?>s" data-wow-duration="1.<?php echo $n; ?>s">
                  <figure>
                    <div class="blog_thumb">
                      <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" /></a>
                    </div>
                    <figcaption class="blog_content">
                      <div class="blog_meta">
                        <span><?php the_time('F j, Y') ?></span>
                      </div>
                      <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue', 'bruno'); ?> <i class="ei ei-arrow_right"></i></a>
                    </figcaption>
                  </figure>
                </article>
              </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
          </div>
          <div class="pagination_style pagination blog_pagination justify-content-center">
            <?php the_posts_pagination(
              [
                'screen_reader_text' => ' ',
                'prev_text' => '<span class="ei ei-arrow_left"></span>',
                'next_text' => '<span class="ei ei-arrow_right"></span>',
                'class' => 'pagination'
              ]
            );
            ?>
          </div>
        </div>
        <!--blog page section end-->
      <?php else : ?>
        <div class="alert alert-warning"><?php esc_html_e('No posts available.', 'bruno') ?></div>
      <?php endif; ?>
    </div>
  </div>

</main>