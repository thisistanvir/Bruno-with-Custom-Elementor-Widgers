<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Title Widget.
 */
class Bruno_Title_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno-title';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno Section Title', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-heading';
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
    return ['bruno', 'title', 'section-title'];
  }

  /**
   * Register widget controls.
   */
  protected function register_controls() {

    /****************************** CONTENT SECTION ******************************/
    $this->start_controls_section(
      'content_section',
      [
        'label' => __('content', 'bruno'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    // section title
    $this->add_control(
      'section_title',
      [
        'label' => esc_html__('Section Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'placeholder' => esc_html__('Type your section title here', 'bruno'),
        'default' => esc_html__('Bruno section <span>title</span>', 'bruno'),
      ]
    );
    $this->end_controls_section();
    // end: Content Section

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'section_title_style',
      [
        'label' => __('Section Title', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // alignment
    $this->add_control(
      'section_title_align',
      [
        'label' => esc_html__('Alignment', 'bruno'),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => esc_html__('Left', 'bruno'),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => esc_html__('Center', 'bruno'),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => esc_html__('Right', 'bruno'),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'center',
        'toggle' => true,
        'selectors' => [
          '{{WRAPPER}} .section_title' => 'text-align: {{VALUE}};',
        ],
      ]
    );
    // title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'section_title_typography',
        'selector' => '{{WRAPPER}} .section_title h2',
      ]
    );
    // title color
    $this->add_control(
      'section_title_color',
      [
        'label' => esc_html__('Title Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .section_title h2' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Title Section
  }

  /**
   * Render Button widget output on the frontend.
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

    $html = '';

    $html .= '
      <div class="section_title">
        <h2 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">' . $settings['section_title'] . '</h2>
      </div>';

    echo $html;
  }
}
