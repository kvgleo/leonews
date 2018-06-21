<center>
	
    <h1> HOME </h1>

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
                            <a class="btn btn-dark" href="?c=s&a=d&id=<?=$arrayNews[$i]["id_new"];?>"> Ler Matéria</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            <?php

                if($pagina > 1) {
                    echo "<a href=?c=s&a=h&pagina=".($pagina - 1)." > anterior</a>";
                }
                
                for($i = 1; $i < $numPaginas + 1; $i++) {
                    $ativo = ($i == $pagina) ? 'numativo' : '';
                    echo "<a href=?c=s&a=h&pagina=".$i."> ".$i." </a>";
                }
                    
                if($pagina < $numPaginas) {
                    echo "<a href=?c=s&a=h&pagina=".($pagina + 1)." > proximo </a>";
                }?>

                <a href="?c=s&a=d&id=<?=$_SESSION["link1"]?>" class="btn btn-success"> <?=$_SESSION["news1"]?> </a>
                <a href="?c=s&a=d&id=<?=$_SESSION["link2"]?>" class="btn btn-success"> <?=$_SESSION["news2"]?> </a>
                <a href="?c=s&a=d&id=<?=$_SESSION["link3"]?>" class="btn btn-success"> <?=$_SESSION["news3"]?> </a>





    <?php } ?>


</center>    

