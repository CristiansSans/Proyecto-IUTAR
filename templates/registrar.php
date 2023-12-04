<?php
include ('conexionDB.php');

$valid= mysql_query("SELECT usuarios FROM usuarios WHERE usuarios='".$_POST['usuario']."'");

if ( mysql_num_rows($valid)>0) {
            echo "<script>";
                echo "alert('El usuario ya se encuentra registrado!');";
                echo "window.location.href='formulario_registro.php';";
                echo "</script>";
        }

        if ( mysql_num_rows($valid) == 0) {

            mysql_query("INSERT INTO usuarios (usuarios,pass,Nombreuser,priv) VALUES('".$_POST['usuario']."','".$_POST['pass']."','".$_POST['name']."','".$_POST['priv']."')");

                echo "<script>";
                echo "alert('Registro exitoso');";
                echo "window.location.href='buscadorproyecto.php';";
                echo "</script>";
        }


?>