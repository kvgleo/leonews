<?php
	class connect{
		var $conn;

		function openConnect()
		{
			$servername = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'newsdb';
			$this -> conn = new mysqli($servername, $username, $password, $dbname);
			$this -> conn -> SET_CHARSET("utf8");

		}

		function getConn(){
			return $this -> conn;
		}
	}
?>