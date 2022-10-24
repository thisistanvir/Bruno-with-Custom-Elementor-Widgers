<?php

/**
 * The template for displaying archive pages.
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>

<!--slide banner section start-->
<section class="hero_banner_section hero_banner3  d-flex align-items-center" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/img/bg/bigimg3.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="hero_banner_inner">
          <!--breadcrumbs area start-->
          <div class="breadcrumb_content breadcrumb_portfolio text-center">
            <?php
            if (is_home() && !is_front_page()) :
              single_post_title('<H2 class="text-white">', '</H2>');
            else :
              the_archive_title('<H2 class="text-white">', '</H2>');
            endif;
            ?>

            <ul>
              <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'bruno'); ?> </a>/ </li>
              <li><?php
                  if (is_home() && !is_front_page()) {
                    single_post_title();
                  } else {
                    the_archive_title();
                  }
                  ?></li>
            </ul>
          </div>
          <!--breadcrumbs area end-->
        </div>
      </div>
    </div>
  </div>
</section>
<!--slider area end-->

<?php if (get_body_class('blog')) :
  $args = array(
    'post_type' => 'post',
    'order' => 'DESC'
  );
  $blog = new WP_Query($args);
?>

  <div class="blog_page_bg">
    <div class="container">
      <?php if ($blog->have_posts()) :
        $categories = get_terms('category', array('hide_empty' => true))
      ?>
        <!--blog page section start-->
        <div class="blog_page_section">
          <div class="blog_messonry_button d-flex justify-content-center">
            <button class="active" data-filter="*"><?php esc_html_e('all', 'bruno') ?></button>
            <?php foreach ($categories as $cat) :  ?>
              <button data-filter=".<?php echo esc_attr($cat->slug); ?>"><?php esc_html_e($cat->name, 'bruno'); ?></button>
            <?php endforeach;  ?>
          </div>
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

<?php else : ?>

  <main id="content" class="site-main" role="main">

    <div class="page-content">
      <?php
      while (have_posts()) {
        the_post();
        $post_link = get_permalink();
      ?>
        <article class="post">
          <?php
          printf('<h2 class="%s"><a href="%s">%s</a></h2>', 'entry-title', esc_url($post_link), wp_kses_post(get_the_title()));
          printf('<a href="%s">%s</a>', esc_url($post_link), get_the_post_thumbnail($post, 'large'));
          the_excerpt();
          ?>
        </article>
      <?php } ?>
    </div>

    <?php wp_link_pages(); ?>

    <?php
    global $wp_query;
    if ($wp_query->max_num_pages > 1) :
    ?>
      <nav class="pagination" role="navigation">
        <?php /* Translators: HTML arrow */ ?>
        <div class="nav-previous"><?php next_posts_link(sprintf(__('%s older', 'bruno'), '<span class="meta-nav">&larr;</span>')); ?></div>
        <?php /* Translators: HTML arrow */ ?>
        <div class="nav-next"><?php previous_posts_link(sprintf(__('newer %s', 'bruno'), '<span class="meta-nav">&rarr;</span>')); ?></div>
      </nav>
    <?php endif; ?>
  </main>
<?php endif; ?>