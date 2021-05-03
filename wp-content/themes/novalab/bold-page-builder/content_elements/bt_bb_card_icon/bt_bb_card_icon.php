<?php

class bt_bb_card_icon extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'icon'							=> '',
			'title'							=> '',
			'html_tag'      				=> 'h3',
			'text'							=> '',

			'font_weight'					=> '',
			'text_style'					=> '',

			'url'    						=> '',
			'target' 						=> '',
			'color_scheme' 					=> ''
		) ), $atts, $this->shortcode ) );
		
		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );
		
		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme' . '_' . bt_bb_get_color_scheme_id( $color_scheme );
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

		$icon_html = bt_bb_icon::get_html( $icon, '' );

		$content = do_shortcode( $content );

		$output = '';

		$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $title ) );
		$link = bt_bb_get_permalink_by_slug( $url );
		
			
		// ICON
		if ( ( $icon != '' ) && ( $url != '') ) {
			$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '"><a href="' . esc_attr( $link ) . '"  target="' . esc_attr( $target ) . '">' . $icon_html . '</a></div>';
		} else {
			$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';
		}
		

		// HEADLINE
		if ( $title != '' ) {
			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_title">';	
				$output .= do_shortcode('[bt_bb_headline headline="' . esc_attr( $title ) . '" html_tag="'. esc_attr( $html_tag ) .'" font_weight="' . esc_attr( $font_weight ) . '" size="small"  url="'. esc_attr( $link ) .'" target="'. esc_attr( $target ) .'"]');	
			$output .= '</div>';
		}

		// TEXT
		if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '">' . wp_kses_post( $text ) . '</div>';

		// CONTENT
		if ( $content != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '">' . ( $content ) . '</div>';

		
		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			require_once( dirname(__FILE__) . '/../../content_elements_misc/fa_icons.php' );
			require_once( dirname(__FILE__) . '/../../content_elements_misc/s7_icons.php' );
			$icon_arr = array( 'Font Awesome' => bt_bb_fa_icons(), 'S7' => bt_bb_s7_icons() );
		}

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Card Icon', 'novalab' ), 'description' => esc_html__( 'Card with icon and text', 'novalab' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_text' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'novalab' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Title', 'novalab' ) ),
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

				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Title font weight', 'novalab' ),
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
				array( 'param_name' => 'text_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Text style', 'novalab' ),
					'value' => array(
						esc_html__( 'Default', 'novalab' ) 					=> '',
						esc_html__( 'Transparent 50%', 'novalab' ) 			=> 'transparent'
					)
				),


				array( 'param_name' => 'url', 'type' => 'textfield', 'group' => esc_html__( 'URL', 'novalab' ), 'heading' => esc_html__( 'URL', 'novalab' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'novalab' ), 'heading' => esc_html__( 'Target', 'novalab' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'novalab' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'novalab' ) => '_blank',
					)
				),

				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Background color scheme', 'novalab' ), 'value' => $color_scheme_arr, 'preview' => true 
					)
				)
				
				
			)
		);
	}
}