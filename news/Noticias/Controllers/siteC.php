<?php
	class siteC{	


		function add(){
			$arrayUser["nome"] = $_POST["nome"];
			$arrayUser["senha"] = $_POST["senha"];
			
			require_once("Models/usuariosM.php");
			$usuario = new usuariosM();
			$usuario -> user($arrayUser);

			$id_img = $usuario -> getResult();

			$foto_temp = $_FILES["foto"]["tmp_name"];	
			$foto_name = $_FILES["foto"]["name"];		

			$extensao = str_replace('.','',strrchr($foto_name, '.')); 
			$max_width = 600; 
			$max_height = 600; 

			$img = null;


			if ($extensao == 'jpg' || $extensao == 'jpeg') { 
				$img = @imagecreatefromjpeg($foto_temp);
			} else if ($extensao == 'png') { 
				$img = @imagecreatefrompng($foto_temp);
			} else if ($extensao == 'gif') { 
				$img = @imagecreatefromgif($foto_temp); 
			}  else     
				$img = @imagecreatefromjpeg($foto_temp); 

			if ($img) { 
				
				$width  = imagesx($img); 
				$height = imagesy($img); 
				$scale  = min($max_width/$width, $max_height/$height); 
				if ($scale < 1) { 
					$new_width = floor($scale*$width); 
					$new_height = floor($scale*$height);
					$tmp_img = @imagecreatetruecolor($new_width, $new_height);    
					@imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, 
					$new_width, $new_height, $width, $height);  
					@imagedestroy($img); 
					$img = $tmp_img; 
				}           
			}

			@imagejpeg($img,"../Assets/Imgs/".$id_img.".jpg"); 
			
			$cadastro = true;
			require_once("Views/Usuario/cadastro.php");

		}

        function home(){
			$vazio=false;

			require_once("Models/noticiasM.php");
			$noticia = new noticiasM();
			$noticia -> lista();
			$result = $noticia -> getResult();

			$arrayBreak = array(); //noticias recentes
			while($row = $result -> fetch_assoc()) {
				array_push($arrayBreak, $row);
			}
			$_SESSION["news1"] = $arrayBreak[0]["titulo"];
			$_SESSION["news2"] = $arrayBreak[1]["titulo"];
			$_SESSION["news3"] = $arrayBreak[2]["titulo"];
			$_SESSION["link1"] = $arrayBreak[0]["id_new"];
			$_SESSION["link2"] = $arrayBreak[1]["id_new"];
			$_SESSION["link3"] = $arrayBreak[2]["id_new"];


			$total = mysqli_num_rows($result); //paginação
			$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
			$registros = 3; 
    		$numPaginas = ceil($total/$registros); 
			$inicio = ($registros*$pagina)-$registros; 	
			$noticia -> limita($inicio, $registros);
			$result = $noticia -> getResult();

			$arrayNews = array();
			while($row = $result -> fetch_assoc()) {
				array_push($arrayNews, $row);
			}

			require_once("Views/Templates/header.php");
			require_once("Views/Site/home.php");
			require_once("Views/Templates/footer.php");
			
        } 

        function pesquisa(){
			$vazio= false;
			require_once("Models/noticiasM.php");
			$noticia = new noticiasM();
			$noticia -> lista();
			$result = $noticia -> getResult();

			$arrayBreak = array(); //noticias recentes
			while($row = $result -> fetch_assoc()) {
				array_push($arrayBreak, $row);
			}
			$_SESSION["news1"] = $arrayBreak[0]["titulo"];
			$_SESSION["news2"] = $arrayBreak[1]["titulo"];
			$_SESSION["news3"] = $arrayBreak[2]["titulo"];
			$_SESSION["link1"] = $arrayBreak[0]["id_new"];
			$_SESSION["link2"] = $arrayBreak[1]["id_new"];
			$_SESSION["link3"] = $arrayBreak[2]["id_new"];

			$palavra = trim($_POST["palavra"]); //pesquisa
			$noticia -> compara($palavra);
			$result = $noticia -> getResult();

			$arrayNews = array();
			while($row = $result -> fetch_assoc()) {
				array_push($arrayNews, $row);
			}
			if(sizeof($arrayNews) == 0){ //resultado da busca não encontrado.
				$vazio = true;
			}
				require_once("Views/Templates/header.php");
				require_once("Views/Site/resultado.php");
				require_once("Views/Templates/footer.php");
			
        }
        

        function detalhes($id){
			require_once("Models/noticiasM.php");
			$noticia = new noticiasM();
			$noticia -> lista();
			$result = $noticia -> getResult();

			$arrayBreak = array(); //noticias recentes
			while($row = $result -> fetch_assoc()) {
				array_push($arrayBreak, $row);
			}
			$_SESSION["news1"] = $arrayBreak[0]["titulo"];
			$_SESSION["news2"] = $arrayBreak[1]["titulo"];
			$_SESSION["news3"] = $arrayBreak[2]["titulo"];
			$_SESSION["link1"] = $arrayBreak[0]["id_new"];
			$_SESSION["link2"] = $arrayBreak[1]["id_new"];
			$_SESSION["link3"] = $arrayBreak[2]["id_new"];


			require_once("Models/commentsM.php");
			$comment = new commentsM();
			$comment -> lista($id);
			$result = $comment -> getResult();

			$arrayComments = array();
			while($row = $result -> fetch_assoc()) {
				array_push($arrayComments, $row);
			}
			

			$noticia -> busca($id);
			$result = $noticia -> getResult();
			$arrayNews = array();

			if( $arrayNews = $result -> fetch_assoc()){
			require_once("Views/Templates/header.php");
			require_once("Views/Site/detalhes.php");
			require_once("Views/Templates/footer.php");
			}
		}

		public function cadastro(){
			$cadastro = false;
			require_once("Views/Usuario/cadastro.php");
		}
		

		public function sobre(){

			require_once("Views/Templates/header.php");
			require_once("Views/Site/sobre.php");
			require_once("Views/Templates/footer.php");
		}

		public function contato(){
			require_once("Views/Templates/header.php");
			require_once("Views/Site/contato.php");
			require_once("Views/Templates/footer.php");
		}
		

		public function adm(){

			header("Location: /ADM/index.php");
		}
	}
?>