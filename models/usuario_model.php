<?php
class Usuario_model
	{
	private $persona;
	public function __construct()
		{
		$this->persona=array();
		}
	//Método que se usa para agregar un nuevo usuario.
	public function agregarUsuario($nombre_usuario,$clave,$pregunta_secreta,$respuesta_secreta,$nivel_usuario,$dni_vocero)
		{
		$clave=md5($clave);
		$respuesta=md5($respuesta_secreta);
		$sql="INSERT INTO usuario (nombre_usuario, clave, pregunta_secreta, respuesta_secreta, nivel_usuario,fecha_creacion,dni_vocero) 
		VALUES('$nombre_usuario','$clave','$pregunta_secreta','$respuesta','$nivel_usuario',now(),'$dni_vocero')";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para verificar si el DNI existe en el sistema
	public function verificarNombreUsuario($nombre)
		{
		$sql="SELECT nombre_usuario
		FROM usuario
		WHERE nombre_usuario='$nombre';";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}
	//Método utilizada para verificar y obtener datos del inció de sesión del usuario
	public function inicioSesion($usuario,$clave)
		{
		$clave=md5($clave);
		$sql="SELECT * FROM usuario WHERE nombre_usuario='$usuario'	AND clave='$clave'";
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
	//Método utilizado para consultar todos los usuarios
	public function consultarUsuario()
		{
		$sql="SELECT * FROM usuario ORDER BY estatus ASC";
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
	//Método que permite consultar a un usuario por su Documento de Identidad	
	public function consultarUsuarioPorDni($dni)
		{
		$sql="SELECT usuario.id, nivel_usuario,persona.nombre,persona.apellido,persona.sexo,pregunta_secreta,respuesta_secreta,usuario.dni_vocero,usuario.estatus
		FROM vocero,persona,usuario
		WHERE usuario.dni_vocero = '$dni'
		AND usuario.dni_vocero = vocero.dni_vocero
		AND vocero.dni_vocero = persona.dni";
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
	//Método que permite consultar a un usuario por su ID
	public function consultarUsuarioPorId($id)
		{
		$sql="SELECT usuario.* FROM usuario WHERE id='$id'";
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
	//Método que procesa la actualización de un registro de cualquier tipo de usuario.
	public function modificarUsuario($id,$nombre_usuario,$estatus,$nivel_usuario)
		{	
		$sql="UPDATE usuario 
		SET nombre_usuario='$nombre_usuario',estatus='$estatus',nivel_usuario='$nivel_usuario'
		WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;	
		}
	public function eliminarUsuario($id,$eliminado)
		{
		$eliminado=$eliminado==0?'1':'0';
		$sql="UPDATE usuario SET eliminado='$eliminado', estatus='0' WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método utiliado para procesar cambio de clave del usuario
	public function cambiarClave($dni,$clave)
		{
		$clave=md5($clave);
		$sql="UPDATE usuario SET clave='$clave' WHERE dni_vocero='$dni'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	}
?>
