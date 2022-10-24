<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Button Widget.
 */
class Bruno_Button_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno-button';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno Button', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-button';
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
    return ['bruno', 'button', 'link'];
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
    // button Text
    $this->add_control(
      'button_text',
      [
        'label' => esc_html__('Text', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('click here', 'bruno'),
      ]
    );
    // button link
    $this->add_control(
      'button_link',
      [
        'label' => esc_html__('Link', 'bruno'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'bruno'),
        'options' => ['url', 'is_external', 'nofollow', 'custom_attributes'],
        'default' => [
          'url' => '#',
        ],
        'label_block' => true,
      ]
    );
    // alignment
    $this->add_control(
      'button_alignment',
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
          '{{WRAPPER}} .bruno-button' => 'text-align: {{VALUE}};',
        ],
      ]
    );

    $this->end_controls_section();
    // end: Content Section

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'button_style',
      [
        'label' => __('Style', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // button typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'button_typography',
        'selector' => '{{WRAPPER}} .bruno-button .btn.btn-link',
      ]
    );

    // start: Button tabs
    $this->start_controls_tabs(
      'button_tabs'
    );

    // start: Normal Tab
    $this->start_controls_tab(
      'button_normal_tab',
      [
        'label' => esc_html__('Normal', 'bruno'),
      ]
    );
    // text color
    $this->add_control(
      'button_text_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .bruno-button .btn.btn-link' => 'color: {{VALUE}}',
        ],
      ]
    );
    // typography
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
        'name' => 'background',
        'label' => esc_html__('Background', 'bruno'),
        'types' => ['classic', 'gradient'],
        'exclude' => ['image'],
        'selector' => '{{WRAPPER}} .bruno-button .btn.btn-link',
      ]
    );
    $this->end_controls_tab();
    // end: Normal Tab

    // start: Hover Tab
    $this->start_controls_tab(
      'button_hover_tab',
      [
        'label' => esc_html__('Hover', 'bruno'),
      ]
    );
    $this->add_control(
      'button_text_hover_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .bruno-button .btn.btn-link:hover' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
        'name' => 'background_hover',
        'label' => esc_html__('Background', 'bruno'),
        'types' => ['classic', 'gradient'],
        'exclude' => ['image'],
        'selector' => '{{WRAPPER}} .bruno-button .btn.btn-link::before',
      ]
    );
    $this->add_control(
      'button_border_hover_color',
      [
        'label' => esc_html__('Border Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .bruno-button .btn.btn-link:hover' => 'border-color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_tab();
    // end: Hover Tab
    $this->end_controls_tabs();
    // end: Button Tabs

    // button border type
    $this->add_control(
      'button_border_type',
      [
        'label' => esc_html__('Border Type', 'bruno'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'none',
        'options' => [
          'none' => esc_html__('None', 'bruno'),
          'solid'  => esc_html__('Solid', 'bruno'),
          'double' => esc_html__('Double', 'bruno'),
          'dotted' => esc_html__('Dotted', 'bruno'),
          'dashed' => esc_html__('Dashed', 'bruno'),
        ],
        'selectors' => [
          '{{WRAPPER}} .bruno-button .btn.btn-link' => 'border-style: {{VALUE}};',
        ],
        'separator' => 'before',
      ]
    );
    // button border width
    $this->add_responsive_control(
      'button_border_width',
      [
        'label' => esc_html__('Width', 'bruno'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px'],
        'selectors' => [
          '{{WRAPPER}} .bruno-button .btn.btn-link' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'condition' => [
          'button_border_type!' => 'none',
        ],
      ]
    );
    // button border color
    $this->add_control(
      'button_border_color',
      [
        'label' => esc_html__('Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .bruno-button .btn.btn-link' => 'border-color: {{VALUE}}',
        ],
        'condition' => [
          'button_border_type!' => 'none',
        ],
      ]
    );
    // button border radius
    $this->add_control(
      'border_radius',
      [
        'label' => esc_html__('Border Radius', 'bruno'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => [
          '{{WRAPPER}} .bruno-button .btn.btn-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );
    // button padding
    $this->add_responsive_control(
      'button_padding',
      [
        'label' => esc_html__('Padding', 'bruno'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => [
          '{{WRAPPER}} .bruno-button .btn.btn-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before'
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
        <div class="bruno-button">
          <a class="btn btn-link wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1.5s"';
    if (!empty($settings['button_link']['url'])) :
      $html .= 'href="' . $settings['button_link']['url'] . '"';
    endif;
    if ($settings['button_link']['is_external'] == 'on') :
      $html .= 'target="_blank"';
    else :
      $html .= 'target="_self"';
    endif;

    $html .= '>' . $settings['button_text'] . '</a>
        </div>
    ';

    echo $html;
  }
}
