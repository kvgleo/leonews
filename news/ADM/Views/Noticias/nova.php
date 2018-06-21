<h3>Nova Notícia</h3>
<form action="?c=n&a=i" method=POST enctype='multipart/form-data'>

	<div class="form-group" >
		<div>
			<label form="foto">Foto <b>*</b> </label>
			<input name="foto" type="file" class="form-control"   required>
		</div>

		<div>
			<label form="titulo">Título:</label>
			<input type="text" class="form-control" name="titulo">
		</div>

		<div>
			<label form="artigo">Notícia:</label>
			<textarea rows="4" cols="50" placeholder="Digite sua publicação aqui..." class="form-control" name="artigo"> </textarea>
		</div>


		<br><button type="submit" class="btn btn-success">Publicar</button>
	</div>
</form>