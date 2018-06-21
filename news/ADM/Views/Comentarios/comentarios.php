
<?php if(sizeof($arrayComment) == 0) { ?>

    <h2> Sem comentarios ainda </h2>

<?php } ?>
<h1> COMENTARIOS: </h1>
    <table id="customers">
        <tr>

            <th>Imagem</th>
            <th>Nome</th>
            <th>Data</th>
            <th>Texto</th>
            <th> Deleta?</th>
            <th></th>
            

        </tr>

        <?php foreach ($arrayComment as $comment){ 	?>

        <tr>
        <td> <img src="/News/Assets/Imgs/<?=$comment["autor"]?>.jpg" style="border-radius: 20px; width: 30px; height: 30px;"> </td>
                <td> <?=$comment["nome"]?> </td>
                <td> <?=$comment["dia"]?> </td>
                <td> <?=$comment["texto"]?> </td>
                <td><a href="?c=c&a=d&id=<?=$comment["id_comment"]?>&id2=<?=$comment["noticia"]?>"class ="btn btn-danger">Deletar </a> </td>
                
        </tr>

        <?php } ?>
</center>