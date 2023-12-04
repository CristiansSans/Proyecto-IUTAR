<!DOCTYPE html>
<html>
<head>
<script src="../js/jquery-3.1.0.min.js"></script>
<link rel="stylesheet" href="../css/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/perfil.css">

	<title>Perfil</title>
</head>
<body id="main">
<header class="container-fluid">
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  <?php  
    include ('conexionDB.php');
    session_start();
    $vall= mysql_query("SELECT priv FROM usuarios WHERE usuarios='".$_SESSION['usuario']."'");
    $res2=mysql_fetch_array($vall);

    if (isset($res2['priv']) && $res2['priv'] == "adm") {
      echo "
    <div class='col-sm-2 items' id='uno'><p class='text'><span class='fa fa-pencil-square edit' style='font-size: 25px;cursor: pointer;'></span><br>Editar informacion</p></div>
    <div class='col-sm-2 items' id='dos'><p class='text'><span class='fa fa-pencil-square-o edit' style='font-size: 25px;cursor: pointer;'></span><br>Editar campos</p></div>
    <div class='col-sm-2 items' id='tres'><p class='text'><span class='fa fa-plus edit' style='font-size: 25px;cursor: pointer;'></span><br>Agregar campo</p></div>
    <div class='col-sm-2  items' id='cuatro'><p class='text'><span class='fa fa-minus edit' style='font-size: 25px;cursor: pointer;'></span><br>Eliminar campo</p></div>
    <a href='eliminar.php?Cedula=".$_GET['Cedula']."' onclick=".'"'."return confirm('¿Seguro que desea eliminar el alumno?');".'"'." ><div class='col-sm-2  items'><p class='text'><span class='fa fa-times edit' style='font-size: 25px;cursor: pointer;'></span><br>Eliminar Alumno</p></div></a>";
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
<div class="col-sm-12"><a href="buscadorproyecto.php"><input type="button" class="volver" value="Volver al buscador" ></a>
</div>
 	<center>
  <form action="perfil.php" method="get">
    <input type="text" name="cedula" hidden value="<?=$_GET['Cedula']?>">

    <div class="col-sm-12"><img class="fotocarnet" src="../img/715.jpg" alt=""></div>
    <?php
    $x=1;
 include ('conexionDB.php');
      $result = mysql_query("SELECT * FROM proyecto WHERE Cedula='".$_GET['Cedula']."';");
      $res=mysql_fetch_array($result);
      If($result)
          {
          $fcount = mysql_num_fields($result);
          for($i=0; $i< $fcount; $i++)
                {
                $nombre = mysql_field_name($result, $i );
                
               echo utf8_encode("<div class='col-sm-6 info'>

                     <div class='col-sm-12 campos'><p class='inf2'><input type='checkbox' style='margin:5px;margin-top:7px;' class='checkss' hidden name='check' value='".$nombre."'>".$nombre."</p>
                     <input type='text' class='edits2' name='".$nombre."' value='".$nombre."'>
                     </div>
                      
                     <div class='col-sm-12 infocamp'>
                     <p class='inf'>".$res[$nombre]."</p>
                     <input type='text' class='edits' name='".$nombre."1' value='".$res[$nombre]."'>

      </div>
  </div>");
  
             
                
                if (isset($_GET[$nombre])) {
                mysql_query("ALTER TABLE proyecto CHANGE COLUMN ".$nombre." ".$_GET[$nombre]." VARCHAR(255);");
                echo "<script>";
              echo "window.location.href='perfil.php?Cedula=".$_GET['Cedula1']."';";
              echo "</script>";
               
             }

             if (isset($_GET[$nombre.$x])) {

               $que=mysql_query("UPDATE proyecto SET $nombre='".$_GET[$nombre.$x]."' WHERE Cedula='".$_GET['cedula']."';");
               echo "<script>";
              echo "window.location.href='perfil.php?Cedula=".$_GET['Cedula1']."';";
              echo "</script>";
               
             }
              
           
                }
              if (isset($_GET['campnew'])) {
                mysql_query("ALTER TABLE proyecto ADD ".$_GET['campnew']." varchar(255);");
              echo "<script>";
              echo "window.location.href='perfil.php?Cedula=".$_GET['Cedula1']."';";
              echo "</script>";
              }

              if (isset($_GET['check'])) {
                mysql_query("ALTER TABLE proyecto DROP COLUMN ".$_GET['check'].";");
              echo "<script>";
              echo "window.location.href='perfil.php?Cedula=".$_GET['Cedula1']."';";
              echo "</script>";
              }

           }

           
?>
  
<div class="col-sm-12 guard" hidden><input type="submit" class="save" value="Guardar" hidden>
<input type="button" class="saves" value="Cancelar" hidden></div>
</form>
</div>

</center>

<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>