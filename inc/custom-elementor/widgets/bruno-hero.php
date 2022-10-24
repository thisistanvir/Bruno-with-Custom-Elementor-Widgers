<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Hero Widget.
 */
class Bruno_Hero_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno-hero';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno Hero', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-banner';
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
    return ['hero', 'banner', 'slider'];
  }

  /**
   * Register widget controls.
   */
  protected function register_controls() {

    /****************************** CONTENT SECTION ******************************/
    // start: banner Type
    $this->start_controls_section(
      'hero_type_section',
      [
        'label' => __('Hero Type', 'bruno'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    // hero type
    $this->add_control(
      'hero_type',
      [
        'label' => esc_html__('Hero Type', 'bruno'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'type-1',
        'options' => [
          'type-1'  => esc_html__('Hero 1', 'bruno'),
          'type-2' => esc_html__('Hero 2', 'bruno'),
        ],
        'selectors' => [
          '{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Banner Type

    // start: Content Section
    $this->start_controls_section(
      'content_section',
      [
        'label' => __('content', 'bruno'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    // hero image
    $this->add_control(
      'hero_section_image',
      [
        'label' => esc_html__('Section Image', 'bruno'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => get_template_directory_uri() . '/assets/img/bg/bigimg1.jpg',
        ],
      ]
    );
    // hero title
    $this->add_control(
      'hero_title',
      [
        'label' => esc_html__('Hero Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'placeholder' => esc_html__('Type your title here', 'bruno'),
        'default' => esc_html__('Perfect Solutions <span>For <br> Your Business</span>', 'bruno'),
        'label_block' => true,
      ]
    );
    // hero description
    $this->add_control(
      'hero_description',
      [
        'label' => esc_html__('Hero Description', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'placeholder' => esc_html__('Type your description here', 'bruno'),
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br> eiusmod tempor incididunt', 'bruno'),
      ]
    );
    // hero button text
    $this->add_control(
      'hero_btn_text',
      [
        'label' => __('Button Text', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Discover Now', 'bruno'),
        'condition' => [
          'hero_type' => 'type-1',
        ],
      ]
    );
    // hero button link
    $this->add_control(
      'hero_button_link',
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
        'condition' => [
          'hero_type' => 'type-1',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Content Section

    // start: Manner Section
    $this->start_controls_section(
      'manner_section',
      [
        'label' => __('Manner', 'bruno'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    // manner repeater
    $repeater = new \Elementor\Repeater();
    // manner title
    $repeater->add_control(
      'manner_title',
      [
        'label' => __('Manner Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Manner Title', 'bruno'),
        'label_block' => true,
      ]
    );
    // manner content
    $repeater->add_control(
      'manner_content',
      [
        'label' => __('Manner Content', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __('Manner Content', 'bruno'),
      ]
    );
    // manners
    $this->add_control(
      'manners',
      [
        'label' => __('Manners', 'bruno'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ manner_title }}}',
        'default' => [
          [
            'manner_title' => esc_html__('Creative Idea', 'bruno'),
            'manner_content' => esc_html__('Lorem Ipsum Proin gravida nibh vel velit auct sollicitudin lorem quis.', 'bruno'),
          ],
          [
            'manner_title' => esc_html__('Pixel Perfect', 'bruno'),
            'manner_content' => esc_html__('Lorem Ipsum Proin gravida nibh vel velit auct sollicitudin lorem quis.', 'bruno'),
          ],
          [
            'manner_title' => esc_html__('Easy Customize', 'bruno'),
            'manner_content' => esc_html__('Lorem Ipsum Proin gravida nibh vel velit auct sollicitudin lorem quis.', 'bruno'),
          ],
        ],
      ]
    );
    $this->end_controls_section();
    // end: Manner Section

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'hero_title_style',
      [
        'label' => __('Hero Title', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // hero title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'hero_title_typography',
        'selector' => '{{WRAPPER}} .hero_content h1',
      ]
    );
    // hero title color
    $this->add_control(
      'hero_title_color',
      [
        'label' => esc_html__('Title Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .hero_content h1' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Title Section

    // start: Description Section
    $this->start_controls_section(
      'hero_description_style',
      [
        'label' => __('Hero Description', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // description typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'hero_description_typography',
        'selector' => '{{WRAPPER}} .hero_content p',
      ]
    );
    // description color
    $this->add_control(
      'hero_description_color',
      [
        'label' => esc_html__('Description Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .hero_content p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Description Section

    // start: Button Section
    $this->start_controls_section(
      'hero_button_style',
      [
        'label' => __('Hero Button', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
          'hero_type' => 'type-1',
        ],
      ]
    );
    // button typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'hero_button_typography',
        'selector' => '{{WRAPPER}} .hero_content .btn.btn-link',
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
          '{{WRAPPER}} .hero_content .btn.btn-link' => 'color: {{VALUE}}',
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
        'selector' => '{{WRAPPER}} .hero_content .btn.btn-link',
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
          '{{WRAPPER}} .hero_content .btn.btn-link:hover' => 'color: {{VALUE}}',
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
        'selector' => '{{WRAPPER}} .hero_content .btn.btn-link::before',
      ]
    );
    $this->add_control(
      'button_border_hover_color',
      [
        'label' => esc_html__('Border Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .hero_content .btn.btn-link:hover' => 'border-color: {{VALUE}}',
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
          '{{WRAPPER}} .hero_content .btn.btn-link' => 'border-style: {{VALUE}};',
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
          '{{WRAPPER}} .hero_content .btn.btn-link' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .hero_content .btn.btn-link' => 'border-color: {{VALUE}}',
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
          '{{WRAPPER}} .hero_content .btn.btn-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
          '{{WRAPPER}} .hero_content .btn.btn-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'separator' => 'before'
      ]
    );
    $this->end_controls_section();
    // end: Button Section

    // start: Manner Section
    $this->start_controls_section(
      'hero_manner_style',
      [
        'label' => __('Manner Style', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // manner title heading
    $this->add_control(
      'manner_title_heading',
      [
        'label' => esc_html__('Manner Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );
    // title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'manner_title_typography',
        'selector' => '{{WRAPPER}} .manner_text_list h3',
      ]
    );
    // title color
    $this->add_control(
      'manner_title_color',
      [
        'label' => esc_html__('Title Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .manner_text_list h3' => 'color: {{VALUE}}',
        ],
      ]
    );

    // manner content heading
    $this->add_control(
      'manner_content_heading',
      [
        'label' => esc_html__('Manner Content', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    // content typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'manner_content_typography',
        'selector' => '{{WRAPPER}} .manner_text_list p',
      ]
    );
    // content color
    $this->add_control(
      'manner_content_color',
      [
        'label' => esc_html__('Content Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .manner_text_list p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Manner Section
  }

  /**
   * Render hero widget output on the frontend.
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

    $html = '';

    $html .= '';
    if ('type-1' == $settings['hero_type']) :
      $html .= '
  <section class="hero_banner_section mb-142 d-flex align-items-end" style="background-image: url(' . $settings['hero_section_image']['url'] . ');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero_banner_inner">
                    <div class="hero_content text-center">
                        <h1 class=" wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">' . $settings['hero_title'] . '</h1>
                        <p class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">' . $settings['hero_description'] . '</p>
                        <a class="btn btn-link wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s" href="' . $settings['hero_button_link']['url'] . '">' . $settings['hero_btn_text'] . '</a>
                    </div>';
      if (!empty($settings['manners'])) :
        $html .= '<div class="template_manner_text d-flex justify-content-between">';
        $n = 0;
        foreach ($settings['manners'] as $manner) :
          $n++;
          $html .= '<div class="manner_text_list wow fadeInUp" data-wow-delay="0.' . $n . 's" data-wow-duration="1.' . $n . 's">
                            <h3>' . $manner['manner_title'] . '</h3>
                            <p>' . $manner['manner_content'] . '</p>
                        </div>';
        endforeach;

        $html .= '</div>';
      endif;
      $html .= '</div>
            </div>
        </div>
    </div>
  </section>';

    else :

      $html .= '
      <section class="hero_banner_section hero_banner2  d-flex align-items-center" style="background-image: url(' . $settings['hero_section_image']['url'] . ');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero_banner_inner">
                        <div class="hero_content text-center pb-0">
                            <h1 class="text-white wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">' . $settings['hero_title'] . '</h1>
                            <p class="mb-0 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">' . $settings['hero_description'] . '</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <section class="creative_section">
        <div class="container">
            <div class="row">
                <div class="col-12">';
      if (!empty($settings['manners'])) :
        $html .= '<div class="template_manner_text d-flex justify-content-between">';
        $n = 0;
        foreach ($settings['manners'] as $manner) :
          $n++;
          $html .= '<div class="manner_text_list wow fadeInUp" data-wow-delay="0.' . $n . 's" data-wow-duration="1.' . $n . 's">
                            <h3>' . $manner['manner_title'] . '</h3>
                            <p>' . $manner['manner_content'] . '</p>
                        </div>';
        endforeach;
        $html .= '</div>';
      endif;
      $html .= '</div>
            </div>
        </div>
      </section>
      
      ';
    endif;
    $html .= '';

    echo $html;
  }
}
