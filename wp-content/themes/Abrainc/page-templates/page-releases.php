<?php 
	
	/* Template Name: Releases */
	
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

	<section id="midia" class="midia-publicacoes releases">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 16,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'releases'
							        )
							       )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      	?>
			      		<div class="post-galeria col-md-3">
			      			<a href="<?php the_permalink(); ?>">
								<div class="content-post">
				      				<div class="post-date">
				      					<?php the_date('d/m/Y'); ?>
				      				</div>

						      		<p><?php the_title(); ?></p>			
					      		</div>  				      			
			      			</a>
			      		</div>
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