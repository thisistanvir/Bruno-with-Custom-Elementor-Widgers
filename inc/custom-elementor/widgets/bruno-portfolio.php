<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Portfolio Widget.
 */
class Bruno_Portfolio_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno_portfolio';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno Portfolio', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-gallery-masonry';
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
    return ['bruno', 'portfolio', 'gallery'];
  }

  /**
   * Register Button widget controls.
   */
  protected function register_controls() {


    /****************************** CONTENT SECTION ******************************/
    // star: Content Section
    $this->start_controls_section(
      'content_section',
      [
        'label' => __('Portfolios', 'bruno'),
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
        'max' => 15,
        'step' => 1,
        'default' => 9,
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
      'filter_style',
      [
        'label' => __('Filter', 'itanvir-elementor'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // filter typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'filter_typography',
        'selector' => '{{WRAPPER}} .portfolio_messonry_button button',
      ]
    );
    // filter tabs
    $this->start_controls_tabs(
      'filer_tabs'
    );

    $this->start_controls_tab(
      'filter_normal_tab',
      [
        'label' => esc_html__('Normal', 'bruno'),
      ]
    );
    // normal color
    $this->add_control(
      'filter_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .portfolio_messonry_button button' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
      'filter_active_tab',
      [
        'label' => esc_html__('Active', 'bruno'),
      ]
    );
    // active color
    $this->add_control(
      'filter_active_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .portfolio_messonry_button button.active' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_tab();
    $this->end_controls_tabs();
    // end: filter tabs
    $this->end_controls_section();
    // end: Filter Section

    // start: content section
    $this->start_controls_section(
      'portfolio_content',
      [
        'label' => __('Content', 'itanvir-elementor'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // content title heading
    $this->add_control(
      'content_title',
      [
        'label' => esc_html__('Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    // title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .portfolio_text h3',
      ]
    );
    // title color
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .portfolio_text h3' => 'color: {{VALUE}}',
        ],
      ]
    );
    // content subtitle heading
    $this->add_control(
      'content_subtitle',
      [
        'label' => esc_html__('Subtitle', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );

    // subtitle typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'subtitle_typography',
        'selector' => '{{WRAPPER}} .portfolio_text span',
      ]
    );
    // subtitle color
    $this->add_control(
      'subtitle_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .portfolio_text span' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Content Section
  }

  /**
   * Render Button widget output on the frontend.
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

    $html = '';

    $categories = get_terms('portfolio_category', array('hide_empty' => false));

    $args = array(
      'posts_per_page' => $settings['show_item'],
      'post_type' => 'portfolio',
      'order' => $settings['order'],
    );
    $portfolio = new WP_Query($args);
    if ($portfolio->have_posts()) {
      $html .= '
    <section class="portfolio_section mb-140">
      <div class="container-fluid">';
      if (!empty($categories)) :
        $html .= '<div class="portfolio_messonry_button d-flex justify-content-center">
              <button class="active" data-filter="*">all</button>';
        foreach ($categories as $cat) :
          $html .= '<button data-filter=".' . $cat->slug . '">' . $cat->name . '</button>';
        endforeach;
        $html .= '</div>';
      endif;
      $html .= '<div class="row no-gutters portfolio_page_gallery">';
      $n = 0;
      while ($portfolio->have_posts()) : $portfolio->the_post();
        $n++;
        $por_cats = get_the_terms(get_the_ID(), 'portfolio_category');
        $subtitle = get_post_meta(get_the_ID(), 'portfolio_subtitle', true);


        $html .= '<div class="col-lg-4 col-md-6 col-sm-6 gird_item ';
        foreach ($por_cats as $cat) :
          $html .= '' . $cat->slug . ' ' . '';
        endforeach;
        $html .= '">
                    <figure class="portfolio_thumb wow fadeInUp" data-wow-delay="0.' . $n . 's" data-wow-duration="1.' . $n . 's">
                        <a href="' . get_the_permalink() . '"><img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '"></a>
                        <div class="portfolio_text">
                            <h3>' . get_the_title() . '</h3>
                            <span>' . $subtitle . '</span>
                        </div>
                    </figure>
                </div>';
      endwhile;
      wp_reset_postdata();
      $html .= '</div>
      </div>
  </section>';
    } else {
      $html .= '<div class="alert alert-warning">No portfolio available.</div>';
    }
    echo $html;
  }
}
