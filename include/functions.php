<?php
	#  FUNCÇÕES
	// Aqui ficará as funções desenvolvidas por nós

	#  FUNÇÕES DE ALERTAS 
	// Função desenvolvida por: João de Paula
	// COMO UTILIZAAR
	// alert("mensagem do erro","danger");
	// o primeiro parametro deve ser a mensagem
	// o segundo parametro deve ser da cor, como exemplo: danger,success,info,warning

	function alert($msg,$cor) {
?>
<div class="alert alert-<?=$cor?> alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<?=$msg?>
</div>
<?php
	}

	# FIM FUNÇÃO ALERTA	
