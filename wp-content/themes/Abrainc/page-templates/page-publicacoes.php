<?php 
	
	/* Template Name: Publicações */
	
get_header();
get_template_part('common');

?>
	<section class="publicacoes">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<h1>
						Publicações
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
					</h1>
				</div>
			</div>

			<div class="row menu-publicacoes desktop">
				<div class="col-md-6 col-md-offset-3">
					<a href="/noticias/artigos/">
						Artigos
					</a>
					<a href="/galeria/">
						Galeria
					</a>
					<a href="/noticias/listagem-videos/">
						Vídeos
					</a>
					<a href="/noticias/listagem-podcasts/">
						Rádio Abrainc
					</a>
					<a href="/estudos/">
						Guias e estudos
					</a>																				
				</div>	
			</div>
		</div>
	</section>	

	<section id="artigos" class="artigos-publicacoes">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Artigos</h4>
					<a class="float-right link-more-pub" href="/noticias/artigos/">Mais artigos  »</a>
					<div class="row">
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
			      		<div class="post-artigos col-md-4">
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
				</div>
			</div>
		</div>
	</section>	

	<section id="galeria" class="galeria-publicacoes">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Galeria</h4>
					<a class="float-right link-more-pub" href="/eventos/">Mais galerias  »</a>
					<div class="row">
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 4,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'eventos'
							        )
							       )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      	?>
			      		<div class="post-galeria col-md-3">
			      			<a href="<?php the_permalink(); ?>">								
					    		<?php 
					    		if (get_field('imagem')) {
					    			$bg = get_field('imagem');
					    		}else{
					    			$bg = '/wp-content/themes/Abrainc/img/no-image-box.png';
					    		}
					    		?>
								<div class="bg-post" style="background-image: url('<?php echo $bg; ?>');"></div>
								<div class="content-post">
						      		<h5><?php the_title(); ?></h5>			
					      		</div>  				      			
			      			</a>
			      		</div>
			      	<?php endwhile; wp_reset_postdata(); ?>		
			      	</div>			
				</div>
			</div>
		</div>
	</section>

	<section id="midias" class="video-publicacoes">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title videos">
					<h4><span>tv</span>Abrainc</h4>
					<a class="float-right link-more-pub" href="/noticias/listagem-videos/">Mais videos  »</a>
					<div class="row">
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'videocasts',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 3
				                    ));
				              	while ($loop->have_posts()) : $loop->the_post();
				      	?>

				      	<div class="col-md-4">
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
						      	</div>
						      	<h5><?php the_title(); ?></h5>
					      	</a>
				      	</div>

				      	<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="podcasts" class="podcast-publicacoes">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title podcasts">
					<h4>Rádio Abrainc</h4>
					<a class="float-right link-more-pub" href="/noticias/listagem-podcasts/">Mais podcasts  »</a>
					<div class="row">
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'podcasts',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 4
				                    ));
				              	while ($loop->have_posts()) : $loop->the_post();
				      	?>

				      	<div class="col-md-3">
					      	<a href="<?php the_permalink(); ?>">
						      	<div class="post-podcast">
						      	</div>
						      	<h5><?php the_title(); ?></h5>
					      	</a>
				      	</div>

				      	<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>	

	<section id="estudos" class="estudos-publicacoes">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Guias e estudos</h4>
					<a class="float-right link-more-pub" href="/estudos/">Mais guias e estudos  »</a>
					<div class="row">
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 4,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'estudos'
							        )
							       )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      	?>
						<div class="post-estudo col-md-3">
							<div class="content-post-estudo">
						    	<a href="<?php the_permalink(); ?>">
									<p class="title_event"><?php the_title(); ?></p>
									<div class="description_event">
										<?php the_excerpt(); ?>
									</div>
						      	</a>
					      	</div>
				      	</div>	
			      	<?php endwhile; wp_reset_postdata(); ?>		
			      	</div>			
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

	<div class="modal" id="modal-video">
		<button class="close close-video">x</button>
		<iframe width="800" height="450" id="frame-video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>					
<?php

get_footer();