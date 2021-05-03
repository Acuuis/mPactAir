<?php

class bt_bb_latest_posts extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'rows'            	=> '',
			'columns'         	=> '',
			'gap'             	=> '',
			'category'        	=> '',
			'target'          	=> '',
			'show_image'     	=> '',
			'image_shape'     	=> '',
			'show_category'   	=> '',
			'show_date'       	=> '',
			'show_author'     	=> '',
			'show_comments'   	=> '',
			'show_excerpt'    	=> '',
			'lazy_load'  		=> 'no'
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
		
		if ( $columns != '' ) {
			$class[] = $this->prefix . 'columns' . '_' . $columns;
		}
		
		if ( $gap != '' ) {
			$class[] = $this->prefix . 'gap' . '_' . $gap;
		}
		
		if ( $image_shape != '' ) {
			$class[] = $this->prefix . 'image_shape' . '_' . $image_shape;
		}

		if ( $show_image != '' ) {
			$class[] = $this->prefix . 'show_image' . '_' . $show_image;
		}

		$date_design_format = 'd F Y';
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$number = $rows * $columns;
		
		$posts = bt_bb_get_posts( $number, 0, $category );
		
		$output = '';

		foreach( $posts as $post_item ) {

			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item">';
				$post_thumbnail_id = get_post_thumbnail_id( $post_item['ID'] );

				if ( $post_thumbnail_id != '' ) {
					$img = wp_get_attachment_image_src( $post_thumbnail_id, $size = 'boldthemes_large_square' );
					if ( $lazy_load == 'yes' ) {
						$img_src = BT_BB_Root::$path . 'img/blank.gif';
						$img_class = 'btLazyLoadImage';
						$data_img = ' data-image_src="' . esc_attr( $img[0] ) . '"';
					} else {
						$img_src = $img[0];
						$img_class = '';
						$data_img = '';
					}
					if ( $show_image == '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_image"><a href="' . esc_url_raw( $post_item['permalink'] ) . '" target="' . esc_attr( $target ) . '"><img src="' . esc_url_raw( $img_src ) . '" alt="' . esc_attr( $post_item['title'] ) . '" title="' . esc_attr( $post_item['title'] ) . '" class="' . esc_attr( $img_class ) . '" ' . $data_img .  '"></a></div>';
				}

				$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_content">';
				
					if ( $show_category == 'show_category' ) {
						$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_category">';
							$output .= $post_item['category_list'];
						$output .= '</div>';
					}

					if ( $show_date == 'show_date' || $show_author == 'show_author' || $show_author == 'show_comments' ) {
				
						$meta_output = '<div class="' . esc_attr( $this->shortcode ) . '_item_meta">';

							if ( $show_date == 'show_date' ) {
								$meta_output .= '<span class="' . esc_attr( $this->shortcode ) . '_item_date">';
									$meta_output .= get_the_date( $date_design_format, $post_item['ID'] );
								$meta_output .= '</span>';
							}

							if ( $show_author == 'show_author' ) {
								$meta_output .= '<span class="' . esc_attr( $this->shortcode ) . '_item_author">';
									$meta_output .= esc_html__( 'by', 'novalab' ) . ' ' . $post_item['author'];
								$meta_output .= '</span>';
							}

							if ( $show_comments == 'show_comments' && $post_item['comments'] != '' ) {
								$meta_output .= '<span class="' . esc_attr( $this->shortcode ) . '_item_comments">';
									$meta_output .= $post_item['comments'];
								$meta_output .= '</span>';
							}
				
						$meta_output .= '</div>';
		
						$output .= $meta_output;
		
					}

					$output .= '<h5 class="' . esc_attr( $this->shortcode ) . '_item_title">';
						$output .= '<a href="' . esc_url_raw( $post_item['permalink'] ) . '" target="' . esc_attr( $target ) . '">' . $post_item['title'] . '</a>';
					$output .= '</h5>';
					
					if ( $show_excerpt == 'show_excerpt' ) {
						$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_excerpt">';
							$output .= $post_item['excerpt'];
						$output .= '</div>';
					}
				$output .= '</div>';
				
			$output .= '</div>';
		}

		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . $output . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Latest Posts', 'novalab' ), 'description' => esc_html__( 'List of latest posts', 'novalab' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'rows', 'type' => 'textfield', 'value' => '1', 'heading' => esc_html__( 'Rows', 'novalab' ), 'preview' => true ),
				array( 'param_name' => 'columns', 'type' => 'dropdown', 'value' => '3', 'heading' => esc_html__( 'Columns', 'novalab' ), 'preview' => true,
					'value' => array(
						esc_html__( '1', 'novalab' ) => '1',
						esc_html__( '2', 'novalab' ) => '2',
						esc_html__( '3', 'novalab' ) => '3',
						esc_html__( '4', 'novalab' ) => '4',
						esc_html__( '6', 'novalab' ) => '6'
					)
				),
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Gap', 'novalab' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Normal', 'novalab' ) 	=> 'normal',
						esc_html__( 'No gap', 'novalab' ) 	=> 'no_gap',
						esc_html__( 'Small', 'novalab' ) 	=> 'small',
						esc_html__( 'Large', 'novalab' ) 	=> 'large'
					)
				),				
				array( 'param_name' => 'category', 'type' => 'textfield', 'heading' => esc_html__( 'Category', 'novalab' ), 'description' => esc_html__( 'Enter category slug or leave empty to show all', 'novalab' ), 'preview' => true ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'novalab' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'novalab' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'novalab' ) => '_blank',
					)
				),
				array( 'param_name' => 'show_image', 'type' => 'dropdown', 'heading' => esc_html__( 'Show images', 'novalab' ),
					'value' => array(
						esc_html__( 'Show', 'novalab' ) => '',
						esc_html__( 'Hide', 'novalab' ) => 'hide'
					)
				),
				array( 'param_name' => 'image_shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Image shape', 'novalab' ),
					'value' => array(
						esc_html__( 'Square', 'novalab' ) => 'square',
						esc_html__( 'Rounded', 'novalab' ) => 'rounded',
						esc_html__( 'Round', 'novalab' ) => 'round',
						esc_html__( 'Hexagon', 'novalab' ) => 'hexagon'
					)
				),
				array( 'param_name' => 'show_category', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'show_category' ), 'heading' => esc_html__( 'Show category', 'novalab' ), 'preview' => true
				),
				array( 'param_name' => 'show_date', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'show_date' ), 'heading' => esc_html__( 'Show date', 'novalab' ), 'preview' => true
				),
				array( 'param_name' => 'show_author', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'show_author' ), 'heading' => esc_html__( 'Show author', 'novalab' ), 'preview' => true
				),
				array( 'param_name' => 'show_comments', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'show_comments' ), 'heading' => esc_html__( 'Show number of comments', 'novalab' ), 'preview' => true
				),
				array( 'param_name' => 'show_excerpt', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'show_excerpt' ), 'heading' => esc_html__( 'Show excerpt', 'novalab' ), 'preview' => true
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load images', 'novalab' ),
					'value' => array(
						esc_html__( 'No', 'novalab' )	 => 'no',
						esc_html__( 'Yes', 'novalab' ) 	 => 'yes'
					)
				)
			)
		) );
	} 
}