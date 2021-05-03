<?php

class bt_bb_floating_image extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'image'      					=> '',
			'shape'  						=> '',
			'horizontal_position'  			=> 'left',
			'vertical_position'  			=> 'top',
			'animation_style'  				=> 'ease_out',
			'animation_delay'  				=> 'default',
			'animation_duration'  			=> '',
			'animation_speed'  				=> '1.0',
			'lazy_load'  					=> 'no'
		) ), $atts, $this->shortcode ) );
		
		wp_enqueue_script(
			'bt_bb_floating_image',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_floating_image/bt_bb_floating_image.js',
			array( 'jquery' ),
			'',
			true
		);

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}
		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		if ( $horizontal_position != '' ) {
			$class[] = $this->shortcode . '_horizontal_position' . '_' . $horizontal_position;
		}
		if ( $vertical_position != '' ) {
			$class[] = $this->shortcode . '_vertical_position' . '_' . $vertical_position;
		}
		if ( $animation_delay != '' ) {
			$class[] = $this->shortcode . '_animation_delay' . '_' . $animation_delay;
		}
		if ( $animation_duration != '' ) {
			$class[] = $this->shortcode . '_animation_duration' . '_' . $animation_duration;
		}
		if ( $animation_style != '' ) {
			$class[] = $this->shortcode . '_animation_style' . '_' . $animation_style;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );		
		$class_attr = implode( ' ', $class );
		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}
	
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}


		$output = '';

		if ( $image != '' ) {
			$output .=  '<div class="' . esc_attr( $this->shortcode . '_image') . '" data-speed="' . esc_attr( $animation_speed ) . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" shape="' . esc_attr( $shape ) . '" size="full" lazy_load="' . esc_attr( $lazy_load ) . '"]' ) . '</div>';	
		}
		
		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . ' data-speed="' . esc_attr( $animation_speed ) . '">' . ( $output ) . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Floating image', 'novalab' ), 'description' => esc_html__( 'Absolute positioned floating image', 'novalab' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'novalab' ) 
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Image shape', 'novalab' ),
					'value' => array(
						esc_html__( 'Square', 'novalab' ) 					=> 'square',
						esc_html__( 'Soft Rounded', 'novalab' ) 			=> 'soft-rounded',
						esc_html__( 'Hard Rounded', 'novalab' ) 			=> 'hard-rounded',
						esc_html__( 'Hexagon', 'novalab' ) 					=> 'hexagon',
						esc_html__( 'Rounded triangle', 'novalab' ) 		=> 'triangle',
						esc_html__( 'Oval', 'novalab' ) 					=> 'oval'
					)
				),
				array( 'param_name' => 'vertical_position', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'heading' => esc_html__( 'Vertical position', 'novalab' ), 
					'value' => array(
						esc_html__( 'Default', 'novalab' ) 				=> 'default',
						esc_html__( 'Top (absolute)', 'novalab' ) 		=> 'top',
						esc_html__( 'Middle (absolute)', 'novalab' ) 	=> 'middle',
						esc_html__( 'Bottom (absolute)', 'novalab' ) 	=> 'bottom'
					)
				),
				array( 'param_name' => 'horizontal_position', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'heading' => esc_html__( 'Horizontal position', 'novalab' ), 
					'value' => array(
						esc_html__( 'Default', 'novalab' ) 				=> 'default',
						esc_html__( 'Left (absolute)', 'novalab' ) 		=> 'left',
						esc_html__( 'Center (absolute)', 'novalab' ) 	=> 'center',
						esc_html__( 'Right (absolute)', 'novalab' ) 	=> 'right'
					)
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'no', 'heading' => esc_html__( 'Lazy load this image', 'novalab' ),
					'value' => array(
						esc_html__( 'No', 'novalab' ) 	=> 'no',
						esc_html__( 'Yes', 'novalab' ) 	=> 'yes'
					)
				),
				array( 'param_name' => 'animation_style', 'preview' => true, 'default' => 'ease_out', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'novalab' ), 'heading' => esc_html__( 'Animation style (check https://easings.net/en)', 'novalab' ), 
					'value' => array(
						esc_html__( 'Ease out (default)', 'novalab' ) 		=> 'ease_out',
						esc_html__( 'Ease out sine', 'novalab' ) 			=> 'ease_out_sine',
						esc_html__( 'Ease in', 'novalab' ) 					=> 'ease_in',
						esc_html__( 'Ease in sine', 'novalab' ) 			=> 'ease_in_sine',
						esc_html__( 'Ease in out', 'novalab' ) 				=> 'ease_in_out',
						esc_html__( 'Ease in out sine', 'novalab' ) 		=> 'ease_in_out_sine',
						esc_html__( 'Ease in out bounce', 'novalab' ) 		=> 'ease_in_out_back'
					)
				),
				array( 'param_name' => 'animation_delay', 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'novalab' ), 'heading' => esc_html__( 'Animation delay', 'novalab' ), 
					'value' => array(
						esc_html__( 'Default', 'novalab' ) 				=> 'default',
						esc_html__( '0ms', 'novalab' ) 					=> '0',
						esc_html__( '100ms', 'novalab' ) 				=> '100',
						esc_html__( '200ms', 'novalab' ) 				=> '200',
						esc_html__( '300ms', 'novalab' ) 				=> '300',
						esc_html__( '400ms', 'novalab' ) 				=> '400',
						esc_html__( '500ms', 'novalab' ) 				=> '500',
						esc_html__( '600ms', 'novalab' ) 				=> '600',
						esc_html__( '700ms', 'novalab' ) 				=> '700',
						esc_html__( '800ms', 'novalab' ) 				=> '800',
						esc_html__( '900ms', 'novalab' ) 				=> '900',
						esc_html__( '1000ms', 'novalab' ) 				=> '1000'
					)
				),
				array( 'param_name' => 'animation_duration', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'novalab' ), 'heading' => esc_html__( 'Animation duration', 'novalab' ), 
					'value' => array(
						esc_html__( 'Default', 'novalab' ) 				=> 'default',
						esc_html__( '0ms', 'novalab' ) 					=> '0',
						esc_html__( '100ms', 'novalab' ) 				=> '100',
						esc_html__( '200ms', 'novalab' ) 				=> '200',
						esc_html__( '300ms', 'novalab' ) 				=> '300',
						esc_html__( '400ms', 'novalab' ) 				=> '400',
						esc_html__( '500ms', 'novalab' ) 				=> '500',
						esc_html__( '600ms', 'novalab' ) 				=> '600',
						esc_html__( '700ms', 'novalab' ) 				=> '700',
						esc_html__( '800ms', 'novalab' ) 				=> '800',
						esc_html__( '900ms', 'novalab' ) 				=> '900',
						esc_html__( '1000ms', 'novalab' ) 				=> '1000',
						esc_html__( '1100ms', 'novalab' ) 				=> '1100',
						esc_html__( '1200ms', 'novalab' ) 				=> '1200',
						esc_html__( '1300ms', 'novalab' ) 				=> '1300',
						esc_html__( '1400ms', 'novalab' ) 				=> '1400',
						esc_html__( '1500ms', 'novalab' ) 				=> '1500',
						esc_html__( '2000ms', 'novalab' ) 				=> '2000',
						esc_html__( '2500ms', 'novalab' ) 				=> '2500',
						esc_html__( '3000ms', 'novalab' ) 				=> '3000',
						esc_html__( '3500ms', 'novalab' ) 				=> '3500',
						esc_html__( '4000ms', 'novalab' ) 				=> '4000',
						esc_html__( '5000ms', 'novalab' ) 				=> '5000',
						esc_html__( '6000ms', 'novalab' ) 				=> '6000'
					)
				),
				array( 'param_name' => 'animation_speed', 'preview' => true, 'default' => '1.0', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'novalab' ), 'heading' => esc_html__( 'Animation s', 'novalab' ), 
					'value' => array(
						esc_html__( '0.4 (very short)', 'novalab' ) 		=> '0.4',
						esc_html__( '0.6', 'novalab' ) 						=> '0.6',
						esc_html__( '0.8', 'novalab' ) 						=> '0.8',
						esc_html__( '1.0', 'novalab' ) 						=> '1.0',
						esc_html__( '1.2 (default)', 'novalab' ) 			=> '1.2',
						esc_html__( '1.4', 'novalab' ) 						=> '1.4',
						esc_html__( '1.6 (long)', 'novalab' ) 				=> '1.6',
						esc_html__( '1.8', 'novalab' ) 						=> '1.8',
						esc_html__( '2.0 (very long)', 'novalab' ) 			=> '2.0',
						esc_html__( '2.5 (very very long)', 'novalab' ) 	=> '2.5'
					)
				)
			)
		) );
	}
}