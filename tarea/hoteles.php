<html>
<?php
function divisa($moneda1,$moneda2,$cantidad)
{
return $cantidad*$moneda1/$moneda2;
}
?>

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
if (!isset ($_SESSION ['user']))
header ('Location: index.php');
echo '<div id="primera_sesion">';
echo '	Bienvenido '.$_SESSION['user'];
echo '	<br> <a href="salir.php">Cerrar sesi&oacute;n</a>';	
echo '</div>';
?>

<table border=0 align="center">
<tr>
<td>
<div class="botonmenu"><a href="lugares.php">Lugares de viaje</a></div>
</td>
<td>
<div class="botonmenu"><a href="hoteles.php">Hoteles/Alquileres</a></div>
</td>
<td>
<div class="botonmenu"><a href="restaurantes.php">Restaurantes</a></div>
</td>
<td>
<div class="botonmenu"><a href="vuelos.php">Vuelos</a></div>
</td>
<td>
<div class="botonreserva"><a href="llameya.php">Cotizar</a></div>
</td>
</tr>
</table>

<br>

<br>

<div class="tips">
Tips para viajar seguro:<br>
<ol>
<li>Nunca aceptes transportar equipaje o paquetes de personas que no conoces.</li>
<li>Verifica los horarios de tu viaje con antelaci&oacute;n.</li>
<li>Verifica toda la informaci&oacute;n con la oficina de turismo.</li>
<li>No olvides llevar tu licencia de conducir.</li>
<li>Verifica los lugares cercanos a tu hotel.</li>
<li>Solicita los asientos cercanos a salidas y salidas de emergencia.</li>
<li>Verifica que llevas toda la documentaci&oacute;n necesaria.</li>
</ol>
<a href="http://www.viajesleonarwill.com/7-tips-para-viajar-seguro/">Fuente</a><br>
<h4>Comentarios</h4>
<?php
if (isset ($_POST['comente'])){
$_SESSION['comente'] = $_SESSION['comente'].$_POST['comente']."<br>";
echo "" .$_SESSION['comente'];}
else{echo " ";}
?>
<form action="hoteles.php" method="post">
<textarea name='comente'>Deja tu comentario.</textarea>
<input type="submit">
</form>
</div>

<div class="cuerpo">
<h3>Hoteles</h3>
<p>A continuaci&oacute;n la lista de hoteles disponibles:</p>
<ul>
<li><b>Hotel Grand Hyatt</b><br><img src="img/hyattstgo.jpg" width=331 height=163/>
<br>Desde US$300 la noche. Santiago.</li>
<li><b>Hotel Plaza El Bosque Ebro</b><br><img src="img/plazabosque.jpg" width=300 height=225/>
<br>Desde US$200 la noche. Santiago.</li>
<li><b>Hotel Sheraton Miramar</b><br><img src="img/sheraton.jpg"/>
<br>Desde US$300 la noche. Vi&ntilde;a del mar.</li>
<li><b>Hotel O'Higgins</b><br><img src="img/hoh.jpg" width=300 height=200/>
<br>Desde US$200 la noche. Vi&ntilde;a del mar.</li>
</ul>

</div>

<div class="divisas">
Cambio de divisas:<br>
(09/04/2014)<br>
<form action="hoteles.php" method="post">
Moneda 1:<br>
<select name="moneda1">
<option value="dolar">D&oacute;lar estadounidense</option>
<option value="euro">Euro</option>
<option value="libra">Libra esterlina</option>
<option value="peso">Peso chileno</option>
</select>
<br>
Cantidad:<br>
<input type="text" name="cantidad"/><br>
Moneda 2:<br>
<select name="moneda2">
<option value="dolar">D&oacute;lar estadounidense</option>
<option value="euro">Euro</option>
<option value="libra">Libra esterlina</option>
<option value="peso">Peso chileno</option>
</select>
<br>
<input type="submit">
</form>

<?php
$moneda1=0;
$moneda2=0;
if ($_POST["moneda1"]=="dolar"){
$moneda1=547;}
else if ($_POST["moneda1"]=="euro"){
$moneda1=758;}
else if ($_POST["moneda1"]=="libra"){
$moneda1=919;}
else {
$moneda1=1;}
if ($_POST["moneda2"]=="dolar"){
$moneda2=547;}
else if ($_POST["moneda2"]=="euro"){
$moneda2=758;}
else if ($_POST["moneda2"]=="libra"){
$moneda2=919;}
else {
$moneda2=1;}
$cantidad=$_POST["cantidad"];
echo divisa($moneda1,$moneda2,$cantidad);
?>

</div>
</body>

</html>