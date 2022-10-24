<?php

/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
get_header();

while (have_posts()) :
  the_post();

  $post_id =  get_the_ID();
  $author_id = get_post_field('post_author', $post_id);
  $author_name = get_the_author_meta('display_name', $author_id);
  $author_image = get_avatar_url($author_id);
  $user_data = get_userdata($author_id);
?>

  <main id="content" <?php post_class('site-main'); ?> role="main">
    <!-- Breadcrumb Area -->
    <section class="hero_banner_section hero_banner3  d-flex align-items-center" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="hero_banner_inner">
              <!--breadcrumbs area start-->
              <div class="breadcrumb_content breadcrumb_portfolio text-center">
                <H2 class="text-white"><?php the_title(); ?></H2>

                <ul>
                  <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'bruno'); ?> </a>/ </li>
                  <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'bruno'); ?> </a>/ </li>
                  <li><?php the_title(); ?></li>
                </ul>
              </div>
              <!--breadcrumbs area end-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end: Breadcrumb Section -->

    <!--blog body area start-->
    <div class="blog_details_bg">
      <div class="container">
        <div class="blog_details">
          <div class="blog_wrapper_details">
            <div class="row">
              <div class="col-12">
                <div class="blog_details_content">
                  <div class="post_header border-bottom d-flex justify-content-between align-items-center">
                    <div class="blog_meta_post d-flex align-items-center">
                      <?php
                      ?>
                      <div class="meta_post_img">
                        <img src="<?php echo esc_url($author_image); ?>" alt="">
                      </div>
                      <div class="meta_post_text">
                        <h3><?php esc_html_e($author_name,  'bruno'); ?></h3>
                        <?php if (in_array('administrator', $user_data->roles)) : ?>
                          <span><?php esc_html_e('Administrator', 'bruno'); ?></span>
                        <?php else : ?>
                          <span><?php esc_html_e('Subscriber', 'bruno'); ?></span>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="blog_details_meta d-flex">
                      <div class="meta_post_text">
                        <h3><?php esc_html_e('Date', 'bruno'); ?></h3>
                        <span><?php the_time('F j, Y'); ?></span>
                      </div>
                      <div class="meta_post_text">
                        <h3><?php esc_html_e('Category', 'bruno'); ?></h3>
                        <span><?php the_category(', '); ?></span>
                      </div>
                      <?php if (get_the_tags()) : ?>
                        <div class="meta_post_text">
                          <h3><?php esc_html_e('Tags', 'bruno'); ?></h3>
                          <span><?php the_tags(' ', ', ') ?></span>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="blog_details_desc"><?php the_content(); ?></div>

                  <div class="post__social blog__post__social border-bottom  d-flex justify-content-center align-items-center">
                    <span><?php esc_html_e('SHARE :', 'bruno'); ?></span>
                    <ul class="d-flex">
                      <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank"><i class="ei ei-social_twitter"></i></a></li>
                      <li><a href="https://facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="ei ei-social_facebook"></i></a></li>
                      <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="ei ei-social_googleplus"></i></a></li>
                    </ul>
                  </div>
                </div>
                <?php

                $cat_ids = array();
                $categories = get_the_category($post_id);

                if (!empty($categories) && !is_wp_error($categories)) :
                  foreach ($categories as $category) :
                    array_push($cat_ids, $category->term_id);
                  endforeach;
                endif;

                $current_post_type = get_post_type($post_id);

                $query_args = array(
                  'category__in'   => $cat_ids,
                  'post_type'      => $current_post_type,
                  'post__not_in'    => array($post_id),
                  'posts_per_page'  => '3',
                );

                $related_cats_post = new WP_Query($query_args);

                if ($related_cats_post->have_posts()) : ?>

                  <div class="related_posts border-bottom">
                    <div class="section_title text-center">
                      <h2><?php echo sprintf(esc_html__('Related %s', 'bruno'), '<span>' . esc_html__('Articles', 'bruno') . '</span>') ?></h2>
                    </div>
                    <div class="blog_container">
                      <div class="row blog_slick ">
                        <?php
                        $n = 0;
                        while ($related_cats_post->have_posts()) : $related_cats_post->the_post();
                          $n++;
                        ?>
                          <div class="col-lg-4">
                            <article class="single_blog wow fadeInUp" data-wow-delay="0.<?php echo $n; ?>s" data-wow-duration="1.<?php echo $n; ?>s">
                              <figure>
                                <div class="blog_thumb">
                                  <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>"></a>
                                </div>
                                <figcaption class="blog_content">
                                  <div class="blog_meta">
                                    <span><?php the_time('F j, Y'); ?></span>
                                  </div>
                                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue', 'bruno'); ?> <i class="ei ei-arrow_right"></i></a>
                                </figcaption>
                              </figure>
                            </article>
                          </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <div class="blog_comment_wrapper">
                  <div id="post_comments">
                    <?php
                    if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
                      comments_template();
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--blog section area end-->
  </main>

<?php
endwhile;

get_footer();
