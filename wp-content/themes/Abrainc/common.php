<?php

/* 
	Incluído em toda a página
	Dados básicos do site para uso genérico
*/

	$sitepath	  = get_bloginfo( 'wpurl' );
	$thistemplate = get_template_directory_uri();
	$css_template = $thistemplate . '/styles';
	$site_charset = get_bloginfo( 'charset' );
	$html_langatr = get_bloginfo( 'language' );
	$html_landdir = get_bloginfo( 'text_direction' );
	$page_title	  = wp_title( '|', false, 'right' );
	
	define("ABRAINC_URL",$sitepath);
	define("ABRAINC_TEMA", $thistemplate);
	

/* Não fechar a tag PHP por favor! */