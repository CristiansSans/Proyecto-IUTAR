<?php 
	
	include ('conexionDB.php');
	mysql_query("UPDATE usuarios SET usuarios='".$_POST['usuario']."',pass='".$_POST['pass']."', Nombreuser='".$_POST['name']."', priv='".$_POST['priv']."' WHERE usuarios='".$_POST['usuario']."';");

			  echo "<script>";
              echo "window.location.href='adm.php';";
              echo "</script>";

 ?>