<?php
	#  NESTA PAGINA FICARA O HTML DA EXIBIÇÃO BONITA (NILTON)
	// Exibir a página html da listagem de todos as instituições separadas por usuário...
	// o select estará sendo feito na classe que chama este arquivo..
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	// <?=$res['resultado_mysql']?_>

	// As verificações em php serão feitas na metódo da classe que chama este arquivo
	require_once("include/header.php");
	?>
		<p>
			<ol class="breadcrumb text-center">
			  <li class="breadcrumb-item"><a href="index.php">Pagina Inicial</a></li>
			  <li class="breadcrumb-item"><a href="#">Library</a></li>
			  <li class="breadcrumb-item"><a href="#">Data</a></li>
			</ol>
		</p>
	<?php

// LISTAR

	$sql = "SELECT * FROM instituicoes";
	$consulta = mysql_query($sql) or die(mysql_error());
	// $rs  = mysql_fetch_array(mysql_query($sql));

echo '<table class="table table-bordered  table-hover text-center">
		<thead>
	      <tr>
	        <th>Nome da ONG</th>
	        <th>Ver Perfil</th>
	      </tr>
	    </thead>';
	

	$sql = "SELECT nome_fantasia FROM instituicoes";

	
	while ($rs = mysql_fetch_array($consulta)) {
		echo "<tr>";
		echo "<td> " . $rs['nome_fantasia'] . " </td>";
		echo "<td>";
	?>


	<form method="POST" action="#" name="excluir">
	<input type="hidden" name="id" value="<?=$rs['id']?>">
	
	<button type="submit" class="btn btn-info" name="enviar"> 
		<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
	</button>
	</form>
	
	<?php
	echo "</td>";
	echo "<td>";


}
echo "</table>";

	require_once("include/footer.php")
?>
