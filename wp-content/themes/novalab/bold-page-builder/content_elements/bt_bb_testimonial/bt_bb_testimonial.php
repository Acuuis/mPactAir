<?php

class bt_bb_testimonial extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'text'						=> '',
			'image'						=> '',			
			'name'						=> '',
			'details'					=> '',			
			'shape'						=> '',
			'font_weight'				=> '',
			'quote_color'				=> '',
			'quote_position'			=> '',
			'text_font'          		=> '',
			'text_font_subset'			=> '',
			'text_size'					=> '',
			'text_style'				=> '',
			'supertitle_font_weight' 	=> '',
			'details_size'				=> 'medium',		
		) ), $atts, $this->shortcode ) );

		if ( $text_font != '' && $text_font != 'inherit'  ) {
			require_once( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/misc.php' );
			
			if ( $text_font != '' && $text_font != 'inherit' ) {
				bt_bb_enqueue_google_font( $text_font, $text_font_subset );
			}
		}

		$text = html_entity_decode( $text, ENT_QUOTES, 'UTF-8' );

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $text_size != '' ) {
			$class[] = $this->prefix . 'text_size' . '_' . $text_size;
		}

		if ( $quote_position != '' ) {
			$class[] = $this->prefix . 'quote_position' . '_' . $quote_position;
		}

		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight' . '_' . $font_weight;
		}

		if ( $quote_color != '' ) {
			$class[] = $this->prefix . 'quote_color' . '_' . $quote_color;
		}

		if ( $text_style != '' ) {
			$class[] = $this->prefix . 'text_style' . '_' . $text_style;
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

		/* style text font */
		$html_text_tag_style = "";
		$html_text_tag_style_arr = array();		

		if ( $text_font != '' && $text_font != 'inherit' ) {
			$html_text_tag_style_arr[] = 'font-family:\'' . urldecode( $text_font ) . '\'';
		}
		if ( count( $html_text_tag_style_arr ) > 0 ) {
			$html_text_tag_style = ' style="' . implode( '; ', $html_text_tag_style_arr ) . ';"';
		}


		$output = '';

		// TEXT
		if ( $text != '' ) {
			$output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '"><span'. $html_text_tag_style  . '>' . $text . '</span></div>';
		}

		// IMAGE & NAME
		$output .= '<div class="' . esc_attr( $this->shortcode . '_text_box' ) . '">';

			// IMAGE
			if ( $image != '' ) $output .=  '<div class="' . esc_attr( $this->shortcode . '_image') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" size="boldthemes_small_square" shape="' . esc_attr( $shape ) . '"]' ) . '</div>';
			
		
			// NAME
			$output .= do_shortcode('[bt_bb_headline headline="" superheadline="' . esc_attr( $name ) . '" html_tag="h6" size="' . esc_attr( $details_size ) . '" subheadline="' . esc_attr( $details ) . '" supertitle_font_weight="' . esc_attr( $supertitle_font_weight ) . '"]');
			

		$output .= '</div>';


		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;

	}


	function map_shortcode() {

		require( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/fonts.php' );

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Testimonial', 'novalab' ), 'description' => esc_html__( 'Testimonial with ratings, text and title', 'novalab' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Quote text', 'novalab' ) ),
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'novalab' ) 
				),
				
				array( 'param_name' => 'name', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Name', 'novalab' ) ),
				array( 'param_name' => 'details', 'type' => 'textarea', 'heading' => esc_html__( 'Details', 'novalab' ) ),

				
				array( 'param_name' => 'quote_color', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Quote icon color', 'novalab' ), 
					'value' => array(
						esc_html__( 'Accent color', 'novalab' ) 	=> '',
						esc_html__( 'Light color', 'novalab' ) 		=> 'light',
						esc_html__( 'Dark color', 'novalab' ) 		=> 'dark',
						esc_html__( 'Alternate color', 'novalab' ) 	=> 'alternate',
						esc_html__( 'Gray color', 'novalab' ) 		=> 'gray'
					)
				),
				array( 'param_name' => 'quote_position', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Quote icon position', 'novalab' ), 
					'value' => array(
						esc_html__( 'Align left', 'novalab' ) 				=> '',
						esc_html__( 'Align right', 'novalab' ) 				=> 'right',
						esc_html__( 'Align left behind text', 'novalab' ) 	=> 'left_below',
						esc_html__( 'Align right behind text', 'novalab' ) 	=> 'right_below',
						esc_html__( 'Align center', 'novalab' ) 			=> 'center',
						esc_html__( 'Hide', 'novalab' ) 					=> 'hide'
					)
				),
				array( 'param_name' => 'text_size', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Quote text size', 'novalab' ), 
					'value' => array(
						esc_html__( 'Small', 'novalab' ) 		=> '',
						esc_html__( 'Medium', 'novalab' ) 		=> 'medium',
						esc_html__( 'Large', 'novalab' ) 		=> 'large'
					)
				),
				array( 'param_name' => 'text_style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Quote text style', 'novalab' ),
					'value' => array(
						esc_html__( 'Normal', 'novalab' ) 				=> '',
						esc_html__( 'Italic', 'novalab' ) 				=> 'italic'
					)
				),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Quote font weight', 'novalab' ),
					'value' => array(
						esc_html__( 'Default', 'novalab' ) 				=> '',
						esc_html__( 'Thin', 'novalab' ) 				=> 'thin',
						esc_html__( 'Lighter', 'novalab' ) 				=> 'lighter',
						esc_html__( 'Light', 'novalab' ) 				=> 'light',
						esc_html__( 'Normal', 'novalab' ) 				=> 'normal',
						esc_html__( 'Medium', 'novalab' ) 				=> 'medium',
						esc_html__( 'Semi bold', 'novalab' ) 			=> 'semi-bold',
						esc_html__( 'Bold', 'novalab' ) 				=> 'bold',
						esc_html__( 'Bolder', 'novalab' ) 				=> 'bolder',
						esc_html__( 'Black', 'novalab' ) 				=> 'black'
					)
				),
				

				array( 'param_name' => 'text_font', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Quote text font', 'novalab' ),
					'value' => array( esc_html__( 'Inherit', 'novalab' ) => 'inherit' ) + $font_arr
				),

				array( 'param_name' => 'text_font_subset', 'type' => 'textfield', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Quote text font subset', 'novalab' ), 'value' => 'latin,latin-ext', 'description' => 'E.g. latin,latin-ext,cyrillic,cyrillic-ext' ),

				
				
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Image shape', 'novalab' ),
					'value' => array(
						esc_html__( 'Square', 'novalab' ) 					=> 'square',
						esc_html__( 'Soft Rounded', 'novalab' ) 			=> 'soft-rounded',
						esc_html__( 'Hard Rounded', 'novalab' ) 			=> 'hard-rounded',
						esc_html__( 'Hexagon', 'novalab' ) 					=> 'hexagon',
						esc_html__( 'Rounded triangle', 'novalab' ) 		=> 'triangle',
						esc_html__( 'Oval', 'novalab' ) 					=> 'oval'
					)
				),
				array( 'param_name' => 'supertitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Name font weight', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
					'value' => array(
						esc_html__( 'Default', 'novalab' ) 				=> '',
						esc_html__( 'Thin', 'novalab' ) 				=> 'thin',
						esc_html__( 'Lighter', 'novalab' ) 				=> 'lighter',
						esc_html__( 'Light', 'novalab' ) 				=> 'light',
						esc_html__( 'Normal', 'novalab' ) 				=> 'normal',
						esc_html__( 'Medium', 'novalab' ) 				=> 'medium',
						esc_html__( 'Semi bold', 'novalab' ) 			=> 'semi-bold',
						esc_html__( 'Bold', 'novalab' ) 				=> 'bold',
						esc_html__( 'Bolder', 'novalab' ) 				=> 'bolder',
						esc_html__( 'Black', 'novalab' ) 				=> 'black'
					)
				),
				array( 'param_name' => 'subtitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Details font weight', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
					'value' => array(
						esc_html__( 'Default', 'novalab' ) 				=> '',
						esc_html__( 'Thin', 'novalab' ) 				=> 'thin',
						esc_html__( 'Lighter', 'novalab' ) 				=> 'lighter',
						esc_html__( 'Light', 'novalab' ) 				=> 'light',
						esc_html__( 'Normal', 'novalab' ) 				=> 'normal',
						esc_html__( 'Medium', 'novalab' ) 				=> 'medium',
						esc_html__( 'Semi bold', 'novalab' ) 			=> 'semi-bold',
						esc_html__( 'Bold', 'novalab' ) 				=> 'bold',
						esc_html__( 'Bolder', 'novalab' ) 				=> 'bolder',
						esc_html__( 'Black', 'novalab' ) 				=> 'black'
					)
				),
				array( 'param_name' => 'details_size', 'type' => 'dropdown', 'default' => 'medium', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Name & Details size', 'novalab' ), 
					'value' => array(
						esc_html__( 'Small', 'novalab' ) 		=> 'small',
						esc_html__( 'Medium', 'novalab' ) 		=> 'medium',
						esc_html__( 'Large', 'novalab' ) 		=> 'normal'
					)
				)
			))
		);
	}
}