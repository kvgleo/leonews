<?php 
session_start();

if(!isset($_GET['c'])){
    header("Location: ../index.php");

}else{

    switch($_REQUEST['c']){

        case 'n':
            require_once("Controllers/noticiasC.php");	
            $noticia = new noticiasC();

            if (!isset($_GET['a'])){
                header("Location: ../index.php");
            }

            else{
                switch ($_REQUEST['a']){
                    case 'l': $noticia-> listar(); break;
                    case 'n': $noticia-> nova(); break;
                    case 'i': $noticia -> inserir(); break;
                    case 'a': $id=$_GET['id']; $noticia -> alterar($id); break;
                    case 'u': $noticia -> atualizar(); break;
                    case 'd': $id=$_GET['id']; $noticia -> deletar($id); break;
                    case 'm': $id=$_GET['id']; $noticia -> detalhes($id); break;
                }
            }
        break;

        case 'u':
        require_once("Controllers/usuariosC.php");	
        $usuario = new usuariosC();

        if (!isset($_GET['a'])){
            header("Location: ../index.php");
        }

        else{
            switch ($_REQUEST['a']){
                case 'l': $usuario -> listar(); break;
                case 'd': $id=$_GET['id']; $usuario -> deletar($id); break;
            }
        }
        
        break;

        case 'c':
        require_once("Controllers/commentsC.php");	
        $comentario = new commentsC();

        if (!isset($_GET['a'])){
            header("Location: ../index.php");
        }

        else{
            switch ($_REQUEST['a']){
                case 'l': $comentario -> listar(); break;
                case 'c': $id=$_GET["id"]; $comentario -> listarC($id); break;
                case 'd': $id=$_GET["id"];  $id2=$_GET["id2"]; $comentario -> deletar($id,$id2); break;
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
    
            
        default: header("Location: ../index.php");
    }
}

?>