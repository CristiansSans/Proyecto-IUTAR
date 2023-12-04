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
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <a href="buscadorproyecto.php"><div class="col-sm-2"><img class="logo" src="../img/logopeq.png"></div></a>
    <a href="buscadorproyecto.php"><div class="col-sm-2 active"><p class="text">Servicio Comunitario</p></div></a>
    <a href="buscador.php"><div class="col-sm-2 items"><p class="text">Alumnos</p></div></a>
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
  <center>
  <h1 style="font-weight: 800">Buscador</h1><br>
    
    <br><br>
    <a href="pdf.php"><input id="sublet" type="button" value="Crear PDF" class="registrar"></a><br><br>
<input oninput="w3.filterHTML('#id01', '.item', this.value)" class="buscar" value="" type="text" name="buscar" id="filtronombre" placeholder="Buscar..">
<?php 

$mysql= mysql_query("SELECT * FROM proyecto ;");
$a=0;
$fcount = mysql_num_fields($mysql);
echo "<table id='id01'>
  <tr>";
          for($i=0; $i< 6; $i++)
                {
                $nombre = mysql_field_name($mysql, $i );
echo utf8_encode("
    <th>".$nombre."</th>
  
  ");
}

  
 echo "<th>Ir a perfil</th>";
  echo "</tr>
   ";



while ($res=mysql_fetch_array($mysql)) {
  echo "<tr class='item'>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td>".$res[$nombre]."</td>
    
    ");

    }echo "<td><a href='perfil.php?Cedula=".$res['Cedula']."'><span class='fa fa-user' style='font-size: 25px; text-align: center;'></span></a></td></tr>";}
  

echo "
 
  </div>
</center>
<script src='../js/filtro.js'></script>";
 ?>
 <script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>