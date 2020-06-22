<?php
	session_start();

	if(!isset($_SESSION['usuario_log'])){
		header('Location: /relatorio-login/');
		session_destroy();
	}

	if(isset($_GET['deslogar'])){
		session_destroy();
		header('Location: /relatorio-login/');
	}

?>

<?php 
	
	/* Template Name: Relatorio Analítico Minha Casa Minha Vida Seção 3 */
	
get_header();
get_template_part('common');

?>
<section class="noticias artigos indicadores">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="relatorio">
						Relatórios Minha Casa Minha Vida (MCMV)
					</h1>
					<h4 class="relatorio"><a href="/relatorio-analitico-minha-casa-minha-vida/"><span>Seção 1</span>: Relatório Analítico MCMV 2019-2020</a></h4>
					<h4 class="relatorio"><a href="/relatorio-analitico-minha-casa-minha-vida-secao-2/"><span>Seção 2</span>: Acompanhamento orçamentário FGTS 2020</a></h4>
					<h4 class="relatorio"><a href="/relatorio-analitico-minha-casa-minha-vida-secao-3/"><span>Seção 3</span>: Resultados Contábeis e Sustentabilidade do FGTS</a></h4>
				</div>
				<div class="col-md-4 img-relatorio">
					<img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-relatorio.png">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a class="deslogar" href="?deslogar">Sair</a>
				</div>
			</div>
		</div>	

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<iframe name="Relatório Analítico Minha Casa Minha Vida" src="https://app.powerbi.com/view?r=eyJrIjoiMjkwZTU1MjgtYTcyMS00NjczLWFiMzMtODc5ZjZiODA1NTkyIiwidCI6Ijc1YzQ2ZWJhLTFhMzAtNDcxZS04YmQ2LTExZDc4MWU1NWFkMyJ9" width="100%" height="600" frameborder=0 scrolling="auto">
					</iframe>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-3">
					<p class="baixar">baixar</p>
				</div>
				<div class="col-md-3">
					<p class="baixar">baixar</p>
				</div>
				<div class="col-md-3">
					<p class="baixar">baixar</p>
				</div>
				<div class="col-md-3">
					<p class="baixar">baixar</p>
				</div>
			</div> -->
		</div>

<?php

get_footer();