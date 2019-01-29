<?php 
	
	/* Template Name: Associadas */
	
get_header();
get_template_part('common');

?>
	<section class="associadas">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="content-associadas desktop">
						<?php the_content(); ?>
					</div>
					<h1>
						Associadas
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
					</h1>

					<?php 
						$loop = new WP_Query(array('post_type' => 'associadas',
			                      'orderby' => 'title',
			                      'order' => 'ASC',
			                      'posts_per_page' => 50
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2 col-xs-6 item associada">
							<a href="<?php the_field('link_site'); ?>" target="_blank">
								<img src="<?php the_field('imagem_pagina'); ?>">
							</a>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>					
				</div>
			</div>


			<?php 
				$loop = new WP_Query(array('post_type' => 'parceiros',
                      'orderby' => 'title',
                      'order' => 'ASC',
                      'posts_per_page' => 50
                    ));
				if ($loop->have_posts()) { ?>

					<div class="row">
						<div class="col-md-12">
							<h2>
								Parceiras
								<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
							</h2>

							<?php 
				              	while ($loop->have_posts()) : $loop->the_post();
							?>
									<div class="col-md-2 col-xs-6 item associada">
										<img src="<?php the_field('imagem_pagina'); ?>">
									</div>
							<?php endwhile; wp_reset_postdata(); ?>					
						</div>
					</div>			
				<?php } ?>

			<div class="row">
				<div class="col-md-12">
					<h2>
						Apoio Institucional
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page-apoio.png">
					</h2>

					<?php 
						$loop = new WP_Query(array('post_type' => 'apoiadores',
			                      'orderby' => 'title',
			                      'order' => 'ASC',
			                      'posts_per_page' => 50
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="col-md-2 col-xs-6 item">
							<img src="<?php the_field('imagem_pagina'); ?>">
						</div>
					<?php endwhile; wp_reset_postdata(); ?>						
				</div>
			</div>
		</div>	
	</section>
<?php

get_footer();