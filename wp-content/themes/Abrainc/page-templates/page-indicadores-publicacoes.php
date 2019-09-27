<?php
	session_start();

	if(!isset($_SESSION['usuario_log'])){
		header('Location: /indicadores-publicacoes-login/');
		session_destroy();
	}

	if(isset($_GET['deslogar'])){
		session_destroy();
		header('Location: /indicadores-publicacoes-login/');
	}

?>

<?php 
	
	/* Template Name: Indicadores Publicações */
	
get_header();
get_template_part('common');

?>
	<section class="publicacoes">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<h1>
						Indicadores
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
					</h1>
				</div>
			</div>

			<div class="row menu-publicacoes desktop">
				<div class="col-md-6 col-md-offset-3">
					<a href="/indicadores/">
						Indicador Mensal
					</a>
					<a href="/indicador-antecedente-do-mercado-imobiliario/">
						IAMI
					</a>
					<a href="/radar/">
						Radar Trimestral
					</a>
																				
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12">
					<a class="deslogar" href="?deslogar">sair</a>
				</div>
			</div>
		</div>
	</section>	

	<section id="indicador_page" class="podcast-publicacoes indicadores">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Indicador Mensal</h4>
					<a class="float-right link-more-pub" href="/indicadores/">Mais indicador  »</a>
					<div class="row">
			      	<?php
			          	$noticias = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 4,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'indicadores'
							        )
							       )
			                    ));
			              	while ($noticias->have_posts()) : $noticias->the_post();
      						$title = explode(" ", get_the_title());
			      	?>
			      		<div class="post-indicador col-md-3">
							<div class="content-post-indicador">
						    	<a href="<?php the_permalink(); ?>">
									<p class="ano"><?php echo $title[1]; ?></p>
									<p class="mes"><?php echo $title[0]; ?></p>
									<div class="resumo"><?php the_excerpt(); ?></div>
						      	</a>
					      	</div>
				      	</div>	
			      	<?php endwhile; wp_reset_postdata(); ?>		
			      	</div>			
				</div>
			</div>
		</div>
	</section>	

	<section id="iami_page" class="podcast-publicacoes indicadores">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title videos">
					<h4>Indicador Antecedente do Mercado Imobiliário (IAMI)</h4>
					<a class="float-right link-more-pub" href="/indicador-antecedente-do-mercado-imobiliario/">Mais IAMI  »</a>
					<div class="row">
				      	<?php
				          	$noticias = new WP_Query(array('post_type' => 'post',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 4,
									  'tax_query' => array(
								        array(
								            'taxonomy' => 'category',
								            'field' => 'slug',
								            'terms' => 'indicador-antecedente'
								        )
								       )
				                    ));
				              	while ($noticias->have_posts()) : $noticias->the_post();
      							$title = explode(" ", get_the_title());
				      	?>

				      	<div class="post-indicador col-md-3">
							<div class="content-post-indicador">
						    	<a href="<?php the_permalink(); ?>">
									<p class="ano"><?php echo $title[1]; ?></p>
									<p class="mes"><?php echo $title[0]; ?></p>
									<div class="resumo"><?php the_excerpt(); ?></div>
						      	</a>
					      	</div>
				      	</div>	

				      	<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="radar_page" class="podcast-publicacoes indicadores">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title podcasts">
					<h4>Radar Trimestral</h4>
					<a class="float-right link-more-pub" href="/radar/">Mais radar  »</a>
					<div class="row">
				      	<?php
				          	$noticias = new WP_Query(array('post_type' => 'post',
						              'orderby' => 'post_date',
						              'order' => 'DESC',
						              'posts_per_page' => 4,
						              'paged' => $paged,
						              's' => $search,
									  'tax_query' => array(
								        array(
								            'taxonomy' => 'category',
								            'field' => 'slug',
								            'terms' => 'radar'
								        )
								       )
						            ));
						      	while ($noticias->have_posts()) : $noticias->the_post();
						      	$title = explode(" ", get_the_title());
				      	?>

				      	<div class="post-indicador col-md-3">
							<div class="content-post-indicador">
						    	<a href="<?php the_permalink(); ?>">
									<p class="ano"><?php echo $title[1]; ?></p>
									<p class="mes"><?php echo $title[0]; ?></p>
									<div class="resumo"><?php the_excerpt(); ?></div>
						      	</a>
					      	</div>
				      	</div>	

				      	<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>	
			</div>
		</div>
	</section>				
<?php

get_footer();