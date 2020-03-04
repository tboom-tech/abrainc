<?php 
	
	/* Template Name: Summit */
	
get_header();
get_template_part('common');

?>
<section class="noticias artigos indicadores event">
	<div class="bg-indicadores" style="background-image: url('<?php the_field('imagem'); ?>');">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>	
		</div>	
	</div>

	<div class="bg-indicadores-mobile" style="background-image: url('<?php the_field('imagem_mobile'); ?>');">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>	
		</div>	
	</div>

	<div class="evento">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-8">
						<h2><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/ico-evento.png"> <span>O Evento</span> <img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-evento.png"></h2>
						<p><?php the_field('texto'); ?></p>
						<p class="end"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/pin.png"> <?php the_field('endereco'); ?></p>
						<p class="date"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> <?php the_field('data'); ?></p>
						<div class="col-md-12 compartilhar">
							<iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.facebook.com%2FABRAINC%2F&layout=button&size=small&width=105&height=20&appId" width="105" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
						</div>
					</div>
					<div class="col-md-4" id="inscricao">
						<div id="sympla-widget-746605" height="auto"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="palestrantes">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/microfone.png"> <span>Palestrantes</span> <img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-palestra.png"></h2>

					<?php
						$id_modal=0;
						$repeater = get_field('palestrantes');
						foreach($repeater as $id_modal => $row) {
						$id_modal++;
					?>	
						<div class="col-md-4 curriculo" onClick="AbreModalPalestras(<?php echo $id_modal; ?>)">
							<img src="<?php echo $row['foto']; ?>">
							<div class="box">
								<p class="nome"><?php echo $row['nome']; ?></p>
							</div>
							<p class="cargo"><?php echo $row['cargo']; ?></p>
							<p class="cv">Ver currículo <i class="fa fa-arrow-right"></i></p>
							<div class="bg-borda">
								
							</div>
						</div>

					<?php } ?>

					<?php
						$id_modal=0;
						$repeater = get_field('palestrantes');
						foreach($repeater as $id_modal => $row) {
						$id_modal++;
					?>
						<div id="palestrantes-<?php echo $id_modal; ?>" class="palestras">
							<img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/close-branco.png" class="fechar">
							<div class="new_palestras">
								<div class="palestras-img">
									<img src="<?php echo $row['foto']; ?>">
								</div>
								<div class="palestras-modal"> 
									<p class="title"><?php echo $row['nome']; ?></p>
									<p class="texto"><?php echo $row['curriculo']; ?>
									</p>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="col-md-12">
						<p class="alteracao"><i>*Palestrantes sujeito a alteração</i></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="programacao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/microfone.png"> <span>Programação</span> <img class="float-right" src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/bg-title-palestra.png"></h2>
					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> 08h às 09h </p>
						</div>
						<div class="col-md-8 left">
							<p>Credenciamento</p>
						</div>
					</div>
					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> 08h às 09h</p>
						</div>
						<div class="col-md-8 left">
							<p>Café de boas-vindas</p>
						</div>
					</div>
					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> <?php the_field('abertura'); ?></p>
						</div>
						<div class="col-md-8 left">
							<p><?php the_field('inicio'); ?></p>
						</div>
					</div>
					<?php
						$repeater = get_field('n_palestrante');
						foreach($repeater as $id_modal => $row) {
					?>
						<div class="col-md-4">
							
						</div>
					
						<div class="col-md-8 pale">
							<p class="nome"><?php echo $row['nome']; ?></p>
							<p class="cargo"><?php echo $row['cargo']; ?></p>	
						</div>
					<?php } ?>

					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> 09h40 às 10h</p>
						</div>
						<div class="col-md-8 left">
							<p>Keynote Speaker</p>
						</div>
					</div>

					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> <?php the_field('mesa'); ?></p>
						</div>
						<div class="col-md-8 left">
							<p><?php the_field('meio'); ?></p>
						</div>
					</div>

					<div class="col-md-4">
							
						</div>
				
					<div class="col-md-8 pale">
						<!-- <p class="nome"><?php the_field('nome_mod'); ?></p> -->
						<p class="cargo_m"><span>Moderador: </span><?php the_field('moderador'); ?></p>
					</div>
					<?php
						$repeater = get_field('n_mesa');
						foreach($repeater as $id_modal => $row) {
					?>
						<div class="col-md-4">
							
						</div>
					
						<div class="col-md-8 pale">
							<p class="nome"><?php echo $row['nome']; ?></p>
							<p class="cargo"><?php echo $row['cargo']; ?></p>	
						</div>
					<?php } ?>
						<div class="col-md-4">
						
						</div>
					
						<div class="col-md-8 pale debate">
							
						</div>
					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> 11h10 às 11h30</p>
						</div>
						<div class="col-md-8 left">
							<p>Café de Relacionamento</p>
						</div>
					</div>

					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> 11h30 às 11h40</p>
						</div>
						<div class="col-md-8 left">
							<p>Apresentação dos Ativos Correios</p>
						</div>
					</div>

					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> <?php the_field('cafe'); ?></p>
						</div>
						<div class="col-md-8 left">
							<p><?php the_field('fim'); ?></p>
						</div>

					</div>
					<div class="col-md-4">
							
						</div>
				
					<div class="col-md-8 pale">
						<!-- <p class="nome"><?php the_field('nome_mod'); ?></p> -->
						<p class="cargo_m"><span>Moderador: </span><?php the_field('moderador_2'); ?></p>
					</div>
					<?php
						$repeater = get_field('n_fim');
						foreach($repeater as $id_modal => $row) {
					?>
						<div class="col-md-4">
							
						</div>
					
						<div class="col-md-8 pale">
							<p class="nome"><?php echo $row['nome']; ?></p>
							<p class="cargo"><?php echo $row['cargo']; ?></p>	
						</div>
					<?php } ?>

					<div class="col-md-12 bg-branco">
						<div class="col-md-4">
							<p class="abertura"><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/data.png"> 13h</p>
						</div>
						<div class="col-md-8 left">
							<p>Encerramento</p>
						</div>
					</div>

					<div class="col-md-12">
						<p class="alteracao"><i>*Programação sujeita a alteração</i></p>
					</div>

					<div class="col-md-12">
						<a class="download" href="<?php the_field('programacao'); ?>" target="_blank">Faça o Download da Programação</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="patrocinadores">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>patrocinador</h2>
					<?php
						$repeater = get_field('patrocinadores');
						foreach($repeater as $id_modal => $row) {
					?>
						<div class="col-md-6">
							<a href="<?php echo $row['link']; ?>" target="_blank">
								<img src="<?php echo $row['images']; ?>">
							</a>
						</div>
					<?php } ?>
				</div>

				<div class="col-md-12">
					<h2>Parceiros Abrainc</h2>
					<?php
						$repeater = get_field('parceiros');
						foreach($repeater as $id_modal => $row) {
					?>
						<div class="col-md-6">
							<img src="<?php echo $row['images']; ?>">
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="apoiadores">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>
						apoiadores institucionais
					</h2>

					<?php
						$repeater = get_field('apoiadores');
						foreach($repeater as $id_modal => $row) {
					?>
						<div class="col-md-2">
							<img src="<?php echo $row['images']; ?>">
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="inscreva footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Inscrições Abertas</h2>
					<p><?php the_field('inscricao'); ?></p>
					<a class="button-small-text btn" href="https://www.sympla.com.br/abrainc-summit----novo-ciclo-da--incorporacao__746605" target="_blank">
						Realizar inscrição
					</a>
				</div>
				<div class="col-md-12">
					<h2>Ficou alguma dúvida?</h2>
					<a href="/institucional/fale-conosco/" class="btn_fale">Fale Conosco <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="btn-inscricao" id="fixed">
		<p><img src="<?=ABRAINC_URL?>/wp-content/themes/Abrainc/img/ico-realizar.png"> realizar inscrição</p>
	</div>
</section>

<script src="https://www.sympla.com.br/js/sympla.widget-pt.js/746605"></script>
<?php

get_footer();