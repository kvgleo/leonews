<?php
	class loginM{

		var $result;

		public function check($login){
			require_once("Db/connect.php");
			$open = new connect();
			$open -> openConnect();
			$sql = 'SELECT * from adm WHERE nome="'.$login.'"';
			$conn = $open -> getconn();
			$this -> result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		}

		public function getResult(){
			return $this -> result;
		}
	}
?>