<?php 
	
	/* Template Name: Modelo Padrão */
	
get_header();
	
?>
	
		<section class="container-fluid no-padding no-margin">
			<article class="container ">
		<!-- The Loop -->

<?php 
	
while ( have_posts() ) 
{ 
	the_post();
	// the_title();
	the_content();
};

?>
			</article>
		</section>
	</div><!-- DIV: CONTAINER abrainc-v4 -->
				</div>
			</div>
<?php
	
get_footer();
