<?php


// COLOR SCHEME

if ( is_file( dirname(__FILE__) . '/../../../../plugins/bold-page-builder/content_elements_misc/misc.php' ) ) {
	require_once( dirname(__FILE__) . '/../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
}
if ( function_exists('bt_bb_get_color_scheme_param_array') ) {
	$color_scheme_arr = bt_bb_get_color_scheme_param_array();
} else {
	$color_scheme_arr = array();
}


// ROW - BORDER

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_row', array(
		array( 'param_name' => 'border', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Show border', 'novalab' ),
			'value' => array(
				esc_html__( 'No', 'novalab' ) 						=> '',
				esc_html__( 'Yes (Dark border)', 'novalab' ) 		=> 'show_dark',
				esc_html__( 'Yes (Light border)', 'novalab' ) 		=> 'show_light'
			)
		),
		array( 'param_name' => 'animation', 'type' => 'dropdown', 'heading' => esc_html__( 'Animation', 'novalab' ), 'preview' => true,
			'value' => array(
				esc_html__( 'No Animation', 'novalab' ) 			=> 'no_animation',
				esc_html__( 'Fade In', 'novalab' ) 					=> 'fade_in',
				esc_html__( 'Move Up', 'novalab' ) 					=> 'move_up',
				esc_html__( 'Move Left', 'novalab' ) 				=> 'move_left',
				esc_html__( 'Move Right', 'novalab' ) 				=> 'move_right',
				esc_html__( 'Move Down', 'novalab' ) 				=> 'move_down',
				esc_html__( 'Zoom in', 'novalab' ) 					=> 'zoom_in',
				esc_html__( 'Zoom out', 'novalab' ) 				=> 'zoom_out',
				esc_html__( 'Fade In / Move Up', 'novalab' ) 		=> 'fade_in move_up',
				esc_html__( 'Fade In / Move Left', 'novalab' ) 		=> 'fade_in move_left',
				esc_html__( 'Fade In / Move Right', 'novalab' ) 	=> 'fade_in move_right',
				esc_html__( 'Fade In / Move Down', 'novalab' ) 		=> 'fade_in move_down',
				esc_html__( 'Fade In / Zoom in', 'novalab' ) 		=> 'fade_in zoom_in',
				esc_html__( 'Fade In / Zoom out', 'novalab' ) 		=> 'fade_in zoom_out'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Square', 'novalab' ) 			=> '',
				esc_html__( 'Soft Rounded', 'novalab' ) 	=> 'soft-rounded'
			)
		),
	));
}

function novalab_bt_bb_row_class( $class, $atts ) {
	if ( isset( $atts['border'] ) && $atts['border'] != '' ) {
		$class[] = 'bt_bb_border' . '_' . $atts['border'];
	}
	if ( isset( $atts['animation'] ) && $atts['animation'] != '' ) {
		$class[] = 'bt_bb_animation' . '_' . $atts['animation'];
		$class[] = 'animate';
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	return $class;
}

add_filter( 'bt_bb_row_class', 'novalab_bt_bb_row_class', 10, 2 );


// INNER ROW - BORDER

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_row_inner', array(
		array( 'param_name' => 'border', 'type' => 'dropdown', 'heading' => esc_html__( 'Show border', 'novalab' ),
			'value' => array(
				esc_html__( 'No', 'novalab' ) 						=> '',
				esc_html__( 'Yes (Dark border)', 'novalab' ) 		=> 'show_dark',
				esc_html__( 'Yes (Light border)', 'novalab' ) 		=> 'show_light'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Square', 'novalab' ) 			=> '',
				esc_html__( 'Soft Rounded', 'novalab' ) 	=> 'soft-rounded'
			)
		),
	));
}

