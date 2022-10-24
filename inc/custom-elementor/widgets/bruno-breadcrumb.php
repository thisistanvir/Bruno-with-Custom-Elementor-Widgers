<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Breadcrumb Widget.
 */
class Bruno_Breadcrumb_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno-breadcrumb';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno Breadcrumb', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-product-breadcrumbs';
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
    return ['bruno', 'breadcrumb', 'navigation'];
  }

  /**
   * Register widget controls.
   */
  protected function register_controls() {

    /****************************** CONTENT SECTION ******************************/

    // start: Content Section
    $this->start_controls_section(
      'content_section',
      [
        'label' => __('content', 'bruno'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    // Navigation image
    $this->add_control(
      'breadcrumb_section_image',
      [
        'label' => esc_html__('Section Image', 'bruno'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => get_template_directory_uri() . '/assets/img/bg/bigimg3.jpg',
        ],
      ]
    );
    // breadcrumb title
    $this->add_control(
      'breadcrumb_title',
      [
        'label' => esc_html__('Breadcrumb Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'placeholder' => esc_html__('Type your title here', 'bruno'),
        'default' => esc_html__('Latest <span class="text-white">Projects</span>', 'bruno'),
        'label_block' => true,
      ]
    );
    // navigation switcher
    $this->add_control(
      'show_navigation',
      [
        'label' => esc_html__('Show Navigation', 'bruno'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => esc_html__('Show', 'bruno'),
        'label_off' => esc_html__('Hide', 'bruno'),
        'return_value' => 'yes',
        'default' => 'yes',
      ]
    );
    $this->end_controls_section();
    // end: content Section

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'breadcrumb_title_style',
      [
        'label' => __('Breadcrumb Title', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // breadcrumb title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'breadcrumb_title_typography',
        'selector' => '{{WRAPPER}} .breadcrumb_content h2',
      ]
    );
    // breadcrumb title color
    $this->add_control(
      'breadcrumb_title_color',
      [
        'label' => esc_html__('Title Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .breadcrumb_content h2' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: breadcrumb Section

    // start: Navigation
    $this->start_controls_section(
      'breadcrumb_navigation_style',
      [
        'label' => __('Navigation', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // breadcrumb navigation typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'breadcrumb_navigation_typography',
        'selector' => '{{WRAPPER}} .breadcrumb_content ul li',
      ]
    );
    // breadcrumb navigation color
    $this->add_control(
      'breadcrumb_navigation_color',
      [
        'label' => esc_html__('Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .breadcrumb_content ul li' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: navigation Section

  }

  /**
   * Render Breadcrumb widget output on the frontend.
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

    $html = '';

    $html .= '
    <section class="hero_banner_section hero_banner3  d-flex align-items-center" style="background-image: url(' . $settings['breadcrumb_section_image']['url'] . ');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero_banner_inner">
                        <!--breadcrumbs area start-->
                        <div class="breadcrumb_content breadcrumb_portfolio text-center">
                            <H2 class=" wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">' . $settings['breadcrumb_title'] . '</H2>';
    if ($settings['show_navigation'] == 'yes') :
      $html .= '<ul class=" wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                                <li><a href="' . home_url('/') . '">Home</a> /</li>
                                <li>' . get_the_title() . '</li>
                            </ul>';
    endif;
    $html .= '</div>
                        <!--breadcrumbs area end-->
                    </div>
                </div>
            </div>
        </div>
    </section>';


    echo $html;
  }
}
