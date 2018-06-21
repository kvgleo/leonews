
<center>

<h1> LISTA DE NOTÍCIAS: </h1>
    <table id="customers">
        <tr>

            <th>Título</th>
            <th></th>

        </tr>

        <?php foreach ($arrayNews as $noticia){ 	?>

        <tr>
            <td><?=$noticia["titulo"]?></td>
            <td><a href="?c=c&a=c&id=<?=$noticia["id_new"]?>"class = "btn btn-light">Selecionar </a>  </td>
        </tr>

        <?php } ?>
</center>