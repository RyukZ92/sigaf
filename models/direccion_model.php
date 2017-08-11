<?php
class Direccion
	{
	private $direccion;
	public function __construct()
		{
		$this->direccion=array();
		}	
	//Método que se usa para agregar la dirección de una familia.
	public function agregarDireccion($direccion,$sector,$numero_casa,$id_parroquia,$id_rep_familia)
		{
		$sql="INSERT INTO direccion (direccion,sector,numero_casa,id_parroquia,id_rep_familia)
		VALUES('$direccion','$sector','$numero_casa','$id_parroquia','$id_rep_familia')";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Métdo para actualizar la dirección familiar
	public function actualizarDireccion($sector,$numero_casa,$id)
		{
		$sql="UPDATE direccion SET sector='$sector',numero_casa='$numero_casa' WHERE id_rep_familia='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;		
		}
	}
?>
