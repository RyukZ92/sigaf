<?php
Class Historial
	{
	private $mov;
	public function __construct()
		{
		$this->mov=array();
		}
	//Metodo que registra los movimientos realizados por un usuario específico.
	public static function Movimiento($usuario,$accion)
		{
		$sql="INSERT INTO historial (id_usuario,accion,fecha,hora) 
		VALUES ('$usuario','$accion',now(),now())";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método que permite buscar los movimiento de un usuario por una fecha específica.
	public function ConsultarMovimientoPorFecha($fecha_inicio,$fecha_fin)
		{
		$sql="SELECT * FROM historial
		WHERE fecha BETWEEN
		'$fecha_inicio'
		AND
		'$fecha_fin'
		ORDER BY fecha ASC";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->mov[]=$reg;
				}
			}
		return $this->mov;
		}
	}
// echo 'Adios<br>';
?>