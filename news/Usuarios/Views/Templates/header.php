<!DOCTYPE html>
<html>
<head>
	<title>Leonews</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
</head>
<body>

	<header> 
		<a href="#" >Leonews</a>
		<form action="?c=s&a=p" method="post"> <input type="text" name="palavra"> </form> 
		<a href="#" > <img src="/News/Assets/Imgs/<?=$_SESSION["usuario"]?>.jpg" style="border-radius: 20px; width: 30px; height: 30px;"> <?=$_SESSION["nomeUser"]?></a>
		<a href="?c=s&a=h" >Home</a>
		<a href="?c=s&a=c">Contato</a>
		<a href="?c=s&a=s">Sobre</a>
		<a href="?c=m&a=e">Sair</a>

		


		
    </header>

	<section>
			