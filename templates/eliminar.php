<?php 
	
	include('conexionDB.php');

	mysql_query("DELETE FROM proyecto WHERE Cedula='".$_GET['Cedula']."'");

	echo "<script>";
              echo "window.location.href='buscadorproyecto.php';";
              echo "</script>";
	
 ?>