function novalab_bt_bb_row_inner_class( $class, $atts ) {
	if ( isset( $atts['border'] ) && $atts['border'] != '' ) {
		$class[] = 'bt_bb_border' . '_' . $atts['border'];
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	return $class;
}

add_filter( 'bt_bb_row_inner_class', 'novalab_bt_bb_row_inner_class', 10, 2 );


// COLUMN - PADDING, INNER COLOR SCHEME, BORDERS, SHAPE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'novalab' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Normal', 'novalab' ) 		=> 'normal',
				esc_html__( 'Double', 'novalab' ) 		=> 'double',
				esc_html__( 'Text Indent', 'novalab' ) 	=> 'text_indent',
				esc_html__( '0px', 'novalab' ) 			=> '0',
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
				esc_html__( '55px', 'novalab' ) 		=> '55',
				esc_html__( '60px', 'novalab' ) 		=> '60',
				esc_html__( '65px', 'novalab' ) 		=> '65',
				esc_html__( '70px', 'novalab' ) 		=> '70',
				esc_html__( '75px', 'novalab' ) 		=> '75',
				esc_html__( '80px', 'novalab' ) 		=> '80',
				esc_html__( '85px', 'novalab' ) 		=> '85',
				esc_html__( '90px', 'novalab' ) 		=> '90',
				esc_html__( '95px', 'novalab' ) 		=> '95',
				esc_html__( '100px', 'novalab' ) 		=> '100'
			)
		),
		array( 'param_name' => 'top_border', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'top_border' ), 'group' => esc_html__( 'Borders', 'novalab' ), 'heading' => esc_html__( 'Top Border', 'novalab' ), 'preview' => true ),
		array( 'param_name' => 'bottom_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'novalab' ), 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'bottom_border' ), 'heading' => esc_html__( 'Bottom Border', 'novalab' ), 'preview' => true ),
		array( 'param_name' => 'left_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'novalab' ), 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'left_border' ), 'heading' => esc_html__( 'Left Border', 'novalab' ), 'preview' => true ),
		array( 'param_name' => 'right_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'novalab' ), 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'right_border' ), 'heading' => esc_html__( 'Right Border', 'novalab' ), 'preview' => true ),
		array( 'param_name' => 'border_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Border color', 'novalab' ), 'group' => esc_html__( 'Borders', 'novalab' ),
			'value' => array(
				esc_html__( 'Light', 'novalab' ) 		=> '',
				esc_html__( 'Dark', 'novalab' ) 		=> 'dark',
				esc_html__( 'Accent', 'novalab' ) 		=> 'accent'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Square', 'novalab' ) 			=> '',
				esc_html__( 'Soft Rounded', 'novalab' ) 	=> 'soft-rounded'
			)
		),
		array( 'param_name' => 'details', 'preview' => true, 'preview_strong' => true, 'type' => 'dropdown', 'heading' => esc_html__( 'Details on side', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'None', 'novalab' ) 				=> '',
				esc_html__( 'Left arrow', 'novalab' ) 			=> 'left',
				esc_html__( 'Left inverse arrow', 'novalab' ) 	=> 'left-inner',
				esc_html__( 'Right arrow', 'novalab' ) 			=> 'right',
				esc_html__( 'Right inverse arrow', 'novalab' ) 	=> 'right-inner'
			)
		),
		array( 'param_name' => 'details-color', 'type' => 'dropdown', 'heading' => esc_html__( 'Details color', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'White', 'novalab' ) 	=> 'white',
				esc_html__( 'Gray', 'novalab' ) 	=> 'grey'
			)
		),
		array( 'param_name' => 'inner_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Inner color scheme', 'novalab' ), 'value' => $color_scheme_arr ),
	));
}

function novalab_bt_bb_column_class( $class, $atts ) {
	if ( isset( $atts['top_border'] ) && $atts['top_border'] != '' ) {
		$class[] = 'bt_bb_top_border';
	}
	if ( isset( $atts['bottom_border'] ) && $atts['bottom_border'] != '' ) {
		$class[] = 'bt_bb_bottom_border';
	}
	if ( isset( $atts['left_border'] ) && $atts['left_border'] != '' ) {
		$class[] = 'bt_bb_left_border';
	}
	if ( isset( $atts['right_border'] ) && $atts['right_border'] != '' ) {
		$class[] = 'bt_bb_right_border';
	}
	if ( isset( $atts['border_color'] ) && $atts['border_color'] != '' ) {
		$class[] = 'bt_bb_border_color' . '_' . $atts['border_color'];
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['details'] ) && $atts['details'] != '' ) {
		$class[] = 'bt_bb_details' . '_' . $atts['details'];
	}
	if ( isset( $atts['details-color'] ) && $atts['details-color'] != '' ) {
		$class[] = 'bt_bb_details-color' . '_' . $atts['details-color'];
	}
	if ( isset( $atts['inner_color_scheme'] ) && $atts['inner_color_scheme'] != '' ) {
		$class[] = 'bt_bb_inner_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['inner_color_scheme'] );
	}
	return $class;
}

