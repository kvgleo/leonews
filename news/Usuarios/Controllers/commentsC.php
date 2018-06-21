<?php 

    class commentsC{


        public function adicionar($id){
			require_once("Models/commentsM.php");
            $comment = new commentsM();
            $texto = $_POST["texto"];
            $comment -> add($id,$texto);
            
            require_once("Controllers/siteC.php");
            $site = new siteC();
            $site -> detalhes($id);
        }

        public function deletar($id,$idp){
			require_once("Models/commentsM.php");
            $comment = new commentsM();
            $comment -> del($id);
            
            require_once("Controllers/siteC.php");
            $site = new siteC();
            $site -> detalhes($idp);
        }
    }
?>