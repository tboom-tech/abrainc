<?php 
	
	/* Template Name: Na Mídia */
	
get_header();
get_template_part('common');

?>
	<section class="publicacoes imprensa imprensa-interna">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<h1>
						Imprensa
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
					</h1>
				</div>
			</div>

			<div class="row busca-artigo desktop">
				<div class="col-md-6 col-md-offset-6">
					<form role="search" method="get" id="advanced-searchform" class="advanced-searchform" name="advanced-searchform" action="<?php bloginfo('url'); ?>">
						<div class="row">
							<div class="form-group col-md-12">
								<div class="input-group">
									<input id="s" name="s" type="text" class="form-control input-sm" required="" placeholder="Busque uma notícia">
									<input type="submit" id="searchsubmit" value="Buscar" />
		    					</div>
							</div>
						</div>
					</form>					
				</div>
			</div>			
		</div>
	</section>	

	<section id="midia" class="midia-publicacoes midia-lista">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
			      	<?php
			      		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			      		$count=0;
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 17,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'abrainc'
							        )
							       )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      	?>
				      	<?php if ($count == 0) { ?>
					      	<div class="col-md-12 video-destaque">
						      	<a href="<?php the_permalink(); ?>">
						    		<?php 
							    		if (get_field('imagem')) {
							    			$imagem = get_field('imagem');
							    		}else if (get_the_post_thumbnail_url()) {
							    			$imagem = get_the_post_thumbnail_url();
							    		} else{
							    			$imagem = '/wp-content/themes/Abrainc/img/no-image-box.png';
							    		}
						    		?>						      		
							      	<div class="post-midia col-md-8" style="background-image: url('<?php echo $imagem; ?>');">
							      	</div>

							      	<div class="content-video col-md-4">
										<div class="post-date">
											<?php the_date(); ?>
										</div>

								      	<h2><?php the_title(); ?></h2>

										<div class="content">
											<?php the_excerpt(); ?>
										</div>								      	

										<div class="share desktop">
											<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-facebook.png"></a>

											<a href="https://twitter.com/home?status=?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-twitter.png"></a>
										</div>								      	
							      	</div>
						      	</a>
					      	</div>
				      	<?php }else{ ?>			      	
				      		<div class="post-galeria col-md-3">
				      			<a href="<?php the_permalink(); ?>">
						    		<?php 
							    		if (get_field('imagem')) {
							    			$bg = get_field('imagem');
							    		}else if (get_the_post_thumbnail_url()) {
							    			$bg = get_the_post_thumbnail_url();
							    		} else{
							    			$bg = '/wp-content/themes/Abrainc/img/no-image-box.png';
							    		}
						    		?>
									<div class="bg-post" style="background-image: url('<?php echo $bg; ?>');"></div>
									<div class="content-post">
							      		<h5><?php the_title(); ?></h5>			
						      		</div>  				      			
				      			</a>
				      		</div>
				      	<?php } ?>
				      	<?php $count++; ?>			      		
			      	<?php endwhile; wp_reset_postdata(); ?>		
			      	</div>	

					<?php $big = 999999999; ?>			
					<div class="row no-padding no-margin">
						<div class="paginated">
							<?php
								echo paginate_links( array(
									'base'		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format'	=> '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total'		=> $loop->max_num_pages
								) );
							?>
						</div>
					</div>			      			
				</div>
			</div>
		</div>
	</section>	
<?php

get_footer();