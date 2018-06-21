        <img src="/News/Assets/News/<?=$arrayNews["id_new"]?>.jpg" style="width:100px; height:80px;">
        <?=$arrayNews["titulo"]?>
        <?=$arrayNews["dia"]?>
        <?=$arrayNews["artigo"]?>
        <?=$arrayNews["nome"]?>
        
        <a href="?c=s&a=d&id=<?=$_SESSION["link1"]?>" class="btn btn-success"> <?=$_SESSION["news1"]?> </a>
        <a href="?c=s&a=d&id=<?=$_SESSION["link2"]?>" class="btn btn-success"> <?=$_SESSION["news2"]?> </a>
        <a href="?c=s&a=d&id=<?=$_SESSION["link3"]?>" class="btn btn-success"> <?=$_SESSION["news3"]?> </a>

        

        <h1> COMENTARIOS </h1>

        <h2>Deixe um comentário:</h2>

        <p> publicar como <?=$_SESSION["nomeUser"]?> <img src="/News/Assets/Imgs/<?=$_SESSION["usuario"]?>.jpg" style="border-radius: 10px; width: 20px; height: 20px;"> </td>

        <form action="?c=c&a=n&id=<?=$arrayNews["id_new"]?>" method="post">
        <textarea name="texto" title="hi" placeholder="Deixe um comentário..."></textarea>
        <button type="submit" class=" btn btn-primary">Enviar</button>
        </form>

        <table>
            <tr>
                <th> Edita</th>
                <th> Deleta</th>
                <th >Nome</th>
                <th >dia</th>
                <th >texto</th>
                <th> </th>
                
            </tr>
            

            <?php for ($i=0;$i<=sizeof($arrayComments)-1; $i++){	?>

            <tr>
                <td><a href="?c=c&a=r&id=<?=$arrayComments[$i]["id_comment"]?>&idp=<?=$arrayComments[$i]["noticia"]?>" class="btn btn-danger">Deletar</a></td>
                <td> <?=$arrayComments[$i]["nome"]?> </td>
                <td> <?=$arrayComments[$i]["dia"]?> </td>
                <td> <?=$arrayComments[$i]["texto"]?> </td>
                <td> <img src="/News/Assets/Imgs/<?=$arrayComments[$i]["autor"]?>.jpg" style="border-radius: 20px; width: 30px; height: 30px;"> </td>
            </tr>

            <?php } ?>
        </table>
