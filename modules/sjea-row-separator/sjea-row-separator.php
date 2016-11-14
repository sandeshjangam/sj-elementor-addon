<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_SJEaRowSeparator extends Widget_Base {

	public function get_name() {
		return 'sjea-row-separator';
	}

	public function get_title() {
		return __( 'SJEA - Row Separator', 'elementor' );
	}

	public function get_icon() {
		return 'divider-shape';
	}

	protected function _register_controls() {

        $this->start_controls_section(
            'general_section',
            [
                'label' => __( 'General Setting', 'elementor' )
            ]
        );

		$this->add_control(
				'enable_separator',
				[
						'label' => __( 'Enable Separator', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
								'above' => __( 'Top Separator', 'elementor' ),
								'below' => __( 'Bottom Separator', 'elementor' ),
						],
						'default' => 'above',

				]
		);

		$this->add_control(
				'separator_style',
				[
						'label' => __( 'Separator Style', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'triangle_svg'		 	=>	__( 'Triangle', 'elementor' ),
							'xlarge_triangle'		=>	__( 'Big Triangle', 'elementor' ),
							'xlarge_triangle_left'	=>	__( 'Big Triangle Left', 'elementor' ),
							'xlarge_triangle_right'	=>	__( 'Big Triangle Right', 'elementor' ),
							'circle_svg'		 	=>	__( 'Half Circle', 'elementor' ),
							'xlarge_circle'		 	=>	__( 'Curve Center', 'elementor' ),
							'curve_up'		 		=>	__( 'Curve Left', 'elementor' ),
							'curve_down'		 	=>	__( 'Curve Right', 'elementor' ),
							'tilt_left'		 		=>	__( 'Tilt Left', 'elementor' ),
							'tilt_right'		 	=>	__( 'Tilt Right', 'elementor' ),
							'waves'		 			=>	__( 'Waves', 'elementor' ),
							'clouds'		 		=>	__( 'Clouds', 'elementor' )
						],
						'default' => 'xlarge_triangle',

				]
		);

		$this->add_control(
				'separator_color',
				[
						'label' => __( 'Separator Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'scheme' => [
								'type' => Scheme_Color::get_type(),
								'value' => Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} svg' => 'fill:{{VALUE}}',
						],
				]
		);

		$this->add_control(
				'separator_height',
				[
						'type' => Controls_Manager::NUMBER,
						'label' => __( 'Separator Height (in px)', 'elementor' ),
						'placeholder' => __( '75', 'elementor' ),
						'default' => __( '75', 'elementor' ),
				]
		);

		$this->end_controls_section();
	}

	protected function render( ) {
        
        $settings = $this->get_settings();
		
		include SJ_EA_DIR . 'modules/sjea-row-separator/includes/frontend.php';
	}


}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_SJEaRowSeparator() );