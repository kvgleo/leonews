<?php 



if(!isset($_GET['c'])){
    require_once("Controllers/siteC.php");
    $site = new siteC();
    $site -> home();

}else{

    switch($_REQUEST['c']){


        case 's':
            require_once("Controllers/siteC.php");
            $site = new siteC();

            if(!isset($_GET['a'])){
                $site -> home();

            }else{
                switch($_REQUEST['a']){
                    case 'h': $site -> home(); break;
                    case 'p': $site -> pesquisa(); break;
                    case 'd': $id=$_GET["id"]; $site -> detalhes($id); break;
                    case 'c': $site -> contato(); break;
                    case 's': $site -> sobre(); break;
                    case 'l': $site -> cadastro(); break;
                    case 'n': $site -> add(); break;
                    default: $site -> home();
                }
            }
            break;

            default: header("Location: home.php");
    }
}

?>