<?php 
	
	/* Template Name: Indicador Antecedente */
	
get_header();
get_template_part('common');

?>
<section class="noticias artigos indicadores">

		<div class="bg-indicadores" style="background-image: url('<?php the_field('imagem'); ?>');">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>
							Indicador Antecedente do Mercado Imobiliário
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
					<a href="https://www.fipe.org.br/pt-br/indices/abrainc/#metodologia" target="_blank" class="bt-more">conheça a metodologia</a>
				</div>

				<div class="col-md-6">
					<form role="search" method="get" id="advanced-searchform" class="advanced-searchform" name="advanced-searchform" action="/radar/">
						<div class="row">
							<div class="form-group col-md-5 col-md-offset-7">
								<p>Busque por um radar</p>
								<select id="mes" name="mes" required>
									<option value="">Mês</option>
									<option value="Janeiro">Janeiro</option>
									<option value="Fevereiro">Fevereiro</option>
									<option value="Março">Março</option>
									<option value="Abril">Abril</option>
									<option value="Maio">Maio</option>
									<option value="Junho">Junho</option>
									<option value="Julho">Julho</option>
									<option value="Agosto">Agosto</option>
									<option value="Setembro">Setembro</option>
									<option value="Outubro">Outubro</option>
									<option value="Novembro">Novembro</option>
									<option value="Dezembro">Dezembro</option>
								</select>

								<select id="ano" name="ano" required>
									<option value="">Ano</option>
									<option value="2018">2019</option>
									<option value="2018">2018</option>
									<option value="2017">2017</option>
									<option value="2016">2016</option>
									<option value="2015">2015</option>
									<option value="2014">2014</option>
								</select>									
								<input type="submit" id="searchsubmit" value="Buscar" />
							</div>
						</div>
					</form>					
				</div>
			</div>
		</div>
			
		<div class="container">
			<div class="row listagem-noticias">
				<div class="col-md-12">
					<div class="row">
<?php 

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	if ($_GET['ano'] || $_GET['mes']) {
		$search = $_GET['mes'].' '.$_GET['ano'];
	}else{
		$search = '';
	}

  	$noticias = new WP_Query(array('post_type' => 'post',
              'orderby' => 'post_date',
              'order' => 'DESC',
              'posts_per_page' => 16,
              'paged' => $paged,
              's' => $search,
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
<?php endwhile; ?>
		 </div>
		 </div>
			
					<?php $big = 999999999; ?>			
					<div class="row no-padding no-margin">
						<div class="paginated">
							<?php
								echo paginate_links( array(
									'base'		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format'	=> '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total'		=> $noticias->max_num_pages
								) );
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php

get_footer();