<?php

/* Template Name: Home */

require( get_template_directory() . '/common.php' );

get_header(); ?>
	
	<div id="vemmorar">
		<img class="fechar" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/fechar.png">
		<div class="vemmorar">
			<p>Incorporadoras e construtoras juntas pelos <span>sonhos</span> dos brasileiros</p>
			<p class="convidamos">Convidamos nossas associadas a participarem dessa iniciativa destinada a movimentar o setor, gerar renda e manter empregos. Essa ação conjunta será vetor para construirmos a base para uma retomada mais rápida e robusta após a reversão da pandemia.</p>
			<p class="saiba">Saiba mais em: <a href="https://bit.ly/VemMorar" target="_blank">https://bit.ly/VemMorar</a></p>
			<p class="apoio">APOIO : <img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/logo-caixa.png"> <img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/logo-abrainc-pop.png"></p>
		</div>
	</div>
	<section id="banner-top" class="desktop">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'banners',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 1,
			                      'meta_query'=> array(
			                        array(
			                          'key' => 'categoria',
			                          'compare' => '=',
			                          'value' => 'home_top'
			                        )
			                      )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      	?>
				      	<a href="<?php the_field('link'); ?>" target="_blank">
				      		<img src="<?php the_field('imagem'); ?>">
				      	</a>
			      	<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</section>

	<section id="posts-destaques">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 1,
			                      'meta_query'=> array(
			                        array(
			                          'key' => 'local',
			                          'compare' => '=',
			                          'value' => 'home_principal'
			                        )
			                      )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			              	$categorias = get_the_category();
			      	?>
				      	<a href="<?php the_permalink(); ?>">
					      	<div class="post-destaque" style="background-image: url(<?php the_field('imagem'); ?>)">
					      		<span class="categorie">
									<?php echo $categorias[0]->name; ?>
					      		</span>
					      		<h2><?php the_title(); ?></h2>
					      		<p><?php the_excerpt(); ?></p>
					      		<div class="overlay-home"></div>

					      	</div>
				      	</a>

				      	<!-- <div class="modal-live">
				      		<img class="fechar" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/fechar.png">
				      		<div class="live">

				      			<iframe id="live" width="852" height="480" src="https://www.youtube.com/embed/1dgXVHiucZo?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				      		</div>
				      	</div>  -->
			      	<?php endwhile; wp_reset_postdata(); ?>					
				</div>
				<div class="col-md-4">
			      	<?php
			      		$tipo = 'segundo-destaque';
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 3,
			                      'meta_query'=> array(
			                        array(
			                          'key' => 'local',
			                          'compare' => '=',
			                          'value' => 'segundo_home'
			                        )
			                      )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			              	$categorias = get_the_category();
			      	?>
				      	<a href="<?php the_permalink(); ?>">
					      	<div class="post-secundario <?php echo $tipo ?>">
					      		<div class="img-destaque" style="background-image: url('<?php the_field('imagem'); ?>');"></div>
					      		<h3><?php the_title(); ?></h3>
					      	</div>
				      	</a>
				      	<?php $tipo=''; ?>
			      	<?php endwhile; wp_reset_postdata(); ?>					
				</div>				
			</div>
		</div>
	</section>


	<section id="newsletter" class="desktop">
		<div class="container">
			<div class="row content-news">
				<div class="col-md-2 no-padding">
					<h4>NEWSLETTER</h4>
					<p>Receba as principais notícias do mercado imobilário.</p>
				</div>

				<div class="col-md-10 form-news no-padding">
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-newsletter.jpg">
					<?php echo do_shortcode('[contact-form-7 id="5174" title="Cadastro Newsletter"]' ); ?>
				</div>
			</div>
		</div>
	</section>	

	<section id="list-posts">
		<div class="container">
			<div class="row">
		      	<?php
		          	$loop = new WP_Query(array('post_type' => 'post',
		                      'orderby' => 'post_date',
		                      'order' => 'DESC',
		                      'posts_per_page' => 3,
		                      'meta_query'=> array(
		                        array(
		                          'key' => 'local',
		                          'compare' => '=',
		                          'value' => 'terceiro_home'
		                        )
		                      )
		                    ));
		              	while ($loop->have_posts()) : $loop->the_post();
		              	$categorias = get_the_category();
		      	?>				
		      		<div class="col-md-3 post-list-destaque desktop">
				    	<a href="<?php the_permalink(); ?>">
							<div class="bg-post" style="background-image: url('<?php the_field('imagem'); ?>');"></div>
							<span class="categorie">
								<?php echo $categorias[0]->name; ?>
				      		</span>
				      		<h4><?php the_title(); ?></h4>
				      		<p><?php the_excerpt(); ?></p>
				      		<p class="tags"><?php the_tags( '', ', ', '' ); ?></p>					      	
				      	</a>
				    </div>  	
			      	<?php endwhile; wp_reset_postdata(); ?>			

				<div class="col-md-3 banner_medium carousel-banner">
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'banners',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 3,
			                      'meta_query'=> array(
			                        array(
			                          'key' => 'categoria',
			                          'compare' => '=',
			                          'value' => 'home_medium'
			                        )
			                      )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      		?>
					      	<a href="<?php the_field('link'); ?>" class="carousel-ban">
					      		<img src="<?php the_field('imagem'); ?>">
					      	</a>
			      	<?php endwhile; wp_reset_postdata(); ?>					
				</div>
			</div>
		</div>
	</section>

	<section id="associadas" class="desktop">
		<div class="container">
			<div class="row">
				<div class="col-md-12 box-images">
					<h4>associadas</h4>
					<div class="col-md-10 col-md-offset-1 carousel">
						<?php 
							$loop = new WP_Query(array('post_type' => 'associadas',
				                      'orderby' => 'post_date',
				                      'order' => 'ASC'
				                    ));
				              	while ($loop->have_posts()) : $loop->the_post();
						?>
							<?php if (get_field('imagem')) { ?>
								<a class="carousel-cell" href="/institucional/associadas/">
									<img src="<?php the_field('imagem'); ?>">
								</a>
							<?php } ?>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>	

	<section id="artigos">
		<div class="container">
			<div class="row">
				<div class="col-md-4 title no-padding">
					<h4>Artigos</h4>
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 3,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'artigos'
							        )
							       )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			              	$titulo_post = get_the_title();
			      	?>
			      		<div class="post-artigos">
			      			<a href="<?php the_permalink(); ?>">
			      				<?php 
									$post_object = get_field('autor');
									if($post_object){
										$post = $post_object;
										setup_postdata($post); 
										$name_autor = get_the_title();
										$foto_autor = get_field('imagem');
									} 
									wp_reset_postdata();
								?>	
								
									<div class="foto">	
									    <img src="<?php echo $foto_autor; ?>">
						      		</div>									
					      			<div class="content-title">
					      				<h5><?php echo $titulo_post; ?></h5>
					      				<p><?php echo $name_autor; ?></p>
					      			</div>
			      			</a>
			      		</div>
			      	<?php endwhile; wp_reset_postdata(); ?>					
				</div>

				<div class="col-md-1"></div>
				
				<div class="col-md-7 title desktop">
					<h4>Redes Sociais</h4>
					<div class="row">
						<div class="col-md-6 no-padding">
							<?php the_field('conteudo_iframe'); ?>
						</div>
						<div class="col-md-6 no-padding">
							<?php the_field('conteudo_iframe_two'); ?>
						</div>
					</div>
				</div>				
				
			</div>
		</div>
	</section>

	<section id="midias" class="desktop">
		<div class="container">
			<div class="row">
				<div class="col-md-5 title videos">
					<h4><span>tv</span>Abrainc</h4>
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'videocasts',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 1
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      	?>

			      		<?php if (get_field('link_youtube')) { ?>
			      			<a class="link_video" onClick="Video('<?php the_field('link_youtube'); ?>');">
			      		<?php }else if(get_field('link_outros')){ ?>
			      			<a href="<?php the_field('link_outros'); ?>" target="_blank">
			      		<?php }else{ ?>
							<a href="<?php the_permalink(); ?>">
			      		<?php } ?>

		      			<?php if (!get_the_post_thumbnail() && get_field('link_youtube')){ 
		      				$imagem_destaque = 'https://img.youtube.com/vi/'.get_field('link_youtube').'/maxresdefault.jpg';
		      			}else{
		      				$imagem_destaque = get_the_post_thumbnail_url();
		      			} ?>
			      		
				      	<div class="post-video" style="background-image: url('<?php echo $imagem_destaque; ?>');">
				      		<div class="player"></div>
				      		<h5><?php the_title(); ?></h5>
				      		<div class="overlay"></div>
				      	</div>
			      	</a>

			      	<?php endwhile; wp_reset_postdata(); ?>
			      	<a href="/noticias/listagem-videos/" class="bt-more">+ videos</a>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-6 title galeria">
					<div class="content-galeria">
						<h4>Galeria</h4>
						<p class="title-galeria"><?php the_field('descricao'); ?></p>
						<div>
							<a href="<?php the_field('link_galeria'); ?>" target="_blank">
		   						<?php 
		   							$repeater = get_field('imagens');
		   							foreach($repeater as $i => $row) { 
		   						?>
		   							<div class="img-galeria" style="background-image: url(<?php echo $row['imagem']; ?>);">
		   								
		   							</div>
		   						<?php } ?>	
	   						</a>
   						</div>
   						<a href="/galeria/" class="bt-more">+ fotos</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="modal" id="modal-video">
		<button class="close close-video">x</button>
		<iframe width="800" height="450" id="frame-video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>	

