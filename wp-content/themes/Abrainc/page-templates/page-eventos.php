<?php 
	
	/* Template Name: Eventos */
	
get_header();
get_template_part('common');

$NameMes = array('01' => 'Janeiro',
				'02' => 'Fevereiro',
				'03' => 'Março',
				'04' => 'Abril',
				'05' => 'Maio',
				'06' => 'Junho',
				'07' => 'Julho',
				'08' => 'Agosto',
				'09' => 'Setembro',
				'10' => 'Outubro',
				'11' => 'Novembro',
				'12' => 'Dezembro');

$DiasMes = array('01' => '31',
				'02' => '28',
				'03' => '31',
				'04' => '30',
				'05' => '31',
				'06' => '30',
				'07' => '31',
				'08' => '31',
				'09' => '30',
				'10' => '31',
				'11' => '30',
				'12' => '31');

?>

	<section class="noticias artigos indicadores eventos">
		<div class="bg-indicadores" style="background-image: url('<?php the_field('imagem'); ?>');">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>
							Agenda de Eventos
							<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-page-white-peq.png">
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

				<div class="col-md-6">
					<form role="search" method="get" id="advanced-searchform" class="advanced-searchform" name="advanced-searchform" action="/eventos/">
						<div class="row">
							<div class="form-group col-md-12">
								<p>Busque um evento</p>
								<select id="mes" name="mes" required>
									<option value="">Mês</option>
									<option value="01">Janeiro</option>
									<option value="02">Fevereiro</option>
									<option value="03">Março</option>
									<option value="04">Abril</option>
									<option value="05">Maio</option>
									<option value="06">Junho</option>
									<option value="07">Julho</option>
									<option value="08">Agosto</option>
									<option value="09">Setembro</option>
									<option value="10">Outubro</option>
									<option value="11">Novembro</option>
									<option value="12">Dezembro</option>
								</select>

								<select id="ano" name="ano" required>
									<option value="">Ano</option>
									<option value="2020">2020</option>
									<option value="2019">2019</option>
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
		<?php
			$data_evento = $_GET['ano'];
			$data_atual = date('d-m-Y');
		?>
		<?php 
			if ($_GET['ano'] || $_GET['mes']) {
				$ano = $_GET['ano'];
				$mes = $_GET['mes'];
				$data_atual = $ano.'-'.$mes.'-01';
				$data_fim = $ano.'-'.$mes.'-'.$DiasMes[$mes];
			}else{
				$data_atual = date('Y-m-d');
				$data_fim = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 730 day"));
			}

			$mes_anterior = $mes-1;
			if ($mes_anterior == 0) {
				$mes_anterior = 12;
				$ano_back = $ano - 1;
			}else{
				$ano_back = $ano;
			}

			$mes_anterior = sprintf("%02d", $mes_anterior);

			$link_back = '/eventos/?mes='.$mes_anterior.'&ano='.$ano_back;	

			$mes_proximo = $mes+1;
			if ($mes_proximo == 13) {
				$mes_proximo = 1;
				$ano_fwd = $ano + 1;
			}else{
				$ano_fwd = $ano;
			}

			$mes_proximo = sprintf("%02d", $mes_proximo);

			$link_fwd = '/eventos/?mes='.$mes_proximo.'&ano='.$ano_fwd;
		?>

		<!-- <div class="container select-data">
			<div class="row">
				<div class="col-md-12">
					<p class="ano_selected"><?php echo $ano; ?></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3 mes_anterior">
					<a href="<?php echo $link_back; ?>">
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/arrow-back.jpg"> 
						<?php echo $NameMes[$mes_anterior]; ?>
					</a>
				</div>
				<div class="col-md-6 mes_atual text-center">
					<?php echo $NameMes[$mes]; ?>
				</div>				
				<div class="col-md-3 proximo_mes text-right">
					<a href="<?php echo $link_fwd; ?>">
						<?php echo $NameMes[$mes_proximo]; ?> 
						<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/arrow-foward.jpg">
					</a>
				</div>				
			</div>
		</div>		 -->

		<div class="container">
			<div class="row listagem-noticias">
				<div class="col-md-12">
					<div class="row">
					<?php 

						$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

					  	$noticias = new WP_Query(array('post_type' => 'evento',
								  'order'          => 'ASC',
					              'posts_per_page' => -1,
					              'paged'          => $paged,
					              'orderby'        => 'data_evento',
					              'meta_query'     => array(
				              		'relation'     => 'AND',
				              		array(
					                    'key'      => 'data_evento',
					                    'value'    => $data_atual,
					                    'compare'  => '>=',
					                    'type'     => 'DATE',
					                	),
				              		array(
			              				'key'      => 'data_evento',
					                    'value'    => $data_fim,
					                    'compare'  => '<=',
					                    'type'     => 'DATE'
				              			)
					                )					              
					            ));
					      	while ($noticias->have_posts()) : $noticias->the_post();
					      	$title = explode("-", get_field('data_evento'));
					?>
					<?php if (get_field('data_evento')) { ?>
					<div class="post-indicador col-md-3">
						<div class="content-post-indicador">
					    	<a href="<?php the_permalink(); ?>">
								<p class="dia">
									<?php echo $title[2]; ?>

									<span><?php echo $NameMes[$title[1]]; ?> de <?php echo $title[0]; ?></span>
								</p>
								<p class="title_event"><?php the_title(); ?></p>
								<p class="description_event"><?php the_field('descricao_evento'); ?></p>
					      	</a>
				      	</div>
			      	</div>	
			      	<?php } ?>		
			<?php endwhile; ?>
		 	</div>
		</div>
	</section>
<?php

get_footer();