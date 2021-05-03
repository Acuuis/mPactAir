<?php

class bt_bb_price_list extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'price_text'   		=> '',
			'price'        		=> '',
			'currency'     		=> '',
			'currency_align'     => '',
			'title'        		=> '',
			'subtitle'     		=> '',
			'items'        		=> '',
			'style' 			=> '',
			'color_scheme' 		=> ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $currency_align == 'left' ) {
			$class[] = 'btCurrencyLeft';
		}

		if ( $price_text != '' ) {
			$class[] = 'btWithPriceText';
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		$content = do_shortcode( $content );

		$output = '';
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$price_text_html = $price_text;
		
		if ( $price_text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_price_text"><span>' . $price_text_html . '</span></div>';

		$output .= '<div class="' . esc_attr( $this->shortcode ) . '_price_inner">';

			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_content">';

				$output .= '<div class="' . esc_attr( $this->shortcode ) . '_price">';

					if ( $currency_align != '' ) {
						$output .= '<span class="' . esc_attr( $this->shortcode ) . '_currency">' . $currency . '</span>';
					}

					$output .= '<span class="' . esc_attr( $this->shortcode ) . '_amount">' . $price . '</span>';

					if ( $currency_align == '' ) {
						$output .= '<span class="' . esc_attr( $this->shortcode ) . '_currency">' . $currency . '</span>';
					}

				$output .= '</div>';
				

				// HEADLINE - TITLE
				if ( ( $title != '' ) || ( $subtitle != '' ) ) {
					$output .= '<div class="' . esc_attr( $this->shortcode ) . '_title">';	
						$output .= do_shortcode('[bt_bb_headline headline="' . esc_attr( $title ) . '" subheadline="' . esc_attr( $subtitle ) . '" html_tag="h3" size="medium"]');	
					$output .= '</div>';	
				}

			$output .= '</div>';

			if ( $items != '' ) {
				$items_arr = preg_split( '/$\R?^/m', $items );
				$output .= '<ul>';
					foreach ( $items_arr as $item ) {
						if ( $item != '' ){
							$li_class	=	substr($item, 0, 1) == '+' ? 'included' : 'excluded';					
							$item		=	substr($item, 0, 1) == '+' ? ltrim($item, '+')   :  $item;

							$output .= '<li class="' .  esc_attr( $li_class ) . '">' .  wp_kses_post( $item ) . '</li>';
						}
					}
				$output .= '</ul>';
			}

			// CONTENT
			if ( $content != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '">' . ( $content ) . '</div>';

		$output .= '</div>';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();			
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Price List', 'novalab' ), 'description' => esc_html__( 'List of items with total price', 'novalab' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'price', 'type' => 'textfield', 'heading' => esc_html__( 'Price', 'novalab' ) ),
				array( 'param_name' => 'currency', 'type' => 'textfield', 'heading' => esc_html__( 'Currency', 'novalab' ), 'description' => esc_html__( 'Currency will display next to price value - on the right side.', 'novalab' ) ),
				array( 'param_name' => 'currency_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Currency align', 'novalab' ), 'preview' => true, 
					'value' => array(
						esc_html__( 'Right', 'novalab' ) 				=> '',
						esc_html__( 'Left', 'novalab' ) 				=> 'left'
					)
				),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'novalab' ), 'preview' => true ),
				array( 'param_name' => 'subtitle', 'type' => 'textfield', 'heading' => esc_html__( 'Subtitle', 'novalab' ) ),
				array( 'param_name' => 'price_text', 'type' => 'textfield', 'heading' => esc_html__( 'Price text', 'novalab' ), 'description' => esc_html__( 'Price text will display above the price value - on top.', 'novalab' ) ),
				array( 'param_name' => 'items', 'type' => 'textarea', 'heading' => esc_html__( 'Items', 'novalab' ), 'description' => esc_html__( 'Type sentences separated by new line. In order to show what is included in price add + before text (ex. +Blood Test).', 'novalab' ) ),
				

				array( 'param_name' => 'style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Style', 'novalab' ), 'preview' => true, 
					'value' => array(
						esc_html__( 'Outline', 'novalab' ) 					=> 'outline',
						esc_html__( 'Filled', 'novalab' ) 					=> ''
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'default' => 'medium', 'heading' => esc_html__( 'Title size', 'novalab' ),
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
				array( 'param_name' => 'color_scheme', 'group' => esc_html__( 'Design', 'novalab' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'novalab' ), 'value' => $color_scheme_arr, 'preview' => true ),			
			)
		) );
	}
}