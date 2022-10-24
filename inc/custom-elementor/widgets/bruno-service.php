<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Services Widget.
 */
class Bruno_Services_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno-services';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno Services', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-table';
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
    return ['bruno', 'service', 'services'];
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
    // service image
    $this->add_control(
      'services_section_image',
      [
        'label' => esc_html__('Section Image', 'bruno'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => get_template_directory_uri() . '/assets/img/bg/img1.png',
        ],
      ]
    );
    // section title
    $this->add_control(
      'section_title',
      [
        'label' => esc_html__('Section Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'placeholder' => esc_html__('Type your section title here', 'bruno'),
        'default' => esc_html__('Bruno Provide <span>Things That <br/>You Needs!</span>', 'bruno'),
      ]
    );
    $this->end_controls_section();
    // end: Content Section

    // start: Services Section
    $this->start_controls_section(
      'services_section',
      [
        'label' => __('Services', 'bruno'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    // service repeater
    $repeater = new \Elementor\Repeater();
    // service title
    $repeater->add_control(
      'service_title',
      [
        'label' => __('Service Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Service Title', 'bruno'),
        'label_block' => true,
      ]
    );
    // service content
    $repeater->add_control(
      'service_content',
      [
        'label' => __('Service Content', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __('Service Content', 'bruno'),
      ]
    );
    $repeater->add_control(
      'service_icon',
      [
        'label' => esc_html__('Icon', 'bruno'),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-circle',
          'library' => 'fa-solid',
        ],
      ]
    );
    // manners
    $this->add_control(
      'services',
      [
        'label' => __('Services', 'bruno'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ service_title }}}',
        'default' => [
          [
            'service_title' => esc_html__('Unique Design', 'bruno'),
            'service_content' => esc_html__('Lorem ipsum dolor siteiln dolor adipisicing elit.', 'bruno'),
            'service_icon' => [
              'value' => 'fas fa-pencil-ruler'
            ],
          ],
          [
            'service_title' => esc_html__('Retina Ready', 'bruno'),
            'service_content' => esc_html__('Lorem ipsum dolor siteiln dolor adipisicing elit.', 'bruno'),
            'service_icon' => [
              'value' => 'fas fa-desktop'
            ],
          ],
          [
            'service_title' => esc_html__('Advanced Options', 'bruno'),
            'service_content' => esc_html__('Lorem ipsum dolor siteiln dolor adipisicing elit.', 'bruno'),
            'service_icon' => [
              'value' => 'fas fa-sliders-h'
            ],
          ],
          [
            'service_title' => esc_html__('SEO Marketing', 'bruno'),
            'service_content' => esc_html__('Lorem ipsum dolor siteiln dolor adipisicing elit.', 'bruno'),
            'service_icon' => [
              'value' => 'fas fa-bullseye'
            ],
          ],
          [
            'service_title' => esc_html__('Ecommerce Enable', 'bruno'),
            'service_content' => esc_html__('Lorem ipsum dolor siteiln dolor adipisicing elit.', 'bruno'),
            'service_icon' => [
              'value' => 'fas fa-shopping-cart'
            ],
          ],
          [
            'service_title' => esc_html__('Easy Customize', 'bruno'),
            'service_content' => esc_html__('Lorem ipsum dolor siteiln dolor adipisicing elit.', 'bruno'),
            'service_icon' => [
              'value' => 'fas fa-cogs'
            ],
          ],
        ],
      ]
    );
    $this->end_controls_section();
    // end: Manner Section

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'section_title_style',
      [
        'label' => __('Services Title', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'section_title_typography',
        'selector' => '{{WRAPPER}} .service_section .section_title h2',
      ]
    );
    // title color
    $this->add_control(
      'section_title_color',
      [
        'label' => esc_html__('Title Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .service_section .section_title h2' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Title Section

    // start: Services Section
    $this->start_controls_section(
      'services_style',
      [
        'label' => __('Services', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // service title heading
    $this->add_control(
      'service_title_heading',
      [
        'label' => esc_html__('Title', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );
    // service title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'service_title_typography',
        'selector' => '{{WRAPPER}} .services_text h4',
      ]
    );
    // services title color
    $this->add_control(
      'service_title_color',
      [
        'label' => esc_html__('Title Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .services_text h4' => 'color: {{VALUE}}',
        ],
        'separator' => 'after',
      ]
    );
    // service content heading
    $this->add_control(
      'service_content_heading',
      [
        'label' => esc_html__('Content', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );
    // service content typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'service_content_typography',
        'selector' => '{{WRAPPER}} .services_text p',
      ]
    );
    // services content color
    $this->add_control(
      'hero_content_color',
      [
        'label' => esc_html__('Content Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .services_text p' => 'color: {{VALUE}}',
        ],
      ]
    );
    $this->end_controls_section();
    // end: Services Section
  }

  /**
   * Render Button widget output on the frontend.
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

    $html = '';

    $html .= '
  <section class="service_section mb-123">
    <div class="container">
      <div class="section_title mb-86">
        <h2 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">' . $settings['section_title'] . '</h2>
      </div>';
    if (!empty($settings['services'])) :
      $html .= '<div class="service_container">
        <div class="row">
          <div class="col-lg-7 col-md-7">
            <div class="services_gallery d-flex">';
      $n = 0;
      foreach ($settings['services'] as $service) :
        $n++;

        $html .= '<div class="single_services d-flex wow fadeInUp" data-wow-delay="0.' . $n + 1 . 's" data-wow-duration="1.' . $n + 1 . 's" >
                <div class="services_icon">
                  <i class="' . $service['service_icon']['value'] . '"></i>
                </div>
                <div class="services_text">
                  <h4>' . $service['service_title'] . '</h4>
                  <p>' . $service['service_content'] . '</p>
                </div>
              </div>';
      endforeach;
      $html .= '</div>
          </div>
        </div>
      </div>';
    endif;
    $html .= '</div>
    <div class="services_position_img">
      <img src="' . $settings['services_section_image']['url'] . '" alt="' . $settings['section_title'] . '" />
    </div>
  </section>
    ';

    echo $html;
  }
}
