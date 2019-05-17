<?php

	$sitepath	  = get_bloginfo( 'wpurl' );
	$thistemplate = get_template_directory_uri();
	$css_template = $thistemplate . '/styles';
	$site_charset = get_bloginfo( 'charset' );
	$html_langatr = get_bloginfo( 'language' );
	$html_landdir = get_bloginfo( 'text_direction' );
	$page_title	  = wp_title( '|', false, 'right' );
	
	define("ABRAINC_URL",$sitepath);
	define("ABRAINC_TEMA", $thistemplate);

	get_template_part('head');
	 
?>

<body <?php body_class(); ?>>
	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WJXMTGB"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div class="no-margin no-padding">
		<header class="desktop">
			<div class="row bg-blue">
				<div class="container">
					<div class="col-md-4">
						<?php get_template_part('searchform'); ?>
					</div>

					<div class="col-md-4">
						<div class="logo">
							<a href="<?php echo get_bloginfo('url'); ?>" target="_top">
								<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/Logo-Abrainc.png" height="auto" />
							</a>
					  </div>
					</div>
					<div class="col-md-4 redes-sociais">
						<a href="https://www.linkedin.com/company/abrainc/?originalSubdomain=pt" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/linkedin.png">
						</a>
						<a href="https://www.facebook.com/ABRAINC/" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/facebook.png">
						</a>					
						<a href="https://www.instagram.com/abraincoficial/" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/instagram.png">
						</a>						
						<a href="https://twitter.com/abraincoficial" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/twitter.png">
						</a>						
						<a href="https://www.youtube.com/channel/UCZkZpkd_yY7WDJKRPLOC9PA" target="_blank">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/youtube.png">
						</a>													
					</div>
				</div>				
			</div>
			
			<div class="container">
				<div class="row">
					<div class="col-md-12 hidden-xs hidden-sm">
						<div class="row no-padding no-margin" style="margin:0; padding: 0">

						<?php 						
							if ( is_user_logged_in() ) {
							
								wp_nav_menu( array( 'theme_location' => 'menu-navegacao-v3',
																		'container' => 'nav' ) );
								} else {
								wp_nav_menu( array( 'theme_location' => 'menu-navegacao-v3',
												'container' => 'nav' ) );
							}
						?>
						</div>
					</div>

				</div>
			</div>
		</header>

		<header class="mobile">
			<div class="container">
				<div class="row no-padding">
					<div class="col-xs-3 no-padding">
						<div class="menu">
							<a class="menu_interno" data-toggle="modal" href="#MenuModalInt">
								<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/menu-mobile.png">
							</a>
						</div>
						<div class="lupa">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/lupa-mobile.png">
						</div>
					</div>
					<div class="col-xs-6 no-padding logo-mobile">
						<a href="/">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/Logo-Abrainc-Mobile.png">
						</a>
					</div>
					<div class="col-xs-3 text-right no-padding">
						<div class="login">
							
						</div>
					</div>										
				</div>
			</div>
		</header>
	</div>

<div id="MenuModalInt" class="modal modal-fullscreen in">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="container">
        <div class="row">
          <div class="col-md-1">
            <button class="close" data-dismiss="modal">
              <img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/close.png" alt=""> Menu
            </button>
          </div>        	
		<?php 						
			if ( is_user_logged_in() ) {
			
				wp_nav_menu( array( 'theme_location' => 'menu-navegacao-v3',
														'container' => 'nav' ) );
				} else {
				wp_nav_menu( array( 'theme_location' => 'menu-navegacao-v3',
								'container' => 'nav' ) );
			}
		?>	        	
        </div>
      </div>
    </div>
  </div>
</div>