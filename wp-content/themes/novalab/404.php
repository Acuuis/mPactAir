<?php 

get_header();

$image_404 = boldthemes_get_404_image();
?>
		<section class="btErrorPage gutter bt_bb_section bt_bb_background_image" style="background-image: url('<?php echo esc_url_raw( $image_404 )?>')">
			<div class="port">
				<?php echo boldthemes_get_heading_html( 
					array ( 
						'superheadline' => esc_html__( 'WE ARE SORRY, PAGE NOT FOUND.', 'novalab' ), 
						'headline'		=> esc_html__( 'Error 404.', 'novalab' ),
						'size' 			=> 'huge'
						) 
					)
				?>
				<div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>
				<?php
					echo boldthemes_get_button_html( 
						array (
							'url' 			=> home_url( '/' ), 
							'text' 			=> esc_html__( 'Back To Home', 'novalab' ), 
							'style' 		=> 'filled',
							'color_scheme' 	=> 'dark-accent-skin',
							'size' 			=> 'medium'
						)
					);
				?>
			</div>
		</section>
<?php get_footer();