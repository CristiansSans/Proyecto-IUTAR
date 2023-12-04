<?php 
	
	include('conexionDB.php');

	mysql_query("DELETE FROM alumnos WHERE Cedula='".$_GET['Cedula']."'");

	 		echo "<script>";
            echo "window.location.href='buscador.php';";
            echo "</script>";
	
 ?>