<?php

class bt_bb_card_image extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'image'      					=> '',
			'lazy_load'  					=> 'no',

			'supertitle'					=> '',
			'title'							=> '',
			'subtitle'						=> '',
			'text'							=> '',
			'html_tag'      				=> 'h3',

			'url'    						=> '',
			'target' 						=> '',

			'style'							=> '',
			'size'							=> '',
			'color_scheme' 					=> '',
			'background_color_scheme' 		=> '',
			'border'      					=> '',
			'shadow'      					=> ''
			
			
		) ), $atts, $this->shortcode ) );
		
		$content_elements_path = get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_card_image/';

		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );
		$text = html_entity_decode( $text, ENT_QUOTES, 'UTF-8' );
		
		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $shadow != '' ) {
			$class[] = $this->prefix . 'shadow' . '_' . $shadow;
		}

		if ( $background_color_scheme != '' ) {
			$class[] = $this->prefix . 'background_color_scheme_' . bt_bb_get_color_scheme_id( $background_color_scheme );
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


		if ( $style == 'hexagon' ) {
			$image_shape = 'hexagon';
			//$image_size = 'boldthemes_medium_square';
			$image_size = 'full';
		} else {
			$image_shape = 'square';
			$image_size = 'full';
		}

		
		$content = do_shortcode( $content );

		$output = '';

		$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $title ) );
		$link = bt_bb_get_permalink_by_slug( $url );
		
			
		// IMAGE
		$output .=  '<div class="' . esc_attr( $this->shortcode . '_background') . '">
			' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" caption="' . esc_attr( $title ) . '" lazy_load="' . esc_attr( $lazy_load ) . '" url="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" shape="' . esc_attr( $image_shape ) . '" size="' . esc_attr( $image_size ) . '"]' ) . '
		</div>';
		

		// TEXT BOX
		$output .= '<div class="' . esc_attr( $this->shortcode . '_text_box' ) . '">';
			// HEADLINE
			$output .= '<div class="' . esc_attr( $this->shortcode . '_title' ) . '">';
				if ( ( $supertitle != '' ) || ( $title != '' ) || ( $subtitle != '' ) ) {
					$output .= do_shortcode('[bt_bb_headline headline="' . esc_attr( $title ) . '" superheadline="' . esc_attr( $supertitle ) . '" subheadline="' . esc_attr( $subtitle ) . '" html_tag="'. esc_attr( $html_tag ) .'" size="'. esc_attr( $size ) .'" color_scheme="'. esc_attr( $color_scheme ) .'" url="'. esc_attr( $link ) .'" target="'. esc_attr( $target ) .'"]');		
				}
			$output .= '</div>';

			// TEXT
			if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '">' . wp_kses_post( $text ) . '</div>';

			// CONTENT
			if ( $content != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '">' . ( $content ) . '</div>';

		$output .= '</div>';
		
		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Card Image', 'novalab' ), 'description' => esc_html__( 'Card with image and text', 'novalab' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_text' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'novalab' ) 
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load this image', 'novalab' ),
					'value' => array(
						esc_html__( 'No', 'novalab' ) 				=> 'no',
						esc_html__( 'Yes', 'novalab' ) 				=> 'yes'
					)
				),
				array( 'param_name' => 'supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Supertitle', 'novalab' ) ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Title', 'novalab' ) ),
				array( 'param_name' => 'subtitle', 'type' => 'textfield', 'heading' => esc_html__( 'Subtitle', 'novalab' ) ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'novalab' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'default' => 'h3', 'heading' => esc_html__( 'HTML tag', 'novalab' ),
					'value' => array(
						esc_html__( 'h1', 'novalab' ) 				=> 'h1',
						esc_html__( 'h2', 'novalab' )	 			=> 'h2',
						esc_html__( 'h3', 'novalab' ) 				=> 'h3',
						esc_html__( 'h4', 'novalab' ) 				=> 'h4',
						esc_html__( 'h5', 'novalab' ) 				=> 'h5',
						esc_html__( 'h6', 'novalab' ) 				=> 'h6'
				) ),

				array( 'param_name' => 'url', 'type' => 'textfield', 'group' => esc_html__( 'URL', 'novalab' ), 'heading' => esc_html__( 'URL', 'novalab' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'novalab' ), 'heading' => esc_html__( 'Target', 'novalab' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'novalab' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'novalab' ) => '_blank',
					)
				),

				array( 'param_name' => 'style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Style', 'novalab' ),
					'value' => array(
						esc_html__( 'Simple', 'novalab' ) 				=> '',
						esc_html__( 'Rectangle', 'novalab' ) 			=> 'rectangle',
						esc_html__( 'Hexagon', 'novalab' ) 				=> 'hexagon'
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'default' => 'medium', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Title size', 'novalab' ),
					'value' => array(
						esc_html__( 'Extra small', 'novalab' ) 			=> 'extrasmall',
						esc_html__( 'Small', 'novalab' ) 				=> 'small',
						esc_html__( 'Medium', 'novalab' ) 				=> 'medium',
						esc_html__( 'Normal', 'novalab' ) 				=> 'normal',
						esc_html__( 'Large', 'novalab' ) 				=> 'large',
						esc_html__( 'Extra large', 'novalab' ) 			=> 'extralarge',
						esc_html__( 'Huge', 'novalab' ) 				=> 'huge'
					)
				),

				array( 'param_name' => 'border', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Show content border', 'novalab' ),
					'value' => array(
						esc_html__( 'No', 'novalab' ) 				=> '',
						esc_html__( 'Yes', 'novalab' )				=> 'show'
				) ),
				array( 'param_name' => 'shadow', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Show content shadow', 'novalab' ),
					'value' => array(
						esc_html__( 'No', 'novalab' ) 				=> '',
						esc_html__( 'Yes', 'novalab' )				=> 'show'
				) ),
				array( 'param_name' => 'background_color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Background color scheme', 'novalab' ), 'value' => $color_scheme_arr, 'group' => esc_html__( 'Design', 'novalab' )
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Title color scheme', 'novalab' ), 'value' => $color_scheme_arr 
					)
				)
			)
		);
	}
}