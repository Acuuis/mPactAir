<?php

class bt_bb_separator extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'top_spacing'    => '',
			'bottom_spacing' => '',
			'text'			 => '',
			'border_style'   => '',
			'border_color'   => '',
			'border_width'   => '',
			'opacity'   	 => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}
		
		if ( $top_spacing != '' ) {
			$class[] = $this->prefix . 'top_spacing' . '_' . $top_spacing;
		}
		
		if ( $bottom_spacing != '' ) {
			$class[] = $this->prefix . 'bottom_spacing' . '_' . $bottom_spacing;
		}
		
		if ( $text != '' ) {
			$class[] = "btWithText";
		}

		if ( $border_style != '' ) {
			$class[] = $this->prefix . 'border_style' . '_' . $border_style;
		}

		if ( $border_color != '' ) {
			$class[] = $this->prefix . 'border_color' . '_' . $border_color;
		}

		if ( $border_width != '' ) {
			$el_style = $el_style . '; border-width: ' . $border_width;
			if ( $border_style == 'none' ) {
				$el_style = $el_style . '; border-color: transparent; border-style: solid;';
			}
		}

		if ( $opacity != '' ) {
			$el_style = $el_style . '; opacity: ' . $opacity;
		}
		
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		if ( $text != '' ) {
			$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '><span class="' . esc_attr( $this->shortcode . '_text' ) . '">' . wp_kses_post( $text ) . '</span></div>';
		} else {
			$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '></div>';
		}

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Separator', 'novalab' ), 'description' => esc_html__( 'Separator line', 'novalab' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array( 
				array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'novalab' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'novalab' ) 	=> '',
						esc_html__( 'Extra small', 'novalab' ) 	=> 'extra_small',
						esc_html__( 'Small', 'novalab' ) 		=> 'small',		
						esc_html__( 'Normal', 'novalab' ) 		=> 'normal',
						esc_html__( 'Medium', 'novalab' )	 	=> 'medium',
						esc_html__( 'Large', 'novalab' ) 		=> 'large',
						esc_html__( 'Extra large', 'novalab' ) 	=> 'extra_large',
						esc_html__( '5px', 'novalab' ) 			=> '5',
						esc_html__( '10px', 'novalab' ) 		=> '10',
						esc_html__( '15px', 'novalab' ) 		=> '15',
						esc_html__( '20px', 'novalab' ) 		=> '20',
						esc_html__( '25px', 'novalab' ) 		=> '25',
						esc_html__( '30px', 'novalab' ) 		=> '30',
						esc_html__( '35px', 'novalab' ) 		=> '35',
						esc_html__( '40px', 'novalab' ) 		=> '40',
						esc_html__( '45px', 'novalab' ) 		=> '45',
						esc_html__( '50px', 'novalab' ) 		=> '50',
						esc_html__( '60px', 'novalab' )			=> '60',
						esc_html__( '70px', 'novalab' ) 		=> '70',
						esc_html__( '80px', 'novalab' ) 		=> '80',
						esc_html__( '90px', 'novalab' ) 		=> '90',
						esc_html__( '100px', 'novalab' ) 		=> '100'
					)
				),
				array( 'param_name' => 'bottom_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Bottom spacing', 'novalab' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'novalab' ) 	=> '',
						esc_html__( 'Extra small', 'novalab' ) 	=> 'extra_small',
						esc_html__( 'Small', 'novalab' ) 		=> 'small',		
						esc_html__( 'Normal', 'novalab' ) 		=> 'normal',
						esc_html__( 'Medium', 'novalab' ) 		=> 'medium',
						esc_html__( 'Large', 'novalab' ) 		=> 'large',
						esc_html__( 'Extra large', 'novalab' ) 	=> 'extra_large',
						esc_html__( '5px', 'novalab' ) 			=> '5',
						esc_html__( '10px', 'novalab' ) 		=> '10',
						esc_html__( '15px', 'novalab' ) 		=> '15',
						esc_html__( '20px', 'novalab' ) 		=> '20',
						esc_html__( '25px', 'novalab' ) 		=> '25',
						esc_html__( '30px', 'novalab' ) 		=> '30',
						esc_html__( '35px', 'novalab' ) 		=> '35',
						esc_html__( '40px', 'novalab' ) 		=> '40',
						esc_html__( '45px', 'novalab' ) 		=> '45',
						esc_html__( '50px', 'novalab' ) 		=> '50',
						esc_html__( '60px', 'novalab' ) 		=> '60',
						esc_html__( '70px', 'novalab' ) 		=> '70',
						esc_html__( '80px', 'novalab' ) 		=> '80',
						esc_html__( '90px', 'novalab' ) 		=> '90',
						esc_html__( '100px', 'novalab' ) 		=> '100'
					)
				),	
				array( 'param_name' => 'text', 'type' => 'textfield', 'heading' => esc_html__( 'Text', 'novalab' ), 'preview' => true ),
				array( 'param_name' => 'border_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Border style', 'novalab' ), 'preview' => true,
					'value' => array(
						esc_html__( 'None', 'novalab' ) 		=> 'none',
						esc_html__( 'Solid', 'novalab' ) 		=> 'solid',
						esc_html__( 'Dotted', 'novalab' ) 		=> 'dotted',
						esc_html__( 'Dashed', 'novalab' ) 		=> 'dashed'
					)
				),
				array( 'param_name' => 'border_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Border color', 'novalab' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Inherit', 'novalab' ) 		=> 'none',
						esc_html__( 'Dark', 'novalab' ) 		=> 'dark',
						esc_html__( 'Light', 'novalab' ) 		=> 'light',
						esc_html__( 'Gray', 'novalab' ) 		=> 'gray'
					)
				),
				array( 'param_name' => 'border_width', 'type' => 'textfield', 'heading' => esc_html__( 'Border width', 'novalab' ), 'description' => esc_html__( 'E.g. 5px or 1em', 'novalab' ) ),
				array( 'param_name' => 'opacity', 'type' => 'textfield', 'heading' => esc_html__( 'Separator opacity (e.g. 0.4)', 'novalab' ) )
			)
		) );
	}
}