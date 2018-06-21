<?php 
session_start();

if(!isset($_GET['c'])){
    require_once("Controllers/siteC.php");
    $site = new siteC();
    $site -> home();

}else{

    switch($_REQUEST['c']){

        case 'c':	
            require_once("Controllers/commentsC.php");
            $comment= new commentsC();

            if (!isset($_GET['a'])){
                header("Location: ../index.php");
            }
            else{
                switch ($_REQUEST['a']){
                    case 'n': $id = $_GET["id"]; $comment -> adicionar($id); break;
                    case 'l': $comment -> listar(); break;
                    case 'a': $id = $_GET["id"]; $comment -> alterar($id); break;
                    case 'r': $id = $_GET["id"]; $idp = $_GET["idp"]; $comment -> deletar($id,$idp); break;
                    default: header("Location: ../index.php");
                }
            }
         break;

        case 'm':	
            require_once("Controllers/mainC.php");
            $main = new mainC();

            if (!isset($_GET['a'])){
                header("Location: ../index.php");
            }
            else{
                switch ($_REQUEST['a']){
                    case 'l': $main -> logar(); break;
                    case 'e': $main -> encerrar(); break;
                    case 'b': $main -> voltar(); break;
                    default: header("Location: ../index.php"); break;
                }
            }
         break;

        case 'l':
            require_once("Controllers/loginC.php");
            $login = new loginC();

            if(!isset($_GET['a'])){
                header("Location: ../index.php");

            }else{
                switch($_REQUEST['a']){
                    case 'l': $login -> validar(); break;
                    default: header("Location: ../index.php");
                }
            }
        break;

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
                    default: $site -> home();
                }
            }
            break;
        
            

            default: header("Location: ../index.php");
    }
}

?>