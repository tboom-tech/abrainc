<?php

	get_header();
	get_template_part('common');
?>

	<section class="container-fluid type_post post_artigos">
		<article class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<p class="categoria">Evento</p>

					<div class="post-date">
						Data do Evento: <?php the_field('data_evento'); ?><br />
					</div>

					<h1><?php the_title(); ?></h1>

					<div class="content-post">
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
<?php get_footer(); ?>