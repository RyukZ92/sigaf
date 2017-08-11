<?php
class Proyecto
	{
	private $proyecto;
	public function __construct()
		{
		$this->proyecto=array();
		}
	//Métod para ingresar un nuevo proyecto
	public function agregarProyecto($titulo,$tipo_proyecto,$precio_estimado,$resumen,$autor_voceria)
		{
		$sql="INSERT INTO proyecto (titulo, tipo,presupuesto_estimado,resumen,autor_voceria) 
		VALUES ('$titulo','$tipo_proyecto','$precio_estimado','$resumen','$autor_voceria');";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}			
	//Método para obtener los datos de un proyecto específico por medio de us ID.
	public function consultarProyectoPorId($id)
		{
		$sql="SELECT proyecto.*,proyecto.id as id_p,voceria.id,voceria.nombre FROM proyecto,voceria WHERE proyecto.id='$id' AND autor_voceria=voceria.id;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->proyecto[]=$reg;
				}
			}
		return $this->proyecto;
		}	
	//Mpetodo para consultar todos los proyectos
	public function consultarProyecto()
		{
		$sql="SELECT proyecto.*,proyecto.id as id_p,voceria.id,voceria.nombre FROM proyecto,voceria WHERE autor_voceria=voceria.id;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->proyecto[]=$reg;
				}
			}
		return $this->proyecto;
		}
	//Método para verificar si el título del proyecto ya existe
	public function verificarTituloProyecto($titulo)
		{
		$sql="SELECT titulo FROM proyecto WHERE titulo='$titulo';";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}
	//Método para actualizar el proyecto a estatus de Aprobado o No aprobados
	public function actualizarProyectoEnEspera($id,$fecha_i,$fecha_f,$presupuesto,$estatus)
		{
		$sql="UPDATE proyecto 
		SET fecha_inicial_estimada='$fecha_i',fecha_final_estimada='$fecha_f', presupuesto_aprobado='$presupuesto', estatus='$estatus'
		WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para actualizar el proyecto a estatus de Aprobado a En ejecución
	public function actualizarProyectoAprobado($id,$fecha_i,$estatus)
		{
		$sql="UPDATE proyecto 
		SET fecha_inicio='$fecha_i',estatus='$estatus'
		WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}	
	//Método para actualizar el proyecto a estatus En ejecución a Finalizado o No finalizado
	public function actualizarProyectoEjecucion($id,$fecha_f,$estatus)
		{
		$sql="UPDATE proyecto 
		SET fecha_final='$fecha_f', estatus='$estatus'
		WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}	
	//Método para actualizar el proyecto a estatus No finalizados a En espera.
	public function actualizarProyectoNoFinalizado($id,$titulo,$tipo,$resumen,$voceria,$estatus)
		{
		$sql="UPDATE proyecto 
		SET titulo='$titulo',tipo='$tipo',resumen='$resumen', estatus='$estatus'
		WHERE id='$id'";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para obtener datos de un preyecto específico mediante su ID.
	public function consultarProyectoDetallePorId($id)
		{
		$sql="SELECT proyecto.*,voceria.nombre 
		FROM proyecto,voceria 
		WHERE proyecto.autor_voceria=voceria.id
		AND proyecto.id='$id'";
		$res=Conectar::conexion()->query($sql);
		if($res)
			{
			while($reg=$res->fetch_assoc())
				{
				$this->proyecto[]=$reg;
				}
			}
		return $this->proyecto;
		}
	}

?>
