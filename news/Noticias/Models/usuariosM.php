<?php 

    class usuariosM{

        var $result;

        public function __construct(){
			require_once("Db/connect.php");
        }

        public function user($arrayUser){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getconn();
            $sql = "INSERT INTO usuarios(nome, senha) VALUES ('".$arrayUser["nome"]."', '".$arrayUser["senha"]."')";
            $conn -> query($sql);
            $this -> result = $conn -> insert_id;
			
        }

        public function getResult(){
			return $this -> result;
        }
    }
?>