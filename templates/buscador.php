<?php 
  session_start();
  if (empty($_SESSION['usuario'])) {
   echo "<script>";
  echo "alert('¡Debes iniciar sesion!');";
  echo "window.location.href='../index.html';";
  echo "</script>";
  }

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="js/jquery-3.1.0.min.js"></script>
<link rel="stylesheet" href="../css/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/buscador.css">
	<title>Buscador</title>
</head>
<body id="main">
<header class="container-fluid">
    <a href="buscadorproyecto.php"><div class="col-sm-2"><img class="logo" src="../img/logopeq.png"></div></a>
    <a href="buscadorproyecto.php"><div class="col-sm-2 items"><p class="text">Servicio Comunitario</p></div></a>
    <a href=""><div class="col-sm-2 active"><p class="text">Alumnos</p></div></a>
    <?php 
  include ('conexionDB.php'); 
  $vall= mysql_query("SELECT priv FROM usuarios WHERE usuarios='".$_SESSION['usuario']."'");
    $res2=mysql_fetch_array($vall);

    if (isset($res2['priv']) && $res2['priv'] == "adm") {
      echo "<a href='reg.php'><div class='col-sm-2 items'><p class='text'>Registro</p></div></a>
      <a href='adm.php'><div class='col-sm-2 items'><p class='text'>Administrador</p></div></a>";
    }
    
    
   
  $nombre=mysql_query("SELECT nombreuser FROM usuarios WHERE usuarios='".$_SESSION['usuario']."'");
  $res=mysql_fetch_array($nombre);
 ?>
    <div class="col-sm-2 items text" style="float: right;" onclick="openNav()"><?=$res['nombreuser']?><br><span class="fa fa-bars" style="font-size: 16px;"></span></div>

    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="desconectar.php">Cerrar sesion</a>
  <a href="#"></a>
  <a href="#"></a>
</div>

</header>
<div class="container-fluid">
<a id="subir" href="#logo"><img id="subir" src="53598.png"></a>
  <center>
  <h1>Buscador</h1><br>
    <form action="buscador.php" method="post">
    <h2>Seleccione la letra</h2>
    <select id="letras" name="letra">
      <option value="a">A</option>
      <option value="b">B</option>
      <option value="c">C</option>
      <option value="d">D</option>
      <option value="e">E</option>
      <option value="f">F</option>
      <option value="g">G</option>
      <option value="h">H</option>
      <option value="i">I</option>
      <option value="j">J</option>
      <option value="k">K</option>
      <option value="l">L</option>
      <option value="m">M</option>
      <option value="n">N</option>
      <option value="ñ">Ñ</option>
      <option value="o">O</option>
      <option value="p">P</option>
      <option value="q">Q</option>
      <option value="r">R</option>
      <option value="s">S</option>
      <option value="t">T</option>
      <option value="u">U</option>
      <option value="v">V</option>
      <option value="w">W</option>
      <option value="x">X</option>
      <option value="y">Y</option>
      <option value="z">Z</option>
    </select>
    <input id="sublet" type="submit" value="Buscar" class="registrar">
    </form>
    <br><br>
<input oninput="w3.filterHTML('#id01', '.item', this.value)" class="buscar" value="" type="text" name="buscar" id="filtronombre" placeholder="Buscar..">
<?php 
if ($_POST) {
  $mysql= mysql_query("SELECT * FROM alumnos WHERE Nombre LIKE '".$_POST['letra']."%'");
echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Cedula</th>
    <th>Status</th>
    <th>E-mail</th>
    <th>Ir a perfil</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
     echo utf8_encode("

     <tr class='item'>
    <td>".$res['nombres']."</td>
    <td>".$res['apellidos']."</td>
    <td>".$res['Cedula']."</td>
    <td>".$res['estatus']."</td>
    <td>".$res['email']."</td>
    <td><a href='perfil2.php?Cedula=".$res['Cedula']."'><span class='fa fa-user' style='font-size: 25px; text-align: center;'></span></a></td>
     </tr>");
    }
  

echo "
  </center>
</div>
<script src='../js/filtro.js'></script>";
}

 ?>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginRight= "0";
    document.body.style.backgroundColor = "white";
}
</script>
</body>
</html>