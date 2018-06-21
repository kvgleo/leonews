<?php
	class loginC{


		public function validar(){

            $adm = $_POST["login"];
            
			require_once("Models/loginM.php");
			$login = new loginM();
			$login -> check($adm);
			$result = $login -> getResult();

			if($row = $result -> fetch_assoc()){
				$senha1 = $row["senha"];
				$senha2 = $_POST["senha"];

				if($senha1 == $senha2){
					$_SESSION["idAdm"] = $row["id_adm"];
					$_SESSION["adm"]= $row["nome"];

					
					header("Location: index.php/?c=n&a=l"); //mudar
                    
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