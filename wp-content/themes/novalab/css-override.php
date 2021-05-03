<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = BoldThemesFramework::$crush_vars;
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#33d1cb";
}
if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#1f3b64";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Barlow";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Barlow";
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Barlow";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Barlow";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Barlow";
}
if ( isset( $boldthemes_crush_vars['buttonFont'] ) ) {
	$buttonFont = $boldthemes_crush_vars['buttonFont'];
} else {
	$buttonFont = "Barlow";
}
if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "80";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -15" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );$accentColorMidTransparent = CssCrush\fn__a_adjust( $accentColor." -50" );$accentColorTransparent = CssCrush\fn__a_adjust( $accentColor." -100" );$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -15" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -25" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );$css_override = sanitize_text_field("select,
input{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
.fancy-select ul.options li:hover{color: {$accentColor};}
.bt-content a{color: {$accentColor};}
a:hover{
    color: {$accentColor};}
.btText a{color: {$accentColor};}
body{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
blockquote{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
blockquote:before{
    color: {$accentColor};}
.bt-content-holder table thead th{
    background-color: {$accentColor};}
.btAccentDarkHeader .btPreloader .animation > div:first-child,
.btLightAccentHeader .btPreloader .animation > div:first-child,
.btTransparentLightHeader .btPreloader .animation > div:first-child{
    background-color: {$accentColor};}
.btLoader div{
    background-color: {$accentColor};}
.btPreloader .animation .preloaderLogo{height: {$logoHeight}px;}
body.error404 .btErrorPage .port .bt_bb_button.bt_bb_style_filled a{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
body.error404 .btErrorPage .port .bt_bb_button.bt_bb_style_filled a:hover{-webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
.btPageHeadline{background-color: {$accentColor};}
.bt-no-search-results .bt_bb_port #searchform input[type='submit']{
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.bt-no-search-results .bt_bb_port #searchform input[type='submit']:hover{
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    background-color: {$accentColor};}
.bt-no-search-results .bt_bb_port .bt_bb_button.bt_bb_style_filled a{
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.bt-no-search-results .bt_bb_port .bt_bb_button.bt_bb_style_filled a:hover{
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    background-color: {$accentColor};}
.mainHeader{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.mainHeader a:hover{color: {$accentColor};}
.menuPort{font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.menuPort nav ul li a:hover{color: {$accentColor};}
.menuPort nav > ul > li > a:before,
.menuPort nav > ul > li > a:after{
    background: {$accentColor};}
.menuPort nav > ul > li > a:after{
    background: {$accentColor};}
.menuPort nav > ul > li.on > a:before,
.menuPort nav > ul > li:hover > a:before{
    background: {$accentColor};}
.menuPort nav > ul > li > a{line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-item > a{color: {$accentColor} !important;}
.btMenuHorizontal .menuPort nav > ul > li:not(.btMenuWideDropdown) > ul > li.menu-item-has-children > a:before{
    background-color: {$accentColor};}
.btTextLogo{font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;
    line-height: {$logoHeight}px;}
.bt-logo-area .logo img{height: {$logoHeight}px;}
.btTransparentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btAccentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btLightDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .bt-horizontal-menu-trigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btAccentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btLightDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .bt-horizontal-menu-trigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .bt-horizontal-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li a:hover{color: {$accentColor};}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort > nav > ul > li > ul li a:hover{-webkit-box-shadow: inset 5px 0 0 0 {$accentColor};
    box-shadow: inset 5px 0 0 0 {$accentColor};}
html:not(.touch) body.btMenuHorizontal .menuPort > nav > ul > li.btMenuWideDropdown > ul > li > a{
    border-bottom: 4px solid {$accentColor};}
.btMenuHorizontal .topBarInMenu{
    height: {$logoHeight}px;}
.btStickyHeaderActive.btTransparentAlternateHeader .mainHeader{background-color: {$alternateColor};}
.btMenuVertical.btTransparentAlternateHeader .mainHeader{background-color: {$alternateColor};}
.btStickyHeaderActive.btTransparentAlternateHeader .bt-vertical-header-top{background-color: {$alternateColor};}
.btTransparentAlternateHeader .bt-below-logo-area,
.btTransparentAlternateHeader .topBar{background-color: {$alternateColor};}
.btTransparentAlternateHeader .bt-below-logo-area a:hover,
.btTransparentAlternateHeader .topBar a:hover{color: {$accentColor};}
.btAccentLightHeader .bt-below-logo-area,
.btAccentLightHeader .topBar{background-color: {$accentColor};}
.btAccentLightHeader .bt-below-logo-area a:hover,
.btAccentLightHeader .topBar a:hover{color: {$alternateColor};}
.btAlternateLightHeader .mainHeader,
.btAlternateLightHeader .bt-vertical-header-top{
    color: {$alternateColor};}
.btAlternateLightHeader .menuPort ul a{color: {$alternateColor} !important;}
.btAlternateLightHeader.btMenuVertical .bt-below-logo-area nav ul li a,
.btAlternateLightHeader.btMenuBelowLogo .bt-below-logo-area nav ul li a{
    background-color: {$alternateColor};}
.btAlternateLightHeader .bt-below-logo-area,
.btAlternateLightHeader .topBar{background-color: {$alternateColor};}
.btAlternateLightHeader .bt-below-logo-area a:hover,
.btAlternateLightHeader .topBar a:hover{color: {$accentColor};}
.btAccentDarkHeader .bt-below-logo-area,
.btAccentDarkHeader .topBar{background-color: {$accentColor};}
.btAccentDarkHeader .bt-below-logo-area a:hover,
.btAccentDarkHeader .topBar a:hover{color: {$alternateColor};}
.btLightAccentHeader .bt-logo-area,
.btLightAccentHeader .bt-vertical-header-top{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal.btBelowMenu .mainHeader .bt-logo-area{background-color: {$accentColor};}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .logo img{height: -webkit-calc({$logoHeight}px*0.6);
    height: -moz-calc({$logoHeight}px*0.6);
    height: calc({$logoHeight}px*0.6);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .btTextLogo{
    line-height: -webkit-calc({$logoHeight}px*0.6);
    line-height: -moz-calc({$logoHeight}px*0.6);
    line-height: calc({$logoHeight}px*0.6);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .menuPort nav > ul > li > a,
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .menuPort nav > ul > li > .subToggler{line-height: -webkit-calc({$logoHeight}px*0.6);
    line-height: -moz-calc({$logoHeight}px*0.6);
    line-height: calc({$logoHeight}px*0.6);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .topBarInMenu{height: -webkit-calc({$logoHeight}px*0.6);
    height: -moz-calc({$logoHeight}px*0.6);
    height: calc({$logoHeight}px*0.6);}
.btAlternateLightHeader.btHasAltLogo .bt-vertical-menu-trigger .bt_bb_icon:before,
.btAlternateLightHeader.btHasAltLogo .bt-vertical-menu-trigger .bt_bb_icon:after{border-top-color: {$alternateColor};}
.btAlternateLightHeader.btHasAltLogo .bt-vertical-menu-trigger .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$alternateColor};}
.btTransparentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btAccentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btLightDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .bt-vertical-menu-trigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btAccentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btLightDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .bt-vertical-menu-trigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .bt-vertical-menu-trigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:before:hover{color: {$accentColor};}
.btMenuHorizontal .topBarInLogoArea{
    height: {$logoHeight}px;}
.btMenuHorizontal .topBarInLogoArea .topBarInLogoAreaCell{border: 0 solid {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:hover:before{color: {$accentColor};}
.btMenuVertical .mainHeader nav ul li:not(.current-menu-ancestor) > ul{
    color: {$accentColor} !important;}
.btDarkSkin .bt-site-footer-copy-menu .port:before,
.btLightSkin .btDarkSkin .bt-site-footer-copy-menu .port:before,
.btDarkSkin.btLightSkin .btDarkSkin .bt-site-footer-copy-menu .port:before{background-color: {$accentColor};}
.sticky .headline:before{
    color: {$accentColor};}
.bt-content .btArticleHeadline .bt_bb_headline a:hover,
.btArticleContentHolder .btArticleTextContent .bt_bb_headline a:hover{color: {$accentColor};}
.bt-content .btArticleHeadline .bt_bb_headline .bt_bb_headline_subheadline a:hover,
.bt-content .btArticleHeadline .bt_bb_headline .bt_bb_headline_subheadline span a:hover,
.btArticleContentHolder .btArticleTextContent .bt_bb_headline .bt_bb_headline_subheadline a:hover,
.btArticleContentHolder .btArticleTextContent .bt_bb_headline .bt_bb_headline_subheadline span a:hover{color: {$accentColor};}
.btBlogTitleColor_alternate_accent .btArticleHeadline .bt_bb_headline,
.btBlogTitleColor_alternate_accent .btArticleContentHolder .btArticleTextContent .bt_bb_headline{color: {$alternateColor};}
.btBlogTitleColor_alternate_accent .btArticleHeadline .bt_bb_headline .bt_bb_headline_superheadline,
.btBlogTitleColor_alternate_accent .btArticleHeadline .bt_bb_headline .bt_bb_headline_subheadline,
.btBlogTitleColor_alternate_accent .btArticleContentHolder .btArticleTextContent .bt_bb_headline .bt_bb_headline_superheadline,
.btBlogTitleColor_alternate_accent .btArticleContentHolder .btArticleTextContent .bt_bb_headline .bt_bb_headline_subheadline{color: {$alternateColor};}
.btBlogTitleColor_accent_alternate .btArticleHeadline .bt_bb_headline,
.btBlogTitleColor_accent_alternate .btArticleContentHolder .btArticleTextContent .bt_bb_headline{color: {$accentColor};}
.btBlogTitleColor_accent_alternate .btArticleHeadline .bt_bb_headline .bt_bb_headline_superheadline,
.btBlogTitleColor_accent_alternate .btArticleHeadline .bt_bb_headline .bt_bb_headline_subheadline,
.btBlogTitleColor_accent_alternate .btArticleContentHolder .btArticleTextContent .bt_bb_headline .bt_bb_headline_superheadline,
.btBlogTitleColor_accent_alternate .btArticleContentHolder .btArticleTextContent .bt_bb_headline .bt_bb_headline_subheadline{color: {$accentColor};}
.btBlogTitleColor_accent_alternate .btArticleHeadline .bt_bb_headline.bt_bb_dash_top .bt_bb_headline_content:before,
.btBlogTitleColor_accent_alternate .btArticleContentHolder .btArticleTextContent .bt_bb_headline.bt_bb_dash_top .bt_bb_headline_content:before{border-color: {$alternateColor};}
.btPostSingleItemStandard .btArticleShareEtc > div.btReadMoreColumn .bt_bb_button a{color: {$accentColor};}
.btPortfolioSingle.btPostSingleItemStandard .btArticleContent .btArticleSuperMeta dl dt{
    color: {$accentColor};}
.btMediaBox.btQuote:before,
.btMediaBox.btLink:before{
    background-color: {$accentColor};}
.sticky.btArticleListItem .btArticleHeadline h1 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h2 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h3 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h4 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h5 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h6 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h7 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h8 .bt_bb_headline_content span a:after{
    color: {$accentColor};}
.post-password-form p:first-child{color: {$alternateColor};}
.post-password-form p:nth-child(2) input[type=\"submit\"]{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif !important;
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.post-password-form p:nth-child(2) input[type=\"submit\"]:hover{-webkit-box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btPagination{
    font-family: \"{$buttonFont}\",Arial,Arial,Helvetica,sans-serif;}
.btPagination .paging a:hover{color: {$accentColor};}
.btPagination .paging a:hover:after{color: {$accentColor} !important;}
.btPrevNextNav .btPrevNext:hover .btPrevNextTitle{color: {$accentColor};}
.rtl .btPrevNextNav .btPrevNext .bt-prev-next-image{
    border-left: 4px solid {$accentColor};}
.btPrevNextNav .btPrevNext .bt-prev-next-image:after{
    background-color: {$accentColor};}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextTitle{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextDir{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.rtl .btPrevNextNav .btPrevNext.btNext .bt-prev-next-image{
    border-right: 4px solid {$accentColor};}
.btArticleCategories a:hover,
.bt-content .btArticleCategories a:hover{color: {$accentColor};}
.btArticleCategories a:not(:first-child):before,
.bt-content .btArticleCategories a:not(:first-child):before{
    background-color: {$accentColor};}
.bt-comments-box .vcard .posted{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt-comments-box .commentTxt p.edit-link,
.bt-comments-box .commentTxt p.reply{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt-comments-box .comment-navigation a,
.bt-comments-box .comment-navigation span{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.comment-awaiting-moderation{color: {$accentColor};}
a#cancel-comment-reply-link{
    color: {$accentColor};}
a#cancel-comment-reply-link:hover{color: {$alternateColor};}
.bt-comment-submit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif !important;
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
body:not(.btNoDashInSidebar) .btBox > h4:after,
body:not(.btNoDashInSidebar) .btCustomMenu > h4:after,
body:not(.btNoDashInSidebar) .btTopBox > h4:after{
    border-bottom: 3px solid {$accentColor};}
.btBox ul li.current-menu-item > a,
.btCustomMenu ul li.current-menu-item > a,
.btTopBox ul li.current-menu-item > a{color: {$accentColor};}
.btBox .btImageTextWidget .btImageTextWidgetImage a:after,
.btCustomMenu .btImageTextWidget .btImageTextWidgetImage a:after,
.btTopBox .btImageTextWidget .btImageTextWidgetImage a:after{
    background-color: {$accentColor};}
.btBox .btImageTextWidget .btImageTextWidgetText .bt_bb_headline_content span a:hover,
.btCustomMenu .btImageTextWidget .btImageTextWidgetText .bt_bb_headline_content span a:hover,
.btTopBox .btImageTextWidget .btImageTextWidgetText .bt_bb_headline_content span a:hover{color: {$accentColor};}
.widget_calendar table caption{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    background: {$accentColor};}
.widget_calendar table tbody tr td#today{color: {$accentColor};}
.widget_rss li a.rsswidget{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_shopping_cart .total{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_shopping_cart .buttons .button{
    background: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove{
    background-color: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove:hover{background-color: {$alternateColor};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;
    background-color: {$accentColor};}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler{
    background-color: {$accentColor};}
.widget_recent_reviews{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_product_search button[type=\"submit\"]{color: {$accentColor} !important;}
.widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle{
    background-color: {$accentColor};}
.btBox .tagcloud a,
.btTags ul a{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.btBox .tagcloud a:before,
.btTags ul a:before{
    color: {$accentColor};}
.btBox .tagcloud a:hover,
.btTags ul a:hover{color: {$accentColor};}
.topTools a.btIconWidget:hover,
.topBarInMenu a.btIconWidget:hover{color: {$accentColor};}
.btAccentIconWidget.btIconWidget .btIconWidgetIcon{color: {$accentColor};}
a.btAccentIconWidget.btIconWidget:hover{color: {$accentColor};}
.bt-site-footer-widgets .btSearch button,
.bt-site-footer-widgets .btSearch input[type=submit],
.btSidebar .btSearch button,
.btSidebar .btSearch input[type=submit],
.btSidebar .widget_product_search button,
.btSidebar .widget_product_search input[type=submit]{
    color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon a.bt_bb_icon_holder{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColorDark};}
.btSearchInner.btFromTopBox button:hover:before{color: {$accentColor};}
div.btButtonWidget .btButtonWidgetLink{
    color: {$accentColor};
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;}
div.btButtonWidget .btButtonWidgetLink:hover{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
div.btButtonWidget .btButtonWidgetLink .btButtonWidgetContent span.btButtonWidgetText{font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
div.btButtonWidget.btLightAccentButton.btOutlineButton .btButtonWidgetLink:hover{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
div.btButtonWidget.btLightAccentButton.btFilledButton .btButtonWidgetLink{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
div.btButtonWidget.btAccentLightButton.btOutlineButton .btButtonWidgetLink{color: {$accentColor};
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;}
div.btButtonWidget.btAccentLightButton.btOutlineButton .btButtonWidgetLink:hover{color: {$accentColor};}
div.btButtonWidget.btAccentLightButton.btFilledButton .btButtonWidgetLink{color: {$accentColor};}
div.btButtonWidget.btDarkAccentButton.btOutlineButton .btButtonWidgetLink:hover{color: {$accentColor};}
div.btButtonWidget.btDarkAccentButton.btFilledButton .btButtonWidgetLink{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
.btStickyHeaderActive.btStickyHeaderOpen.btHasAltLogo .btButtonWidget.btLightAccentButton.btOutlineButton .btButtonWidgetLink{color: {$accentColor} !important;
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;}
.btStickyHeaderActive.btStickyHeaderOpen.btHasAltLogo .btButtonWidget.btLightAccentButton.btOutlineButton .btButtonWidgetLink:hover{
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btStickyHeaderActive.btStickyHeaderOpen .btButtonWidget.btAccentLightButton.btOutlineButton .btButtonWidgetLink:hover{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset !important;
    box-shadow: 0 0 0 3em {$accentColor} inset !important;}
.btStickyHeaderActive.btStickyHeaderOpen .btButtonWidget.btAccentLightButton.btFilledButton .btButtonWidgetLink{
    -webkit-box-shadow: 0 0 0 3em {$accentColor} inset !important;
    box-shadow: 0 0 0 3em {$accentColor} inset !important;}
.bt_bb_section[class*=\"accent_top_gradient\"]:before{background: -webkit-linear-gradient(270deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);
    background: -moz-linear-gradient(270deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);
    background: linear-gradient(180deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);}
.bt_bb_section[class*=\"accent_bottom_gradient\"]:before{background: -webkit-linear-gradient(90deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);
    background: -moz-linear-gradient(90deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);
    background: linear-gradient(0deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);}
.bt_bb_section[class*=\"accent_right_gradient\"]:before{background: -webkit-linear-gradient(180deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);
    background: -moz-linear-gradient(180deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);
    background: linear-gradient(270deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);}
.bt_bb_section[class*=\"accent_left_gradient\"]:before{background: -webkit-linear-gradient(0deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);
    background: -moz-linear-gradient(0deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);
    background: linear-gradient(90deg,{$accentColorMidTransparent} 0%,{$accentColorTransparent} 45%);}
@media (min-width: 993px){.bt_bb_column.bt_bb_border_color_accent,
.bt_bb_column_inner.bt_bb_border_color_accent{border-color: {$accentColorLight};}
}.bt_bb_separator.btWithText .bt_bb_separator_text{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_headline .bt_bb_headline_superheadline{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_headline h1 strong,
.bt_bb_headline h2 strong,
.bt_bb_headline h3 strong,
.bt_bb_headline h4 strong,
.bt_bb_headline h5 strong,
.bt_bb_headline h6 strong{color: {$accentColor};}
.bt_bb_dash_top.bt_bb_headline h1 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h1 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h1 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h2 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h2 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h2 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h3 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h3 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h3 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h4 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h4 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h4 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h5 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h5 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h5 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h6 .bt_bb_headline_content:before,
.bt_bb_dash_top.bt_bb_headline h6 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h6 .bt_bb_headline_content:before,
.bt_bb_dash_top_bottom.bt_bb_headline h6 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h6 .bt_bb_headline_content:before,
.bt_bb_dash_bottom.bt_bb_headline h6 .bt_bb_headline_content:after{border-color: {$accentColor};}
.bt_bb_icon.bt_bb_style_filled.btIcoTwitter .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_filled.btIcoFacebook .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_filled.btIcoLinkedin .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_filled.btIcoVK .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_filled.btIcoPinterest .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_filled.btIcoYelp .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_filled.btIcoYoutube .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_filled.btIcoWhatsApp .bt_bb_icon_holder:hover:before{-webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
.bt_bb_icon.bt_bb_style_borderless.btIcoTwitter .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_borderless.btIcoFacebook .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_borderless.btIcoLinkedin .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_borderless.btIcoVK .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_borderless.btIcoPinterest .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_borderless.btIcoYelp .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_borderless.btIcoYoutube .bt_bb_icon_holder:hover:before,
.bt_bb_icon.bt_bb_style_borderless.btIcoWhatsApp .bt_bb_icon_holder:hover:before{color: {$accentColor} !important;}
.bt_bb_button .bt_bb_button_text{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_button.bt_bb_style_underline a:hover{border-color: {$accentColor};
    color: {$accentColor};}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title{font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_service:hover .bt_bb_service_content_title a{color: {$accentColor};}
.bt_bb_price_list .bt_bb_price_list_price_text{font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;
    background: -webkit-linear-gradient(80deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: -moz-linear-gradient(80deg,{$alternateColor} 0%,{$accentColor} 100%);
    background: linear-gradient(10deg,{$alternateColor} 0%,{$accentColor} 100%);}
.bt_bb_price_list .bt_bb_price_list_price_inner ul li{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_price_list .bt_bb_price_list_price_inner ul li.included:before{
    color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta .bt_bb_latest_posts_item_date{font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_title a:hover{color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_category .post-categories li:not(:first-child):before{
    background-color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_category a{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_category a:hover{color: {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_category > a:not(:first-child):before{
    background-color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item:before,
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item:after{
    background: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item:after{
    background: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item:hover:before,
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item.active:before{background: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_category .post-categories li:not(:first-child):before{
    background-color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_category a{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_category a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_category > a:not(:first-child):before{
    background-color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > span{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > span a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_post_share .bt_bb_icon:hover .bt_bb_icon_holder:before{-webkit-box-shadow: 0 0 0 3em {$accentColor} inset;
    box-shadow: 0 0 0 3em {$accentColor} inset;}
.bt_bb_masonry_post_grid .bt_bb_post_grid_loader{
    border-top: .4em solid {$accentColor};}
.slick-slider button.slick-arrow:hover:before{color: {$accentColor};}
.bt_bb_navigation_color_filled .slick-slider button.slick-arrow:before{
    color: {$accentColor};}
.slick-dots li.slick-active,
.slick-dots li:hover{background: {$accentColor};}
.bt_bb_custom_menu div ul a:hover{color: {$accentColor};}
.bt_bb_tabs.bt_bb_style_simple .bt_bb_tabs_header li.on{border-color: {$accentColor};}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title_content .bt_bb_icon_holder{
    color: {$accentColor};}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title_content .bt_bb_accordion_item_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_counter_holder .bt_bb_counter{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_countdown.btCounterHolder{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_countdown.btCounterHolder .btCountdownHolder span[class$=\"_text\"]{
    color: {$accentColor};}
.bt_bb_countdown.btCounterHolder .btCountdownHolder span[class$=\"_text\"] > span{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_progress_bar_advanced .bt_bb_progress_bar_advanced_highlighted_text{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_progress_bar_advanced .bt_bb_progress_bar_advanced_content .bt_bb_progress_bar_advanced_title{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.wpcf7-form .wpcf7-submit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif !important;
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.wpcf7-form .wpcf7-submit:hover{-webkit-box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
div.wpcf7-validation-errors,
div.wpcf7-acceptance-missing{border: 2px solid {$accentColor};}
span.wpcf7-not-valid-tip{color: {$accentColor};}
.btNewsletter .btNewsletterColumn input:focus,
.btNewsletter .btNewsletterColumn input:active{
    color: {$alternateColor} !important;}
.btOutline.btNewsletter .btNewsletterButton input{-webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;}
.btOutline.btNewsletter .btNewsletterButton input:hover{-webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btContact input:not([type='submit']):focus,
.btContact input:not([type='submit']):active,
.btContact textarea:focus,
.btContact textarea:active{
    color: {$alternateColor} !important;}
.btContact .btContactButton input{
    -webkit-box-shadow: 0 0 0 4em {$alternateColor} inset,0 0 0 rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$alternateColor} inset,0 0 0 rgba(0,0,0,.1);}
.btContact .btContactButton input:hover{
    -webkit-box-shadow: 0 0 0 4em {$alternateColor} inset,0 5px 8px rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$alternateColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btBook.btContact .btContactButton input{color: {$accentColor} !important;}
.bt_bb_testimonial .bt_bb_testimonial_text span{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_testimonial .bt_bb_testimonial_text:before{
    color: {$accentColor};}
.bt_bb_quote_color_alternate.bt_bb_testimonial .bt_bb_testimonial_text:before{color: {$alternateColor};}
.products ul li.product .btWooShopLoopItemInner .bt_bb_headline .bt_bb_headline_content a:hover,
ul.products li.product .btWooShopLoopItemInner .bt_bb_headline .bt_bb_headline_content a:hover{color: {$accentColor};}
.products ul li.product .btWooShopLoopItemInner .added:after,
.products ul li.product .btWooShopLoopItemInner .loading:after,
ul.products li.product .btWooShopLoopItemInner .added:after,
ul.products li.product .btWooShopLoopItemInner .loading:after{
    background-color: {$alternateColor};}
.products ul li.product .btWooShopLoopItemInner .added_to_cart,
ul.products li.product .btWooShopLoopItemInner .added_to_cart{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    color: {$accentColor};}
.products ul li.product .onsale,
ul.products li.product .onsale{
    background: {$alternateColor};}
nav.woocommerce-pagination ul li a:focus,
nav.woocommerce-pagination ul li a:hover,
nav.woocommerce-pagination ul li span.current{
    color: {$accentColor};}
div.product .onsale{
    background: {$alternateColor};}
div.product div.images .woocommerce-product-gallery__trigger:after{
    -webkit-box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;}
div.product div.images .woocommerce-product-gallery__trigger:hover:after{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    color: {$accentColor};}
table.shop_table .coupon .input-text{
    color: {$accentColor};}
table.shop_table td.product-remove a.remove{
    color: {$accentColor};
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;}
table.shop_table td.product-remove a.remove:hover{background-color: {$accentColor};}
ul.wc_payment_methods li .about_paypal{
    color: {$accentColor};}
.woocommerce-MyAccount-navigation ul li a{
    border-bottom: 2px solid {$accentColor};}
.btDarkSkin .woocommerce-error,
.btLightSkin .btDarkSkin .woocommerce-error,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-error,
.btDarkSkin .woocommerce-info,
.btLightSkin .btDarkSkin .woocommerce-info,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-info,
.btDarkSkin .woocommerce-message,
.btLightSkin .btDarkSkin .woocommerce-message,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-message{border-top: 4px solid {$accentColor};}
.woocommerce-info a:not(.button),
.woocommerce-message a:not(.button){color: {$accentColor};}
.woocommerce-message:before,
.woocommerce-info:before{
    color: {$accentColor};}
.woocommerce .btSidebar a.button,
.woocommerce .bt-content a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .bt-content a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .bt-content input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .bt-content input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .bt-content button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .bt-content button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .bt-content input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .bt-content input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .bt-content input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .bt-content input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .bt-content a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .bt-content a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .bt-content .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .bt-content .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .bt-content button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .bt-content button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif !important;}
.woocommerce .btSidebar a.button,
.woocommerce .bt-content a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .bt-content a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .bt-content input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .bt-content input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .bt-content button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .bt-content button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .bt-content input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .bt-content input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .bt-content input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .bt-content input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .bt-content a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .bt-content a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .bt-content .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .bt-content .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .bt-content button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .bt-content button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.woocommerce .btSidebar a.button:hover,
.woocommerce .bt-content a.button:hover,
.woocommerce-page .btSidebar a.button:hover,
.woocommerce-page .bt-content a.button:hover,
.woocommerce .btSidebar input[type=\"submit\"]:hover,
.woocommerce .bt-content input[type=\"submit\"]:hover,
.woocommerce-page .btSidebar input[type=\"submit\"]:hover,
.woocommerce-page .bt-content input[type=\"submit\"]:hover,
.woocommerce .btSidebar button[type=\"submit\"]:hover,
.woocommerce .bt-content button[type=\"submit\"]:hover,
.woocommerce-page .btSidebar button[type=\"submit\"]:hover,
.woocommerce-page .bt-content button[type=\"submit\"]:hover,
.woocommerce .btSidebar input.button:hover,
.woocommerce .bt-content input.button:hover,
.woocommerce-page .btSidebar input.button:hover,
.woocommerce-page .bt-content input.button:hover,
.woocommerce .btSidebar input.alt,
.woocommerce .bt-content input.alt,
.woocommerce-page .btSidebar input.alt,
.woocommerce-page .bt-content input.alt,
.woocommerce .btSidebar a.button.alt,
.woocommerce .bt-content a.button.alt,
.woocommerce-page .btSidebar a.button.alt,
.woocommerce-page .bt-content a.button.alt,
.woocommerce .btSidebar .button.alt,
.woocommerce .bt-content .button.alt,
.woocommerce-page .btSidebar .button.alt,
.woocommerce-page .bt-content .button.alt,
.woocommerce .btSidebar button.alt,
.woocommerce .bt-content button.alt,
.woocommerce-page .btSidebar button.alt,
.woocommerce-page .bt-content button.alt,
div.woocommerce a.button:hover,
div.woocommerce input[type=\"submit\"]:hover,
div.woocommerce button[type=\"submit\"]:hover,
div.woocommerce input.button:hover,
div.woocommerce input.alt,
div.woocommerce a.button.alt,
div.woocommerce .button.alt,
div.woocommerce button.alt{
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.star-rating span:before{
    color: {$accentColor};}
p.stars a[class^=\"star-\"].active:after,
p.stars a[class^=\"star-\"]:hover:after{color: {$accentColor};}
.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option--highlighted[data-selected]{background-color: {$accentColor};}
.btQuoteBooking .btContactNext{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    color: {$accentColor};
    -webkit-box-shadow: 0 0 0 2px {$accentColor} inset,0 0 0 rgba(0,0,0,.1);
    box-shadow: 0 0 0 2px {$accentColor} inset,0 0 0 rgba(0,0,0,.1);}
.btQuoteBooking .btContactNext:hover{-webkit-box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btQuoteBooking .btQuoteSwitch.on .btQuoteSwitchInner{background: {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{-webkit-box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);
    box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);}
.btQuoteBooking .ui-slider .ui-slider-handle{background: {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal{
    background: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    border-color: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius .ddTitleText{-webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;}
.btQuoteBooking .btSubmitMessage{color: {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btQuoteBooking .btContactSubmit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    background-color: {$accentColor};
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btQuoteBooking .btContactSubmit:hover{
    -webkit-box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btDatePicker .ui-datepicker-header{background-color: {$accentColor};}
.bold_timeline_container.btTimelineAbout .bold_timeline_group_header{
    background: {$alternateColor} !important;}
.bold_timeline_container.btTimelineAbout .bold_timeline_item.btAccent .bold_timeline_item_connection{border-right-color: {$accentColor} !important;}
.bold_timeline_container.btTimelineAbout .bold_timeline_item.btAccent .bold_timeline_item_inner{background-color: {$accentColor} !important;
    border-color: {$accentColor} !important;}
.btAccentList li:before{
    color: {$accentColor};}
", array() );