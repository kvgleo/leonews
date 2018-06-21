<h1> RESULTADO DA PESQUISA </h1>

    <?php if($vazio==true){ ?>
        <h2>Não foi encontrados produtos, verifique o nome digitado </h2>
    
    <?php }else { ?>
            
                           
            <table>
                <tr>
                    <th> </th>
                </tr>
                <?php for ($i=0;$i<=sizeof($arrayNews)-1; $i++){ 	?>
                    <tr>
                        <td>
                            <?=$arrayNews[$i]["nome"]?>
                            <?=$arrayNews[$i]["dia"]?>
                            <?=$arrayNews[$i]["titulo"]?>
                            <a href="?c=s&a=d&id=<?=$arrayNews[$i]["id_new"];?>" class="btn btn-dark"> Ler</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            <a href="?c=s&a=d&id=<?=$_SESSION["link1"]?>" class="btn btn-success"> <?=$_SESSION["news1"]?> </a>
            <a href="?c=s&a=d&id=<?=$_SESSION["link2"]?>" class="btn btn-success"> <?=$_SESSION["news2"]?> </a>
            <a href="?c=s&a=d&id=<?=$_SESSION["link3"]?>" class="btn btn-success"> <?=$_SESSION["news3"]?> </a>

    <?php } ?>
