<?php

if ( ! function_exists( 'boldthemes_customize_header_style' ) ) {
	function boldthemes_customize_header_style( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[header_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['header_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'header_style', array(
			'label'     => esc_html__( 'Header Style', 'novalab' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[header_style]',
			'priority'  => 62,
			'type'      => 'select',
			'choices'   => array(
				'transparent-light'  	=> esc_html__( 'Transparent Light', 'novalab' ),
				'transparent-dark'   	=> esc_html__( 'Transparent Dark', 'novalab' ),
				'transparent-alternate' => esc_html__( 'Transparent Alternate', 'novalab' ),
				'accent-dark' 			=> esc_html__( 'Accent + Dark', 'novalab' ),
				'accent-light' 			=> esc_html__( 'Light + Accent ', 'novalab' ),
				'alternate-light' 		=> esc_html__( 'Light + Alternate ', 'novalab' ),
				'light-accent' 			=> esc_html__( 'Accent + Light', 'novalab' ),
				'light-dark' 			=> esc_html__( 'Light + Dark', 'novalab' )
			)
		));
	}
}