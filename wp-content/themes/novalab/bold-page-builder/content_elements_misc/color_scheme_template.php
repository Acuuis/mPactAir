<?php

$custom_css = "


	/* Section
	-------------------- */
	
	.bt_bb_section.bt_bb_color_scheme_{$scheme_id} {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}


	/* Column
	-------------------- */
	
	.bt_bb_column.bt_bb_inner_color_scheme_{$scheme_id} .bt_bb_column_content {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}


	/* Inner Column
	-------------------- */
	
	.bt_bb_column_inner.bt_bb_inner_color_scheme_{$scheme_id} .bt_bb_column_inner_content {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}


	/* Headline
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline .bt_bb_headline_superheadline {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline .bt_bb_headline_subheadline {
		color: {$color_scheme[1]};
	}


	/* Icons
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon .bt_bb_icon_holder {
		color: inherit;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon .bt_bb_icon_holder span {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon:hover a {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline .bt_bb_icon_holder:before {
		background-color: transparent;
		box-shadow: 0 0 0 2px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline:hover .bt_bb_icon_holder:before {
		background-color: {$color_scheme[1]};
		box-shadow: 0 0 0 2em {$color_scheme[1]} inset;
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 2em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled:hover .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 2px {$color_scheme[2]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless .bt_bb_icon_holder:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover .bt_bb_icon_holder:before {
		color: {$color_scheme[2]};
	}
	

	/* Buttons
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a {
		box-shadow: 0 0 0 2px {$color_scheme[1]} inset, 0 0 0 rgba(0, 0, 0, 0.1);
		color: {$color_scheme[1]};
		background-color: transparent;
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline:hover a {
		box-shadow: 0 0 0 2em {$color_scheme[1]} inset, 0 0 0 rgba(0, 0, 0, 0.1);
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a:hover {
		box-shadow: 0 0 0 4em {$color_scheme[1]} inset, 0 5px 8px rgba(0, 0, 0, 0.1);
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline_thin a {
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset, 0 0 0 rgba(0, 0, 0, 0.1);
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline_thin a:hover {
		box-shadow: 0 0 0 4em {$color_scheme[1]} inset, 0 5px 8px rgba(0, 0, 0, 0.1);
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled a {
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset, 0 0 0 rgba(0, 0, 0, 0.1);
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled a:hover {
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset, 0 5px 8px rgba(0, 0, 0, 0.1);
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover a {
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_underline a {
		border-bottom: 1px solid {$color_scheme[1]};
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_underline a:hover {
		border-bottom: 1px solid {$color_scheme[2]};
		color: {$color_scheme[2]};
	}

	.bt_bb_icon_color_scheme_{$scheme_id}.bt_bb_button .bt_bb_icon_holder:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_icon_color_scheme_{$scheme_id}.bt_bb_button a:hover .bt_bb_icon_holder:before {
		color: {$color_scheme[2]};
	}


	/* Services
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service .bt_bb_icon_holder	{
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 1em {$color_scheme[1]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service .bt_bb_icon_holder {
		box-shadow: 0 0 0 1em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service:hover .bt_bb_icon_holder	{
		box-shadow: 0 0 0 1px {$color_scheme[2]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service:hover .bt_bb_icon_holder {
		color: {$color_scheme[2]};
	}

	.bt_bb_title_color_scheme_{$scheme_id}.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title {
		color: {$color_scheme[1]};
	}


	/* Tabs
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header {
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li.on {
		border-color: {$color_scheme[1]};
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li.on,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li {
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_tabs_header li {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_tabs_header li.on {
		color: {$color_scheme[1]};
		border-color: {$color_scheme[1]};
	}


	/* Accordion
	-------------------- */
	
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id} .bt_bb_accordion_item {
		border-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id} .bt_bb_accordion_item:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item_title {
		border-color: {$color_scheme[1]};
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item.on .bt_bb_accordion_item_title,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item:hover .bt_bb_accordion_item_title {
		color: {$color_scheme[2]};
		background-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item.on:before,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_accordion_item:hover:before {
		color: {$color_scheme[2]};
	}

	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item .bt_bb_accordion_item_title {
		color: {$color_scheme[2]};
		background-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item:before {
		color: {$color_scheme[2]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item.on .bt_bb_accordion_item_title,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item:hover .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item.on:before,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_accordion_item:hover:before {
		color: {$color_scheme[1]};
	}


	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		border-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item:hover .bt_bb_accordion_item_title,
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item.on .bt_bb_accordion_item_title {
		color: {$color_scheme[2]};
		border-color: {$color_scheme[2]};
	}


	/* Price List
	-------------------- */
	
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} .bt_bb_price_list_title,
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} .bt_bb_price_list_price {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_price_inner {
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_price_inner {
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_price_inner ul li:nth-child(even) {
		background-color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list.bt_bb_style_outline .bt_bb_price_list_price_inner {
		background-color: transparent;
		color: {$color_scheme[1]};
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list.bt_bb_style_outline .bt_bb_price_list_price_inner ul li {
		border-color: {$color_scheme[1]} !important;
	}
	



	/* Advanced progress bar
	-------------------- */

	.bt_bb_icon_color_scheme_{$scheme_id}.bt_bb_progress_bar_advanced .container .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_icon_color_scheme_{$scheme_id}.bt_bb_progress_bar_advanced:hover a .container .bt_bb_icon_holder {
		color: {$color_scheme[2]};
	}

	.bt_bb_icon_color_scheme_{$scheme_id}.bt_bb_progress_bar_advanced .container .bt_bb_progress_bar_advanced_content .bt_bb_progress_bar_advanced_title {
		color: {$color_scheme[1]};
	}



	/* Card with icon
	-------------------- */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_card_icon {
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_card_icon .bt_bb_card_icon_icon,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_card_icon .bt_bb_card_icon_title {
		color: {$color_scheme[1]};
	}


	/* Card with image
	-------------------- */

	.bt_bb_background_color_scheme_{$scheme_id}.bt_bb_card_image {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}



";