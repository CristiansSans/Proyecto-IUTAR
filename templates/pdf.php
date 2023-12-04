<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="../js/jquery-3.1.0.min.js"></script>
<link rel="stylesheet" href="../css/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/buscador.css">
	<title>Buscador</title>
</head>
<body id="main">

  <header class="container-fluid">
    <button onclick="topFunction()" id="myBtn" title="Go to top">Subir</button>

    <a href="buscadorproyecto.php"><div class="col-sm-2"><img class="logo" src="../img/logopeq.png"></div></a>
    <a href="buscadorproyecto.php"><div class="col-sm-2 active"><p class="text">Servicio Comunitario</p></div></a>
    <a href="buscador.php"><div class="col-sm-2 items"><p class="text">Alumnos</p></div></a>
<?php 
  include ('conexionDB.php');
    session_start();

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
    <div >
  <h1 style="font-weight: 800">PDF</h1><br>
    <form action="pdf.php" method="post">
    <h2>Filtrar por:</h2>
    <select id="letras" name="carrera" style="margin:0;padding:10px 10px 15px 15px;">
      <option value="n">---Carrera---</option>
      <option value="n">Todos</option>
      <option value="Publicidad y Mercadeo">Publicidad y Mercadeo</option>
      <option value="Informatica">Informatica</option>
      <option value="Administracion de Empresas">Administracion de Empresas</option>
      <option value="Contaduria">Contaduria</option>
      <option value="Seguridad Industrial">Seguridad Industrial</option>
      <option value="Produccion y Supervision Industrial">Produccion y Supervision Industrial</option>
      <option value="Preescolar">Preescolar</option>
    </select><br><br>
    <select id="letras" name="estatus" style="margin:0;padding:10px 10px 15px 15px;">
      <option value="n">---Estatus---</option>
      <option value="n">Todos</option>
      <option value="APROBADO">Aprobado</option>
      <option value="REPROBADO">Reprobado</option>
    </select><br><br>
    <select id="letras" name="periodo" style="margin:0;padding:10px 10px 15px 15px;">
      <option value="n">---Periodo---</option>
      <option value="n">Todos</option>
      <option value="2011">2011</option>
      <option value="2012">2012</option>
      <option value="2013">2013</option>
      <option value="2014">2014</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2016.1">2016-1</option>
      <option value="2016.2">2016-2</option>
      <option value="2017">2017</option>
      <option value="2017.1">2017-1</option>
      <option value="2017.2">2017-2</option>
    </select><br>
    <input id="sublet" type="submit" value="Buscar" class="registrar">
    </form>
    <br><br>
<input oninput="w3.filterHTML('#id01', '.item', this.value)" class="buscar" value="" type="text" name="buscar" id="filtronombre" placeholder="Buscar.."><br>
<label style="padding: 10px;cursor: pointer;border: 1px solid #ccc;
    border-radius: 4px;"><input type="checkbox" id="Todos"> Marcar todos</label>
<?php 
if (!isset($_POST['carrera']) && !isset($_POST['estatus']) && !isset($_POST['periodo'])) {
  $mysql= mysql_query("SELECT * FROM proyecto ;");
$a=0;
$fcount = mysql_num_fields($mysql);
echo "<table id='id01'>
  <tr>";
  echo "<th></th>";
          for($i=0; $i< 5; $i++)
                {
                $nombre = mysql_field_name($mysql, $i );
echo utf8_encode("
    <th>".$nombre."</th>
  
  ");
}

  echo "</tr>
   ";



while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}
}


    
elseif (isset($_POST['carrera']) || isset($_POST['estatus']) || isset($_POST['periodo'])) {

   include ('conexionDB.php');
  if ($_POST['carrera'] != "n" && $_POST['estatus'] == "n" && $_POST['periodo'] == "n") {
    $mysql= mysql_query("SELECT * FROM proyecto WHERE Carrera='".$_POST['carrera']."'");

    echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th></th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}

  }

  elseif ($_POST['carrera'] != "n" && $_POST['estatus'] != "n" && $_POST['periodo'] == "n") {
    $mysql= mysql_query("SELECT * FROM proyecto WHERE Carrera='".$_POST['carrera']."' AND Estatus='".$_POST['estatus']."' ");

    echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th></th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}

  }
 
 elseif ($_POST['carrera'] != "n" && $_POST['estatus'] != "n" && $_POST['periodo'] != "n") {
    $mysql= mysql_query("SELECT * FROM proyecto WHERE Carrera='".$_POST['carrera']."' AND Estatus='".$_POST['estatus']."' AND Periodo='".$_POST['periodo']."' ");

    echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th></th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}

  }

  elseif ($_POST['carrera'] == "n" && $_POST['estatus'] != "n" && $_POST['periodo'] == "n") {
    $mysql= mysql_query("SELECT * FROM proyecto WHERE Estatus='".$_POST['estatus']."' ");

    echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th></th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}

  }

elseif ($_POST['carrera'] == "n" && $_POST['estatus'] == "n" && $_POST['periodo'] != "n") {
    $mysql= mysql_query("SELECT * FROM proyecto WHERE Periodo='".$_POST['periodo']."' ");

    echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th></th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}

  }

  elseif ($_POST['carrera'] != "n" && $_POST['estatus'] == "n" && $_POST['periodo'] != "n") {
    $mysql= mysql_query("SELECT * FROM proyecto WHERE Carrera='".$_POST['carrera']."'  AND Periodo='".$_POST['periodo']."' ");

    echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th></th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}

  }

  elseif ($_POST['carrera'] != "n" && $_POST['estatus'] != "n" && $_POST['periodo'] == "n") {
    $mysql= mysql_query("SELECT * FROM proyecto WHERE Carrera='".$_POST['carrera']."' AND Estatus='".$_POST['estatus']."' ");

    echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th></th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}

  }

  elseif ($_POST['carrera'] == "n" && $_POST['estatus'] != "n" && $_POST['periodo'] != "n") {
    $mysql= mysql_query("SELECT * FROM proyecto WHERE Estatus='".$_POST['estatus']."' AND Periodo='".$_POST['periodo']."' ");

    echo utf8_encode("
  
    
    <table id='id01'>
  <tr>
    <th></th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Carrera</th>
    <th>Estatus</th>
    <th>Periodo</th>
  </tr>
  ");

    while ($res=mysql_fetch_array($mysql)) {
  echo "<form action='pdf2.php' method='post'>";
  echo "<tr class='item'>";
  echo "<td><input class='check' type='checkbox' name='pdf[]' value='".$res['Cedula']."' ></td>";
for($i=0; $i< 6; $i++)
                {
        $nombre = mysql_field_name($mysql, $i );

     echo utf8_encode("

    
    <td class='pdf'>".$res[$nombre]."</td>

    
    ");

    }}

  }
  


}

 
  
 ?>
<input id="myBtn2" type="submit" value="Crear pdf">
</form>
</div>


</div>
</center>
<script type="text/javascript">
  var pdf = document.getElementsByClassName('item');
var i;

for (i = 0; i < pdf.length; i++) {
                $('.item:eq('+i+')').on('click', function(){
                var $checkbox = $(this).find(':checkbox');
                $checkbox.attr('checked', !$checkbox.attr('checked'));});

            }

            $('document').ready(function(){
   $("#Todos").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
  });
});
</script>
<script src="../js/filtro.js"></script>
 <script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>