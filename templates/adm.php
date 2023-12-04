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
    <a href="reg.php"><div class="col-sm-2 items"><p class="text">Registro</p></div></a>
    <a href=""><div class="col-sm-2 active"><p class="text">Administrador</p></div></a>
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
  <form action="adm.php" method="post">
    <h2>Seleccione un usuario</h2>
    <select id="letras" style="margin:0;padding:10px 10px 15px 15px;" name="usuario">
      <option value="---">----</option>
  <?php 
  include ('conexionDB.php');
  $vall=mysql_query("SELECT * FROM usuarios;");

  while ($res=mysql_fetch_array($vall)){

      echo "<option value=".$res['usuarios'].">".$res['Nombreuser']."</option>";
  }

?>
  
</select>
<input id="sublet" type="submit" value="Seleccionar" class="registrar">
</form>

<?php 
  include ('conexionDB.php');

  if (isset($_POST['usuario'])) {
    $val=mysql_query("SELECT * FROM usuarios WHERE usuarios='".$_POST['usuario']."'");
    $res2=mysql_fetch_array($val);

    echo "<form action='changes.php' method='post' class='container form_registro' style='margin-top: 20px;'>
  <h2 class='form_titulo'>Administrador de usuarios</h2>
  <div class='col-sm-12 contenedor-inputs'>
    <input type='text' required id='apellido' readonly='readonly' value='".$res2['usuarios']."' name='usuario' placeholder='&#9000; Usuario' class='input-50' style='padding:5px;'>
    <input type='text' required id='cedula' value='".$res2['pass']."' name='pass' placeholder='&#9000; Contraseña' class='input-50' style='padding:5px;'>
    <input type='text' required id='carrera' value='".$res2['Nombreuser']."' name='name' placeholder='&#9000; Nombre del usuario' class='input-50' style='padding:5px;'>
    <select  name='priv' style='width: 48%;padding: 5px;margin: 0;height:35px;'>";

    if ($res2['priv'] == "adm") {
      echo "<option selected value='adm'>Administrador</option>";
    }

    else{
        echo "<option value='adm'>Administrador</option>";

    }

    if ($res2['priv'] == "editor") {
      echo "<option selected value='editor'>Editor</option>";
    }

    else{
        echo "<option value='editor'>Editor</option>";

    }

    if ($res2['priv'] == "visor") {
      echo "<option selected value='visor'>Visor</option>";
    }

    else{
        echo "<option value='visor'>Visor</option>";

    }
      

      echo "
    </select>
    <input type='submit' value='Editar' style='width:98%;padding:10px;margin: 10px auto;'>
  </div>              
</form>";
  }


 ?>
</div>
<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>