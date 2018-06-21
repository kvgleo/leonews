<center>

		<h1> LISTA DE USUARIOS: </h1>
			<table id="customers">
				<tr>
                    <th>Deleta</th>
					<th>Foto</th>
					<th>Nome</th>
                    
				</tr>

				<?php foreach ($arrayUser as $usuario){ 	?>

				<tr>
                    <td><a href="?c=u&a=d&id=<?=$usuario["id_user"]?>"class ="btn btn-danger">Deletar </a> </td>
					<td><?=$usuario["nome"]?></td>
					<td> <img src="/News/Assets/Imgs/<?=$usuario["id_user"]?>.jpg"  style="width:100px; height:80px;"></td>
			        
				</tr>

				<?php } ?>