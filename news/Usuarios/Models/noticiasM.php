<?php 

    class noticiasM{

        var $result;

        public function __construct(){
			require_once("Db/connect.php");
        }
        
        public function lista(){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getConn();
			$sql = 'SELECT n.id_new, n.titulo, n.dia,a.nome FROM noticias n INNER JOIN adm a ORDER BY id_new DESC';
			$this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

		}

		public function limita($inicio, $registros){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getConn();
			$sql = "SELECT n.id_new, n.titulo, n.dia,a.nome FROM noticias n INNER JOIN adm a ORDER BY id_new DESC LIMIT ".$inicio.",".$registros.";";
			$this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		}

        public function compara($palavra){
			$open = new Connect();
			$open -> openConnect();
			$conn = $open -> getconn();
			$sql = "SELECT n.id_new, n.titulo, n.dia,a.nome FROM noticias n INNER JOIN adm a WHERE titulo LIKE '%".$palavra."%' ORDER BY id_new DESC;";
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