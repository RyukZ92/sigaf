<?php
class Municipio
	{
	private $municipio;
	public function __construct()
		{
		$this->municipio=array();
		}
	//Consultar Municipios
	public function consultarMunicipio()
		{
		$sql="SELECT id, municipio.nombre_municipio AS nombre FROM municipio WHERE estado_id='17';";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->municipio[]=$reg;
				}
			}
		return $this->municipio;
		}
	//Consultar municipios por ID
	public function consultarMunicipioPorId($id)
		{
		$sql="SELECT id,municipio.nombre_municipio AS nombre FROM municipio WHERE id='$id';";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->municipio[]=$reg;
				}
			}
		return $this->municipio;
		}
	public function consultarParroquiaPorId($id)
		{
		$sql="SELECT id,parroquia.nombre_parroquia AS nombre FROM parroquia WHERE id='$id';";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->municipio[]=$reg;
				}
			}
		return $this->municipio;
		}
	//Consultar parroquia por id
	public function consultarParroquiaPorMunicipio($id)
		{
		$sql="SELECT parroquia.*
		FROM parroquia
		WHERE municipio_id='$id'";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->parroquia[]=$reg;
				}
			}
		return $this->parroquia;
		}
	}
?>
