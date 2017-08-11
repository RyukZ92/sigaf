<?php
class LibroInventario
	{
	private $patrimonio;
	public function __construct()
		{
		$this->patrimonio=array();
		}
	//étod para ingresar un nuevo patrimonio del consejo comunal
	public function agregarPatrimonio($descripcion,$codigo,$cantidad,$precio_unitario)
		{
		$sql="INSERT INTO libro_inventario (descripcion,codigo,cantidad,precio_unitario) 
		VALUES ('$descripcion','$codigo','$cantidad','$precio_unitario');";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}			
	public function consultarPatrimonio()
		{
		$sql="SELECT * FROM libro_inventario;";
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
	//Método para obtener los datos de un patrimonio específico por su ID
	public function consultarPatrimonioPorId($id)
		{
		$sql="SELECT * FROM libro_inventario WHERE id='$id';";
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
	//Méotod para obtener un patrimonio por código
	public function consultarPatrimonioPorCodigo($codigo)
		{
		$sql="SELECT id FROM libro_inventario WHERE codigo='$codigo';";
		$res=Conectar::conexion()->query($sql);
		return $res->num_rows;
		}
	public function actualizarPatrimonio($descripcion,$codigo,$cantidad,$precio_unitario,$id)
		{
		$sql="UPDATE libro_inventario 
		SET descripcion='$descripcion',codigo='$codigo',cantidad='$cantidad',precio_unitario='$precio_unitario' 
		WHERE id='$id';";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	}

?>
