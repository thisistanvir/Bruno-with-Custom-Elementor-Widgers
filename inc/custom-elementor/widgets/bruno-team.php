<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Team Widget.
 */
class Bruno_Team_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   */
  public function get_name() {
    return 'bruno-team';
  }

  /**
   * Get widget title.
   */
  public function get_title() {
    return esc_html__('Bruno Team', 'bruno');
  }

  /**
   * Get widget icon.
   */
  public function get_icon() {
    return 'eicon-person';
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
    return ['bruno', 'team', 'member'];
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
    // team repeater
    $repeater = new \Elementor\Repeater();
    // team image
    $repeater->add_control(
      'team_image',
      [
        'label' => esc_html__('Choose Image', 'bruno'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );
    // team name
    $repeater->add_control(
      'team_name',
      [
        'label' => __('Name', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Member Name', 'bruno'),
        'label_block' => true,
      ]
    );
    // team designation
    $repeater->add_control(
      'team_designation',
      [
        'label' => __('Designation', 'bruno'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __('CEO Founder', 'bruno'),
      ]
    );
    // teams
    $this->add_control(
      'teams',
      [
        'label' => __('Teams', 'bruno'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ team_name }}}',
        'default' => [
          [
            'team_name' => esc_html__('Alberto Kayel', 'bruno'),
            'team_designation' => esc_html__('CEO Founder', 'bruno'),
            'team_image' => [
              'url' => get_template_directory_uri() . '/assets/img/others/team1.png'
            ],
          ],
          [
            'team_name' => esc_html__('Alberto Kayel', 'bruno'),
            'team_designation' => esc_html__('CO Founder', 'bruno'),
            'team_image' => [
              'url' => get_template_directory_uri() . '/assets/img/others/team2.png'
            ],
          ],
          [
            'team_name' => esc_html__('Alberto Kayel', 'bruno'),
            'team_designation' => esc_html__('Art Director', 'bruno'),
            'team_image' => [
              'url' => get_template_directory_uri() . '/assets/img/others/team3.png'
            ],
          ],
          [
            'team_name' => esc_html__('Gabriel Eldo', 'bruno'),
            'team_designation' => esc_html__('Marketing Director', 'bruno'),
            'team_image' => [
              'url' => get_template_directory_uri() . '/assets/img/others/team4.png'
            ],
          ],
          [
            'team_name' => esc_html__('Bruce Wayne', 'bruno'),
            'team_designation' => esc_html__('Product Manager', 'bruno'),
            'team_image' => [
              'url' => get_template_directory_uri() . '/assets/img/others/team5.png'
            ],
          ],
          [
            'team_name' => esc_html__('Dalton Garrin', 'bruno'),
            'team_designation' => esc_html__('UI/UX Designer', 'bruno'),
            'team_image' => [
              'url' => get_template_directory_uri() . '/assets/img/others/team6.png'
            ],
          ],
          [
            'team_name' => esc_html__('Maria Slovakia', 'bruno'),
            'team_designation' => esc_html__('Web Designer', 'bruno'),
            'team_image' => [
              'url' => get_template_directory_uri() . '/assets/img/others/team7.png'
            ],
          ],
          [
            'team_name' => esc_html__('Luther Frankil', 'bruno'),
            'team_designation' => esc_html__('Content Executive', 'bruno'),
            'team_image' => [
              'url' => get_template_directory_uri() . '/assets/img/others/team8.png'
            ],
          ],
        ],
      ]
    );
    $this->end_controls_section();
    // end: Content Section

    /****************************** STYLE SECTION ******************************/
    $this->start_controls_section(
      'team_style',
      [
        'label' => __('Style', 'bruno'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    // team name heading
    $this->add_control(
      'team_name_heading',
      [
        'label' => esc_html__('Name', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );
    // name typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'name_typography',
        'selector' => '{{WRAPPER}} .team_text h3',
      ]
    );
    // counter color
    $this->add_control(
      'name_color',
      [
        'label' => esc_html__('Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .team_text h3' => 'color: {{VALUE}}',
        ],
      ]
    );
    // team designation heading
    $this->add_control(
      'team_designation_heading',
      [
        'label' => esc_html__('Designation', 'bruno'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
      ]
    );
    // designation typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'designation_typography',
        'selector' => '{{WRAPPER}} .team_text span',
      ]
    );
    // counter color
    $this->add_control(
      'designation_color',
      [
        'label' => esc_html__('Color', 'bruno'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .team_text span' => 'color: {{VALUE}}',
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

    if (!empty($settings['teams'])) :
      $html .= '
          <div class="team_members_list d-flex justify-content-center">';
      $n = 0;
      foreach ($settings['teams'] as $team) :
        $n++;
        $html .= '<div class="single_team_members wow fadeInUp" data-wow-delay="0.' . $n . 's" data-wow-duration="1.' . $n . 's" >
              <div class="team_img">
                <img src="' . $team['team_image']['url'] . '" alt="' . $team['team_name'] . '" />
              </div>
              <div class="team_text">
                <h3>' . $team['team_name'] . '</h3>
                <span>' . $team['team_designation'] . '</span>
              </div>
            </div>';
      endforeach;
      $html .= '</div>
    ';
    endif;

    echo $html;
  }
}
