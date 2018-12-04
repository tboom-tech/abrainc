<?php 
	
	/* Template Name: PodCasts */
	
get_header();
get_template_part('common');

?>
	<section class="noticias videos podcasts">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<h1>
						Rádio Abrainc
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
					</h1>
				</div>
			</div>	
		</div>
	</section>		

	<section id="midias" class="video-publicacoes videos-interna podcasts">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'podcasts',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 16
				                    ));
				              	while ($loop->have_posts()) : $loop->the_post();
				      	?>
					      	<div class="col-md-3 video-unique">
						      	<div class="post-video" style="background-image: url('<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/podcast.jpg');">
						      	</div>
						      	<?php the_content(); ?>
						      	<h5><?php the_title(); ?></h5>
					      	</div>
				      	<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php

get_footer();