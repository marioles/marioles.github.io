<html>
<?php
function divisa($moneda1,$moneda2,$cantidad)
{
return $cantidad*$moneda1/$moneda2;
}
?>
<?php 
function cotizar($lugar,$hotel,$resto,$vuelo,$dias){
$total=0;
if ($hotel==1 Or $hotel==3){$total=$total+300;}
else {$total=$total+200;}
if ($resto==1){$total=$total+100;}
else if ($resto==2){$total=$total+30;}
else {$total=$total+75;}
if ($vuelo==1){$total=$total+70;}
else {$total=$total+60;}
return $total*$dias;
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
<a href="http://www.viajesleonarwill.com/7-tips-para-viajar-seguro/">Fuente</a>
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
<h3>Cotice ahora</h3>
<p>Seleccione sus preferencias:</p>
<p>
<form action="llameya.php" method="post">
N&uacute;mero de d&iacute;as<br>
<select name="dias">
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
</select><br>
Lugar de destino<br>
<input type="radio" name="lugar" value=1>Santiago<br>
<input type="radio" name="lugar" value=2>Vi&ntilde;a del Mar<br>
Hotel<br>
<select name="hotel">
<option value=1>Hotel Grand Hyatt</option>
<option value=2>Hotel Plaza El Bosque Ebro</option>
<option value=3>Hotel Sheraton Miramar</option>
<option value=4>Hotel O'Higgins</option>
</select><br>
Restaurant<br>
<input type="radio" name="resto" value=1>El Boh&iacute;o<br>
<input type="radio" name="resto" value=2>Donde Augusto<br>
<input type="radio" name="resto" value=3>Giratorio<br>
Aerol&iacute;nea<br>
<select name="vuelo">
<option value=1>LAN</option>
<option value=2>SKY</option>
</select><br>
<input type="submit">
</form><br>
Total: US$<?php
echo cotizar($_POST["lugar"],$_POST["hotel"],$_POST["resto"],$_POST["vuelo"],$_POST["dias"]);
?>
</div>

<div class="divisas">
Cambio de divisas:<br>
(09/04/2014)<br>
<form action="llameya.php" method="post">
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