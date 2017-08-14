<?php
	#  NESTA PAGINA FICARA O HTML DO FORM
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	// <?=$res['resultado_mysql']?_>

	// As verificações em php serão feitas na metódo da classe que chama este arquivo
?>


		<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
			<li class="breadcrumb-item active">Nova Instituição</li>
		</ol>


		<div class="card">
			<h6 class="card-header">Cadastro de nova instituição</h6>
			<div class="card-block">
				<div class="row">
					<div class="form-group col-12">
						<label for="razaoSocial">Razão Social</label>
						<input type="text" class="form-control" id="razaoSocial" aria-describedby="razaoSocialHelp" placeholder="Ex: Instituição Amiguinho Feliz">
						<small id="razaoSocialHelp" class="form-text text-muted">Digite conforme no seu cartão CNPJ</small>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-12">
						<label for="nomeFantasia">Nome Fantasia</label>
						<input type="text" class="form-control" id="nomeFantasia" aria-describedby="nomeFantasialHelp" placeholder="Ex: Amiguinho Feliz">
						<small id="razaoSocialHelp" class="form-text text-muted">Você será chamado pelo Nome Fantasia dentro de nosso sistema</small>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-12 col-md-8">
						<label for="logadrouro">Logradouro</label>
						<input type="text" class="form-control" id="logadrouro" placeholder="Ex: Rua General Osório">
					</div>	
					<div class="form-group col-12 col-md-4">
						<label for="numero">Número</label>
						<input type="text" class="form-control" id="numero" placeholder="Ex: 1568">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-12 col-md-6">
						<label for="estado">Estado</label>
						<select class="custom-select form-control">
							<option selected>Selecione o estado</option>
							<option value="AC">AC</option>
							<option value="AL">AL</option>
							<option value="AP">AP</option>
							<option value="AM">AM</option>
							<option value="BA">BA</option>
							<option value="CE">CE</option>
							<option value="DF">DF</option>
							<option value="ES">ES</option>
							<option value="GO">GO</option>
							<option value="10">MA</option>
							<option value="11">MT</option>
							<option value="12">MS</option>
							<option value="13">MG</option>
							<option value="14">PA</option>
							<option value="15">PB</option>
							<option value="16">PR</option>
							<option value="17">PE</option>
							<option value="18">PI</option>
							<option value="19">RJ</option>
							<option value="20">RN</option>
							<option value="21">RS</option>
							<option value="22">RO</option>
							<option value="23">RR</option>
							<option value="24">SC</option>
							<option value="25">SP</option>
							<option value="26">SE</option>
							<option value="27">TO</option>
						</select>
					</div>	
					<div class="form-group col-12 col-md-6">
						<label for="cidade">Cidade</label>
						<!-- AQUI VAI O FOR DAS CIDADES DO BANCO -->
						<select class="custom-select form-control">
							<option selected>Selecione a cidade</option>
							<option value="1">São Paulo</option>
							<option value="2">Blumenau</option>
							<option value="3">Porto Alegre</option>
							<option value="3">Florianópolis</option>
						</select>
					</div>
					<div class="form-group col-12">
						<label for="causa-defendida">Causa defendida</label>
						<!-- AQUI VAI O FOR DAS CAUSAS DO BANCO -->
						<select class="custom-select form-control">
							<option selected>Selecione a causa defendida</option>
							<option value="1">Causa animal</option>
							<option value="2">Pessoas em situação de rua</option>
							<option value="3">Educação</option>
						</select>
						<small id="causa-defendidaHelp" class="form-text text-muted">Sua instituição pode defender no máximo 1 causa</small>
					</div>	
					<div class="form-group col-12">
						<button type="button" class="btn btn-success">Cadastrar</button>
					</div>
				</div>
			</div>
		</div>

</div>
<br>
