<?php
class LibroCompra
	{
	private $operacion;
	public function __construct()
		{
		$this->operacion=array();
		}
	//Método que se usa para agregar un nuevo registro de compra.
	public function agregarCompra($fecha,$referencia,$proveedor,$precio)
		{
		$sql="INSERT INTO libro_compra (fecha, referencia, proveedor,precio_neto)  
		VALUES('$fecha','$referencia','$proveedor','$precio')";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para consultar los registros de las compras realizadas
	public function consultarCompra()
		{
		$sql="SELECT * FROM libro_compra ORDER BY fecha DESC";
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
	//Método para consultar las compras por fecha (mes y año)
	public function consultarCompraPorFecha($mes,$anio)
		{
		$sql="SELECT * FROM libro_compra WHERE MONTH(fecha)='$mes' AND YEAR(fecha)='$anio'";
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
// echo 'Adios<br>';
?>