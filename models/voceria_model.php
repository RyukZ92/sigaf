<?php
class Voceria
	{
	private $voceria;
	public function __construct()
		{
		$this->voceria=array();
		}
	//Método que se usa para agregar un a nueva vocería.
	public function agregarVoceria($nombre,$funcion)
		{
		$sql="INSERT INTO voceria (nombre, funcion) 
		VALUES('$nombre','$funcion')";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método utilizado para consultar todos las vocerias
	public function consultarVoceria()
		{
		$sql="SELECT * FROM voceria ORDER BY nombre ASC";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->voceria[]=$reg;
				}
			}
		return $this->voceria;
		}
	//Se obtiene un vocería específica mediante su identificador clave ID.
	public function consultarVoceriaPorId($id)
		{
		$sql="SELECT * FROM voceria WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->voceria[]=$reg;
				}
			}
		return $this->voceria;
		}
	//Método utilizado para verificar si el nombre de una vocería
	public function VerificarNombreVoceria($nombre)
		{
		$sql="SELECT nombre FROM voceria WHERE nombre='$nombre'";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}
	//Método utilizado para actualizar a las vocerías registraedas
	public function actualizarVoceria($nombre,$funcion,$estatus,$id)
		{
		$sql="UPDATE voceria SET nombre='$nombre', funcion='$funcion', estatus='$estatus' WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Métodos que permite cambiar los estaus de los voceros que pertenecen a la vocería que se está actualizando, pero especificamente cambiando de estatus.
	//Ejemplo: Si la vocería se deshabilita debe deshabilitarte todos los voceros  dependiente de la misma
	public function	actualizarEstatusVoceroDependienteDeVoceria($id,$estatus)
		{
		$sql="UPDATE vocero 
		SET vocero.estatus='$estatus' 
		WHERE vocero.id_voceria='$id';";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para actualizar es estauts de los usuarios perteneciente a equiz vocería específica
	public function	actualizarEstatusUsuarioDependienteDeVoceria($id,$estatus)
		{
		$sql="UPDATE usuario,vocero
		SET usuario.estatus='$estatus' 
		WHERE vocero.id_voceria='$id'
		AND vocero.dni_vocero=usuario.dni_vocero;";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método que cambia el estatus de una vocería, es decir de habilitado a desahabilitado o lo contrario.	
	public function eliminarVoceria($id,$elimina)
		{
		if($elimina==0)
			$elimina=1;
		else
			$elimina=0;
		$sql="UPDATE voceria SET eliminado='$elimina', estatus='0' WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Se elimina o restuara los registros depdneintes de voceria
	public function	eliminarVoceroDependienteDeVoceria($id,$elimina)
		{
		if($elimina==0)
			$elimina=1;
		else
			$elimina=0;	
		$sql="UPDATE vocero 
		SET vocero.eliminado='$elimina',vocero.estatus='0' 
		WHERE vocero.id_voceria='$id';";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para eliminar/restaurar al o a los usuarios que pertencezcac a la vocería eliminada/restaurada
	public function	eliminarUsuarioDependienteDeVoceria($id,$elimina)
		{
		if($elimina==0)
			$elimina=1;
		else
			$elimina=0;		
		$sql="UPDATE usuario,vocero
		SET usuario.eliminado='$elimina', usuario.estatus='0' 
		WHERE vocero.id_voceria='$id'
		AND vocero.dni_vocero=usuario.dni_vocero;";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	}
?>
