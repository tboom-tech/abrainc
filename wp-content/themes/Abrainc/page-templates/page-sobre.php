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
							Quem Somos
							<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page-white.png">
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
					<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/Conselho.jpg">
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