<h3>Alterar Cliente</h3>
<form action="?c=n&a=u" method="POST" enctype='multipart/form-data'> 
	<div class="form-group">

	<div>
			Atual:
			<img src="/News/Assets/News/<?= $arrayNews["id_new"]?>.jpg" width="100" height="80">
			<label form="foto">Foto <b>*</b> </label>
			<input name="foto" type="file" class="form-control">
		</div>
		
		<div>
			<label for="id_new">ID: </label>
			<input type="text" class="form-control" name="id_new" value="<?= $arrayNews["id_new"] ?>" readonly="readonly">
		</div>

		<div>
			<label for="titulo">Título</label>
			<input type="text" class="form-control" name="titulo" value="<?= $arrayNews["titulo"] ?>">
		</div>

		<div>
			<label for="artigo">publicação</label>
			<textarea type="text" rows="10" cols="100" class="form-control" name="artigo" value=""> <?= $arrayNews["artigo"] ?></textarea>

		</div>

		<br><button type="submit" class="btn btn-primary">Salvar</button>
		<a href="?c=n&a=l" class="btn btn-light"> Cancelar</a>

	</div>	
</form>