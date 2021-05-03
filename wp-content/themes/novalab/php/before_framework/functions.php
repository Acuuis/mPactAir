<?php

// PRODUCT LIST HEADLINE SIZE
if ( ! function_exists( 'boldthemes_product_list_headline_size' ) ) {
	function boldthemes_product_list_headline_size ( ) {
		return 'small';
	}
}
add_filter( 'boldthemes_product_list_headline_size', 'boldthemes_product_list_headline_size' );

// PRODUCT HEADLINE DASH
if ( ! function_exists( 'boldthemes_product_list_headline_dash' ) ) {
	function boldthemes_product_list_headline_dash ( ) {
		return 'top';
	}
}
add_filter( 'boldthemes_product_list_headline_dash', 'boldthemes_product_list_headline_dash' );


// SINGLE PRODUCT SHARE
if ( ! function_exists( 'boldthemes_shop_share_settings' ) ) {
	function boldthemes_shop_share_settings ( ) {
		return array( 'xsmall', 'filled', 'circle' );
	}
}
add_filter( 'boldthemes_shop_share_settings', 'boldthemes_shop_share_settings' );


/**
 * Returns custom 404 image
 *
 * @return string - 404 image path
 */
if ( ! function_exists( 'boldthemes_get_404_image' ) ) {
	function boldthemes_get_404_image() {		
		$image_404 = boldthemes_get_option( 'image_404' );
			if ( is_numeric( $image_404 ) ) {
				$image_404 = wp_get_attachment_image_src( $image_404, 'full' );
				$image_404 = isset($image_404[0]) ? $image_404[0] : BoldThemes_Customize_Default::$data['image_404'];
			}
		return $image_404;
	}
}


/**
 * Preloader HTML output
 */
 if ( ! function_exists( 'boldthemes_preloader_html' ) ) {
	function boldthemes_preloader_html() {
		if ( ! boldthemes_get_option( 'disable_preloader' ) ) { ?>
			<div id="btPreloader" class="btPreloader">
				<div class="animation">
					<div><?php boldthemes_logo( 'preloader' ); ?></div>

					<div class="btLoader"><div></div><div></div><div></div><div></div></div>

					<p><?php echo wp_kses_post( boldthemes_get_option( 'preloader_text' ) ); ?></p>
				</div>
			</div><!-- /.preloader -->
		<?php }
	}
}