<?php
// echo '<br>Hola<br>';
class Familia
	{
	private $persona;
	public function __construct()
		{
		$this->persona=array();
		}
	//Método para ingresar al jefe familiar
	public function agregarDniRepFamilia($dni,$subsidio_habitacional,$solicitud_vivienda,$seguro_social)
		{
		$sql="INSERT INTO familia (dni_rep,subsidio_habitacional,solicitud_vivienda,seguro_social) 
		VALUES ('$dni','$subsidio_habitacional','$solicitud_vivienda','$seguro_social')";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}		
	//Método que se usa para agregar el representante familiar.
	public function agregarRepFamilia($tipo_dni, $dni, $id_rep, $nombre, $apellido, $fecha_nac, $estado_civil, $situacion_conyugal, $sexo, $nivel_instruccion, $ano_residencia, $telefono, $email, $empleo, $profesion, $enfermedad)
		{
		$sql="INSERT INTO persona(tipo_dni, dni,id_rep, nombre, apellido, fecha_nac, estado_civil, situacion_conyugal, sexo, nivel_instruccion, anio_residencia, telefono, email, empleo, profesion, enfermedad,parentesco)
		VALUES('$tipo_dni', '$dni', '$id_rep','$nombre', '$apellido', '$fecha_nac', '$estado_civil', '$situacion_conyugal', '$sexo', '$nivel_instruccion', '$ano_residencia', '$telefono', '$email', '$empleo', '$profesion', '$enfermedad','Representante')";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método que se usa para agregar a miembros de familia perteneciente a un representante familia específico.		
	public function agregarMiembroFamilia($tipo_dni,$dni,$id_rep,$nombre,$apellido,$fecha_nac,$sexo,$parentesco,$nivel_instruccion,$habilidad_trabajo,$profesion,$enfermedad,$discapacidad,$anio_residencia)
		{
		$sql="INSERT INTO persona(tipo_dni, dni, id_rep, nombre, apellido, fecha_nac, sexo, parentesco, nivel_instruccion, habilidad_trabajo, profesion, enfermedad, discapacidad, anio_residencia) 
		VALUES('$tipo_dni','$dni','$id_rep','$nombre','$apellido','$fecha_nac','$sexo','$parentesco','$nivel_instruccion','$habilidad_trabajo','$profesion','$enfermedad','$discapacidad','$anio_residencia')";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para obtener una persona por medio del documento de identidad
	public function consultarPersonaDni($dni)
		{
		$sql="SELECT persona.*,persona.id AS id_p,sector,
		CURDATE(),(YEAR(CURDATE())-YEAR(fecha_nac))-(RIGHT(CURDATE(),5)<RIGHT(fecha_nac,5)) AS edad,dni_rep, direccion.*,parroquia.nombre_parroquia,municipio.nombre_municipio,estado.nombre_estado
		FROM persona, familia, direccion, parroquia, municipio, estado
		WHERE dni= '$dni'
		AND id_rep=familia.id
		AND familia.id=id_rep_familia
		AND direccion.id_parroquia=parroquia.id
		AND municipio_id=municipio.id
		AND estado_id=estado.id;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->persona[]=$reg;
				}
			}
		return $this->persona;
		}
	//Método para obtener una persona (representante familiar) por medio del documento de identidad
	public function consultarRepFamilia($dni)
		{
		$sql="SELECT persona.id, dni, tipo_dni, id_rep, familia.subsidio_habitacional,familia.solicitud_vivienda,familia.seguro_social,
		CURDATE(),(YEAR(CURDATE())-YEAR( fecha_nac ))-(RIGHT(CURDATE(),5 )<RIGHT(fecha_nac,5)) AS edad, 
		nombre, apellido, sexo, sector,numero_casa, empleo
		FROM persona, familia, direccion
		WHERE persona.id_rep = familia.id
		AND familia.id = id_rep_familia
		AND persona.dni = '$dni'
		AND parentesco = 'Representante'
		ORDER BY dni ASC;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->persona[]=$reg;
				}
			}
		return $this->persona;
		}	
	//Método para obtener el id jefe familiar por medio de su documento de identidad
	public function consultarIdRepFamilia($dni)
		{
		$sql="
		SELECT id
		FROM familia
		WHERE dni_rep='$dni'";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->persona[]=$reg;
				}
			}
		return $this->persona;
		}
	//Método que se encarga de consultar un grupo familiar específico
	public function consultarGrupoFamiliar($id)
		{
		$sql="SELECT persona.*,dni_rep,id_rep,parentesco,direccion.*,
		CURDATE(),(YEAR( CURDATE())-YEAR(fecha_nac))-(RIGHT(CURDATE(),5)<RIGHT(fecha_nac,5)) AS edad
		FROM persona,familia,direccion
		WHERE familia.id=persona.id_rep
		AND familia.id=direccion.id_rep_familia
		AND fallecido='0'
		AND persona.id_rep='$id'
		ORDER BY mudado ASC,edad DESC;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->persona[]=$reg;
				}
			}
		return $this->persona;
		}
	//Método utilizado para actualizar o cambiar al representante de una familia
	public function actualizarRepresentanteFamiliar($id,$dni,$subsidio_habitacional,$solicitud_vivienda,$seguro_social)
		{
		$sql="UPDATE familia 
		SET dni_rep='$dni',subsidio_habitacional='$subsidio_habitacional',solicitud_vivienda='$solicitud_vivienda',seguro_social='$seguro_social' 
		WHERE id='$id';";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método utilizada para actualizar los datos de una personas que es el representante de la familia
	public function actualizarPersonaRep($id,$tipo_dni,$dni,$nombre,$apellido,$fecha,$estado_civil,$situacion_conyugal,$sexo,$nivel_instruccion,$anio_residencia,$telefono,$email,$empleo,$profesion,$enfermedad,$mudado,$fallecido)
		{
		$sql="UPDATE persona 
		SET tipo_dni='$tipo_dni',dni='$dni',nombre='$nombre',apellido='$apellido',fecha_nac='$fecha',estado_civil='$estado_civil',situacion_conyugal='$situacion_conyugal',sexo='$sexo',nivel_instruccion='$nivel_instruccion',anio_residencia='$anio_residencia',telefono='$telefono',email='$email',empleo='$empleo',profesion='$profesion',enfermedad='$enfermedad',mudado='$mudado',fallecido='$fallecido'
		WHERE id='$id';";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método utilizado para actualizar los datos de una persona
	public function actualizarPersona($id,$tipo_dni,$dni,$nombre,$apellido,$fecha_nac,$sexo,$parentesco,$nivel_instruccion,$habilidad_trabajo,$profesion,$enfermedad,$discapacidad,$anio_residencia,$fallecido,$mudado)
		{
		$sql="UPDATE persona 
		SET tipo_dni='$tipo_dni',dni='$dni',nombre='$nombre',apellido='$apellido',fecha_nac='$fecha_nac',sexo='$sexo',parentesco='$parentesco',nivel_instruccion='$nivel_instruccion',habilidad_trabajo='$habilidad_trabajo',profesion='$profesion',enfermedad='$enfermedad',discapacidad='$discapacidad',anio_residencia='$anio_residencia',fallecido='$fallecido',mudado='$mudado' 
		WHERE id='$id';";	
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Actualizar estatus del vocero depediente de la persona a la que está ligada con sus datos personales
	public function actualizarEstatusVoceroDependienteDePersona($dni,$estatus)
		{
		$sql="UPDATE vocero SET estatus='$estatus' WHERE dni_vocero='$dni';";	
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Actualizar estatus del usuario depediente de la persona a la que está ligada con sus datos personales
	public function actualizarEstatusUsuarioDependienteDePersona($dni,$estatus)
		{
		$sql="UPDATE usuario SET estatus='$estatus' WHERE dni_vocero='$dni';";	
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Actualizar estatus del vocero depediente de la persona a la que está ligada con sus datos personales
	public function eliminarEstatusVoceroDependienteDePersona($dni,$elimina)
		{
		$sql="UPDATE vocero SET eliminado='$elimina' WHERE dni_vocero='$dni';";	
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Actualizar estatus del usuario depediente de la persona a la que está ligada con sus datos personales
	public function eliminarEstatusUsuarioDependienteDePersona($dni,$elimina)
		{
		$sql="UPDATE usuario SET eliminado='$elimina' WHERE dni_vocero='$dni';";	
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método utilizado para mover una miembro familiar a una nueva familia siendo este mismo el representante de la nueva familia creada.
	public function moverMiembroNuevaFamilia($dni,$id,$nombre,$apellido,$fecha_nac,$estado_civil,$situacion_conyugal,$sexo,$nivel_instruccion,$anio_residencia,$telefono,$email,$empleo,$profesion,$enfermedad)
		{
		$sql="UPDATE persona SET id_rep='$id',parentesco='Representante',nombre='$nombre',apellido='$apellido',fecha_nac='$fecha_nac',estado_civil='$estado_civil',situacion_conyugal='$situacion_conyugal',sexo='$sexo',nivel_instruccion='$nivel_instruccion',anio_residencia='$anio_residencia',telefono='$telefono',email='$email',empleo='$empleo',profesion='$profesion',enfermedad='$enfermedad' 
		WHERE dni='$dni';";	
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	public function moverMiembroFamiliaExistente($tipo_dni,$dni,$id,$nombre,$apellido,$fecha_nac,$sexo,$parentesco,$nivel_instruccion,$habilidad_trabajo,$profesion,$enfermedad,$discapacidad)
		{
		$sql="UPDATE persona SET id_rep='$id',nombre='$nombre',apellido='$apellido',fecha_nac='$fecha_nac',sexo='$sexo',parentesco='$parentesco',nivel_instruccion='$nivel_instruccion',habilidad_trabajo='$habilidad_trabajo',profesion='$profesion',enfermedad='$enfermedad',discapacidad='$discapacidad'
		WHERE dni='$dni';";	
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para obtener los datos de las personas del censo familiar
	public function consultarPersona()
		{
		$sql="SELECT * FROM persona WHERE fallecido='0' AND mudado='0' ORDER BY dni ASC;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->persona[]=$reg;
				}
			}
		return $this->persona;
		}
	//Método para obtener las personas del censo familiar que tienen derecho a sufragio de consejos comunales (local)
	public function consultarPersonaVotante()
		{
		$sql="SELECT persona.id, dni, tipo_dni, CURDATE(),(YEAR(CURDATE())-YEAR(fecha_nac))-(RIGHT(CURDATE(),5)<RIGHT(fecha_nac,5)) AS edad,
		nombre,apellido,sexo,sector
		FROM persona,familia,direccion
		WHERE familia.id=persona.id_rep
		AND familia.id=direccion.id_rep_familia
		AND fallecido='0'
		AND mudado='0' 
		ORDER BY dni ASC;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->persona[]=$reg;
				}
			}
		return $this->persona;
		}
	//Método para obtener datos de las personas del censo familiar mediante edades o fechas de nacimientos
	public function consultarPersonaPorFecha($fecha_i,$fecha_f)
		{
		$sql="SELECT sexo
		FROM persona
		WHERE fecha_nac
		BETWEEN  '$fecha_i'
		AND  '$fecha_f'
		AND fallecido='0'
		AND mudado='0'
		ORDER BY fecha_nac DESC";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->persona[]=$reg;
				}
			}
		return $this->persona;
		}
	//Método para obtener todas las familias registradas
	public function consultarFamilia()
		{
		$sql="SELECT persona.id, dni, tipo_dni,id_rep,
	CURDATE(),(YEAR( CURDATE())-YEAR(fecha_nac))-(RIGHT(CURDATE(),5)<RIGHT(fecha_nac,5)) AS edad, 
	nombre, apellido, sexo, sector, empleo
	FROM persona, familia, direccion
	WHERE persona.id_rep = familia.id
	AND familia.id = id_rep_familia
	AND persona.dni = familia.dni_rep
	AND persona.mudado='0'
	AND persona.fallecido='0'
	ORDER BY dni ASC;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->persona[]=$reg;
				}
			}
		return $this->persona;
		}
	}
?>
