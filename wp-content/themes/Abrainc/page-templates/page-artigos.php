<?php 
	
	/* Template Name: Artigos */
	
get_header();
get_template_part('common');

?>
<section class="noticias artigos">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<h1>
						Artigos
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
					</h1>
				</div>
			</div>			
			
			<div class="row busca-artigo desktop">
				<div class="col-md-6 col-md-offset-6">
					<form role="search" method="get" id="advanced-searchform" class="advanced-searchform" name="advanced-searchform" action="<?php bloginfo('url'); ?>">
						<div class="row">
							<div class="form-group col-md-12" >
								<div class="input-group">
									<input id="s" name="s" type="text" class="form-control input-sm" required="" placeholder="Busque um artigo">
									<input type="submit" id="searchsubmit" value="Buscar" />
		    					</div>
							</div>
						</div>
					</form>					
				</div>
			</div>

			<div class="row listagem-noticias">
				<div class="col-md-8">
<?php 

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$count = 0;
  	$noticias = new WP_Query(array('post_type' => 'post',
              'orderby' => 'post_date',
              'order' => 'DESC',
              'posts_per_page' => 16,
              'paged' => $paged,
			  'tax_query' => array(
		        array(
		            'taxonomy' => 'category',
		            'field' => 'slug',
		            'terms' => 'artigos'
		        )
		       )
            ));
      	while ($noticias->have_posts()) : $noticias->the_post();
      	$categorias = get_the_category();
?>
		<div class="post-list-destaque">
	    	<a href="<?php the_permalink(); ?>">
  				<?php 
  					$title = get_the_title();
  					$excerpt = get_the_excerpt();
					$post_object = get_field('autor');
					if($post_object){
						$post = $post_object;
						setup_postdata($post); 
						$name_autor = get_the_title();
						$foto_autor = get_field('imagem');
					} 
					wp_reset_postdata();
				?>	
				<div class="bg-post" style="background-image: url('<?php echo $foto_autor; ?>');">
					<p><?php echo $name_autor; ?></p>
				</div>
				<div class="content-post">
		      		<h4><?php echo $title; ?></h4>
		      		<p><?php echo $excerpt; ?></p>			
	      		</div>      	
	      	</a>
      	</div>			
<?php endwhile; ?>
		 </div>
		 		<div class="col-md-1"></div>
				<div class="col-md-3 sidebar desktop">

					<div class="autores">
						<h4>Autores</h4>
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'autores',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 5
				                    ));
				              	while ($loop->have_posts()) : $loop->the_post();
				      		?>
				      	<a href="<?php the_permalink(); ?>">
							<div class="bg-post" style="background-image: url('<?php the_field('imagem'); ?>');">
								<p><?php the_title(); ?></p>
							</div>
						</a>		
				      	<?php endwhile; wp_reset_postdata(); ?>						
					</div>

					<div class="content-news">
						<h4>NEWSLETTER <img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-newsletter-interna.jpg"></h4>
						<p>Receba as principais notícias do mercado imobilário.</p>
						<?php echo do_shortcode('[contact-form-7 id="5174" title="Cadastro Newsletter"]' ); ?>
					</div>				
				</div>
			</div>
			
					<?php $big = 999999999; ?>			
					<div class="row no-padding no-margin">
						<div class="paginated">
							<?php
								echo paginate_links( array(
									'base'		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format'	=> '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total'		=> $noticias->max_num_pages
								) );
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php

get_footer();