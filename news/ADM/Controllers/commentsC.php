<?php 

    class commentsC{



        function listar(){

			require_once("Models/noticiasM.php");
			$noticia = new noticiasM();
			$noticia -> listaNoticia();
			$result = $noticia -> getResult();

            $arrayNews = array();
            
			while($row = $result -> fetch_assoc()) {
				array_push($arrayNews, $row);
			}
			require_once("Views/Templates/header.php");
			require_once("Views/Comentarios/noticias.php");
			require_once("Views/Templates/footer.php");
			
        } 

        function listarC($id){

			require_once("Models/commentsM.php");
			$comment = new commentsM();
			$comment -> lista($id);
			$result = $comment -> getResult();

            $arrayComment = array();
            
			while($row = $result -> fetch_assoc()) {
				array_push($arrayComment, $row);
			}
			require_once("Views/Templates/header.php");
			require_once("Views/Comentarios/comentarios.php");
			require_once("Views/Templates/footer.php");
			
        } 

        public function deletar($id,$id2){
            require_once("Models/commentsM.php");
            $comments = new commentsM();
            $comments -> del($id);
            $this-> listarC($id2);
        }
    }
?>