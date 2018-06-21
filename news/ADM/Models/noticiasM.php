<?php 

    class noticiasM{

        var $result;

        public function __construct(){
			require_once("Db/connect.php");
        }
        
        public function listaNoticia(){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getConn();
			$sql = "SELECT * FROM noticias ORDER BY id_new DESC";
			$this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

		}

		public function alteraNoticia($id){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getConn();
			$sql = "SELECT * FROM noticias WHERE id_new = ".$id.";";
			$this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		}

		public function insereNoticia($arrayNews,$autor){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getconn();
			$sql = "INSERT INTO noticias (titulo, dia, autor, artigo) VALUES ('".$arrayNews["titulo"]."', date(now()) , '".$autor."', '".$arrayNews["artigo"]."')";
			$conn -> query($sql);
            $this -> result = $conn -> insert_id;
		}

		public function atualizaNoticia($arrayNews){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getconn();
			$sql = "UPDATE noticias SET titulo = '".$arrayNews["titulo"]."', artigo = '".$arrayNews["artigo"]."' WHERE id_new = ".$arrayNews["id_new"].";";
			$this -> result = $conn -> query($sql);
		}

		public function deletaNoticia($id){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getconn();
			$sql = "DELETE FROM noticias WHERE id_new = ".$id.";";
			$this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		}
		public function busca($id){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getconn();
			$sql = "SELECT  n.id_new, n.titulo, n.artigo, n.dia,a.nome FROM noticias n INNER JOIN adm a WHERE n.id_new = ".$id.";";		
			$this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		}

		public function getResult(){
			return $this -> result;
		}
    }

?>