add_filter( 'bt_bb_column_class', 'novalab_bt_bb_column_class', 10, 2 );


// INNER COLUMN - PADDING, INNER COLOR SCHEME, SHAPE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column_inner', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column_inner', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'novalab' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Normal', 'novalab' ) 		=> 'normal',
				esc_html__( 'Double', 'novalab' ) 		=> 'double',
				esc_html__( 'Text Indent', 'novalab' ) 	=> 'text_indent',
				esc_html__( '0px', 'novalab' ) 			=> '0',
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
				esc_html__( '55px', 'novalab' ) 		=> '55',
				esc_html__( '60px', 'novalab' ) 		=> '60',
				esc_html__( '65px', 'novalab' ) 		=> '65',
				esc_html__( '70px', 'novalab' ) 		=> '70',
				esc_html__( '75px', 'novalab' ) 		=> '75',
				esc_html__( '80px', 'novalab' ) 		=> '80',
				esc_html__( '85px', 'novalab' ) 		=> '85',
				esc_html__( '90px', 'novalab' ) 		=> '90',
				esc_html__( '95px', 'novalab' ) 		=> '95',
				esc_html__( '100px', 'novalab' ) 		=> '100'
			)
		),
		array( 'param_name' => 'top_border', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'top_border' ), 'group' => esc_html__( 'Borders', 'novalab' ), 'heading' => esc_html__( 'Top Border', 'novalab' ), 'preview' => true ),
		array( 'param_name' => 'bottom_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'novalab' ), 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'bottom_border' ), 'heading' => esc_html__( 'Bottom Border', 'novalab' ), 'preview' => true ),
		array( 'param_name' => 'left_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'novalab' ), 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'left_border' ), 'heading' => esc_html__( 'Left Border', 'novalab' ), 'preview' => true ),
		array( 'param_name' => 'right_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'novalab' ), 'value' => array( esc_html__( 'Yes', 'novalab' ) => 'right_border' ), 'heading' => esc_html__( 'Right Border', 'novalab' ), 'preview' => true ),
		array( 'param_name' => 'border_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Border color', 'novalab' ), 'group' => esc_html__( 'Borders', 'novalab' ),
			'value' => array(
				esc_html__( 'Light', 'novalab' ) 		=> '',
				esc_html__( 'Dark', 'novalab' ) 		=> 'dark',
				esc_html__( 'Accent', 'novalab' ) 		=> 'accent'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Square', 'novalab' ) 			=> '',
				esc_html__( 'Soft Rounded', 'novalab' ) 	=> 'soft-rounded'
			)
		),
		array( 'param_name' => 'inner_color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner color scheme', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ), 'value' => $color_scheme_arr ),
	));
}

function novalab_bt_bb_column_inner_class( $class, $atts ) {
	if ( isset( $atts['top_border'] ) && $atts['top_border'] != '' ) {
		$class[] = 'bt_bb_top_border';
	}
	if ( isset( $atts['bottom_border'] ) && $atts['bottom_border'] != '' ) {
		$class[] = 'bt_bb_bottom_border';
	}
	if ( isset( $atts['left_border'] ) && $atts['left_border'] != '' ) {
		$class[] = 'bt_bb_left_border';
	}
	if ( isset( $atts['right_border'] ) && $atts['right_border'] != '' ) {
		$class[] = 'bt_bb_right_border';
	}
	if ( isset( $atts['border_color'] ) && $atts['border_color'] != '' ) {
		$class[] = 'bt_bb_border_color' . '_' . $atts['border_color'];
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['inner_color_scheme'] ) && $atts['inner_color_scheme'] != '' ) {
		$class[] = 'bt_bb_inner_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['inner_color_scheme'] );
	}
	return $class;
}
add_filter( 'bt_bb_column_inner_class', 'novalab_bt_bb_column_inner_class', 10, 2 );



