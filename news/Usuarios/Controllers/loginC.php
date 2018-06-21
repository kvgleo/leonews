<?php
	class loginC{


		public function validar(){

            $user = $_POST["login"];
            
			require_once("Models/loginM.php");
			$login = new loginM();
			$login -> check($user);
			$result = $login -> getResult();

			if($row = $result -> fetch_assoc()){
				$senha1 = $row["senha"];
				$senha2 = $_POST["senha"];

				if($senha1 == $senha2){
					$_SESSION["usuario"] = $row["id_user"];
					$_SESSION["nomeUser"]= $row["nome"];

					
					header("Location: index.php/?c=s&a=h");
                    
				}else{
					$senha = false;
					require_once("Views/Login/login.php");
				}
			}else{
				$usuario =false;
				require_once("Views/Login/login.php");
			}
		}
		

        
	}
?>