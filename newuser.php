<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Nuevo Usuario</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		body{
			background-color:#E3DAC9;
		}
	</style>
</head>

<?php 

	require "phpTools/files.php";

	$user = "";
	$pass = "";
	$err = array();

	if (isset($_POST['crear'])){
		
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$f = new file;
		
		$err = validation($user,$pass,$err);
		
		if (empty($err)){
			$f->saveUser($user,$pass);
			echo '<script type="text/javascript">
            window.location.assign("welcome.php");
            </script>';
		} 

	}
	
	//validación del formulario
	
	function validation($user,$pass,$err){
		
		$f = new file;
		
		if($f->usserExist($user)){
			$err[0] = "El usuario ya existe";
		}
		
		if($user == ""){
			$err[1] = "class = 'red'";
		}
		
		if(strlen($pass) < 8){
			$err[2] = "class = 'red'";
		}
		
		return $err;
		
	}
	
?>

<body>
	<div id="contNewUser" class="formu" class="centrar">
		<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" >
			<p><img src="imagenes/caca.png" width="150px"><p>
			<h1>Crea tu cuenta</h1>
			<p><input type="text" 
			<?php 
				if(isset($err[0])){
					$user = "";
					echo "placeholder = '".$err[0]."' ";
				} else {
					echo "placeholder = 'Nombre de Usuario'"; 
				}
			?> name="user" value="<?php echo $user ?>" <?php if(isset($err[1]) || isset($err[0])) echo "class='red'" ?> ></p>
			<p><input type="password" placeholder="Contraseña (mínimo 8 carácteres)" name="pass" value="" <?php if(isset($err[2])) echo $err[2] ?>></p>
			<p><input type="submit" name="crear" value="Crear"></p>
			<p><a href="index.php">Volver a la página principal</a></p>
		</form>
	</div>
</body>
</html>