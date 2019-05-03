<?php

	get_header();
	get_template_part('common');
	
	$categorias = get_the_category();
?>

	<?php if ($categorias[0]->slug == 'artigos'){ ?>

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

		<section class="container-fluid type_post post_artigos">
			<article class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<p class="categoria"><?php echo $categorias[0]->name; ?></p>

						<div class="post-date">
							<?php the_date(); ?>
						</div>

						<h1><?php the_title(); ?></h1>

						<div class="autor" style="background-image: url('<?php echo $foto_autor ?>');">
							<p><?php echo $name_autor; ?></p>
						</div>

						<div class="content-post">
							<?php the_content(); ?>
						</div>

						<div class="share">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-facebook.png"></a>

							<a href="https://twitter.com/home?status=?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-twitter.png"></a>
						</div>						
					</div>
				</div>
			</article>
		</section>

		<section id="posts-related" class="artigos-related desktop">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Veja mais artigos</h2>
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'post',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 2,
									  'tax_query' => array(
								        array(
								            'taxonomy' => 'category',
								            'field' => 'slug',
								            'terms' => $categorias[0]->slug
								        )
								       )
				                    ));
				          	while ($loop->have_posts()) : $loop->the_post();
				       	?>
							<div class="post-list-destaque">
						    	<a href="<?php the_permalink(); ?>">
									<div class="content-post">
										<div class="post-date-more">
											<?php the_date(); ?>
										</div>
							      		<h4><?php the_title(); ?></h4>
							      		<p><?php the_excerpt(); ?></p>				
						      		</div>      	
						      	</a>
					      	</div>			       	
				       <?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>

		<?php } else if ($categorias[0]->slug == 'indicadores'){ ?>

		<section class="container-fluid type_post post_artigos">
			<article class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<p class="categoria">Indicadores</p>

						<h1><?php the_title(); ?></h1>

						<div class="content-post preview-content">
							<?php the_content(); ?>

							<a class="link-indicador bt-more" target="_blank" href="<?php the_field('link_indicador'); ?>">
								Veja AQUI
							</a>							
						</div>

						<div class="share">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-facebook.png"></a>

							<a href="https://twitter.com/home?status=?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-twitter.png"></a>
						</div>						
					</div>
				</div>
			</article>

			<div class="hide-content">
				<div class="container">
					<div class="row">
						<div class="col-md-6 content-div text-right">
							<div class="more bt-more" onClick="MoreContent();">Continuar Lendo</div>
						</div>
						<div class="col-md-6 content-div">
							<a class="link bt-more" target="_blank" href="<?php the_field('link_indicador'); ?>">
								<div class="more">Ver indicador</div>
							</a>
						</div>						
					</div>
				</div>
			</div>
		</section>	

		<section id="posts-related" class="desktop">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Notícias relacionadas</h2>
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'post',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 2
				                    ));
				          	while ($loop->have_posts()) : $loop->the_post();
				       	?>
							<div class="post-list-destaque">
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
										<span class="categorie">
											<?php echo $categorias[0]->name; ?>
							      		</span>
							      		<h4><?php the_title(); ?></h4>
							      		<p><?php the_excerpt(); ?></p>
							      		<p class="tags"><?php the_tags( '', ', ', '' ); ?></p>					
						      		</div>      	
						      	</a>
					      	</div>			       	
				       <?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>			

		<?php } else if ($categorias[0]->slug == 'radar'){ ?>

		<section class="container-fluid type_post post_artigos">
			<article class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<p class="categoria">Radar</p>

						<h1><?php the_title(); ?></h1>

						<div class="content-post preview-content">
							<?php the_content(); ?>

							<a class="link-indicador bt-more" target="_blank" href="<?php the_field('link_radar'); ?>">
								Veja AQUI
							</a>							
						</div>

						<div class="share">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-facebook.png"></a>

							<a href="https://twitter.com/home?status=?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-twitter.png"></a>
						</div>						
					</div>
				</div>
			</article>

			<div class="hide-content">
				<div class="container">
					<div class="row">
						<div class="col-md-6 content-div text-right">
							<div class="more bt-more" onClick="MoreContent();">Continuar Lendo</div>
						</div>
						<div class="col-md-6 content-div">
							<a class="link bt-more" target="_blank" href="<?php the_field('link_radar'); ?>">
								<div class="more">Ver indicador</div>
							</a>
						</div>						
					</div>
				</div>
			</div>
		</section>	

		<section id="posts-related" class="desktop">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Notícias relacionadas</h2>
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'post',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 2
				                    ));
				          	while ($loop->have_posts()) : $loop->the_post();
				       	?>
							<div class="post-list-destaque">
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
										<span class="categorie">
											<?php echo $categorias[0]->name; ?>
							      		</span>
							      		<h4><?php the_title(); ?></h4>
							      		<p><?php the_excerpt(); ?></p>
							      		<p class="tags"><?php the_tags( '', ', ', '' ); ?></p>					
						      		</div>      	
						      	</a>
					      	</div>			       	
				       <?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>

	<?php } else if ($categorias[0]->slug == 'indicador_antecedente'){ ?>

		<section class="container-fluid type_post post_artigos">
			<article class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<p class="categoria">Indicador Antecedente do Mercado Imobiliário</p>

						<h1><?php the_title(); ?></h1>

						<div class="content-post preview-content">
							<?php the_content(); ?>

							<a class="link-indicador bt-more" target="_blank" href="<?php the_field('link_radar'); ?>">
								Veja AQUI
							</a>							
						</div>

						<div class="share">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-facebook.png"></a>

							<a href="https://twitter.com/home?status=?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-twitter.png"></a>
						</div>						
					</div>
				</div>
			</article>

			<div class="hide-content">
				<div class="container">
					<div class="row">
						<div class="col-md-6 content-div text-right">
							<div class="more bt-more" onClick="MoreContent();">Continuar Lendo</div>
						</div>
						<div class="col-md-6 content-div">
							<a class="link bt-more" target="_blank" href="<?php the_field('link_radar'); ?>">
								<div class="more">Ver indicador</div>
							</a>
						</div>						
					</div>
				</div>
			</div>
		</section>	

		<section id="posts-related" class="desktop">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Notícias relacionadas</h2>
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'post',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 2
				                    ));
				          	while ($loop->have_posts()) : $loop->the_post();
				       	?>
							<div class="post-list-destaque">
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
										<span class="categorie">
											<?php echo $categorias[0]->name; ?>
							      		</span>
							      		<h4><?php the_title(); ?></h4>
							      		<p><?php the_excerpt(); ?></p>
							      		<p class="tags"><?php the_tags( '', ', ', '' ); ?></p>					
						      		</div>      	
						      	</a>
					      	</div>			       	
				       <?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>

		<?php } else if ($categorias[0]->slug == 'eventos'){ ?>

		<section class="container-fluid type_post post_artigos">
			<article class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<p class="categoria"><?php the_field('nome_evento'); ?></p>

						<div class="post-date">
							Data do Evento: <?php the_field('data_evento'); ?><br />
						</div>

						<h1><?php the_title(); ?></h1>

						<div class="content-post">
							<?php the_content(); ?>
						</div>

						<div class="share">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-facebook.png"></a>

							<a href="https://twitter.com/home?status=?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-twitter.png"></a>
						</div>						
					</div>
				</div>
			</article>
		</section>				
	<?php }else{ ?>
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
	<section class="container-fluid type_post">
		<article class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<p class="categoria"><?php echo $categorias[0]->name; ?></p>

					<h1><?php the_title(); ?></h1>

					<div class="excerpt">
						<?php the_excerpt(); ?>
					</div>

					<div class="share">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-facebook.png"></a>

						<a href="https://twitter.com/home?status=?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-twitter.png"></a>
					</div>

					<div class="post-date">
						<?php the_date(); ?>
					</div>

					<div class="content-post">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php if ($categorias[0]->slug == 'abrainc' || $categorias[0]->slug == 'setor'){ ?>
		<section id="posts-related" class="desktop">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Notícias relacionadas</h2>
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'post',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 2,
									  'tax_query' => array(
								        array(
								            'taxonomy' => 'category',
								            'field' => 'slug',
								            'terms' => $categorias[0]->slug
								        )
								       )
				                    ));
				          	while ($loop->have_posts()) : $loop->the_post();
				       	?>
							<div class="post-list-destaque">
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
										<span class="categorie">
											<?php echo $categorias[0]->name; ?>
							      		</span>
							      		<h4><?php the_title(); ?></h4>
							      		<p><?php the_excerpt(); ?></p>
							      		<p class="tags"><?php the_tags( '', ', ', '' ); ?></p>					
						      		</div>      	
						      	</a>
					      	</div>			       	
				       <?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>
		<?php } ?>
	<?php } ?>

<?php get_footer(); ?>