<?php get_footer(); ?>

<script src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/scripts/flickity.pkgd.min.js"></script>
<link rel="stylesheet" href="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/styles/flickity.min.css">

<script type="text/javascript">
    var $carousel_ban = $('.carousel-banner').flickity({
        cellSelector: '.carousel-ban',
        percentPosition: true,
        wrapAround: true,
        pauseAutoPlayOnHover: false,
        autoPlay: 6000,
        pageDots: false,
        imagesLoaded: true,
        initialIndex: 1,
        contain: true,
        cellAlign: 'center'
    });	   
    	
    var $carousel = $('.carousel').flickity({
        cellSelector: '.carousel-cell',
        percentPosition: true,
        wrapAround: true,
        pauseAutoPlayOnHover: false,
        autoPlay: 6000,
        pageDots: false,
        imagesLoaded: true,
        initialIndex: 0,
        contain: true,
        cellAlign: 'center'
    });	 
</script>

<script>
	document.addEventListener('wpcf7mailsent', function(event) {
	 	window.dataLayer.push({
			 'event': 'gaTriggerEvent',
			 'gaEventCategory': 'conversao',
			 'gaEventAction': 'newsletter',
			 'gaEventLabel': 'email',
			 'formId' : event.detail.contactFormId,
			 'response' : event.detail.inputs
	 	})
	}); 
</script>

<script>
	document.addEventListener( 'wpcf7mailsent', function( event ) { 
			dataLayer.push({ 
				"event" : "cf7submission", 
				"formId" : event.detail.contactFormId, 
				"response" : event.detail.inputs })}); 
</script>