// HEADLINE - SUPEHEADLINE & SUBHEADLINE FONT WEIGHT

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_headline', 'font_weight' );
}
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_headline', 'size' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_headline', array(
		array( 'param_name' => 'size', 'type' => 'dropdown', 'preview' => true, 'heading' => esc_html__( 'Size', 'novalab' ), 'description' => esc_html__( 'Predefined heading sizes, independent of html tag', 'novalab' ),
			'value' => array(
				esc_html__( 'Inherit', 'novalab' ) 				=> 'inherit',
				esc_html__( 'Extra small', 'novalab' ) 			=> 'extrasmall',
				esc_html__( 'Small', 'novalab' ) 				=> 'small',
				esc_html__( 'Medium', 'novalab' ) 				=> 'medium',
				esc_html__( 'Normal', 'novalab' ) 				=> 'normal',
				esc_html__( 'Large', 'novalab' ) 				=> 'large',
				esc_html__( 'Extra large', 'novalab' ) 			=> 'extralarge',
				esc_html__( 'Huge', 'novalab' ) 				=> 'huge'
			)
		),
		array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'novalab' ), 'group' => esc_html__( 'Font', 'novalab' ),
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
		array( 'param_name' => 'supertitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Supertitle font weight', 'novalab' ), 'group' => esc_html__( 'Font', 'novalab' ),
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
		array( 'param_name' => 'subtitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Subtitle font weight', 'novalab' ), 'group' => esc_html__( 'Font', 'novalab' ),
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
	));
}

function novalab_bt_bb_headline_class( $class, $atts ) {
	if ( isset( $atts['supertitle_font_weight'] ) && $atts['supertitle_font_weight'] != '' ) {
		$class[] = 'bt_bb_supertitle_font_weight' . '_' . $atts['supertitle_font_weight'];
	}
	if ( isset( $atts['subtitle_font_weight'] ) && $atts['subtitle_font_weight'] != '' ) {
		$class[] = 'bt_bb_subtitle_font_weight' . '_' . $atts['subtitle_font_weight'];
	}
	if ( $atts['headline'] == '' ) {
		$class[] = 'btNoHeadline';
	}
	return $class;
}
add_filter( 'bt_bb_headline_class', 'novalab_bt_bb_headline_class', 10, 2 );



// BUTTON - STYLE, WEIGHT, ICON COLOR SCHEME

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( "bt_bb_button", 'style' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_button', array(
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'novalab' ), 'preview' => true, 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Outline', 'novalab' ) 						=> 'outline',
				esc_html__( 'Outline (thinner line)', 'novalab' ) 		=> 'outline_thin',
				esc_html__( 'Filled', 'novalab' ) 						=> 'filled',
				esc_html__( 'Clean', 'novalab' ) 						=> 'clean',
				esc_html__( 'Underline', 'novalab' ) 					=> 'underline'
			)
		),
		array( 'param_name' => 'icon_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Icon color scheme', 'novalab' ), 'value' => $color_scheme_arr ),
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Default', 'novalab' ) 		=> '',
				esc_html__( 'Thin', 'novalab' ) 		=> 'thin',
				esc_html__( 'Lighter', 'novalab' ) 		=> 'lighter',
				esc_html__( 'Light', 'novalab' ) 		=> 'light',
				esc_html__( 'Normal', 'novalab' ) 		=> 'normal',
				esc_html__( 'Medium', 'novalab' ) 		=> 'medium',
				esc_html__( 'Semi bold', 'novalab' ) 	=> 'semi-bold',
				esc_html__( 'Bold', 'novalab' ) 		=> 'bold',
				esc_html__( 'Bolder', 'novalab' ) 		=> 'bolder',
				esc_html__( 'Black', 'novalab' ) 		=> 'black'
			)
		),
	));
}

function novalab_bt_bb_button_class( $class, $atts ) {
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	if ( isset( $atts['icon_color_scheme'] ) && $atts['icon_color_scheme'] != '' ) {
		$class[] = 'bt_bb_icon_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['icon_color_scheme'] );
	}
	return $class;
}
add_filter( 'bt_bb_button_class', 'novalab_bt_bb_button_class', 10, 2 );



