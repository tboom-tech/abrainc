<?php 
	
	/* Template Name: Imprensa */
	
get_header();
get_template_part('common');

?>
	<section class="publicacoes imprensa">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<h1>
						Imprensa
						<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page.png">
					</h1>
				</div>
			</div>
		</div>
	</section>	

	<section id="midia" class="midia-publicacoes">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Na mídia</h4>
					<a class="float-right link-more-pub" href="/imprensa/abrainc-na-midia/">Mais »</a>
					<div class="row">
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 4,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'abrainc'
							        )
							       )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      	?>
			      		<div class="post-galeria col-md-3">
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
						      		<h5><?php the_title(); ?></h5>			
					      		</div>  				      			
			      			</a>
			      		</div>
			      	<?php endwhile; wp_reset_postdata(); ?>		
			      	</div>			
				</div>
			</div>
		</div>
	</section>

	<section id="midia" class="midia-publicacoes releases">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Releases</h4>
					<a class="float-right link-more-pub" href="/imprensa/releases/">Mais releases »</a>
					<div class="row">
			      	<?php
			          	$loop = new WP_Query(array('post_type' => 'post',
			                      'orderby' => 'post_date',
			                      'order' => 'DESC',
			                      'posts_per_page' => 4,
								  'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => 'releases'
							        )
							       )
			                    ));
			              	while ($loop->have_posts()) : $loop->the_post();
			      	?>
			      		<div class="post-galeria col-md-3">
			      			<a href="<?php the_permalink(); ?>">
								<div class="content-post">
				      				<div class="post-date">
				      					<?php the_date('d/m/Y'); ?>
				      				</div>

						      		<p><?php the_title(); ?></p>			
					      		</div>  				      			
			      			</a>
			      		</div>
			      	<?php endwhile; wp_reset_postdata(); ?>		
			      	</div>			
				</div>
			</div>
		</div>
	</section>

	<section id="assessoria" class="midia-publicacoes">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title">
					<h4>Assessoria de imprensa</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<?php 
						$repeater = get_field('assessoria');
						foreach($repeater as $i => $row) {
					?>					
						<div class="row assessora">
							<div class="col-md-4 col-xs-4">
								<img src="<?php echo $row['imagem']; ?>">
							</div>
							<div class="col-md-8 col-xs-8">
								<h5><?php echo $row['nome']; ?></h5>
								<p>
									<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/telefone.png">
									<?php echo $row['telefone']; ?>
								</p>

								<p>
									<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/email.png">
									<?php echo $row['email']; ?>
								</p>							
							</div>
						</div>
					<?php } ?>				
				</div>

				<div class="col-md-7 col-md-offset-1 jornalista">
					<h2>Cadastro de Jornalistas*</h2>
					<?php echo do_shortcode('[contact-form-7 id="6236" title="Cadastro de Jornalistas"]' ); ?>					
				</div>
			</div>
		</div>
	</section>			
<?php

get_footer();