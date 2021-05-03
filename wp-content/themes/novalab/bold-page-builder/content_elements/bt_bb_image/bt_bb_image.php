<?php

class bt_bb_image extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'image'  							=> '',
			'size'   							=> '',
			'shape'  							=> '',
			'lazy_load'  						=> 'no',
			'image_height'  					=> '',
			'align'  							=> '',
			'caption'    						=> '',
			
			'url'    							=> '',
			'target' 							=> '',
			'hover_style'  						=> '',
			
			'content_display'  					=> '',
			'inner_gap' 						=> '',
			'content_background_color' 			=> '',
			'content_background_opacity'	    => '',
			'content_align'						=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		if ( $hover_style == 'scroll' ) {
			$el_id = 'bt_bb_random_id_' . rand();
		}

		$style_attr = '';
		
		if ( $image_height != '' ) {
			$el_style .= 'height:' . $image_height . '; overflow: hidden;';
		}
		
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}	
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		
		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		
		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}

		if ( $inner_gap != '' ) {
			$class[] = $this->prefix . 'inner_gap' . '_' . $inner_gap;
		}

		if ( $hover_style != '' ) {
			$class[] = $this->prefix . 'hover_style' . '_' . $hover_style;
		}
		
		if ( $content_display != '' ) {
			$class[] = $this->prefix . 'content_display' . '_' . $content_display;
		}

		if ( $content_align != '' ) {
			$class[] = $this->prefix . 'content_align' . '_' . $content_align;
		}
		

		$alt = $caption;
		$title = $caption;
		$full_image = $image;
		$image_ = $image;
			
		if ( $image != '' && is_numeric( $image ) ) {
			$post_image = get_post( $image );
			if ( $post_image == '' ) return;
			
			if ( $alt == '' ) {
				$alt = get_post_meta($post_image->ID, '_wp_attachment_image_alt', true);
			}
			if ( $alt == '' ) {
				$alt = $post_image->post_excerpt;
			}
			if ( $title == '' ) {
				$title = $post_image->post_title;
			}
			
			$image_ = wp_get_attachment_image_src( $image, $size );
			if ( $image_ ) {
				$image_ = $image_[0];
			}
			if ( $alt == '' ) {
				$alt = $image_;
			}
			
			if ( $size == 'full' ) {
				$full_image = $image_;
			} else {
				$full_image = wp_get_attachment_image_src( $image, 'full' );
				if ( $full_image ) {
					$full_image = $full_image[0];
				} else {
					$full_image = '';
				}				
			}
		}
		
		if ( $title != '' ) {
			$title = ' title="' . esc_attr( $title ) . '"';	
		}
		$content = do_shortcode( $content );
		
		if ( $content != '' ) {
			$class[] = $this->prefix . 'content_exists';
		}
		
		$output = '';

		if ( ! empty( $image_ ) ) {
			if ( $lazy_load == 'yes' ) {
				$output .= '<img src = "' . BT_BB_Root::$path . 'img/blank.gif" data-full_image_src="' . esc_url_raw( $full_image ) . '" data-image_src="' . esc_url_raw( $image_ ) . '"' . $title . ' alt="' . esc_attr( $alt ) . '" class="btLazyLoadImage">';
			} else {
				$output .= '<img src="' . esc_url_raw( $image_ ) . '" data-full_image_src="' . esc_url_raw( $full_image ) . '" ' . $title . ' alt="' . esc_attr( $alt ) . '">';
			}
		}		

		if ( $url != '#lightbox' ) {
			$link = bt_bb_get_url( $url );	
		} else {
			$link = $url ;
			$class[] = 'bt_bb_use_lightbox';
		}
		
		if ( ! empty( $link ) ) {
			$output = '<a href="' . esc_url( $link ) . '"  target="' . esc_attr( $target ) . '"' . $title . '>' . $output . '</a>';
		} else {
			$output = '<span>' . $output . '</span>';
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . $output ;
		if ( $content != '' ) {
			$content_background_style = '';
			if ( $content_background_color != '' ) {
				$content_background_color = bt_bb_image::hex2rgb( $content_background_color );
				if ( $content_background_opacity == '' ) {
					$content_background_opacity = 1;
				}
				$content_background_style .= ' style="background-color: rgba(' . $content_background_color[0] . ', ' . $content_background_color[1] . ', ' . $content_background_color[2] . ', ' . $content_background_opacity . ');"';
			}
			$output .= '<div class="bt_bb_image_content"' . $content_background_style . '><div class="bt_bb_image_content_flex"><div class="bt_bb_image_content_inner">' . $content . '</div></div></div>';
		}
		$output .= '</div>';	
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Image', 'novalab' ), 'description' => esc_html__( 'Single image', 'novalab' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_text' => true, 'bt_bb_headline' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'heading' => esc_html__( 'Image', 'novalab' ), 'preview' => true ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'novalab' ), 'preview' => true,
					'value' => bt_bb_get_image_sizes()
				),
				array( 'param_name' => 'image_height', 'type' => 'textfield', 'heading' => esc_html__( 'Image height', 'novalab' )),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'novalab' ),
					'value' => array(
						esc_html__( 'Square', 'novalab' ) 					=> 'square',
						esc_html__( 'Soft Rounded', 'novalab' ) 			=> 'soft-rounded',
						esc_html__( 'Hard Rounded', 'novalab' ) 			=> 'hard-rounded',
						esc_html__( 'Hexagon', 'novalab' ) 					=> 'hexagon',
						esc_html__( 'Rounded triangle', 'novalab' ) 		=> 'triangle',
						esc_html__( 'Rotated triangle', 'novalab' ) 		=> 'rotated_triangle',
						esc_html__( 'Oval', 'novalab' ) 					=> 'oval'
					)
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load this image', 'novalab' ),
					'value' => array(
						esc_html__( 'No', 'novalab' ) 	=> 'no',
						esc_html__( 'Yes', 'novalab' ) 	=> 'yes'
					)
				),
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Alignment', 'novalab' ),
					'value' => array(
						esc_html__( 'Inherit', 'novalab' ) 		=> 'inherit',
						esc_html__( 'Left', 'novalab' ) 		=> 'left',
						esc_html__( 'Right', 'novalab' ) 		=> 'right'
					)
				),
				array( 'param_name' => 'caption', 'type' => 'textfield', 'heading' => esc_html__( 'Caption', 'novalab' ) ),
				
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'novalab' ), 'description' => esc_html__( 'Enter full or local URL (eg. https://www.bold-themes.com or /pages/about-us), post slug (eg. about-us) or #lightbox to open current image in full size', 'novalab' ), 'group' => esc_html__( 'URL', 'novalab' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'novalab' ), 'group' => esc_html__( 'URL', 'novalab' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'novalab' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'novalab' ) => '_blank'
					)
				),
				array( 'param_name' => 'hover_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Mouse hover style', 'novalab' ), 'group' => esc_html__( 'URL', 'novalab' ),
					'value' => array(
						esc_html__( 'Simple', 'novalab' ) 					=> 'simple',
						esc_html__( 'Flip', 'novalab' ) 					=> 'flip',
						esc_html__( 'Zoom in', 'novalab' ) 					=> 'zoom-in',
						esc_html__( 'To grayscale', 'novalab' ) 			=> 'to-grayscale',
						esc_html__( 'From grayscale', 'novalab' ) 			=> 'from-grayscale',
						esc_html__( 'Zoom in to grayscale', 'novalab' ) 	=> 'zoom-in-to-grayscale',
						esc_html__( 'Zoom in from grayscale', 'novalab' )	=> 'zoom-in-from-grayscale',
						esc_html__( 'Scroll', 'novalab' ) 					=> 'scroll'
					)
				),

				array( 'param_name' => 'content_display', 'type' => 'dropdown', 'heading' => esc_html__( 'Show content', 'novalab' ), 'description' => esc_html__( 'Add selected elements and show them over the image', 'novalab' ), 'group' => esc_html__( 'Content', 'novalab' ),
					'value' => array(
						esc_html__( 'Always', 'novalab' ) 				=> 'always',
						esc_html__( 'Show on hover', 'novalab' ) 		=> 'show-on-hover',
						esc_html__( 'Hide on hover', 'novalab' ) 		=> 'hide-on-hover'
					)
				),
				array( 'param_name' => 'inner_gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner Gap', 'novalab' ), 'group' => esc_html__( 'Content', 'novalab' ),
					'value' => array(
						esc_html__( '0px', 'novalab' ) 		=> '',
						esc_html__( '5px', 'novalab' ) 		=> '5px',
						esc_html__( '10px', 'novalab' ) 	=> '10px',
						esc_html__( '20px', 'novalab' ) 	=> '20px',
						esc_html__( '30px', 'novalab' ) 	=> '30px',
						esc_html__( '40px', 'novalab' ) 	=> '40px',
						esc_html__( '50px', 'novalab' ) 	=> '50px',
						esc_html__( '60px', 'novalab' ) 	=> '60px',
						esc_html__( '70px', 'novalab' ) 	=> '70px',
						esc_html__( '80px', 'novalab' ) 	=> '80px',
						esc_html__( '90px', 'novalab' ) 	=> '90px',
						esc_html__( '100px', 'novalab' ) 	=> '100px',
						esc_html__( '110px', 'novalab' ) 	=> '110px',
						esc_html__( '120px', 'novalab' ) 	=> '120px'
					)
				),
				array( 'param_name' => 'content_background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Content background color', 'novalab' ), 'group' => esc_html__( 'Content', 'novalab' ) ),
				array( 'param_name' => 'content_background_opacity', 'type' => 'textfield', 'heading' => esc_html__( 'Content background opacity (e.g. 0.4)', 'novalab' ), 'group' => esc_html__( 'Content', 'novalab' ) ),
				array( 'param_name' => 'content_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Content Alignment', 'novalab' ), 'group' => esc_html__( 'Content', 'novalab' ),
					'value' => array(
						esc_html__( 'Middle', 'novalab' ) 			=> 'middle',
						esc_html__( 'Center Middle', 'novalab' ) 	=> 'center_middle',
						esc_html__( 'Top', 'novalab' ) 				=> 'top',						
						esc_html__( 'Bottom', 'novalab' ) 			=> 'bottom'
					)
				)
			)
		) );
	}
	static function hex2rgb( $hex ) {
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
		return $rgb;
	}
}