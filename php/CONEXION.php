<?php
$host="localhost";
$user="root";
$password="";
$link=mysqli_connect($host,$user,$password) OR DIE ("ERROR AL CONECTARSE AL SERVIDOR");
$dbname="usuario";
mysqli_select_db($link, $dbname) OR DIE ("error al conectarce a la bd");
return $link;
?>