<?php
	require 'common.php';
?>
	<div class="barra_busca col-md-12 no-padding">
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo $sitepath; ?>">
			<div>
				<input type="text" value="" name="s" id="s" placeholder="Pesquisar no Site" class="input-search" />
				<input type="submit" id="searchsubmit" value="" />
			</div>
		</form>
	</div>