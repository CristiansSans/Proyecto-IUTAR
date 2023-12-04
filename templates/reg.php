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
<html>
<head>
<script src="../js/jquery-3.1.0.min.js"></script>
<link rel="stylesheet" href="../css/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/buscador.css">

	<title>Perfil</title>
</head>
<body id="main">
<header class="container-fluid">
    <a href="buscadorproyecto.php"><div class="col-sm-2"><img class="logo" src="../img/logopeq.png"></div></a>
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
  <a href="desconectar.php">Cerrar sesion</a>
  <a href="#"></a>
  <a href="#"></a>
</div>

</header>

<div class="container-fluid">
  <form action="reg.php" method="post">
    <h2>Seleccione el tipo de registro</h2>
    <select id="letras" style="margin:0;padding:10px 10px 15px 15px;" name="tipo">
      <option value="a">Registrar alumno en Serv. Comunitario</option>
      <option value="b">Registrar alumno en general</option>
      <option value="c">Registrar usuario</option>
    </select>
    <input id="sublet" type="submit" value="Seleccionar" class="registrar">
    </form>


<?php 
      include('conexionDB.php');
  if (isset($_POST['tipo']) && $_POST['tipo'] == "a") {
  echo "
  <form action='reg.php' method='post'>
  <input  type='text'placeholder='Ingrese numero de cedula a registrar' name='proyecto' style='padding:15px; width:50%;'>
  <input id='sublet' type='submit' value='Seleccionar' class='registrar'></form>";
  
  }

  if (isset($_POST['tipo']) && $_POST['tipo'] == "b") {
  echo "
  <form action='reg.php' method='post'>
  <input  type='text' name='alumno' placeholder='Ingrese numero de cedula a registrar' style='padding:15px; width:50%;'>
  <input id='sublet' type='submit' value='Seleccionar' class='registrar'></form>";

  }

  if (isset($_POST['tipo']) && $_POST['tipo'] == "c") {
  echo "
  <a href='formulario_registro.php'><input id='sublet' type='submit' value='Ir a formulario' class='registrar'></a>";

  }

  if (isset($_POST['proyecto'])) {
    $valid= mysql_query("SELECT Cedula FROM proyecto WHERE Cedula='".$_POST['proyecto']."'");

    if ( mysql_num_rows($valid)>0) {
        echo "<script>";
        echo "alert('¡Esta cedula ya esta registrada!');";
        echo "</script>";
    }

    if ( mysql_num_rows($valid)==0) {
        $q=mysql_query("INSERT INTO proyecto (Cedula) VALUES('".$_POST['proyecto']."');");
        echo "<script>";
        echo "alert('Registro exitoso');";
        echo "window.location.href='perfil.php?Cedula=".$_POST['proyecto']."';";
        echo "</script>";
  }}

  if (isset($_POST['alumno'])) {
    $valid3= mysql_query("SELECT Cedula FROM proyecto WHERE Cedula='".$_POST['alumno']."'");

    if ( mysql_num_rows($valid3)>0) {
        echo "<script>";
        echo "alert('¡Esta cedula ya esta registrada!');";
        echo "</script>";
    }

    if ( mysql_num_rows($valid3)==0) {
        $q=mysql_query("INSERT INTO alumnos (Cedula) VALUES('".$_POST['alumno']."');");
        echo "<script>";
        echo "alert('Registro exitoso');";
        echo "window.location.href='perfil2.php?Cedula=".$_POST['alumno']."';";
        echo "</script>";
  }}

 ?>
   

</div>
<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>