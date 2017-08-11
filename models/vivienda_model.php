<?php
// echo '<br>Hola<br>';
class Vivienda
	{
	private $vivienda;
	public function __construct()
		{
		$this->vivienda=array();
		}
	//Método que se usa para agregar a la vivienda familiar.
	public function agregarVivienda($tipo_vivienda, $ocupacion_vivienda, $uso_vivienda, $tipo_techo, $tipo_paredes, $tipo_piso, $nivel_vivienda, $propiedad_vivienda, $banio, $dormitorio, $cocina, $nevera, $aguas_blancas, $gas, $electricidad, $tv_radio,$observacion, $id_rep_familia)
		{
		$sql="INSERT INTO vivienda(tipo_vivienda, ocupacion_vivienda, uso_vivienda, tipo_techo, tipo_paredes, tipo_piso, nivel_vivienda, propiedad_vivienda, banio, dormitorio, cocina, nevera, aguas_blancas, gas, electricidad, tv_radio, observacion, id_rep_familia) 
		VALUES('$tipo_vivienda', '$ocupacion_vivienda', '$uso_vivienda', '$tipo_techo', '$tipo_paredes', '$tipo_piso', '$nivel_vivienda', '$propiedad_vivienda', '$banio', '$dormitorio', '$cocina', '$nevera', '$aguas_blancas', '$gas', '$electricidad', '$tv_radio','$observacion', '$id_rep_familia');";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	//Método para consultar una vivienda familiar específica (por ID)
	public function consultarViviendaPorIdFamilia($id)
		{
		$sql="SELECT vivienda.*,sector,persona.nombre,persona.apellido,persona.dni,persona.tipo_dni
		FROM vivienda,familia,direccion,persona
		WHERE vivienda.id_rep_familia='$id'
		AND vivienda.id_rep_familia=familia.id
		AND familia.id=persona.id_rep
		AND persona.parentesco='Representante'
		AND familia.id=direccion.id_rep_familia;";
		$res=Conectar::conexion()->query($sql);
		if($res)
			while($reg=$res->fetch_assoc())
				$this->vivienda[]=$reg;
		return $this->vivienda;			
		}
	//Método que procesa la actualiación de los datos de una vivienda específica
	public function actualizarVivienda($tipo_vivienda, $ocupacion_vivienda, $uso_vivienda, $tipo_techo, $tipo_paredes, $tipo_piso, $nivel_vivienda, $propiedad_vivienda, $banio, $dormitorio, $cocina, $nevera, $aguas_blancas, $gas, $electricidad, $tv_radio,$observacion, $id_rep_familia)
		{
		$sql="UPDATE vivienda 
		SET tipo_vivienda='$tipo_vivienda', ocupacion_vivienda='$ocupacion_vivienda', uso_vivienda='$uso_vivienda', tipo_techo='$tipo_techo', tipo_paredes='$tipo_paredes', tipo_piso='$tipo_piso', nivel_vivienda='$nivel_vivienda', propiedad_vivienda='$propiedad_vivienda', banio='$banio', dormitorio='$dormitorio', cocina='$cocina', nevera='$nevera', aguas_blancas='$aguas_blancas', gas='$gas', electricidad='$electricidad', tv_radio='$tv_radio', observacion='$observacion'
		Where id_rep_familia='$id_rep_familia';";
		$res=Conectar::conexion()->query($sql);
		return $res;
		}
	}
	?>
