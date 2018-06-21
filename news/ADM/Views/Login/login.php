<!DOCTYPE html>

<html>
	<head>
		<title>ADM</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
        <center>
                <?php require_once("Controllers/loginC.php");
                    
                    if(!isset($senha)){
                        $senha= true;
                    }
                    if(!isset($usuario)){
                        $usuario= true;
                    }
                    
                    if($senha==false){ ?>

                        <h2> ERRO: Senha errada. </h2>
                    <?php } 
                    
                    if($usuario==false){?>
                        <h2> ERRO: Administrador inexistente. </h2>
                <?php } ?>

                <form action="?c=l&a=l" method="POST">
                    <div class="form-group">
                        <label >Login</label>
                        <input style="width: 200px" type="text" class="form-control" name="login" placeholder="Digite o usuario">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input style="width: 200px" type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                    </div>

                    <button type="submit" class="btn btn-primary"> Login</button>
                    <a href="?c=m&a=b" class="btn btn-default">Voltar</a>
                    
                </form>
            </div>
        </center>
	</body>
</html> 