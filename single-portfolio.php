<?php

/**
 * The template for displaying single portfolio pages.
 *
 * @package Bruno
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header();

$galleries = get_post_meta(get_the_ID(), 'portfolio_gallery', true);
$solution = get_post_meta(get_the_ID(), 'portfolio_solution', true);
$works = get_post_meta(get_the_ID(), 'portfolio_works', true);


while (have_posts()) : the_post();
?>

    <!--slide banner section start-->
    <section class="hero_banner_section hero_banner5 mb-132 d-flex align-items-center" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero_content text-center">
                        <h1 class="text-white wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!-- project details section start -->
    <section class="project_details_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="project_details_inner">
                        <div class="project_details_desc">
                            <div class="project_desc_list mb-115">
                                <?php if (get_the_content()) : ?>
                                    <div class="project_desc_text text-center">
                                        <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s"><?php esc_html_e('Description', 'bruno'); ?> </h3>
                                        <p class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s"><?php echo get_the_content(); ?></p>
                                    </div>
                                <?php endif;
                                if (!empty($galleries)) :
                                ?>
                                    <div class="project_desc_img">
                                        <div class="project_desc_popup d-flex justify-content-between">
                                            <?php
                                            $n = 0;
                                            foreach ($galleries as $image) :
                                                $n++;
                                                $image_url = wp_get_attachment_image_url($image, 'full');
                                            ?>
                                                <div class="popup_thumb_list wow fadeInUp" data-wow-delay="0.<?php echo $n; ?>s" data-wow-duration="1.<?php echo $n; ?>s">
                                                    <a class="port_popup" href="<?php echo esc_url($image_url); ?>"><img src="<?php echo esc_url($image_url); ?>" alt=""></a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="project_desc_list">
                                <?php if (!empty($solution)) : ?>
                                    <div class="project_desc_text text-center">
                                        <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s"><?php esc_html_e('Solution', 'bruno'); ?></h3>
                                        <p class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s"><?php esc_html_e($solution, 'bruno'); ?></p>
                                    </div>
                                <?php endif;
                                if (!empty($works)) :
                                ?>
                                    <div class="project_desc_slick wow fadeInUp slick_slider_activation " data-wow-delay="0.3s" data-wow-duration="1.3s" data-slick='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "arrows": false,
                                    "dots": true,
                                    "autoplay": false,
                                    "speed": 300,
                                    "infinite": true

                                    }'>
                                        <?php foreach ($works as $work) :
                                            $image_url = wp_get_attachment_image_url($work, 'full');
                                        ?>
                                            <div class="project_desc_thumb mb-30">
                                                <img src="<?php echo esc_url($image_url); ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="post__social d-flex justify-content-center align-items-center">
                                <span><?php esc_html_e('Share :', 'bruno'); ?></span>
                                <ul class="d-flex">
                                    <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank"><i class="ei ei-social_twitter"></i></a></li>
                                    <li><a href="https://facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="ei ei-social_facebook"></i></a></li>
                                    <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="ei ei-social_googleplus"></i></a></li>
                                </ul>
                            </div>

                            <div class="post_navigation">
                                <ul class="d-flex justify-content-between">
                                    <?php $prevPost = get_previous_post();
                                    if ($prevPost) : ?>
                                        <li class="previous"><a href="<?php echo esc_url(get_permalink($prevPost->ID)); ?>"><i class="icon-arrow-left icons"></i><?php esc_html_e('Previous', 'bruno'); ?></a>
                                            <?php previous_post_link('%link', " <span>%title</span>"); ?>
                                        </li>
                                    <?php endif;
                                    $nextPost = get_next_post();
                                    if ($nextPost) :
                                    ?>
                                        <li class="next"><a href="<?php echo esc_url(get_permalink($nextPost->ID)); ?>"><?php esc_html_e('Next', 'bruno'); ?> <i class="icon-arrow-right icons"></i></a>
                                            <?php next_post_link('%link', "<span>%title</span>"); ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project details section end -->

<?php
endwhile;

get_footer(); ?>