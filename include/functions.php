<?php
	#  FUNCÇÕES
	// Aqui ficará as funções desenvolvidas por nós

	#  FUNÇÕES DE ALERTAS 
	// Função desenvolvida por: João de Paula
	// COMO UTILIZAAR
	// alert("mensagem do erro","danger");
	// o primeiro parametro deve ser a mensagem
	// o segundo parametro deve ser da cor, como exemplo: danger,success,info,warning

function ParseDate($dt, $mask = 'd/m/Y') {

	date_default_timezone_set("America/Sao_Paulo");

	$rs = false;
	
        if (preg_match('/^(\d{1,2})[\/-](\d{1,2})[\/-](\d{4})( (\d{1,2}):(\d{1,2})(:(\d{1,2}))?)?$/', $dt, $regs)) { // PT_BR
        	list(, $d, $m, $Y, , $H, $i, , $s) = $regs;
        } elseif (preg_match('/^(\d{4})[\/-](\d{1,2})[\/-](\d{1,2})( (\d{1,2}):(\d{1,2})(:(\d{1,2}))?)?$/', $dt, $regs)) { // EN
        	list(, $Y, $m, $d, , $H, $i, , $s) = $regs;
        } else {
        	return false;   
        }

        return (checkdate($m, $d, $Y) ? date($mask, mktime($H, $i, $s, $m, $d, $Y)) : false);
    }

    function alert($msg,$cor) {
    	?>
    	<section class="container">
    		<div class="alert alert-<?=$cor?> alert-dismissible fade show" role="alert">
    			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
    			</button>
    			<?=$msg?>
    		</div>
    	</section>
    	<?php
    }

	# FIM FUNÇÃO ALERTA	
