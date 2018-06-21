<?php 

    class commentsM{

        var $result;

        public function __construct(){
			require_once("Db/connect.php");
        }


        public function lista($id){
			$open = new Connect();
			$open -> openConnect();
            $conn = $open -> getConn();
            $sql = "SELECT c.noticia, c.id_comment,c.texto, c.dia, u.nome, c.autor FROM comentarios c INNER JOIN usuarios u WHERE c.noticia= ".$id." and c.autor=u.id_user order by c.id_comment DESC;";
            $this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }



        public function getResult(){
			return $this -> result;
		}
    }
?>