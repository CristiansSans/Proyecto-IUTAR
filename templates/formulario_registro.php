<?php 
  session_start();
   include ('conexionDB.php');
  if (empty($_SESSION['usuario'])) {
   echo "<script>";
  echo "alert('¡Debes iniciar sesion!');";
  echo "window.location.href='../index.html';";
  echo "</script>";
  }

  $vall= mysql_query("SELECT priv FROM usuarios WHERE usuarios='".$_SESSION['usuario']."'");
    $res2=mysql_fetch_array($vall);

    if (isset($res2['priv']) && $res2['priv'] != "adm") {
      echo "<script>";
  echo "alert('¡No posees los permisos!');";
  echo "window.location.href='buscadorproyecto.php';";
  echo "</script>";
    }

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
<script src="../js/jquery-3.1.0.min.js"></script>
<link rel="stylesheet" href="../css/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<meta charset="UTF-8">
	<title> Registro de Alumnos</title>
	<link rel="stylesheet" href="../css/estilos.css">
<script src = validar.js></script>	
</head>
<body id="main" style="background-color:#f2f2f2">

	<header class="container-fluid">

    <div class="col-sm-2"><img class="logo" src="../img/logopeq.png"></div>
    <a href="buscadorproyecto.php"><div class="col-sm-2 items"><p class="text">Servicio Comunitario</p></div></a>
    <a href="buscador.php"><div class="col-sm-2 items"><p class="text">Alumnos</p></div></a>
    <a href=""><div class="col-sm-2 active"><p class="text">Registro</p></div></a>
    <?php 
 
  $nombre=mysql_query("SELECT nombreuser FROM usuarios WHERE usuarios='".$_SESSION['usuario']."'");
  $res=mysql_fetch_array($nombre);
 ?>
    <div class="col-sm-2 items text" onclick="openNav()"><?=$res['nombreuser']?><br><span class="fa fa-bars" style="font-size: 16px;"></span></div>

    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Cerrar sesion</a>
  <a href="#"></a>
  <a href="#"></a>
</div>

</header>
<div class="container-fluid">
<form action="registrar.php" method="post" class="container form_registro" onsubmit="return validar();" style="margin-top: 20px;">
	<h2 class="form_titulo">Registrar usuario</h2>
	<div class="col-sm-12 contenedor-inputs">
		<input type="text" required id="apellido" name="usuario" placeholder="&#9000; Usuario" class="input-50">
		<input type="text" required id="cedula" name="pass" placeholder="&#9000; Contraseña" class="input-50">
		<input type="text" required id="carrera" name=" name" placeholder="&#9000; Nombre del usuario" class="input-50">
		<select value="editor"  name="priv" style="width: 48%;padding: -10px;margin: 0;height:55px;">
      <option value="adm">Administrador</option>
      <option value="editor">Editor</option>
      <option value="visor">Visor</option>
    </select>
		<input type="submit" value="Registrar" class="input-50, btn-enviar">
	</div>              
</form>
</div>
</body>
</html>


