<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Testimonial Widget.
 */
class Bruno_Testimonials_Widget extends \Elementor\Widget_Base{

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'bruno-testimonial';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return esc_html__( 'Bruno Testimonial', 'bruno' );
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-testimonial';
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
        return ['hero', 'testimonial', 'review'];
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
                'label' => __( 'content', 'bruno' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        // hero image
        $this->add_control(
            'testimonial_section_image',
            [
                'label'   => esc_html__( 'Section Image', 'bruno' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/others/testimonial-position.png',
                ],
            ]
        );
        // section title
        $this->add_control(
            'testimonial_section_title',
            [
                'label'       => esc_html__( 'Section Title', 'bruno' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your title here', 'bruno' ),
                'default'     => esc_html__( 'More 1,200 <br /> <span>Happy Customers</span>', 'bruno' ),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        // end: Content Section

        // start: Testimonial Section
        $this->start_controls_section(
            'testimonial_section',
            [
                'label' => __( 'Testimonial', 'bruno' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        // testimonial repeater
        $repeater = new \Elementor\Repeater();
        // testimonial title
        $repeater->add_control(
            'testimonial_title',
            [
                'label'       => __( 'Title', 'bruno' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Testimonial Title', 'bruno' ),
                'label_block' => true,
            ]
        );
        // testimonial content
        $repeater->add_control(
            'testimonial_content',
            [
                'label'       => __( 'Content', 'bruno' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Type your testimonial content here', 'bruno' ),
            ]
        );
        // testimonial content
        $repeater->add_control(
            'testimonial_name',
            [
                'label'       => __( 'Name', 'bruno' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Type your name here', 'bruno' ),
                'label_block' => true,
                'separator'   => 'before',
            ]
        );
        $repeater->add_control(
            'testimonial_designation',
            [
                'label'       => __( 'Designation', 'bruno' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Type your designation here', 'bruno' ),
                'label_block' => true,
            ]
        );
        // Testimonials
        $this->add_control(
            'testimonials',
            [
                'label'       => __( 'Testimonials', 'bruno' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ testimonial_title }}}',
                'default'     => [
                    [
                        'testimonial_title'       => esc_html__( "This is Photoshop's version of Lorem Ipsum !", 'bruno' ),
                        'testimonial_content'     => esc_html__( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
            mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos', 'bruno' ),
                        'testimonial_name'        => esc_html__( 'John Done', 'bruno' ),
                        'testimonial_designation' => esc_html__( "Founder’s Joloo", 'bruno' ),
                    ],
                    [
                        'testimonial_title'       => esc_html__( "This is Photoshop's version of Lorem Ipsum !", 'bruno' ),
                        'testimonial_content'     => esc_html__( 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
            mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos', 'bruno' ),
                        'testimonial_name'        => esc_html__( 'Tanvir Ahamed', 'bruno' ),
                        'testimonial_designation' => esc_html__( "CEO", 'bruno' ),
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        // end: Manner Section

        // start: Configurations
        $this->start_controls_section(
            'configurations',
            [
                'label' => __( 'Configurations', 'bruno' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        // arrows
        $this->add_control(
            'arrows',
            [
                'label'   => esc_html__( 'Arrows', 'bruno' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'  => esc_html__( 'True', 'bruno' ),
                    'false' => esc_html__( 'False', 'bruno' ),
                ],
            ]
        );
        // autoplay
        $this->add_control(
            'autoplay',
            [
                'label'   => esc_html__( 'Autoplay', 'bruno' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'true',
                'options' => [
                    'true'  => esc_html__( 'True', 'bruno' ),
                    'false' => esc_html__( 'False', 'bruno' ),
                ],
            ]
        );
        // speed
        $this->add_control(
            'speed',
            [
                'label'     => esc_html__( 'Speed', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1000,
                'max'       => 10000,
                'step'      => 1000,
                'default'   => 3000,
                'condition' => [
                    'autoplay' => 'true',
                ],
            ]
        );
        // Infinite
        $this->add_control(
            'infinite',
            [
                'label'     => esc_html__( 'Infinite Loop', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'true',
                'options'   => [
                    'true'  => esc_html__( 'True', 'bruno' ),
                    'false' => esc_html__( 'False', 'bruno' ),
                ],
                'condition' => [
                    'autoplay' => 'true',
                ],
            ]
        );
        $this->end_controls_section();
        // end: Configurations

        /****************************** STYLE SECTION ******************************/
        $this->start_controls_section(
            'testimonial_title_style',
            [
                'label' => __( 'Section Title', 'bruno' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // hero title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_section_title_typography',
                'selector' => '{{WRAPPER}} .testimonial_inner .section_title h2',
            ]
        );
        // hero title color
        $this->add_control(
            'testi_section_title_color',
            [
                'label'     => esc_html__( 'Color', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_inner .section_title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        // end: Title Section

        // start: Testimonial Section
        $this->start_controls_section(
            'testimonial_style',
            [
                'label' => __( 'Testimonial', 'bruno' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Testimonial Title Heading
        $this->add_control(
            'manner_title_heading',
            [
                'label' => esc_html__( 'Title', 'bruno' ),
                'type'  => \Elementor\Controls_Manager::HEADING,
            ]
        );
        // title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_title_typography',
                'selector' => '{{WRAPPER}} .testimonial_content h3',
            ]
        );
        // title color
        $this->add_control(
            'testimonial_title_color',
            [
                'label'     => esc_html__( 'Color', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_content h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        // Testimonial Content Heading
        $this->add_control(
            'manner_content_heading',
            [
                'label'     => esc_html__( 'Content', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // content typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_content_typography',
                'selector' => '{{WRAPPER}} .testimonial_content > p',
            ]
        );
        // content color
        $this->add_control(
            'testimonial_content_color',
            [
                'label'     => esc_html__( 'Color', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_content > p' => 'color: {{VALUE}}',
                ],
            ]
        );
        // Testimonial Name Heading
        $this->add_control(
            'manner_name_heading',
            [
                'label'     => esc_html__( 'Name', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // name typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_name_typography',
                'selector' => '{{WRAPPER}} .testimonial_footer p span',
            ]
        );
        // name color
        $this->add_control(
            'testimonial_name_color',
            [
                'label'     => esc_html__( 'Color', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_footer p span' => 'color: {{VALUE}}',
                ],
            ]
        );
        // Testimonial Designation Heading
        $this->add_control(
            'manner_designation_heading',
            [
                'label'     => esc_html__( 'Designation', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // designation typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testimonial_designation_typography',
                'selector' => '{{WRAPPER}} .testimonial_footer p',
            ]
        );
        // designation color
        $this->add_control(
            'testimonial_designation_color',
            [
                'label'     => esc_html__( 'Color', 'bruno' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_footer p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        // end: Testimonial Section

    }

    /**
     * Render Testimonials widget output on the frontend.
     */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $html = '';

        $html .= '

    <script>
    jQuery(document).ready(function($) {
      var $sliderActvation = $(".slick_slider_activation");
      if($sliderActvation.length > 0){
        $sliderActvation.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: ' . $settings['arrows'] . ',
          dots: false,
          autoplay: ' . $settings['autoplay'] . ',';

        if ( $settings['autoplay'] == 'true' ):
            $html .= 'autoplaySpeed: ' . $settings['speed'] . ',
	          infinite: ' . $settings['infinite'] . ',';
        endif;
        $html .= 'prevArrow: \'<button class="slick-prev prev_arrow"><i class="ei ei-arrow_left"></i></button>\',
          nextArrow: \'<button class="slick-next next_arrow"><i class="ei ei-arrow_right"></i></button>\',
        });
      };
    });

    </script>

    <section class="testimonial_section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-6 col-md-7 offset-md-5">
            <div class="testimonial_inner">
              <div class="section_title text-right mb-80">
                <h2 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">' . $settings['testimonial_section_title'] . '</h2>
              </div>';
        if ( !empty( $settings['testimonials'] ) ):
            $html .= '<div class="testimonial_slick slick_slider_activation" >';
            foreach ( $settings['testimonials'] as $testimonial ):
                $html .= '<div class="testimonial_slick_list">
		                  <div class="testimonial_content text-right">
		                    <h3 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">' . $testimonial['testimonial_title'] . '</h3>
		                    <p class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">' . $testimonial['testimonial_content'] . '</p>
		                    <div class="testimonial_footer wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.4s" >
		                      <p><span>' . $testimonial['testimonial_name'] . ' </span> - ' . $testimonial['testimonial_designation'] . '</p>
		                    </div>
		                  </div>
		                </div>';
            endforeach;
            $html .= '</div>';
        endif;
        $html .= '</div>
          </div>
        </div>
      </div>
      <div class="testimonial_position_img">
        <img src="' . $settings['testimonial_section_image']['url'] . '" alt="' . $settings['testimonial_section_title'] . '" />
      </div>
    </section>';

        echo $html;
    }
}