// SERVICE - TITLE COLOR SCHEME, CONTENT ALIGN, TEXT OPACITY

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_service', array(
		array( 'param_name' => 'title_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'novalab' ), 'heading' => esc_html__( 'Title color scheme', 'novalab' ), 'value' => $color_scheme_arr ),
		array( 'param_name' => 'content_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Content align', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Middle', 'novalab' ) 			=> 'middle',
				esc_html__( 'Top', 'novalab' ) 				=> '',
				esc_html__( 'Bottom', 'novalab' ) 			=> 'bottom'
			)
		),
		array( 'param_name' => 'text_opacity', 'type' => 'dropdown', 'heading' => esc_html__( 'Text opacity', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Default (100%)', 'novalab' ) 				=> '',
				esc_html__( 'Light transparency (50%)', 'novalab' ) 	=> 'light'
			)
		)
	));
}

function novalab_bt_bb_service_class( $class, $atts ) {
	if ( isset( $atts['title_color_scheme'] ) && $atts['title_color_scheme'] != '' ) {
		$class[] = 'bt_bb_title_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['title_color_scheme'] );
	}
	if ( isset( $atts['content_align'] ) && $atts['content_align'] != '' ) {
		$class[] = 'bt_bb_content_align' . '_' . $atts['content_align'];
	}
	if ( isset( $atts['text_opacity'] ) && $atts['text_opacity'] != '' ) {
		$class[] = 'bt_bb_text_opacity' . '_' . $atts['text_opacity'];
	}
	return $class;
}

add_filter( 'bt_bb_service_class', 'novalab_bt_bb_service_class', 10, 2 );


// ICON - TEXT SIZE, TEXT WEIGHT

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_icon', array(
		array( 'param_name' => 'text_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Text size', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
			'value' => array(
				esc_html__( 'Inherit', 'novalab' ) 			=> '',
				esc_html__( 'Extra small', 'novalab' ) 		=> 'xsmall',
				esc_html__( 'Small', 'novalab' ) 			=> 'small',
				esc_html__( 'Normal', 'novalab' ) 			=> 'normal',
				esc_html__( 'Large', 'novalab' ) 			=> 'large',
				esc_html__( 'Extra large', 'novalab' ) 		=> 'xlarge'
			)
		),
		array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'novalab' ), 'group' => esc_html__( 'Design', 'novalab' ),
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
	));
}

function novalab_bt_bb_icon_class( $class, $atts ) {
	if ( isset( $atts['text_size'] ) && $atts['text_size'] != '' ) {
		$class[] = 'bt_bb_text_size' . '_' . $atts['text_size'];
	}
	if ( isset( $atts['font_weight'] ) && $atts['font_weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['font_weight'];
	}
	if ( $atts['text'] != '' ) {
		$class[] = 'btWithText';
	}
	return $class;
}

add_filter( 'bt_bb_icon_class', 'novalab_bt_bb_icon_class', 10, 2 );



// CUSTOM MENU - COLORS

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_custom_menu', array(
		array( 'param_name' => 'color', 'default' => '', 'type' => 'dropdown', 'heading' => esc_html__( 'Colors', 'novalab' ),
			'value' => array(
				esc_html__( 'Dark colors', 'novalab' ) 			=> '',
				esc_html__( 'Light colors', 'novalab' ) 		=> 'light'
			)
		),
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'novalab' ),
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
	));
}

function novalab_bt_bb_custom_menu_class( $class, $atts ) {
	if ( isset( $atts['color'] ) && $atts['color'] != '' ) {
		$class[] = 'bt_bb_color' . '_' . $atts['color'];
	}
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	return $class;
}

add_filter( 'bt_bb_custom_menu_class', 'novalab_bt_bb_custom_menu_class', 10, 2 );



