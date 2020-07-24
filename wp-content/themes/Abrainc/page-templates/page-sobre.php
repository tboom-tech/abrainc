<?php 
	
	/* Template Name: Quem Somos */
	
get_header();
get_template_part('common');

?>
	<section class="noticias artigos indicadores">
		<div class="bg-indicadores" style="background-image: url('<?php the_field('imagem'); ?>');">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>
							Quem Somos&nbsp;&nbsp;&nbsp;&nbsp;
							<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page-white.png">
						</h1>
					</div>
				</div>	
			</div>	
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<a class="associe-topo" data-toggle="modal" href="#associe-se">
						Associe-se
					</a>
				</div>

				<div class="col-md-6 text-right logo-sobre desktop">
					
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6 content-indicadores">
					<?php the_content(); ?>
				</div>

				<div class="col-md-6 text-right logo-sobre desktop">
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/Logo-Quem-Somos.jpg">
				</div>
			</div>
		</div>
	</section>

	<section id="gestao">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Gestão</h4>
				</div>
				<div class="col-md-12 text-center">
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/conselho_v2.jpg">
				</div>
				<div id="comites" class="col-md-12 text-center">
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/Comites.jpg">
				</div>									
			</div>
		</div>
	</section>

	<section id="conquista">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Principais Atividades</h4>
				</div>
			</div>

			<div class="row conquistas">
				<div class="col-md-10 col-md-offset-1 carousel">
					<p><?php echo date('Y'); ?></p>
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'conquistas',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 50,
			                    ));
			          	while ($loop->have_posts()) : $loop->the_post();
			       	?>				
			       		<div class="item-conquista carousel-cell">
			       			<div>
			       				<a href="<?php the_field('link_noticia'); ?>">
			       					<img src="<?php the_field('imagem'); ?>">
			       				</a>
			       			</div>
			       		</div>
			       	<?php endwhile; ?>
		       </div>
			</div>
		</div>
	</section>

	<!-- <section id="mapa">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Mapa da Associadas</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mapa">
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/mapa_associados.png">
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 linha">
					<h3 class="sp"><i class="fas fa-map-marker-alt"></i> São Paulo</h3>

					<?php 
						$loop = new WP_Query(array('post_type' => 'mapa',
									'orderby' => 'title',
									'order'	 => 'ASC',
									'posts_per_page' => 50,
									'tax_query' => array(
							            array(
							                'taxonomy'  => 'categorias',
							                'terms'     => 'saopaulo',
							                'field'     => 'slug',
							                'compare'   => 'LIKE'    
										)
							        ),
						));
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2 col-xs-6">
							
							<img src="<?php the_field('logo_associada'); ?>">
							
						</div>
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 linha">
					<h3 class="mg"><i class="fas fa-map-marker-alt"></i> Minas Gerais</h3>

					<?php 
						$loop = new WP_Query(array('post_type' => 'mapa',
									'orderby' => 'title',
									'order'	 => 'ASC',
									'posts_per_page' => 50,
									'tax_query' => array(
							            array(
							                'taxonomy'  => 'categorias',
							                'terms'     => 'minasgerais',
							                'field'     => 'slug',
							                'compare'   => 'LIKE'    
										)
							        ),
						));
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2">
							
							<img src="<?php the_field('logo_associada'); ?>">
							
						</div>
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 linha">
					<h3 class="es"><i class="fas fa-map-marker-alt"></i> Espírito Santo</h3>

					<?php 
						$loop = new WP_Query(array('post_type' => 'mapa',
									'orderby' => 'title',
									'order'	 => 'ASC',
									'posts_per_page' => 50,
									'tax_query' => array(
							            array(
							                'taxonomy'  => 'categorias',
							                'terms'     => 'espiritosanto',
							                'field'     => 'slug',
							                'compare'   => 'LIKE'    
										)
							        ),
						));
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2">
							
							<img src="<?php the_field('logo_associada'); ?>">
							
						</div>
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 linha">
					<h3 class="pr"><i class="fas fa-map-marker-alt"></i> Paraná</h3>

					<?php 
						$loop = new WP_Query(array('post_type' => 'mapa',
									'orderby' => 'title',
									'order'	 => 'ASC',
									'posts_per_page' => 50,
									'tax_query' => array(
							            array(
							                'taxonomy'  => 'categorias',
							                'terms'     => 'parana',
							                'field'     => 'slug',
							                'compare'   => 'LIKE'    
										)
							        ),
						));
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2">
							
							<img src="<?php the_field('logo_associada'); ?>">
							
						</div>
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 linha">
					<h3 class="go"><i class="fas fa-map-marker-alt"></i> Goiás</h3>

					<?php 
						$loop = new WP_Query(array('post_type' => 'mapa',
									'orderby' => 'title',
									'order'	 => 'ASC',
									'posts_per_page' => 50,
									'tax_query' => array(
							            array(
							                'taxonomy'  => 'categorias',
							                'terms'     => 'goias',
							                'field'     => 'slug',
							                'compare'   => 'LIKE'    
										)
							        ),
						));
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2">
							
							<img src="<?php the_field('logo_associada'); ?>">
							
						</div>
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 linha">
					<h3 class="se"><i class="fas fa-map-marker-alt"></i> Sergipe</h3>

					<?php 
						$loop = new WP_Query(array('post_type' => 'mapa',
									'orderby' => 'title',
									'order'	 => 'ASC',
									'posts_per_page' => 50,
									'tax_query' => array(
							            array(
							                'taxonomy'  => 'categorias',
							                'terms'     => 'sergipe',
							                'field'     => 'slug',
							                'compare'   => 'LIKE'    
										)
							        ),
						));
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2">
							
							<img src="<?php the_field('logo_associada'); ?>">
							
						</div>
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 linha">
					<h3 class="pe"><i class="fas fa-map-marker-alt"></i> Pernambuco</h3>

					<?php 
						$loop = new WP_Query(array('post_type' => 'mapa',
									'orderby' => 'title',
									'order'	 => 'ASC',
									'posts_per_page' => 50,
									'tax_query' => array(
							            array(
							                'taxonomy'  => 'categorias',
							                'terms'     => 'pernambuco',
							                'field'     => 'slug',
							                'compare'   => 'LIKE'    
										)
							        ),
						));
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2">
							
							<img src="<?php the_field('logo_associada'); ?>">
							
						</div>
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="ma"><i class="fas fa-map-marker-alt"></i> Maranhão</h3>

					<?php 
						$loop = new WP_Query(array('post_type' => 'mapa',
									'orderby' => 'title',
									'order'	 => 'ASC',
									'posts_per_page' => 50,
									'tax_query' => array(
							            array(
							                'taxonomy'  => 'categorias',
							                'terms'     => 'maranhao',
							                'field'     => 'slug',
							                'compare'   => 'LIKE'    
										)
							        ),
						));
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2">
							
							<img src="<?php the_field('logo_associada'); ?>">
							
						</div>
					<?php endwhile; wp_reset_postdata(); ?>	
				</div>
			</div>
		</div>
	</section>	 -->

	<!-- <section id="identidade">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Identidade Visual</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 text-center">
					<p class="one-identity">logotipo</p>
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/logos-download.jpg">
					<a href="#" class="one-identity bt-more">download</a>
				</div>
				<div class="col-md-6 text-center">
					<p>diretrizes para uso</p>
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/diretrizes.jpg">
					<a href="#" class="bt-more">download</a>
				</div>
			</div>
		</div>
	</section> -->	
<?php get_footer(); ?>

<script src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/scripts/flickity.pkgd.min.js"></script>
<link rel="stylesheet" href="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/styles/flickity.min.css">

<script type="text/javascript">
    var $carousel = $('.carousel').flickity({
        cellSelector: '.carousel-cell',
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
</script>