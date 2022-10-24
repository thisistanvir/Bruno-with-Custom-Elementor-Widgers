<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor CounterUp Widget.
 */
class Bruno_CounterUp_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno-counterup';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno CounterUp', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-counter';
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
    return ['bruno', 'counter', 'counterup'];
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
    // Counter
    $this->add_control(
      'counter',
      [
        'label' => esc_html__('Counter', 'bruno'),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'min' => 0,
        'step' => 1,
        'default' => 100,
      ]
    );
    // Counter Text
    $this->add_control(
      'counter_text',
      [
        'label' => esc_html__('Counter Text', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => esc_html__('Type your counter text here', 'bruno'),
        'default' => esc_html__('Happy Customer', 'bruno'),
        'label_block' => 'true'
      ]
    );
    // Animation duration
    $this->add_control(
      'counter_animation',
      [
        'label' => esc_html__('Animation Duration', 'bruno'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '1',
        'options' => [
          '1'  => esc_html__('1 Second', 'bruno'),
          '2'  => esc_html__('2 Second', 'bruno'),
          '3'  => esc_html__('3 Second', 'bruno'),
          '4'  => esc_html__('4 Second', 'bruno'),
          '5'  => esc_html__('5 Second', 'bruno'),
        ],
      ]
    );
    $this->end_controls_section();
    // end: Content Section

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'counter_style',
      [
        'label' => __('Style', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // alignment
    $this->add_control(
      'counter_align',
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
          '{{WRAPPER}} .counterup_text' => 'text-align: {{VALUE}};',
        ],
      ]
    );
    $this->add_control(
      'counter_title_heading',
      [
        'label' => esc_html__('Counter Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    // counter typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'counter_typography',
        'selector' => '{{WRAPPER}} .counterup_text h3',
      ]
    );
    // counter color
    $this->add_control(
      'counter_color',
      [
        'label' => esc_html__('Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .counterup_text h3' => 'color: {{VALUE}}',
        ],
      ]
    );
    // counter text heading
    $this->add_control(
      'counter_text_heading',
      [
        'label' => esc_html__('Counter Text', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    // counter text typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'counter_text_typography',
        'selector' => '{{WRAPPER}} .counterup_text p',
      ]
    );
    // counter color
    $this->add_control(
      'counter_text_color',
      [
        'label' => esc_html__('Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .counterup_text p' => 'color: {{VALUE}}',
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

    $random = rand(1234, 3556);
    $html .= '
    <script>
      jQuery(document).ready(function($) {
        $(".counterup-' . $random . '").counterUp({
          delay: 20,
          time: 2000
        })
      });
    </script>
              <div class="counterup_text wow fadeInUp" data-wow-delay="0.' . $settings['counter_animation'] . 's" data-wow-duration="1.' . $settings['counter_animation'] . 's">
                <h3 class="counterup-' . $random . '">' . $settings['counter'] . '</h3>
                <p>' . $settings['counter_text'] . '</p>
              </div>';

    echo $html;
  }
}
