<h3>Novo Usuário</h3>

<?php if($cadastro == true){ ?>
    <h1> Cadastro efetuado! </h1>
    <a href="index.php" class= "btn btn-primary">Voltar </a>
    <img src="../Assets/Imgs/<?=$id_img?>.jpg">
<?php } else{ ?>

<form action="?c=s&a=n" method=POST enctype='multipart/form-data'>

	<div class="form-group">
        <div>
			<label form="tittle">Foto <b>*</b> </label>
			<input name="foto" type="file" class="form-control"    required>
		</div>
		<div>
			<label form="nome">Nome <b>*</b></label>
			<input type="text" class="form-control" name="nome">
		</div>

		<div>
			<label form="senha">Senha <b>*</b></label>
			<input type="text" class="form-control" name="senha">
		</div>


		<br><button type="submit" class="btn btn-success">Adicionar</button>
	</div>
</form>
<?php } ?>