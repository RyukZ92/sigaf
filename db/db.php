<?php
class Conectar
	{
	public static function conexion()
		{
		$conex=new mysqli('localhost','root','','bd_sigaf');
		$conex->query("SET NAMES 'utf8'");
		if (mysqli_connect_errno())
			{ 
			echo "Error de conexión a la BD: ".mysqli_connect_error ();	
			exit();
			}
		return $conex;
		}
	public static function desconectar()
		{
		return Conectar::conexion()->close();
		}
	}
?>
