<?php
// require_once'../db/db.php';
class Constancia
	{
	private $persona;
	public function __construct()
		{
		$this->constancia=array();
		}
	public function agregarConstancia($tipo,$dni)
		{
		$sql="INSERT INTO constancia (tipo,dni_persona,fecha_imp) VALUE('$tipo','$dni',now());";
		return Conectar::conexion()->query($sql);
		}
	//Método que muestra las constancias emitidas
	public function consultarConstancia()
		{
		$sql="SELECT constancia.* ,nombre,apellido
		FROM constancia,persona
		WHERE dni_persona = dni
		ORDER BY fecha_imp DESC;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->constancia[]=$reg;
				}
			}
		return $this->constancia;
		}
	//Método que muestra las constancias por tipo (residencia, bajos recurssos o buena conducta)
	public function consultarConstanciaPorTipo($tipo)
		{
		//$hoy=date("Y-m-d");
		$sql="SELECT count(*) as total FROM `constancia` WHERE tipo='$tipo';";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->constancia[]=$reg;
				}
			}
		return $this->constancia;
		}
	//Método que muestra las constancias por fecha (mes y año)
	public function consultarConstanciaPorMes($mes,$sql_,$anio)
		{
		$sql="SELECT *
		FROM constancia
		WHERE MONTH(fecha_imp)='$mes'
		AND YEAR(fecha_imp)='$anio' $sql_";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}	
	//Método que permite comprobar si una persona ya solicitó una constancia de un tipo  específico en el mes actual
	public function verificarRestriccionConstancia($mes,$tipo,$dni)
		{
		$sql="SELECT *
		FROM constancia
		WHERE MONTH(fecha_imp)='$mes'
		AND YEAR(now())
		AND tipo='$tipo'
		AND dni_persona='$dni';";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}		
	}
?>
