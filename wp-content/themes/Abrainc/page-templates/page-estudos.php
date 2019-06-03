<?php 
	
	/* Template Name: Estudos */
	
get_header();
get_template_part('common');

?>

	<section class="noticias artigos indicadores eventos estudos">
		<div class="bg-indicadores" style="background-image: url('<?php the_field('imagem'); ?>');">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>
							Estudos e Guias
							<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page-white-peq.png">
						</h1>
					</div>
				</div>	
			</div>	
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6 content-indicadores">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row listagem-noticias">
				<div class="col-md-12">
					<h4>Estudos</h4>
					
					<div class="row">
					<?php 

						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

					  	$noticias = new WP_Query(array('post_type' => 'post',
								  'order'     => 'DESC',
								  'orderby'   => 'post_date',
					              'posts_per_page' => 6,
					              'paged' => $paged,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'estudos'
							        )
							       )					              
					            ));
					      	while ($noticias->have_posts()) : $noticias->the_post();
					?>
					<div class="post-indicador col-md-12">
						<div class="content-post-indicador">
					    	<a href="<?php the_field('link_estudos'); ?>" target="_blank">
				    			<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/btn-baixar.png">
								<p class="title_event"><?php the_title(); ?> </p>
								<p>Instituição e Autor: <?php the_field('aut_estudo'); ?></p>
								<p class="data_event"><?php the_date('d/m/Y'); ?></p>
								<div class="description_event">
									<?php the_excerpt(); ?>
								</div>
					      	</a>
				      	</div>
				      	<div>
				      		<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-ponto.png">
				      	</div>
			      	</div>	
			<?php endwhile; ?>
			 		</div>
			 		<a class="float-right link-more-pub" href="/pesquisas/">Mais estudos »</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row listagem-noticias">
				<div class="col-md-12">
					<h4>Guias</h4>
					
					<div class="row">
					<?php 

						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

					  	$noticias = new WP_Query(array('post_type' => 'post',
								  'order'     => 'DESC',
								  'orderby'   => 'post_date',
					              'posts_per_page' => 6,
					              'paged' => $paged,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'guias'
							        )
							       )					              
					            ));
					      	while ($noticias->have_posts()) : $noticias->the_post();
					?>
					<div class="post-indicador col-md-12">
						<div class="content-post-indicador">
					    	<a href="<?php the_field('link_guias'); ?>" target="_blank">
					    		<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/btn-baixar.png">
								<p class="title_event"><?php the_title(); ?> </p>
								<p>Instituição e Autor: <?php the_field('aut_estudo'); ?></p>
								<p class="data_event"><?php the_date('d/m/Y'); ?></p>
								<div class="description_event">
									<?php the_excerpt(); ?>
								</div>
					      	</a>
				      	</div>
				      	<div>
				      		<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-ponto.png">
				      	</div>
			      	</div>	
			<?php endwhile; ?>
			 		</div>

			 		<a class="float-right link-more-pub" href="/guias/">Mais guias »</a>
				</div>
			</div>
		</div>
	</section>
<?php

get_footer();