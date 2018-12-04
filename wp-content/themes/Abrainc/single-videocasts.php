<?php

	get_header();
	get_template_part('common');
	
	$categorias = get_the_category();
?>
		<section class="container-fluid type_post post_artigos post_videos">
			<article class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<p class="categoria">Vídeos</p>

						<div class="post-date">
							<?php the_date(); ?>
						</div>

						<h1><?php the_title(); ?></h1>

						<div class="content-post text-center">
							<?php the_content(); ?>
						</div>

						<div class="share">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-facebook.png"></a>

							<a href="https://twitter.com/home?status=?u=<?php the_permalink(); ?>" target="_blank"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/share-twitter.png"></a>
						</div>						
					</div>
				</div>
			</article>
		</section>

		<section id="posts-related" class="artigos-related">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Veja mais vídeos</h2>
				      	<?php
				          	$loop = new WP_Query(array('post_type' => 'videocasts',
				                      'orderby' => 'post_date',
				                      'order' => 'DESC',
				                      'posts_per_page' => 2,
				                    ));
				          	while ($loop->have_posts()) : $loop->the_post();
				       	?>
							<div class="post-list-destaque">
						    	<a href="<?php the_permalink(); ?>">
									<div class="content-post">
										<div class="post-date-more">
											<?php the_date(); ?>
										</div>
							      		<h4><?php the_title(); ?></h4>
							      		<p><?php the_excerpt(); ?></p>				
						      		</div>      	
						      	</a>
					      	</div>			       	
				       <?php endwhile; ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer(); ?>