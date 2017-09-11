<?php
	# CLASSE PRINCIPAL
	require_once("classes/site.class.php");
	$site = new Site($hef=true);
	
	if (!isset($_SESSION["logado"])) {
		include("institucional.php");
	} else {
		echo "| aqui vai o header do logado -> list dos eventos e busca";
	}

	$site->__destruct();
?>
