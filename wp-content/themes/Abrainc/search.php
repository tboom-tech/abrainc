<?php 
	
	/* Template Name: Busca */
	
get_header();
get_template_part('common');

?>

<?php 
	$name = $_GET['s'];
	$dataInicio = $_GET['dataInicio'];
	$dataFim = $_GET['dataFim'];

	$dataInicio = str_replace( "/", "-", $dataInicio)." 00:00";	
	$dataFim = str_replace( "/", "-", $dataFim)." 23:59";

	if ($dataInicio && $dataFim) {
		$meta_query = array(
            'relation' => 'AND',
            array(
                'key'     => 'event_start_date',
                'type'    => 'DATE',
                'value'   => $dataInicio,
                'compare' => '>=',
            ),
            array(
                'key'     => 'event_end_date',
                'type'    => 'DATE',
                'value'   => $dataFim,
                'compare' => '<=',
            )
        );
    }else{
    	$meta_query = '';
    }    

?>

<section class="noticias">
		<div class="container">
			
			<div class="row listagem-noticias">
				<div class="col-md-8">
				<p class="result-pesquisa">Você pesquisou: <span><?php echo $name; ?></span></p>
<?php 

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  	$noticias = new WP_Query(array('post_type' => 'post',
              'orderby' => 'post_date',
              'order' => 'DESC',
              'posts_per_page' => 16,
              'paged' => $paged,
              's' => $name,
			  'tax_query' => array(
		        array(
		            'taxonomy' => 'category',
		            'field' => 'category_name',
		            'terms' => 'Abrainc, Setor, Associadas'
		        )
		       ),
		       $meta_query       		  
            ));
      	while ($noticias->have_posts()) : $noticias->the_post();
      	$categorias = get_the_category();
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
		 		<div class="col-md-1"></div>
				<div class="col-md-3 sidebar">
					<form role="search" method="get" id="advanced-searchform" class="advanced-searchform" name="advanced-searchform" action="<?php bloginfo('url'); ?>">
						<div class="row">
							<div class="form-group col-md-12" >
								<div class="input-group">
									<input id="s" name="s" type="text" class="form-control input-sm" required="" placeholder="Digite sua busca">
									<input name="dataInicio" type='text' onfocus="(this.type='date')" class="form-control input-sm input-date" placeholder="De" />
									<input name="dataFim" type='text' onfocus="(this.type='date')" class="form-control input-sm input-date" placeholder="Até" />
									<input type="submit" id="searchsubmit" value="Buscar" />
		    					</div>
							</div>
						</div>
					</form>

					<div class="banner_interna">
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'banners',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 1,
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
						      	<a href="<?php the_field('link'); ?>">
						      		<img src="<?php the_field('imagem'); ?>">
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
