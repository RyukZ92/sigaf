<?php
class LibroMayor
	{
	private $operacion;
	public function __construct()
		{
		$this->operacion=array();
		}
	//Método para agregar las operaciones financieras
	public function agregarOperacion($comprobante,$tipo_op,$descripcion,$monto,$fecha_comp,$fecha_op,$hora_op)
		{
		$sql="INSERT INTO libro_mayor (comprobante,tipo_op,descripcion,monto,fecha_comp,fecha_op,hora_op)
		VALUES ('$comprobante','$tipo_op','$descripcion','$monto','$fecha_comp',now(),now());";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}		
	//Método que consulta todas las operaciones financieras	
	public function consultarOperacion()
		{
		$sql="SELECT * 
		FROM libro_mayor
		ORDER BY fecha_op DESC;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->patrimonio[]=$reg;
				}
			}
		return $this->patrimonio;
		}
	//Método que consulta las operaciones financieras por fecha (mes y año)
	public function consultarOperacionPorFecha($mes,$anio)
		{
		$sql="SELECT * FROM libro_mayor WHERE MONTH(fecha_comp)='$mes' AND YEAR(fecha_comp)='$anio'";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->operacion[]=$reg;
				}
			}
		return $this->operacion;		
		}
	}

?>
