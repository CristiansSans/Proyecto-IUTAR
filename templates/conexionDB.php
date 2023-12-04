<?php
$conect=mysql_connect("localhost","root","") or die("Error: ".mysql_error());
$selDB=mysql_select_db("iutar",$conect) or die("Error: ".mysql_error());
?>