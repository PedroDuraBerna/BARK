<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Bark</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<?php

require "phpTools/files.php";

	$user = "";
	$pass = "";
	
	if(isset($_POST['entrar'])){
		
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$err = array();
		$f = new file;
		
		$err = $f->loggin($user,$pass,$err);
		
		if(isset($err[1])){
			$user="";
		}
		
		var_dump($err);
		
		if(empty($err)){
			
		}
		
	}

?>

<body>
	<div id="container">
		<div id="description" class="centrar">
		<div id="textoDescripcion">
			<img src="imagenes/hueso.png" width="200px">
			<h1>BARK</h1>
			<h3>Saca lo peor de tí</h3>
			<p>Subnormal</p>
		</div>
		</div>
		<div id="formulario" class="centrar">
			<form id="login" class="formu" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
			<img src="imagenes/caca.png" width="150px">
			<p><input type="text" name="user" value="<?php echo $user ?>" 
			<?php if(isset($err[0])) echo $err[0] ?> <?php 
				if(isset($err[1])) 
					echo $err[1];
				else 
					echo "placeholder='Usuario/Correo'"; 
			?> ></p>
			<p><input type="password" name="pass" <?php
				if(isset($err[0]))
					echo "placeholder='Error de contraseña'";
				else
					echo "placeholder='Contraseña'";
			?> ></p>
			<p><a href="">¿Has olvidado la contraseña?</a></p>
			<p><input type="submit" name="entrar" value="Entrar"></p>
			<p><a href="newuser.php"><input type="button" name="" value="Nuevo Usuario"></a></p>
		</form>
		</div>
	</div>
</body>
</html>