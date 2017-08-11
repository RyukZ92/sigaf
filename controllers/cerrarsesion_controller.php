<?php
require_once ('models/usuario_model.php');
require_once ('models/historial_model.php');
if($_SESSION['nivel_usuario']!='provisional') 
	Historial::Movimiento($_SESSION['codigo'],'Finalizó sesión');
Conectar::desconectar(); //Se desconecta de la DB.
session_destroy(); //se destryude la sesión
unset($_SESSION,$_POST['opcion'],$_POST);
header("location:index.php");
?>
