
<div class="row como-funciona">
	<div class="container">
		<form>
			<div class="form-group">
				<label for="nome_juridico">Razão Social:</label>
				<input type="text" class="form-control" id="nome_juridico" aria-describedby="nome_juridico" placeholder="Coloque sua razão social aqui!!!">
			</div>
			<div class="form-group">
				<label for="nome_fantasia">Nome Fantasia:</label>
				<input type="text" class="form-control" id="nome_fantasia" aria-describedby="nome_fantasia" placeholder="Coloque o nome da ONG aqui!!!">
			</div>
			<div class="form-group">
				<label for="cnpj">CNPJ:</label>
				<input type="number" class="form-control" id="cnpj" aria-describedby="cnpj" placeholder="00.000.000/0000-00">
			</div>
			<div class="form-group">
				<label for="endereco">Endereço:</label>
				<input type="text" class="form-control" id="endereco" aria-describedby="endereco" placeholder="Coloque seu endereço aqui!!!">
			</div>
			<div class="form-group">
				<label for="numero">Numero:</label>
				<input type="number" class="form-control" id="numero" aria-describedby="numero" placeholder="000">
			</div>
			<div class="form-group">
			<label for="estado">Estado:</label>
				<select class="form-control" id="estado">
					<option>Selecione seu Estado</option>
					<option>SP</option>
					<option>SC</option>
					<option>PR</option>
					<option>RS</option>
					<option>RJ</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cidade">Cidade:</label>
				<input type="text" class="form-control" id="cidade" aria-describedby="cidade" placeholder="Coloque sua cidade aqui!!!">
			</div>
			<div class="form-group">
				<label for="fundacao">Data de fundação</label>
				<input type="date" class="form-control" id="fundacao" aria-describedby="emailHelp" >
			</div>
			<div class="form-group">
				<label for="logo">Logo:</label>
				<input type="file" class="form-control-file" id="logo" aria-describedby="fileHelp">
				<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
			</div>
			<div class="form-group">
				<label for="interesses">Causa defendida:</label>
				<select multiple class="form-control" id="interesses">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
			<br>
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coloque seu email aqui!!!">
				<small id="emailHelp" class="form-text text-muted">Nós nunca compartilharemos seu email com ninguém.</small>
			</div>
			<div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" id="senha" placeholder="Senha">
			</div>
			<div class="form-group">
				<label for="confirmesenha">Confirme sua senha</label>
				<input type="password" class="form-control" id="confirmesenha" placeholder="Confirme sua senha">
			</div>
			<div class="form-group">
				<label for="exampleTextarea">Rápida descrição sobre a ONG!!!!</label>
				<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
			</div>
			<div class="form-check">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input">
					Concordo com os termos do site!!
				</label>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>		
	</div>
</div>
