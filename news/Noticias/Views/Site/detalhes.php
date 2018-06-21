<img src="/News/Assets/News/<?=$arrayNews["id_new"]?>.jpg" style="width:100px; height:80px;">
<?=$arrayNews["titulo"]?>
<?=$arrayNews["dia"]?>
<?=$arrayNews["artigo"]?>
<?=$arrayNews["nome"]?>


<a href="?c=s&a=d&id=<?=$_SESSION["link1"]?>" class="btn btn-success"> <?=$_SESSION["news1"]?> </a>
<a href="?c=s&a=d&id=<?=$_SESSION["link2"]?>" class="btn btn-success"> <?=$_SESSION["news2"]?> </a>
<a href="?c=s&a=d&id=<?=$_SESSION["link3"]?>" class="btn btn-success"> <?=$_SESSION["news3"]?> </a>

<?php if (sizeof($arrayComments) == 0){ ?>
    <h2> Seja o primeiro a comentar</h2>
    <br>
        <p>Aviso!</p>
        <hr>
        <p>Você não é um usuario registrado ainda, para comentar é necessario o seu cadastro. </p>
        <a href="?c=s&a=l" class = "btn btn-neutral"> Registre-se </a>
        
<?php } else{ ?>
  <table>
            <tr>
                <th></th>
                <th >Nome</th>
                <th >Data</th>
                <th >Comentário</th>
                
            </tr>
            

            <?php for ($i=0;$i<=sizeof($arrayComments)-1; $i++){	?>

            <tr>
                <td> <img src="../Assets/Imgs/<?=$arrayComments[$i]["autor"]?>.jpg" style="border-radius: 20px; width: 30px; height: 30px;">
                <td> <?=$arrayComments[$i]["nome"]?> </td>
                <td> <?=$arrayComments[$i]["dia"]?> </td>
                <td> <?=$arrayComments[$i]["texto"]?> </td>
            </tr>

            <?php } ?>
        </table>

        <br>
        <p>Aviso!</p>
        <hr>
        <p>Você não é um usuario registrado ainda, para comentar é necessario o seu cadastro. </p>
        <a href="?c=s&a=l" class = "btn btn-neutral"> Registre-se </a>
        
<?php } ?>