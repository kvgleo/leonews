<?php 

    class commentsM{

        var $result;

        public function __construct(){
			require_once("Db/connect.php");
        }

        public function add($id,$texto){
			$open = new Connect();
			$open -> openConnect();
            $conn = $open -> getConn();
            $autor = $_SESSION["usuario"];
            $sql = "INSERT INTO comentarios(texto,dia, noticia,autor) VALUES ('".$texto."', date(now()), ".$id.", ".$autor.");";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }

        public function lista($id){
			$open = new Connect();
			$open -> openConnect();
            $conn = $open -> getConn();
            $sql = "SELECT c.noticia, c.id_comment,c.texto, c.dia, u.nome, c.autor FROM comentarios c INNER JOIN usuarios u WHERE c.noticia= ".$id." and c.autor=u.id_user order by c.id_comment DESC;";
            $this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }

        public function del($id){
			$open = new Connect();
			$open -> openConnect();
            $conn = $open -> getConn();
            $sql = "DELETE FROM comentarios where id_comment = ".$id.";";
            $this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }

        public function deletar_noticia($id){
			$open = new Connect();
			$open -> openConnect();
            $conn = $open -> getConn();
            $sql = "DELETE FROM comentarios where noticia = ".$id.";";
            $this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }

        public function deletaTudo($id){
			$open = new Connect();
			$open -> openConnect();
            $conn = $open -> getConn();
            $sql = "DELETE FROM comentarios where autor = ".$id.";";
            $this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }

        public function getResult(){
			return $this -> result;
		}
    }
?>