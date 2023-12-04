<?php 

	if ($_POST['usuario'] && $_POST['pass']) {

		include('conexionDB.php');
		
	
		$valid= mysql_query("SELECT usuarios FROM usuarios WHERE usuarios='".$_POST['usuario']."'");
		$valid2= mysql_query("SELECT pass FROM usuarios WHERE pass='".$_POST['pass']."'");
		$val=False;
			
		if ( mysql_num_rows($valid)>0) {
			$val=True;
		}

		if ($val==False) {
				echo "<script>";
				echo "alert('Su ID es incorrecto');";
				echo "window.location.href='../index.html';";
				echo "</script>";
		}

		if ($val==True && mysql_num_rows($valid2)>0) {
				session_start();
				$_SESSION['usuario']=$_POST['usuario'];
				$_SESSION['pass']=$_POST['pass'];
				echo "<script>";
				echo "alert('¡Logueo exitoso!');";
				echo "window.location.href='buscador.php';";
				echo "</script>";
				mysql_close();
		}

		else{
				echo "<script>";
				echo "alert('Su contraseña es incorrecta');";
				echo "window.location.href='../index.html';";
				echo "</script>";	
		}
	}

 ?>