<html>

<head>
<title>TurisMorales</title>
<link rel="stylesheet" type="text/css" href="estilo.css"/>
<link href='http://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
</head>

<body>
<h1>TurisMorales</h1>
<?php
session_start();

if(isset($_POST['user']) && isset($_POST['pass'])){
	if($_POST['user'] != "user" || $_POST['pass'] != "pass"){
	
	echo '<div id="error">usuario y/o contrase&ntilde;a no v&aacute;lidos</div>';
	echo '<br/>';
	echo '<div id="login">';
	echo '	<h2>iniciar sesi&oacute;n</h2>';
	echo '	<form method="POST" action="index.php" >';
	echo '		usuario<br> <input type="text" name="user" class="datos"/> <br/>';
	echo '		contrase&ntilde;a<br> <input type="password" name="pass" class="datos"/> <br/>';
	echo '		<input type="submit" value="Entrar" class="entrar"/>';
	echo '	</form>';
	echo '</div>';
	session_destroy();
	}
	else{
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['pass'] = $_POST['pass'];
	header('Location: inicio.php');
	}
}
else{
echo '<div id="login">';
echo '<h2>iniciar sesi&oacute;n</h2>';
echo '<form method="POST" action="index.php" >';
echo 'usuario<br> <input type="text" name="user" class="datos"/> <br/>';
echo 'contrase&ntilde;a<br> <input type="password" name="pass" class="datos"/> <br/>';
echo '<input type="submit" value="Entrar" class="entrar"/>';
echo '</form>';
echo '</div>';
}
?>

</body>

</html>