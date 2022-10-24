<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor PriceBox Widget.
 */
class Bruno_PriceBox_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno-pricebox';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno PriceBox', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-price-table';
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
    return ['bruno', 'price', 'price table'];
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
    // price type
    $this->add_control(
      'price_type',
      [
        'label' => esc_html__('Price Box Type', 'bruno'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'basic',
        'options' => [
          'basic'  => esc_html__('Basic', 'bruno'),
          'business' => esc_html__('Business', 'bruno'),
          'premium' => esc_html__('Premium', 'bruno'),
          'ultimate' => esc_html__('Ultimate', 'bruno'),
        ],
      ]
    );
    // price
    $this->add_control(
      'price',
      [
        'label' => esc_html__('Price', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('$17', 'bruno'),
      ]
    );
    // pricing period
    $this->add_control(
      'price_period',
      [
        'label' => esc_html__('Pricing Period', 'bruno'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'monthly',
        'options' => [
          'monthly'  => esc_html__('Monthly', 'bruno'),
          'yearly' => esc_html__('Yearly', 'bruno'),
        ],
      ]
    );
    // price description
    $this->add_control(
      'price_description',
      [
        'label' => esc_html__('Description', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'placeholder' => esc_html__('Type price description here', 'bruno'),
        'default' => esc_html__('Billed anually or $19 <br /> month-to-month', 'bruno'),
        'separator' => 'after',
      ]
    );

    // pricing menu repeater
    $repeater = new \Elementor\Repeater();
    // menu item
    $repeater->add_control(
      'menu_item',
      [
        'label' => __('Menu Item', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Menu Item', 'bruno'),
        'label_block' => true,
      ]
    );
    // pricing menus
    $this->add_control(
      'menu_items',
      [
        'label' => __('Menu Items', 'bruno'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ menu_item }}}',
        'default' => [
          [
            'menu_item' => esc_html__('1 User', 'bruno'),
          ],
          [
            'menu_item' => esc_html__('1 Dashboard', 'bruno'),
          ],
          [
            'menu_item' => esc_html__('5 Projects', 'bruno'),
          ],
        ],
      ]
    );

    // price button text
    $this->add_control(
      'price_button_text',
      [
        'label' => __('Button Text', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Get Started Now', 'bruno'),
        'separator' => 'before'
      ]
    );
    // price button link
    $this->add_control(
      'price_button_link',
      [
        'label' => esc_html__('Button Link', 'bruno'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'bruno'),
        'options' => ['url', 'is_external', 'nofollow'],
        'default' => [
          'url' => '#',
          'is_external' => true,
          'nofollow' => true,
        ],
        'label_block' => true,
      ]
    );
    $this->end_controls_section();
    // end: Content Section

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'pricing_style',
      [
        'label' => __('Pricing Style', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // animation delay
    $this->add_control(
      'animation_delay',
      [
        'label' => esc_html__('Animation Delay', 'bruno'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '2',
        'options' => [
          '2'  => esc_html__('2 Second', 'bruno'),
          '3'  => esc_html__('3 Second', 'bruno'),
          '4'  => esc_html__('4 Second', 'bruno'),
          '5'  => esc_html__('5 Second', 'bruno'),
          '6'  => esc_html__('6 Second', 'bruno'),
          '7'  => esc_html__('7 Second', 'bruno'),
          '8'  => esc_html__('8 Second', 'bruno'),
          '9'  => esc_html__('9 Second', 'bruno'),
        ],
        'separator' => 'after',
      ]
    );
    // pricing type
    $this->add_control(
      'pricing_type',
      [
        'label' => esc_html__('Pricing Type', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );
    // pricing type typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'pricing_type_typography',
        'selector' => '{{WRAPPER}} .pricing_box_header > span',
      ]
    );
    // pricing type color
    $this->add_control(
      'pricing_type_color',
      [
        'label' => esc_html__('Type Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .pricing_box_header > span' => 'color: {{VALUE}}',
        ],
        'separator' => 'after',
      ]
    );

    // price heading
    $this->add_control(
      'pricing_price',
      [
        'label' => esc_html__('Price', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );
    // pricing price typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'pricing_price_typography',
        'selector' => '{{WRAPPER}} .pricing_box_header h3',
      ]
    );
    // pricing price color
    $this->add_control(
      'pricing_price_color',
      [
        'label' => esc_html__('Price Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .pricing_box_header h3' => 'color: {{VALUE}}',
        ],
        'separator' => 'after',
      ]
    );
    // pricing period heading
    $this->add_control(
      'pricing_period',
      [
        'label' => esc_html__('Pricing Period', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );
    // pricing period typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'pricing_period_typography',
        'selector' => '{{WRAPPER}} .pricing_box_header h3 span',
      ]
    );
    // pricing period color
    $this->add_control(
      'pricing_period_color',
      [
        'label' => esc_html__('Period Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .pricing_box_header h3 span' => 'color: {{VALUE}}',
        ],
        'separator' => 'after'
      ]
    );
    // pricing period heading
    $this->add_control(
      'pricing_description',
      [
        'label' => esc_html__('Pricing Description', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );
    // pricing description typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'pricing_description_typography',
        'selector' => '{{WRAPPER}} .pricing_box_header p',
      ]
    );
    // pricing period color
    $this->add_control(
      'pricing_description_color',
      [
        'label' => esc_html__('Description Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .pricing_box_header p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Price Style

    // start: Price Menu
    $this->start_controls_section(
      'pricing_menu',
      [
        'label' => __('Pricing Menu', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // pricing item typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'pricing_item_typography',
        'selector' => '{{WRAPPER}} .pricing_box_menu ul li',
      ]
    );
    // pricing period color
    $this->add_control(
      'pricing_item_color',
      [
        'label' => esc_html__('Item Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .pricing_box_menu ul li, .pricing_box_menu ul li i' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->end_controls_section();
    // end: price Menu

    // start: Pricing button
    $this->start_controls_section(
      'pricing_button',
      [
        'label' => __('Pricing Button', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // button typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'hero_button_typography',
        'selector' => '{{WRAPPER}} .pricing_btn .btn.btn-link',
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
    $this->add_control(
      'button_text_color',
      [
        'label' => esc_html__('Text Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .pricing_btn .btn.btn-link' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
        'name' => 'background',
        'label' => esc_html__('Background', 'bruno'),
        'types' => ['classic', 'gradient'],
        'exclude' => ['image'],
        'selector' => '{{WRAPPER}} .pricing_btn .btn.btn-link',
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
          '{{WRAPPER}} .pricing_btn .btn.btn-link:hover' => 'color: {{VALUE}}',
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
        'selector' => '{{WRAPPER}} .pricing_btn .btn.btn-link::before',
      ]
    );
    $this->add_control(
      'button_border_hover_color',
      [
        'label' => esc_html__('Border Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .pricing_btn .btn.btn-link:hover' => 'border-color: {{VALUE}}',
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
        'default' => 'solid',
        'options' => [
          'none' => esc_html__('None', 'bruno'),
          'solid'  => esc_html__('Solid', 'bruno'),
          'double' => esc_html__('Double', 'bruno'),
          'dotted' => esc_html__('Dotted', 'bruno'),
          'dashed' => esc_html__('Dashed', 'bruno'),
        ],
        'selectors' => [
          '{{WRAPPER}} .pricing_btn .btn.btn-link' => 'border-style: {{VALUE}};',
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
          '{{WRAPPER}} .pricing_btn .btn.btn-link' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'default' => [
          'top' => '1',
          'right' => '1',
          'bottom' => '1',
          'left' => '1',
          'unit' => 'px',
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
          '{{WRAPPER}} .pricing_btn .btn.btn-link' => 'border-color: {{VALUE}}',
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
          '{{WRAPPER}} .pricing_btn .btn.btn-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .pricing_btn .btn.btn-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before'
      ]
    );
    $this->end_controls_section();
    // end: Pricing Button
  }

  /**
   * Render Button widget output on the frontend.
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

    $html = '';

    $html .= '
    <div class="pricing_box wow fadeInUp d-flex justify-content-between" data-wow-delay="0.' . $settings['animation_delay'] . 's" data-wow-duration="1.' . $settings['animation_delay'] . 's" >
      <div class="pricing_box_header">
        <span>' . $settings['price_type'] . '</span>
        <h3>' . $settings['price'] . ' <span>/ ' . $settings['price_period'] . '</span></h3>
        <p>' . $settings['price_description'] . '</p>
      </div>
      <div class="pricing_box_bottom d-flex justify-content-between">';
    if ($settings['menu_items']) :
      $html .= '<div class="pricing_box_menu">
        <ul>';
      foreach ($settings['menu_items'] as $item) :
        $html .= '<li><i class="ei ei-check"></i> ' . $item['menu_item'] . '</li>';
      endforeach;
      $html .= '</ul>
        </div>';
    endif;
    $html .= '<div class="pricing_btn">
          <a class="btn btn-link" href="' . $settings['price_button_link']['url'] . '">' . $settings['price_button_text'] . '</a>
        </div>
      </div>
    </div>';

    echo $html;
  }
}
