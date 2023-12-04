<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="../js/jquery-3.1.0.min.js"></script>
<link rel="stylesheet" href="../css/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/buscador.css">
    <title>.</title>
    <script>
var f = new Date();
document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
</script>
</head>
<body>
<br>
    <img src="../img/iutar.png"  width="40%" height="100" border="1" align="left">

    <p style="text-align: center;">Republica Bolivariana de Venezuela <br>Ministerio del Poder Popular para la Educacion Universitaria<br>
    Instituto Universitario de Tecnologia Antonio Ricaurte<br>
    Estudiantes Ejecutantes del Servicio Comunitario<br>
    SEDE CAGUA </p>
    
<table>
  <tr>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>

<?php 
	include ('conexionDB.php');
	 $numero=$_POST["pdf"];
    $count = count($numero);
    for ($i = 0; $i < $count; $i++) {
    	$val=mysql_query("SELECT * FROM proyecto WHERE Cedula='".$numero[$i]."'");
    	$res=mysql_fetch_array($val);
	echo "<tr>";
	for($i2=0; $i2< 6; $i2++)
                {
        $nombre = mysql_field_name($val, $i2 );
    echo utf8_encode("<td class='pdf'>".$res[$nombre]."</td>");

    }
echo "</td>";}

      
 ?>
</table>  
</body>
</html>