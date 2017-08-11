<?php
if(is_readable('../db/db.php'))
	include '../db/db.php';
class Parroquia
	{
	private $parroquia;
	public function __construct()
		{
		$this->parroquia=array();
		}
	//Consulta de las parroquias
	public function consultarParroquiaPorMunicipio($tabla,$id)
		{
		$sql="SELECT id, nombre_parroquia AS nombre,municipio_id FROM $tabla WHERE municipio_id='$id';";
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
	//Consulta de parroquias, municipio y estado
	public function consultarParroquiaMunicipioEstado($id)
		{
		$sql="SELECT parroquia.*,parroquia.id as id_parroquia,municipio.nombre_municipio,estado.nombre_estado
		FROM parroquia,municipio,estado 
		WHERE parroquia.id='$id' 
		AND municipio_id=municipio.id
		AND estado_id=estado.id;";
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
