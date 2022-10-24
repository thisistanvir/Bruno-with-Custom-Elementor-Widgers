<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Blog Widget.
 */
class Bruno_Blog_Carousel_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno_blog_carousel';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno Blog Carousel', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-posts-carousel';
  }

  /**
   * Get custom help URL.
   */
  public function get_custom_help_url() {
    return 'https://developers.elementor.com/docs/widgets/';
  }

  /**
   * Get widget categories.
   */
  public function get_categories() {
    return ['bruno'];
  }

  /**
   * Get widget keywords.
   */
  public function get_keywords() {
    return ['bruno', 'blog', 'carousel'];
  }

  /**
   * Register oEmbed widget controls.
   */
  protected function register_controls() {


    /****************************** CONTENT SECTION ******************************/
    // star: Content Section
    $this->start_controls_section(
      'content_section',
      [
        'label' => __('Blog', 'bruno'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    // show item
    $this->add_control(
      'show_item',
      [
        'label' => esc_html__('Show Item', 'bruno'),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 1,
        'max' => 10,
        'step' => 1,
        'default' => 5,
      ]
    );
    // Order
    $this->add_control(
      'order',
      [
        'label'   => esc_html__('Order', 'bruno'),
        'type'    => \Elementor\Controls_Manager::SELECT,
        'default' => 'DESC',
        'options' => [
          'DESC'  => esc_html__('Descending', 'bruno'),
          'ASC' => esc_html__('Ascending', 'bruno'),
        ],
      ]
    );
    $this->end_controls_section();

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'title_style',
      [
        'label' => __('Title', 'itanvir-elementor'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // Title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .blog_content > h3',
      ]
    );

    // title tabs
    $this->start_controls_tabs(
      'title_tabs'
    );

    $this->start_controls_tab(
      'title_normal_tab',
      [
        'label' => esc_html__('Normal', 'bruno'),
      ]
    );
    // normal color
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .blog_content > h3 a' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
      'title_hover_tab',
      [
        'label' => esc_html__('Hover', 'bruno'),
      ]
    );
    // active color
    $this->add_control(
      'title_hover_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .blog_content > h3 a' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    // end: filter tabs
    $this->end_controls_section();
    // end: Title Section

    // start: meta Section
    $this->start_controls_section(
      'meta_style',
      [
        'label' => __('Meta', 'itanvir-elementor'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // meta typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'meta_typography',
        'selector' => '{{WRAPPER}} .blog_meta span',
      ]
    );
    // meta color
    $this->add_control(
      'meta_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .blog_meta span' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: meta section
  }

  /**
   * Render oEmbed widget output on the frontend.
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

    $html = '';

    $random = rand(1234, 5678);

    $args = array(
      'posts_per_page' => $settings['show_item'],
      'post_type' => 'post',
      'order' => $settings['order'],
    );
    $blog = new WP_Query($args);
    if ($blog->have_posts()) {
      $html .= '
      <script>
        jQuery(document).ready(function($) {
          var $sliderActvation = $(".slick_blog_slider-' . $random . '");
          if($sliderActvation.length > 0){
            $sliderActvation.slick({
              slidesToShow: 3,
              slidesToScroll: 1,
              arrows: false,
              dots: false,
              autoplay: false,
              "speed": 300,
              "infinite": false,
              "responsive":[
                {"breakpoint":992, "settings": { "slidesToShow": 2 } },  
                {"breakpoint":768, "settings": { "slidesToShow": 2 } },  
                {"breakpoint":576, "settings": { "slidesToShow": 1 } }  
              ]  
            });
          };
        });
      </script>
      
      <section class="blog-section">
        <div class="container">
          <div class="blog_container">
            <div class="row blog_slick slick_blog_slider-' . $random . '">';

      while ($blog->have_posts()) : $blog->the_post();

        $html .= '<div class="col-lg-4">
                <article class="single_blog wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s" >
                  <figure>
                    <div class="blog_thumb">
                      <a href="' . get_the_permalink() . '"><img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '"/></a>
                    </div>
                    <figcaption class="blog_content">
                      <div class="blog_meta">
                        <span>' . get_the_time('F j, Y') . '</span>
                      </div>
                      <h3>
                        <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                      </h3>
                      <a href="' . get_the_permalink() . '">Continue <i class="ei ei-arrow_right"></i></a>
                    </figcaption>
                  </figure>
                </article>
              </div>';

      endwhile;
      wp_reset_postdata();
      $html .= '</div>
          </div>
        </div>
      </section>
      ';
    } else {
      $html .= '<div class="alert alert-warning">No blog available.</div>';
    }
    echo $html;
  }
}
