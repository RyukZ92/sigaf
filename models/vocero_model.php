<?php
class Vocero
	{
	private $vocero;
	public function __construct()
		{
		$this->vocero=array();
		}
	//Método que se usa para agregar un nuevo vocero.
	public function agregarVocero($dni,$fecha_vigencia,$voceria,$tipo_miembro,$telefono)
		{
		$sql="INSERT INTO vocero (dni_vocero,fecha_vigencia,id_voceria,tipo_miembro,telefono_vocero) 
		VALUES('$dni','$fecha_vigencia','$voceria','$tipo_miembro','$telefono');";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para asignar firmantes de las constancias de residencia
	public function asignarVoceroFirmanteCuentadante($dni)
		{
		$sql="UPDATE vocero 
		SET firmante='1'
		WHERE dni_vocero='$dni'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método poara asignar voceros firmantes a la constancia de buena conducta y bajos recursos
	public function asignarVoceroOtroFirmante($dni)
		{
		$sql="UPDATE vocero 
		SET firmante='2'
		WHERE dni_vocero='$dni'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método utilizado para consultar todos los voceros
	public function consultarVocero()
		{
		$sql="SELECT vocero.id,vocero.id_voceria, tipo_dni, dni_vocero, tipo_miembro, persona.nombre, persona.apellido, telefono_vocero, vocero.estatus, firmante, vocero.fecha_vigencia,voceria.nombre AS voceria
		FROM vocero, persona, voceria
		WHERE vocero.dni_vocero = persona.dni
		AND id_voceria = voceria.id
		AND vocero.eliminado=0
		ORDER BY voceria ASC;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->vocero[]=$reg;
				}
			}
		return $this->vocero;
		}

	//Método utilizado para consultar todos los voceros firmantes (tres firmantes cuentadante)
	public function consultarFirmanteCuentadantesVocero()
		{
		$sql="SELECT vocero.id,tipo_dni,dni_vocero,persona.nombre,apellido,telefono_vocero,vocero.fecha_vigencia,vocero.estatus,voceria.nombre as nombre_voceria
		FROM vocero,persona,voceria
		WHERE dni_vocero=dni
		AND vocero.id_voceria=voceria.id
		AND firmante='1'
		ORDER BY vocero.dni_vocero ASC	";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->vocero[]=$reg;
				}
			}
		return $this->vocero;
		}
//Método utilizado para consultar todos los voceros firmantes (tres firmantes de las constancias de bajos recursos y buena conducta)
	public function consultarOtroFirmanteVocero()
		{
		$sql="SELECT vocero.id,tipo_dni,dni_vocero,persona.nombre,apellido,telefono_vocero,vocero.fecha_vigencia,vocero.estatus,voceria.nombre as nombre_voceria
		FROM vocero,persona,voceria
		WHERE dni_vocero=dni
		AND vocero.id_voceria=voceria.id
		AND firmante='2'
		ORDER BY vocero.dni_vocero ASC	";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->vocero[]=$reg;
				}
			}
		return $this->vocero;
		}
	//Método que se utiliza para verificar si el vocero existe
	public function verificarDni($dni)
		{
		$sql="SELECT dni_vocero FROM vocero WHERE dni_vocero='$dni';";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}
	//Método que permite eliminar un firmante específico
	public function eliminarFirmanteVocero($id)
		{
		$sql="UPDATE vocero SET firmante='0' WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método que permite verificar o comprobar si el vocero que asignan como firmante ya ha sido asignado anteriormente y se enceuntra como firmante actual.
	public function verificarFirmanteVocero($dni)
		{
		$sql="SELECT id as total 
		FROM vocero 
		WHERE dni_vocero='$dni' 
		AND firmante='1'";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}
	//Método que permite verificar o comprobar si el vocero que asignan como firmante ya ha sido asignado anteriormente y se enceuntra como firmante actual.
	public function verificarOtroFirmanteVocero($dni)
		{
		$sql="SELECT id as total 
		FROM vocero 
		WHERE dni_vocero='$dni' 
		AND firmante='2'";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}
	//Métdo para consultar a un voceros específico mediante su Identificado interno para obtener todos los datos necesarios para realizaciones acciones como edición del vocero.
	public function consultarVoceroPorDni($dni)
		{
		$sql="SELECT voceria.nombre as voceria,voceria.id,vocero.*,persona.nombre, persona.apellido,tipo_dni,vocero.fecha_vigencia,vocero.tipo_miembro
		FROM persona, voceria, vocero
		WHERE vocero.dni_vocero =  '$dni'
		AND id_voceria = voceria.id
		AND dni_vocero = persona.dni;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->vocero[]=$reg;
				}
			}
		return $this->vocero;
		}		
	//Renueva a un vocero al nuevo período del consejo comunal.
	public function renovarVocero($dni,$nva_fecha,$voceria)
		{
		$sql="UPDATE vocero SET estatus='1',fecha_vigencia='$nva_fecha',id_voceria='$voceria' WHERE dni_vocero='$dni'";	
		$res=Conectar::conexion()->query($sql);
		return $res;		
		}
	//Deshabilita voceros
	public function deshabilitaVoceroPorPeriodoVencido($id)
		{
		$sql="UPDATE vocero SET estatus='0' WHERE eliminado='0' AND id='$id';";	
		$res=Conectar::conexion()->query($sql);
		return $res;		
		}	
	//Actualiza vocero al del consejo comunal.
	public function actualizarVocero($dni,$estatus,$tel,$tipo_miembro)
		{
		$sql="UPDATE vocero SET estatus='$estatus',telefono_vocero='$tel',tipo_miembro='$tipo_miembro' WHERE dni_vocero='$dni'";	
		$res=Conectar::conexion()->query($sql);
		return $res;		
		}
	//Actualiza el estatus del usuario en cuanto al estatus de la actualizado del vocero.
	public function actualizarEstatusDependienteDeVocero($dni,$estatus)
		{
		$sql="UPDATE usuario SET usuario.estatus='$estatus' WHERE usuario.dni_vocero='$dni'";	
		$res=Conectar::conexion()->query($sql);
		return $res;		
		}	
	//Métdo para consultar a un voceros específico mediante su Identificado interno para obtener todos los datos necesarios para realizaciones acciones como edición del vocero.
	public function consultarVoceroPorVoceria($voceria)
		{
		$sql="SELECT voceria.nombre AS voceria, voceria.id, vocero. *, persona.nombre, persona.apellido, tipo_dni
		FROM persona, voceria, vocero
		WHERE vocero.id_voceria =  '$voceria'
		AND id_voceria = voceria.id
		AND dni_vocero = persona.dni";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->vocero[]=$reg;
				}
			}
		return $this->vocero;
		}		
	//Método que cambia el estatus de un vocero específico, es decir de cambiar de habilitado a desahabilitado o biseversa.	
	public function eliminarVocero($id,$elimina)
		{
		if($elimina==0)
			$elimina=1;
		else
			$elimina=0;
		$sql="UPDATE vocero SET eliminado='$elimina', estatus='0' WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método que elimina el usuario dependiente, es decir de acciona si el vocero es eliminado o restaurado.	
	public function eliminarRegistroDependienteDeVocero($dni,$elimina)
		{
		if($elimina==0)
			$elimina=1;
		else
			$elimina=0;
		$sql="UPDATE usuario SET eliminado='$elimina', estatus='0' WHERE dni_vocero='$dni'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	}
?>