<?php 

    class usuariosM{

        var $result;

        public function __construct(){
			require_once("Db/connect.php");
        }

        public function lista(){
			$open = new Connect();
			$open -> openConnect();
            $conn = $open -> getConn();
            $sql = "SELECT * FROM usuarios";
            $this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        }

        public function deletar($id){
			$open = new Connect();
			$open -> openConnect();
            $conn = $open -> getConn();
            $sql = "DELETE FROM usuarios WHERE id_user = ".$id.";";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));

        }

        public function getResult(){
			return $this -> result;
		}
    }
?>