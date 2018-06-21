<?php
	class mainC{

		public function index(){
			if (!isset($_SESSION["adm"])){
				header("Location: index.php?c=m&a=l");
			}
            require_once("Controllers/siteC.php");
            $noticias = new siteC();
            $noticias -> home();
		}

		public function logar(){
			require_once("Views/Login/login.php");
        }
        
		public function encerrar(){
			session_destroy();
			header("Location: index.php?c=m&a=l");
        }
        
		public function voltar(){
			header("Location: /News/index.php");
		}
	}
?>