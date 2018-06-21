
<center>

		<h1> LISTA DE NOTÍCIAS: </h1>
			<table id="customers">
				<tr>
					<th></th>
					<th></th>
                    <th>Título</th>
                    <th>Data</th>
                    <th></th>
				</tr>

				<?php foreach ($arrayNews as $noticia){ 	?>

				<tr>
					<td> <img src="/News/Assets/News/<?=$noticia["id_new"]?>.jpg" style="width:100px; height:80px;"></td>
					<td> <a href="?c=n&a=m&id=<?=$noticia["id_new"]?>"><?=$noticia["titulo"]?></a></td>
					<td><?=$noticia["dia"]?></td>
                    <td><a href="?c=n&a=a&id=<?=$noticia["id_new"]?>"class = "btn btn-primary">Editar </a> </td>
			        <td><a href="?c=n&a=d&id=<?=$noticia["id_new"]?>"class ="btn btn-danger">Deletar </a> </td>
				</tr>

				<?php } ?>
