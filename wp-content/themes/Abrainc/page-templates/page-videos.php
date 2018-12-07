<?php 
	
	/* Template Name: Vídeos */
	
get_header();
get_template_part('common');

?>
	<section class="noticias videos">
		<div class="container">

			<div class="row">
				<div class="col-md-12">
					<h1>
						<span>TV</span>Abrainc
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
					</h1>
				</div>
			</div>	
		</div>
	</section>		

	<section id="midias" class="video-publicacoes videos-interna">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
				      	<?php
				      		$count=0;
				          	$loop = new WP_Query(array('post_type' => 'videocasts',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 16
				                    ));
				              	while ($loop->have_posts()) : $loop->the_post();
				      	?>

				      	<?php if ($count == 0) { ?>
					      	<div class="col-md-12 video-destaque">
					      		<?php if (get_field('link_youtube')) { ?>
					      			<a class="link_video" onClick="Video('<?php the_field('link_youtube'); ?>');">
					      		<?php }else if(get_field('link_outros')){ ?>
					      			<a href="<?php the_field('link_outros'); ?>" target="_blank">
					      		<?php }else{ ?>
									<a href="<?php the_permalink(); ?>">
					      		<?php } ?>
						      	
							      	<div class="post-video col-md-8" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
							      		<div class="player"></div>
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
					      	<div class="col-md-3 video-unique">
					      		<?php if (get_field('link_youtube')) { ?>
					      			<a class="link_video" onClick="Video('<?php the_field('link_youtube'); ?>');">
					      		<?php }else if(get_field('link_outros')){ ?>
					      			<a href="<?php the_field('link_outros'); ?>" target="_blank">
					      		<?php }else{ ?>
									<a href="<?php the_permalink(); ?>">
					      		<?php } ?>
							      	<div class="post-video" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
							      		<div class="player"></div>
							      	</div>
							      	<h5><?php the_title(); ?></h5>
						      	</a>
					      	</div>
				      	<?php } ?>
				      	<?php $count++; ?>
				      	<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="modal" id="modal-video">
		<button class="close close-video">x</button>
		<iframe width="800" height="450" id="frame-video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>

<?php get_footer(); ?>