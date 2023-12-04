<?php 
session_start();
	include('conexionDB.php');

	session_destroy();

	echo "<script>";
	echo "alert('¡Desconexion exitosa!');";
	echo "window.location.href='../index.html';";
	echo "</script>";
 ?>