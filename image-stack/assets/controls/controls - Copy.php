<?php
use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

//Image Item Section.
$this->start_controls_section(
	'content_section',
	array(
		'label' => __( 'Content', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new Repeater();
$repeater->add_control(
	'content_heading',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-for-elementor' ),
		'type'  => Controls_Manager::HEADING,
	)
);
$repeater->add_control(
	'item_title',
	array(
		'label'       => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__( 'Type your title here', 'wpmozo-addons-for-elementor' ),
	)
);
$repeater->add_control(
	'use_icon',
	array(
		'label'        => esc_html__( 'Use Icon', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
	)
);
$repeater->add_responsive_control(
	'item_icon',
	array(
		'label'     => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::ICONS,
		'default'   => array(
			'value'   => 'far fa-star',
			'library' => 'fa-regular',
		),
		'condition' => array(
			'use_icon' => 'yes',
		),
	)
);
$repeater->add_control( 
	'item_image',
	array( 
		'label'   => __( 'Image', 'wpmozo-addons-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array( 
			'url' => Utils::get_placeholder_image_src(),
		 ),
		 'condition' => array(
			 'use_icon!' => 'yes',
		 ),
	 )
 );
 $repeater->add_control(
	'item_image_alt_text',
	array(
		'label'       => esc_html__( 'Image Alt Text', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'condition' => array(
			'use_icon!' => 'yes',
		),
	)
);
$repeater->add_control(
	'link_heading',
	array(
		'label' => esc_html__( 'Link', 'wpmozo-addons-for-elementor' ),
		'type'  => Controls_Manager::HEADING,
		'separator' => 'before',
	)
);
$repeater->add_control(
	'item_link_url',
	array(
		'label'         => esc_html__( 'Link URL', 'wpmozo-addons-for-elementor' ),
		'type'          => Controls_Manager::URL,
		'placeholder'   => esc_html__( 'Enter url', 'wpmozo-addons-for-elementor' ),
		'show_external' => true,
		'default'       => array(
			'url'         => '#',
			'is_external' => true,
			'nofollow'    => true,
		),
	)
);
$repeater->add_control(
	'item_background_heading',
	array(
		'label' => esc_html__( 'Background', 'wpmozo-addons-for-elementor' ),
		'type'  => Controls_Manager::HEADING,
		'separator' => 'before',
	)
);
$repeater->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'     => 'item_background',
		'types'    => array( 'classic', 'gradient' ),
		'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} + .wpmozo_background_switcher_image',
	)
);
$this->add_control(
	'item_list',
	array(
		'label'       => __( 'Add New Image Item', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::REPEATER,
		'fields'      => $repeater->get_controls(),
		'title_field' => '{{{ item_title }}}',

	)
);
$this->end_controls_section();
$this->start_controls_section(
	'display_tab',
	array(
		'label' => esc_html__( 'Display', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_responsive_control(
	'item_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
		'options'   => array(
			'left'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'text-align: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'item_size',
	array(
		'label'          => esc_html__( 'Image/Icon Size', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 500,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 90,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 90,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 90,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_background_switcher_item' => 'width: {{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'item_shrink',
	array(
		'label'          => esc_html__( 'Image/Icon Shrink', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 250,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 40,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 40,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 40,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'selectors'      => array(
			'{{WRAPPER}} .dipl_image_stack_item:not(:first-child)' => 'margin-left: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'item_spacing',
	array(
		'label'          => esc_html__( 'Image/Icon Spacing', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 150,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 10,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'selectors'      => array(
			'{{WRAPPER}} .dipl_image_stack_item:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_control(
	'enable_tooltip',
	array(
		'label'        => esc_html__( 'Enable Tooltip', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);
$this->end_controls_section();
// Style controls.
$this->start_controls_section( 
	'icon_styling_tab',
	array( 
		'label' => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
);
$this->start_controls_tabs( 'icon_tabs' );
$this->start_controls_tab(
	'icon_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_control(
	'icon_color',
	array(
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'color: {{VALUE}}',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'icon_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_control(
	'icon_color_hover',
	array(
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title:hover' => 'color: {{VALUE}}',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'icon_size',
	array(
		'label'     => esc_html__( 'Icon Size', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'separator' => 'before',
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section( 
	'tooltip_styling_tab',
	array( 
		'label' => esc_html__( 'Tooltip Styling', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
 $this->add_control( 
	'entrance_animation',
	array( 
		'label'       => esc_html__( 'Entrance Animation', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'fade',
		'options'     => array( 
			'fade'  => esc_html__( 'Fade ', 'wpmozo-addons-for-elementor' ),
			'grow'  => esc_html__( 'Grow', 'wpmozo-addons-for-elementor' ),
			'swing' => esc_html__( 'Swing', 'wpmozo-addons-for-elementor' ),
			'slide' => esc_html__( 'Slide', 'wpmozo-addons-for-elementor' ),
			'fall'  => esc_html__( 'Fall', 'wpmozo-addons-for-elementor' ),
		 ),
		'render_type' => 'template',
	 )
 );
 $this->add_control(
	'animation_duration',
	array(
		'label'     => esc_html__( 'Animation Duration', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'ms' => array(
				'min'  => 1,
				'max'  => 1000,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'transition: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_control(
	'show_speech_bubble',
	array(
		'label'        => esc_html__( 'Show Speech Bubble', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);
$this->add_control(
	'make_interactive_tooltip',
	array(
		'label'        => esc_html__( 'Make Interactive Tooltip', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
	)
);
$this->add_responsive_control(
   'tooltip_width',
   array(
	   'label'     => esc_html__( 'Tooltip Width', 'wpmozo-addons-for-elementor' ),
	   'type'      => Controls_Manager::SLIDER,
	   'range'     => array(
		   'px' => array(
			   'min'  => 1,
			   'max'  => 1000,
			   'step' => 1,
		   ),
		   'default'        => array(
			   'size' => 200,
			   'unit' => 'px',
		   ),
	   ),
	   'selectors' => array(
		   '{{WRAPPER}} .wpmozo_bg_switcher_title' => 'width: {{SIZE}}{{UNIT}};',
	   ),
   )
);
$this->add_responsive_control(
	'tooltip_padding',
	array(
		'label'      => esc_html__( 'Tooltip Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'top'    => '5',
			'right'  => '10',
			'bottom' => '5',
			'left'   => '10',
			'unit'   => 'px',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_read_more_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'tooltip_background',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label'   => esc_html__( 'Tooltip Background', 'wpmozo-addons-for-elementor' ),
				'default' => 'classic',
			),
		),
		'toggle'         => false,
		'selector'       => '{{WRAPPER}} .wpmozo_read_more_button',
	)
);
$this->end_controls_section();
$this->start_controls_section( 
	'tooltip_text_tab',
	array( 
		'label' => esc_html__( 'Tooltip Text', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
);
$this->start_controls_tabs( 'tooltip_text_tabs' );
$this->start_controls_tab(
	'tooltip_text_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'tooltip_text_color',
	array(
		'label'     => esc_html__( 'Tooltip Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#ffffff',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'color: {{VALUE}}',
		),
	)
);
$this->add_responsive_control(
	'tooltip_text_size',
	array(
		'label'     => esc_html__( 'Tooltip Text Size', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Tooltip Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'tooltip_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_title',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'tooltip_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'tooltip_text_color_hover',
	array(
		'label'     => esc_html__( 'Tooltip Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title:hover' => 'color: {{VALUE}}',
		),
	)
);
$this->add_responsive_control(
	'tooltip_text_size_hover',
	array(
		'label'     => esc_html__( 'Tooltip Text Size', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Tooltip Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'tooltip_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_title:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_control(
	'divider',
	array(
		'type' => Controls_Manager::DIVIDER,
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Tooltip Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'tooltip_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_title',
	)
);
$this->end_controls_section();