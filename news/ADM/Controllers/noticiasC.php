<?php
	class noticiasC{
        
		function __construct(){
			require_once("Models/noticiasM.php");

			if (!isset($_SESSION["adm"])){
				header("Location: index.php?c=m&a=l");
			}
		}

		function listar(){
			require_once("Models/noticiasM.php");
			$noticia = new noticiasM();
			$noticia -> listaNoticia();
			$result = $noticia -> getResult();


			$arrayNews = array();
			while($row = $result -> fetch_assoc()) {
				array_push($arrayNews, $row);

			}


			require_once("Views/Templates/header.php");
			require_once("Views/Noticias/lista.php");
			require_once("Views/Templates/footer.php");
			
        } 


		public function nova(){

			require_once("Views/Templates/header.php");
			require_once("Views/Noticias/nova.php");
			require_once("Views/Templates/footer.php");
		}


		public function inserir(){
			$arrayNews["titulo"] = $_POST["titulo"];
			$arrayNews["artigo"] = $_POST["artigo"];
			$autor = $_SESSION["idAdm"];            
			$noticia = new noticiasM();
			$noticia -> insereNoticia($arrayNews,$autor);

			$id_img = $noticia -> getResult();

			$foto_temp = $_FILES["foto"]["tmp_name"];	
			$foto_name = $_FILES["foto"]["name"];		

			$extensao = str_replace('.','',strrchr($foto_name, '.')); 
			$max_width = 900; 
			$max_height = 900; 

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

			@imagejpeg($img,"../Assets/News/".$id_img.".jpg"); 
			$this -> listar();
		}

		public function alterar($id){
			$noticia = new noticiasM();
			$noticia -> alteraNoticia($id);
			$result = $noticia -> getResult();

			if($arrayNews = $result -> fetch_assoc()){
				require_once("Views/Templates/header.php");
				require_once("Views/Noticias/alterar.php");
				require_once("Views/Templates/footer.php");
			}
		}

		public function atualizar(){
			$arrayNews["id_new"] = $_POST["id_new"];
			$arrayNews["titulo"] = $_POST["titulo"];
			$arrayNews["artigo"] = $_POST["artigo"];
			$noticia = new noticiasM();
			$noticia -> atualizaNoticia($arrayNews);

			$id_img = $arrayNews["id_new"];

			$foto_temp = $_FILES["foto"]["tmp_name"];	
			$foto_name = $_FILES["foto"]["name"];		

			$extensao = str_replace('.','',strrchr($foto_name, '.')); 
			$max_width = 900; 
			$max_height = 900; 

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

			@imagejpeg($img,"../Assets/News/".$id_img.".jpg"); 
			
			$this -> listar();
		}

		public function deletar($id){
			require_once("Models/commentsM.php");
			$noticia = new noticiasM();
			$comments = new commentsM();
			$comments -> deletar_noticia($id);
			$noticia -> deletaNoticia($id);
			unlink("../Assets/News/".$id.".jpg");
			$this -> listar();
		}

		function detalhes($id){
			require_once("Models/noticiasM.php");
			$noticia = new noticiasM();
			$noticia -> busca($id);
			$result = $noticia -> getResult();
			$arrayNews = array();

			if( $arrayNews = $result -> fetch_assoc()){
			require_once("Views/Templates/header.php");
			require_once("Views/Noticias/detalhes.php");
			require_once("Views/Templates/footer.php");
			}
		}
	}
?>