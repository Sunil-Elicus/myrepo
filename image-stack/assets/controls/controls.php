<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
// Marker section.
$this->start_controls_section(
	'marker',
	array(
		'label' => __( 'Image Stack Item', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
	$repeater = new Repeater();
	$repeater->start_controls_tabs(
		'marker_and_tooltip_content_control_tab',
		array()
	);

		// Tab 1.
		$repeater->start_controls_tab(
			'marker_content_tab',
			array(
				'label' => esc_html__( 'Stack Item', 'wpmozo-addons-for-elementor' ),
			)
		);

			$repeater->add_control(
				'marker_type',
				array(
					'label'       => esc_html__( 'Stack Type', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::SELECT,
					'default'     => 'icon',
					'options'     => array(
						'icon'  => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
						'text'  => esc_html__( 'Text', 'wpmozo-addons-for-elementor' ),
						'image' => esc_html__( 'Image', 'wpmozo-addons-for-elementor' ),
					),
					'render_type' => 'template',
				)
			);
			$repeater->add_control(
				'marker_icon',
				array(
					'label'       => esc_html__( 'Stack Icon', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::ICONS,
					'default'     => array(
						'value'   => 'fas fa-circle',
						'library' => 'fa-solid',
					),
					'recommended' => array(
						'fa-solid'   => array(
							'circle',
							'dot-circle',
							'square-full',
						),
						'fa-regular' => array(
							'circle',
							'dot-circle',
							'square-full',
						),
					),
					'condition'   => array(
						'marker_type' => 'icon',
					),
				)
			);
			$repeater->add_control(
				'marker_text',
				array(
					'label'       => __( 'Stack Text', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'default'     => 'Marker',
					'condition'   => array(
						'marker_type' => 'text',
					),
				)
			);
			$repeater->add_control(
				'marker_image',
				array(
					'label'     => __( 'Stack Image', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::MEDIA,
					'default'   => array(
						'url' => Utils::get_placeholder_image_src(),
					),
					'condition' => array(
						'marker_type' => 'image',
					),
				)
			);

			$repeater->end_controls_tab();

			// Tab 2.
			$repeater->start_controls_tab(
				'tooltip_content_tab',
				array(
					'label' => esc_html__( 'Tooltip', 'wpmozo-addons-for-elementor' ),
				)
			);
			$repeater->add_control(
				'tooltip_content_heading',
				array(
					'label' => esc_html__( 'Tooltip Content', 'wpmozo-addons-for-elementor' ),
					'type'  => Controls_Manager::HEADING,
				)
			);
			$repeater->add_control(
				'tooltip_text',
				array(
					'label'       => esc_html__( 'Tooltip Text', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::WYSIWYG,
					'default'     => esc_html__( 'Tooltip Text', 'wpmozo-addons-for-elementor' ),
					'placeholder' => esc_html__( 'Type your Tooltip Text here', 'wpmozo-addons-for-elementor' ),
				)
			);

			$repeater->end_controls_tab();
			$repeater->end_controls_tabs();

			// Marker styling.
			$repeater->add_control(
				'marker_styling',
				array(
					'label'     => esc_html__( 'Item Setting', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
				)
			);
			$repeater->add_responsive_control(
				'marker_shape',
				array(
					'label'     => esc_html__( 'Item Shape', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => '0.0',
					'options'   => array(
						'0.0' => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
						'0'   => esc_html__( 'Square', 'wpmozo-addons-for-elementor' ),
						'50'  => esc_html__( 'Circle', 'wpmozo-addons-for-elementor' ),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper {{CURRENT_ITEM}}' => 'border-radius: {{VALUE}}%;',
					),
				)
			);
			$repeater->add_responsive_control(
				'marker_shape_background_color',
				array(
					'label'     => esc_html__( 'Item Shape Background', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
					),
					'condition' => array(
						'marker_shape' => array( '0', '50' ),
					),
					'default'   => '#FFFFFF',
				)
			);
			// Marker Element Styling.
			$repeater->add_control(
				'marker_element_styling',
				array(
					'label'     => esc_html__( 'Item Styling', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
				)
			);
			$repeater->add_responsive_control(
				'icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} .wpmozo_ae_marker_icon' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} svg.wpmozo_ae_marker_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
					),
					'condition' => array(
						'marker_type' => 'icon',
					),
				)
			);
			$repeater->add_responsive_control(
				'icon_font_size',
				array(
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Icon Font Size', 'wpmozo-addons-for-elementor' ),
					'range'     => array(
						'px' => array(
							'min' => 0,
							'max' => 100,
						),
					),
					'devices'   => array( 'desktop', 'tablet', 'mobile' ),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} .wpmozo_ae_marker_icon' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} svg.wpmozo_ae_marker_icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					),
					'condition' => array(
						'marker_type' => 'icon',
					),
				)
			);

			$repeater->add_responsive_control(
				'marker_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} span.wpmozo-marker-wrapper.marker-type-text' => 'color: {{VALUE}};',
					),
					'condition' => array(
						'marker_type' => 'text',
					),
				)
			);
			$repeater->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'      => 'marker_text_typography',
					'selector'  => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} span.wpmozo-marker-wrapper.marker-type-text',
					'condition' => array(
						'marker_type' => 'text',
					),
				)
			);

			$repeater->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'      => 'marker_text_shadow',
					'selector'  => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} span.wpmozo-marker-wrapper.marker-type-text',
					'condition' => array(
						'marker_type' => 'text',
					),
				)
			);
			$repeater->add_responsive_control(
				'marker_image_size',
				array(
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Image Size', 'wpmozo-addons-for-elementor' ),
					'range'     => array(
						'px' => array(
							'min' => 32,
							'max' => 600,
						),
					),
					'devices'   => array( 'desktop', 'tablet', 'mobile' ),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} span.wpmozo-marker-wrapper.marker-type-image img' => 'width: {{SIZE}}{{UNIT}};',
					),
					'condition' => array(
						'marker_type' => 'image',
					),
				)
			);
			$repeater->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'      => 'marker_image_border',
					'selector'  => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} span.wpmozo-marker-wrapper.marker-type-image img',
					'condition' => array(
						'marker_type' => 'image',
					),
				)
			);
			$repeater->add_responsive_control(
				'marker_image_border_radius',
				array(
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Image Border Radius', 'wpmozo-addons-for-elementor' ),
					'range'     => array(
						'px' => array(
							'min' => 1,
							'max' => 100,
						),
					),
					'devices'   => array( 'desktop', 'tablet', 'mobile' ),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item{{CURRENT_ITEM}} span.wpmozo-marker-wrapper.marker-type-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
					),
					'condition' => array(
						'marker_type' => 'image',
					),
				)
			);

			// Marker spacing controls.
			$repeater->add_control(
				'marker_spacing_heading',
				array(
					'label'     => esc_html__( 'Spacing', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
				)
			);
			$repeater->add_responsive_control(
				'marker_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper {{CURRENT_ITEM}} span.wpmozo-marker-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			// Marker box shadow controls.
			$repeater->add_control(
				'marker_box_shadow_heading',
				array(
					'label'     => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
				)
			);
			$repeater->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'     => 'marker_box_shadow',
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper {{CURRENT_ITEM}} span.wpmozo-marker-wrapper',
				)
			);
			// Marker filter controls.
			$repeater->add_control(
				'marker_filters_heading',
				array(
					'label'     => esc_html__( 'Filters', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
				)
			);
			$repeater->add_group_control(
				Group_Control_Css_Filter::get_type(),
				array(
					'name'     => 'marker_filters',
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper {{CURRENT_ITEM}} span.wpmozo-marker-wrapper',
				)
			);
			$this->add_control(
				'marker_list',
				array(
					'type'        => Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'default'     => array(
						array(
							'marker_icon' => array(
								'value'   => 'fas fa-circle',
								'library' => 'fa-solid',
							),
							'marker_type' => 'icon',
						),

					),
					'title_field' => '{{{ tooltip_text }}}',
				)
			);
			$this->end_controls_section();


			// Hotspot setting controls.
			$this->start_controls_section(
				'hotspot_settings',
				array(
					'label' => esc_html__( 'Setting', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_control(
				'show_tooltip_on',
				array(
					'label'       => esc_html__( 'Show Tooltip On', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::SELECT,
					'default'     => 'hover',
					'options'     => array(
						'hover' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
						'click' => esc_html__( 'Click', 'wpmozo-addons-for-elementor' ),
					),
					'render_type' => 'template',
				)
			);
			$this->end_controls_section();

			// Global marker styling.
			$this->start_controls_section(
				'global_marker_styling',
				array(
					'label' => esc_html__( 'Global Styling', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->add_control(
				'use_pulse_animation',
				array(
					'label'        => esc_html__( 'Use Pulse Animation', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Show', 'wpmozo-addons-for-elementor' ),
					'label_off'    => esc_html__( 'Hide', 'wpmozo-addons-for-elementor' ),
					'return_value' => 'yes',
					'default'      => 'no',
				)
			);
			$this->end_controls_section();


			// Global Marker Icon styling.
			$this->start_controls_section(
				'global_icon_styling',
				array(
					'label' => esc_html__( 'Global Icon Styling', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->add_responsive_control(
				'global_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item .wpmozo_ae_marker_icon' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item svg.wpmozo_ae_marker_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
					),
				)
			);
			$this->add_responsive_control(
				'global_icon_font_size',
				array(
					'type'           => Controls_Manager::SLIDER,
					'label'          => esc_html__( 'Icon Font Size', 'wpmozo-addons-for-elementor' ),
					'range'          => array(
						'px' => array(
							'min' => 0,
							'max' => 100,
						),
					),
					'devices'        => array( 'desktop', 'tablet', 'mobile' ),
					'default'        => array(
						'size' => 32,
						'unit' => 'px',
					),
					'tablet_default' => array(
						'size' => 32,
						'unit' => 'px',
					),
					'mobile_default' => array(
						'size' => 32,
						'unit' => 'px',
					),
					'selectors'      => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item .wpmozo_ae_marker_icon' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item svg.wpmozo_ae_marker_icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_section();


			// Global Marker Image styling.
			$this->start_controls_section(
				'global_marker_image_styling',
				array(
					'label' => esc_html__( 'Global Image Styling', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,

				)
			);

			$this->add_responsive_control(
				'global_marker_image_size',
				array(
					'type'           => Controls_Manager::SLIDER,
					'label'          => esc_html__( 'Image Size', 'wpmozo-addons-for-elementor' ),
					'range'          => array(
						'px' => array(
							'min' => 32,
							'max' => 600,
						),
					),
					'devices'        => array( 'desktop', 'tablet', 'mobile' ),
					'default'        => array(
						'size' => 32,
						'unit' => 'px',
					),
					'tablet_default' => array(
						'size' => 32,
						'unit' => 'px',
					),
					'mobile_default' => array(
						'size' => 32,
						'unit' => 'px',
					),
					'selectors'      => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item span.wpmozo-marker-wrapper.marker-type-image img' => 'width: {{SIZE}}{{UNIT}};',
					),

				)
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'     => 'global_marker_image_border',
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item span.wpmozo-marker-wrapper.marker-type-image img',
				)
			);
			$this->add_responsive_control(
				'global_marker_image_border_radius',
				array(
					'type'           => Controls_Manager::SLIDER,
					'label'          => esc_html__( 'Image Border Radius', 'wpmozo-addons-for-elementor' ),
					'range'          => array(
						'px' => array(
							'min' => 1,
							'max' => 100,
						),
					),
					'devices'        => array( 'desktop', 'tablet', 'mobile' ),
					'default'        => array(
						'size' => 0,
						'unit' => 'px',
					),
					'tablet_default' => array(
						'size' => 0,
						'unit' => 'px',
					),
					'mobile_default' => array(
						'size' => 0,
						'unit' => 'px',
					),
					'selectors'      => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item span.wpmozo-marker-wrapper.marker-type-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
					),
				)
			);

			$this->end_controls_section();

			// Global Marker Text styling.
			$this->start_controls_section(
				'global_marker_text_styling',
				array(
					'label' => esc_html__( 'Global Text Styling', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'global_marker_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item span.wpmozo-marker-wrapper.marker-type-text' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'marker_text_typography',
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item span.wpmozo-marker-wrapper.marker-type-text',
				)
			);

			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'global_marker_text_shadow',
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item span.wpmozo-marker-wrapper.marker-type-text',
				)
			);

			$this->add_responsive_control(
				'global_marker_text_alignment',
				array(
					'label'       => esc_html__( 'Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array( '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .wpmozo-image-hotspot-single-item span.wpmozo-marker-wrapper.marker-type-text' => 'text-align: {{VALUE}};' ),
				)
			);
			$this->end_controls_section();

			// Global Tooltip.
			$this->start_controls_section(
				'global_tooltip',
				array(
					'label' => esc_html__( 'Tooltip Styling', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'tooltip_general_and_background_tabs' );
			// Tab 1.
			$this->start_controls_tab(
				'global_tooltip_general_tab',
				array(
					'label' => esc_html__( 'General', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'tooltip_animation_type',
				array(
					'label'   => esc_html__( 'Animation Type', 'wpmozo-addons-for-elementor' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'away',
					'options' => array(
						'away'        => esc_html__( 'Away', 'wpmozo-addons-for-elementor' ),
						'toward'      => esc_html__( 'Toward', 'wpmozo-addons-for-elementor' ),
						'scale'       => esc_html__( 'Scale', 'wpmozo-addons-for-elementor' ),
						'perspective' => esc_html__( 'Perspective', 'wpmozo-addons-for-elementor' ),
					),
				)
			);

			$this->add_control(
				'animation_type_away',
				array(
					'label'     => esc_html__( 'Select Animation', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'shift-away',
					'options'   => array(
						'shift-away'         => esc_html__( 'Shift Away', 'wpmozo-addons-for-elementor' ),
						'shift-away-subtle'  => esc_html__( 'Shift Away Subtle', 'wpmozo-addons-for-elementor' ),
						'shift-away-extreme' => esc_html__( 'Shift Away Extreme', 'wpmozo-addons-for-elementor' ),
					),
					'condition' => array(
						'tooltip_animation_type' => 'away',
					),
				)
			);
			$this->add_control(
				'animation_type_toward',
				array(
					'label'     => esc_html__( 'Select Animation', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'shift-toward',
					'options'   => array(
						'shift-toward'         => esc_html__( 'Shift Toward', 'wpmozo-addons-for-elementor' ),
						'shift-toward-subtle'  => esc_html__( 'Shift Toward Subtle', 'wpmozo-addons-for-elementor' ),
						'shift-toward-extreme' => esc_html__( 'Shift Toward Extreme', 'wpmozo-addons-for-elementor' ),
					),
					'condition' => array(
						'tooltip_animation_type' => 'toward',
					),
				)
			);

			$this->add_control(
				'animation_type_scale',
				array(
					'label'     => esc_html__( 'Select Animation', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'scale',
					'options'   => array(
						'scale'         => esc_html__( 'Scale', 'wpmozo-addons-for-elementor' ),
						'scale-subtle'  => esc_html__( 'Scale Subtle', 'wpmozo-addons-for-elementor' ),
						'scale-extreme' => esc_html__( 'Scale Extreme', 'wpmozo-addons-for-elementor' ),
					),
					'condition' => array(
						'tooltip_animation_type' => 'scale',
					),
				)
			);

			$this->add_control(
				'animation_type_perspective',
				array(
					'label'     => esc_html__( 'Select Animation', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::SELECT,
					'default'   => 'perspective',
					'options'   => array(
						'perspective'         => esc_html__( 'Perspective', 'wpmozo-addons-for-elementor' ),
						'perspective-subtle'  => esc_html__( 'Perspective Subtle', 'wpmozo-addons-for-elementor' ),
						'perspective-extreme' => esc_html__( 'Perspective Extreme', 'wpmozo-addons-for-elementor' ),
					),
					'condition' => array(
						'tooltip_animation_type' => 'perspective',
					),
				)
			);

			$this->add_control(
				'tooltip_animation_duration',
				array(
					'type'    => Controls_Manager::SLIDER,
					'label'   => esc_html__( 'Animation Duration ( ms )', 'wpmozo-addons-for-elementor' ),
					'range'   => array(
						'px' => array(
							'min'  => 100,
							'max'  => 5000,
							'step' => 100,
						),
					),
					'default' => array(
						'size' => 500,
						'unit' => 'px',
					),
					'devices' => array( 'desktop', 'tablet', 'mobile' ),
				)
			);

			$this->add_control(
				'show_speech_bubble',
				array(
					'label'        => esc_html__( 'Show Speech Bubble', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
					'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
					'return_value' => 'yes',
					'default'      => 'yes',
				)
			);
			$this->add_control(
				'make_interactive_tooltip',
				array(
					'label'        => esc_html__( 'Make Interactive Tooltip', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
					'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
					'return_value' => 'yes',
					'default'      => 'no',
				)
			);
			$this->add_responsive_control(
				'global_tooltip_width',
				array(
					'type'           => Controls_Manager::SLIDER,
					'label'          => esc_html__( 'Tooltip Width', 'wpmozo-addons-for-elementor' ),
					'range'          => array(
						'px' => array(
							'min' => 1,
							'max' => 1000,
						),

					),
					'devices'        => array( 'desktop', 'tablet', 'mobile' ),
					'default'        => array(
						'size' => 200,
						'unit' => 'px',
					),
					'tablet_default' => array(
						'size' => 200,
						'unit' => 'px',
					),
					'mobile_default' => array(
						'size' => 200,
						'unit' => 'px',
					),
					'selectors'      => array(
						'{{WRAPPER}} .tippy-box' => 'width: {{SIZE}}{{UNIT}};',
					),
				)
			);

			$this->add_responsive_control(
				'global_tooltip_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->end_controls_tab();
			// Tab 2.
			$this->start_controls_tab(
				'global_tooltip_background_tab',
				array(
					'label' => esc_html__( 'Background', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'global_tooltip_background',
					'types'    => array( 'classic', 'gradient', 'video' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content , .wpmozo-wrapper-{{ID}}',
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->end_controls_section();

			// Global Tooltip Heading.
			$this->start_controls_section(
				'global_heading_styling',
				array(
					'label' => esc_html__( 'Tooltip Heading', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'global_heading_tabs' );
			$this->start_controls_tab(
				'h1_heading_tab',
				array(
					'label' => '<i class="eicon-editor-h1"></i>',
				)
			);
			$this->add_responsive_control(
				'tooltip_h1_heading_color',
				array(
					'label'     => esc_html__( 'Heading H1 Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h1' => 'color: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h1' => 'color: {{VALUE}};',

					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'tooltip_h1_heading_typography',
					'label'    => esc_html__( 'Heading H1 Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h1 , .wpmozo-wrapper-{{ID}} h1',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'tooltip_h1_heading_text_shadow',
					'label'    => esc_html__( 'Heading H1 Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h1 , .wpmozo-wrapper-{{ID}} h1',
				)
			);

			$this->add_responsive_control(
				'tooltip_h1_heading_alignment',
				array(
					'label'       => esc_html__( 'Heading H1 Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h1' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h1' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'h2_heading_tab',
				array(
					'label' => '<i class="eicon-editor-h2"></i>',
				)
			);
			$this->add_responsive_control(
				'tooltip_h2_heading_color',
				array(
					'label'     => esc_html__( 'Heading H2 Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h2' => 'color: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h2' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'tooltip_h2_heading_typography',
					'label'    => esc_html__( 'Heading H2 Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h2 , .wpmozo-wrapper-{{ID}} h2',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'tooltip_h2_heading_text_shadow',
					'label'    => esc_html__( 'Heading H2 Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h2 , .wpmozo-wrapper-{{ID}} h2',
				)
			);

			$this->add_responsive_control(
				'tooltip_h2_heading_alignment',
				array(
					'label'       => esc_html__( 'Heading H2 Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'flex-start' =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center'     =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'flex-end'   =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h2' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h2' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'h3_heading_tab',
				array(
					'label' => '<i class="eicon-editor-h3"></i>',
				)
			);
			$this->add_responsive_control(
				'tooltip_h3_heading_color',
				array(
					'label'     => esc_html__( 'Heading H3 Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h3 , .wpmozo-wrapper-{{ID}} h3' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'tooltip_h3_heading_typography',
					'label'    => esc_html__( 'Heading H3 Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h3 , .wpmozo-wrapper-{{ID}} h3',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'tooltip_h3_heading_text_shadow',
					'label'    => esc_html__( 'Heading H3 Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h3 , .wpmozo-wrapper-{{ID}} h3',
				)
			);

			$this->add_responsive_control(
				'tooltip_h3_heading_alignment',
				array(
					'label'       => esc_html__( 'Heading H3 Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h3' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h3' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'h4_heading_tab',
				array(
					'label' => '<i class="eicon-editor-h4"></i>',
				)
			);

			$this->add_responsive_control(
				'tooltip_h4_heading_color',
				array(
					'label'     => esc_html__( 'Heading H4 Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h4' => 'color: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h4' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'tooltip_h4_heading_typography',
					'label'    => esc_html__( 'Heading H4 Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h4 , .wpmozo-wrapper-{{ID}} h4',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'tooltip_h4_heading_text_shadow',
					'label'    => esc_html__( 'Heading H4 Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h4 , .wpmozo-wrapper-{{ID}} h4',
				)
			);
			$this->add_responsive_control(
				'tooltip_h4_heading_alignment',
				array(
					'label'       => esc_html__( 'Heading H4 Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h4' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h4' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'h5_heading_tab',
				array(
					'label' => '<i class="eicon-editor-h5"></i>',
				)
			);
			$this->add_responsive_control(
				'tooltip_h5_heading_color',
				array(
					'label'     => esc_html__( 'Heading H5 Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h5' => 'color: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h5' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'tooltip_h5_heading_typography',
					'label'    => esc_html__( 'Heading H5 Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h5 , .wpmozo-wrapper-{{ID}} h5',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'tooltip_h5_heading_text_shadow',
					'label'    => esc_html__( 'Heading H5 Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h5 , .wpmozo-wrapper-{{ID}} h5',
				)
			);

			$this->add_responsive_control(
				'tooltip_h5_heading_alignment',
				array(
					'label'       => esc_html__( 'Heading H5 Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h5' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h5' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'h6_heading_tab',
				array(
					'label' => '<i class="eicon-editor-h6"></i>',
				)
			);

			$this->add_responsive_control(
				'tooltip_h6_heading_color',
				array(
					'label'     => esc_html__( 'Heading H6 Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h6' => 'color: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h6' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'tooltip_h6_heading_typography',
					'label'    => esc_html__( 'Heading H6 Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h6 , .wpmozo-wrapper-{{ID}} h6',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'tooltip_h6_heading_text_shadow',
					'label'    => esc_html__( 'Heading H6 Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h6 , .wpmozo-wrapper-{{ID}} h6',
				)
			);

			$this->add_responsive_control(
				'tooltip_h6_heading_alignment',
				array(
					'label'       => esc_html__( 'Heading H6 Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'start'  =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'end'    =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content h6' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} h6' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Global Tooltip styling.
			$this->start_controls_section(
				'global_tooltip_styling',
				array(
					'label' => esc_html__( 'Tooltip', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->start_controls_tabs( 'global_tooltip_tabs' );

			$this->start_controls_tab(
				'tooltip_text_tab',
				array(
					'label' => '<i class="eicon-text"></i>',
				)
			);
			$this->add_responsive_control(
				'tooltip_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content p , .wpmozo-wrapper-{{ID}} p' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'tooltip_text_typography',
					'label'    => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content p , .wpmozo-wrapper-{{ID}} p',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'tooltip_text_shadow',
					'label'    => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content p , .wpmozo-wrapper-{{ID}} p',
				)
			);
			$this->add_responsive_control(
				'tooltip_text_alignment',
				array(
					'label'       => esc_html__( 'Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content p' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} p' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'tooltip_link',
				array(
					'label' => '<i class="eicon-editor-link"></i>',
				)
			);

			$this->add_responsive_control(
				'tooltip_link_color',
				array(
					'label'     => esc_html__( 'Link Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content a' => 'color: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} a' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'tooltip_link_typography',
					'label'    => esc_html__( 'Link Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content a , .wpmozo-wrapper-{{ID}} a',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'tooltip_link_text_shadow',
					'label'    => esc_html__( 'Link Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content a , .wpmozo-wrapper-{{ID}} a',
				)
			);
			$this->add_responsive_control(
				'tooltip_link_alignment',
				array(
					'label'       => esc_html__( 'Link Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content a' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} a' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'order_list',
				array(
					'label' => '<i class="eicon-editor-list-ol"></i>',
				)
			);
			$this->add_responsive_control(
				'ol_text_color',
				array(
					'label'     => esc_html__( 'Order List Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content ol li , .wpmozo-wrapper-{{ID}} ol li' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'ol_text_typography',
					'label'    => esc_html__( 'Order List Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content ol li , .wpmozo-wrapper-{{ID}} ol li',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'ol_text_shadow',
					'label'    => esc_html__( 'Order List Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content ol li , .wpmozo-wrapper-{{ID}} ol li',
				)
			);
			$this->add_responsive_control(
				'ol_text_alignment',
				array(
					'label'       => esc_html__( 'Order List Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content ol li' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} ol li' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'un_order_list',
				array(
					'label' => '<i class="eicon-editor-list-ul"></i>',
				)
			);
			$this->add_responsive_control(
				'ul_text_color',
				array(
					'label'     => esc_html__( 'Unordered List Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content ul li' => 'color: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} ul li' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'ul_text_typography',
					'label'    => esc_html__( 'Unordered List Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content ul li , .wpmozo-wrapper-{{ID}} ul li',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'ul_text_shadow',
					'label'    => esc_html__( 'Unordered List Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content ul li, .wpmozo-wrapper-{{ID}} ul li',
				)
			);
			$this->add_responsive_control(
				'ul_text_alignment',
				array(
					'label'       => esc_html__( 'Unordered List Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content ul li' => 'text-align: {{VALUE}};',
						'.wpmozo-wrapper-{{ID}} ul li' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'blockquote',
				array(
					'label' => '<i class="eicon-editor-quote"></i>',
				)
			);
			$this->add_responsive_control(
				'blockquote_text_color',
				array(
					'label'     => esc_html__( 'Blockquote Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content blockquote , .wpmozo-wrapper-{{ID}} blockquote' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'blockquote_text_typography',
					'label'    => esc_html__( 'Blockquote Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content blockquote , .wpmozo-wrapper-{{ID}} blockquote',
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'blockquote_text_shadow',
					'label'    => esc_html__( 'Blockquote Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content blockquote , .wpmozo-wrapper-{{ID}} blockquote',
				)
			);
			$this->add_responsive_control(
				'blockquote_text_alignment',
				array(
					'label'       => esc_html__( 'Blockquote Text Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'   =>
							array(
								'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-left',
							),
						'center' =>
							array(
								'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-center',
							),
						'right'  =>
							array(
								'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
								'icon'  => 'eicon-text-align-right',
							),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content blockquote' => 'text-align: {{VALUE}};',
						'{{WRAPPER}} .wpmozo-image-hotspot-wrapper .tippy-content blockquote , .wpmozo-wrapper-{{ID}} blockquote' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
