<?php
/**
 * The Header for our theme.
 *
  * @package WordPress
 */

// carrega valores comuns ao site
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

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="<?php echo $html_langatr; ?>" dir="<?php echo $html_landdir ?>"'>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="<?php echo $html_langatr; ?>" dir="<?php echo $html_landdir ?>">;
'<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]>
<html lang="<?php echo $html_langatr; ?>" dir="<?php echo $html_landdir; ?>" >
<![endif]-->
<head>
	<meta charset="<?php echo $site_charset; ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- 	<meta name="viewport" content="width=1280" /> -->
	<meta property="fb:app_id" content="1079515728763942"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WJXMTGB');</script>
	<!-- End Google Tag Manager -->

	<!--[if IE8]>
	<meta http-equiv="x-ua-compatible" content="IE=EmulateIE8" >
	<![endif]-->

	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--[if gte IE 9]>
	  <style type="text/css">
		 .gradient {
			filter: none;
		 }
	  </style>
	<![endif]-->

		<!-- header.php -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?=ABRAINC_TEMA?>/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=ABRAINC_TEMA?>/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=ABRAINC_TEMA?>/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=ABRAINC_TEMA?>/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=ABRAINC_TEMA?>/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=ABRAINC_TEMA?>/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=ABRAINC_TEMA?>/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=ABRAINC_TEMA?>/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="<?=ABRAINC_TEMA?>/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?=ABRAINC_TEMA?>/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?=ABRAINC_TEMA?>/favicon-16x16.png" sizes="16x16">
<!-- 	<link rel="manifest" href="<?=ABRAINC_TEMA?>/android-chrome-manifest.json"> -->
	<meta name="apple-mobile-web-app-title" content="Abrainc">
	<meta name="application-name" content="Abrainc">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link href="<?=ABRAINC_TEMA?>/favicon.ico?v=2" rel="shortcut icon" type="image/x-icon">
	<link href="<?=ABRAINC_TEMA?>/favicon.ico?v=2" rel="icon" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<!-- 	<link rel="stylesheet" href="<?php echo $css_template; ?>/base.css?d=<?php echo date('His'); ?>" type="text/css"> -->

	<!-- wp includes -->
	<?php wp_head(); ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/locale/pt-br.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<!--
	<script src="<?php echo $thistemplate . '/js/jquery.anythingslider.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo $thistemplate . '/js/abrainc.js'; ?>" type="text/javascript"></script>
-->
	<!-- Latest compiled and minified JavaScript -->

	<script>
		$( function () {
			
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();
			
			if(dd<10) {
			    dd='0'+dd
			} 
			
			if(mm<10) {
			    mm='0'+mm
			} 
			
			today = dd+'/'+mm+'/'+yyyy;
			
			$('.grid-parceiros').wookmark();
			$('#data-inicio').datetimepicker({
				daysOfWeekDisabled: [0, 6],
				disabledHours: [moment({ h: 0 }), moment({ h: 24 })],
				locale: 'pt-br',
				defaultDate: moment().add(-1, 'days')
			});
			$('#data-fim').datetimepicker({
				daysOfWeekDisabled: [0, 6],
				disabledHours: [moment({ h: 0 }), moment({ h: 24 })],
				locale: 'pt-br',
				useCurrent: true, //Important! See issue #1075,
			});
			$("#data-inicio").on("dp.change", function (e) {
        $('#data-fim').data("DateTimePicker").minDate(e.date);
      });
      $("#data-fim").on("dp.change", function (e) {
        $('#data-inicio').data("DateTimePicker").maxDate(e.date);
      });
		});
	</script>

</head>
