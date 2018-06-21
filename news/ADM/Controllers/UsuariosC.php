<?php 

    class usuariosC{

        function listar(){

			require_once("Models/usuariosM.php");
			$usuario = new usuariosM();
			$usuario -> lista();
			$result = $usuario -> getResult();


            $arrayUser = array();
            
			while($row = $result -> fetch_assoc()) {
				array_push($arrayUser, $row);

			}

			require_once("Views/Templates/header.php");
			require_once("Views/Usuarios/lista.php");
			require_once("Views/Templates/footer.php");
			
        } 




        public function deletar($id){
            require_once("Models/commentsM.php");
            $comments = new commentsM();
            $comments -> deletaTudo($id);
			require_once("Models/usuariosM.php");
            $usuario = new usuariosM();
            $usuario -> deletar($id);
            unlink("../Assets/Imgs/".$id.".jpg");
            
            $this-> listar();
        }
    }
?>