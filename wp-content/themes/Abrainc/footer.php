<?php

	$sitepath		 = get_bloginfo( 'wpurl' );
	$thistemplate = get_template_directory_uri();
	$css_template = $thistemplate . '/styles';
	$site_charset = get_bloginfo( 'charset' );
	$html_langatr = get_bloginfo( 'language' );
	$html_landdir = get_bloginfo( 'text_direction' );
	$page_title	  = wp_title( '|', false, 'right' );
	
	define("ABRAINC_URL",$sitepath);
	define("ABRAINC_TEMA", $thistemplate);

?>
	<footer class="container-fluid desktop">
		<div class="container">
			<div class="row footer-one no-padding">					
				<div class="col-md-4 no-padding">
					<?php get_template_part('searchform'); ?>
				</div>

				<div class="col-md-8 redes-sociais no-padding">
					<a href="https://www.linkedin.com/company/abrainc/?originalSubdomain=pt" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/linkedin-footer.png">
					</a>
					<a href="https://www.facebook.com/ABRAINC/" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/facebook-footer.png">
					</a>					
					<a href="https://www.instagram.com/abraincoficial/" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/instagram-footer.png">
					</a>						
					<a href="https://twitter.com/abraincoficial" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/twitter-footer.png">
					</a>						
					<a href="https://www.youtube.com/channel/UCZkZpkd_yY7WDJKRPLOC9PA" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/youtube-footer.png">
					</a>							
				</div>
			</div>					
		</div>

		<div class="container">
			<div class="row menu-footer footer-two no-padding">
				<div class="col-md-12 no-padding">
					<?php 
					if ( is_user_logged_in() ) {

						wp_nav_menu( array( 'theme_location' => 'menu-navegacao-v3',
										'container' => 'nav' ) );
						} else {
						wp_nav_menu( array( 'theme_location' => 'menu-navegacao-v3',
										'container' => 'nav' ) );
					}
					?>

					<a class="associe-footer" data-toggle="modal" href="#associe-se">
						Associe-se
					</a>					
				</div>		
			</div>
		</div>		

		<div class="container">
			<div class="row copyrights footer-three no-padding">
				<div class="col-md-4 no-padding">
					<a href="/">
						<img src="<?=ABRAINC_TEMA?>/img/Logo-Abrainc-footer.png">
					</a>
				</div>

				<div class="col-md-4">
					<div class="text-center">
						<h6>Copyrights © <?= DATE("Y", time());?> por ABRAINC</h6>
					</div>
				</div>

				<div class="col-md-4 text-right tboom">
					by <a href="http://tboom.net" target="_blank">
						<img src="<?=ABRAINC_TEMA?>/img/Logo-Tboom.png">
					</a>
				</div>
			</div>
		</div>
	</footer>

	<footer class="mobile">
		<div class="container">
			<div class="row">
				<div class="col-md-12 redes-sociais">
					<a href="https://www.linkedin.com/company/abrainc/?originalSubdomain=pt" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/linkedin-contato.png">
					</a>
					<a href="https://www.facebook.com/ABRAINC/" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/facebook-contato.png">
					</a>					
					<a href="https://www.instagram.com/abraincoficial/" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/instagram-contato.png">
					</a>						
					<a href="https://twitter.com/abraincoficial" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/twitter-contato.png">
					</a>						
					<a href="https://www.youtube.com/channel/UCZkZpkd_yY7WDJKRPLOC9PA" target="_blank">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/youtube-contato.png">
					</a>							
				</div>				

				<div class="text-center">
					<h6>Copyrights © <?= DATE("Y", time());?> por ABRAINC</h6>
				</div>				
			</div>
		</div>
	</footer>

<div id="associe-se" class="modal modal-fullscreen in">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
          	<button class="close" data-dismiss="modal">
          		<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/arrow-back-associe.png">
          		Voltar
          	</button>
          </div>	

          <div class="col-md-5 formulario">
          	<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/Logo-Contato.png">
          	<h3>Associe-se</h3>
          	<p class="desc">Preencha o formulário que em breve <br />retornaremos sua solicitação</p>
          	<?php echo do_shortcode('[contact-form-7 id="13420" title="Associe-se"]' ); ?>
          </div>
			        	
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var _egoiwp = _egoiwp || {};
	(function(){
		var u="https://cdn-static.egoiapp2.com/";
		_egoiwp.code = "be25aa0f48165d3b296cee8572338885";
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript';
		g.defer=true;
		g.async=true;
		g.src=u+'webpush.js';
		s.parentNode.insertBefore(g,s);
	})();
</script>

<script src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/scripts/scripts.js"></script>

<?php wp_footer(); ?>
</body>
</html>
	