// ICON - TEXT SIZE, TEXT WEIGHT

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( "bt_bb_content_slider", 'arrows_size' );
}

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( "bt_bb_content_slider", 'show_dots' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_content_slider', array(
		array( 'param_name' => 'arrows_size', 'type' => 'dropdown', 'preview' => true, 'default' => 'normal', 'heading' => esc_html__( 'Navigation arrows size', 'novalab' ), 'group' => esc_html__( 'Navigation', 'novalab' ),
			'value' => array(
				esc_html__( 'No arrows', 'novalab' ) 	=> 'no_arrows',
				esc_html__( 'Small', 'novalab' ) 		=> 'small',
				esc_html__( 'Normal', 'novalab' ) 		=> 'normal',
				esc_html__( 'Large', 'novalab' ) 		=> 'large'
			)
		),
		array( 'param_name' => 'show_dots', 'type' => 'dropdown', 'heading' => esc_html__( 'Dots navigation', 'novalab' ), 'group' => esc_html__( 'Navigation', 'novalab' ),
			'value' => array(
				esc_html__( 'Bottom', 'novalab' ) 		=> 'bottom',
				esc_html__( 'Below', 'novalab' ) 		=> 'below',
				esc_html__( 'Hide', 'novalab' ) 		=> 'hide'
			)
		),
		array( 'param_name' => 'navigation_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Navigation style', 'novalab' ), 'group' => esc_html__( 'Navigation', 'novalab' ),
			'value' => array(
				esc_html__( 'Lines', 'novalab' ) 			=> '',
				esc_html__( 'Dots', 'novalab' ) 			=> 'dots'
			)
		),
		array( 'param_name' => 'navigation_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Navigation arrow position', 'novalab' ), 'group' => esc_html__( 'Navigation', 'novalab' ),
			'value' => array(
				esc_html__( 'Within content', 'novalab' ) 			=> '',
				esc_html__( 'Outside content', 'novalab' ) 			=> 'outside'
			)
		),
		array( 'param_name' => 'align_navigation', 'type' => 'dropdown', 'heading' => esc_html__( 'Align navigation', 'novalab' ), 'group' => esc_html__( 'Navigation', 'novalab' ),
			'value' => array(
				esc_html__( 'Inherit', 'novalab' ) 				=> '',
				esc_html__( 'Left', 'novalab' ) 				=> 'left',
				esc_html__( 'Right', 'novalab' ) 				=> 'right',
				esc_html__( 'Center', 'novalab' ) 				=> 'center'
			)
		),
		array( 'param_name' => 'navigation_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Navigation color', 'novalab' ), 'group' => esc_html__( 'Navigation', 'novalab' ),
			'value' => array(
				esc_html__( 'Borderless (dark color)', 'novalab' ) 					=> '',
				esc_html__( 'Filled (accent color, light background)', 'novalab' ) 	=> 'filled'
			)
		),
	));
}

function novalab_bt_bb_content_slider_class( $class, $atts ) {
	if ( isset( $atts['navigation_style'] ) && $atts['navigation_style'] != '' ) {
		$class[] = 'bt_bb_navigation_style' . '_' . $atts['navigation_style'];
	}
	if ( isset( $atts['navigation_position'] ) && $atts['navigation_position'] != '' ) {
		$class[] = 'bt_bb_navigation_position' . '_' . $atts['navigation_position'];
	}
	if ( isset( $atts['align_navigation'] ) && $atts['align_navigation'] != '' ) {
		$class[] = 'bt_bb_align_navigation' . '_' . $atts['align_navigation'];
	}
	if ( isset( $atts['navigation_color'] ) && $atts['navigation_color'] != '' ) {
		$class[] = 'bt_bb_navigation_color' . '_' . $atts['navigation_color'];
	}
	return $class;
}

add_filter( 'bt_bb_content_slider_class', 'novalab_bt_bb_content_slider_class', 10, 2 );




// GOOGLE MAP - SHAPE

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_google_maps_location', array(
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'default' => '', 'heading' => esc_html__( 'Content shape', 'novalab' ),
			'value' => array(
				esc_html__( 'Default', 'novalab' ) 		=> '',
				esc_html__( 'Square', 'novalab' ) 		=> 'square',
				esc_html__( 'Rounded', 'novalab' ) 		=> 'rounded'
			)
		),
	));
}

function novalab_bt_bb_google_maps_location_class( $class, $atts ) {
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	return $class;
}

add_filter( 'bt_bb_google_maps_location_class', 'novalab_bt_bb_google_maps_location_class', 10, 2 );
