<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/registro.css">
<style>
table, th, td {
    border: 1px solid black;
    text-align: left;
    width: 100%;
    margin: auto;
margin-bottom: 15px;
	padding: 15px;
	font-size: 16px;
	border: 1px solid darkgray;
	text-align: center;
}
</style>
	<title></title>
</head>
<body>
<form action="registro.php" method="post" class="form_registro">
<?php
include ("conexionDB.php");

if ($_POST){	
  
$query= mysql_query("INSERT INTO prueba VALUES(NULL,'".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['cedula']."','".$_POST['carrera']."','".$_POST['semestre']."','".$_POST['servicio']."',".$_POST['periodo'].")");
echo utf8_encode("<table> 
  <tr>
    <th>Nombre:
    ".$_POST['nombre']." </th>
  </tr>
   <tr>
    <th>Apellido:
    ".$_POST['Apellido']."</th>
  </tr>
  <tr>
    <th>C.I:
    ".$_POST['cedula']." </th>
  </tr>
  <tr>
    <th>Carrera:
    ".$_POST['carrera']." </th>
  </tr>
  <tr>
    <th>Semestre:
   " .$_POST['semestre']. "</th>
  </tr>
  <tr>
    <th>Proyecto Comunitario:
    ".$_POST['servicio']."</th>
  </tr>
  <tr>
    <th>Periodo:
    ".$_POST['periodo']." </th>
  </tr>
</table>
</div>
  
</div>

</table>
  </div>"); 

}
?> 
<input type="submit" value="Enviar" class="registrar">

<a href="formulario_registro.html"><input type="botom" value="Regresar" class="registrar" ></a>

</form>
</body>
</html>