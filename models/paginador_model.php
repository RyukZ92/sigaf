<?php
// require_once'../db/db.php';
#Fuente: CesarCancino.com
class Paginador
	{
	private $_datos;
	private $_paginacion;
	public function __construct()
		{
		$this->_datos=array();
		$this->_paginacion=array();
		}
	public function paginar($query,$pagina=false,$limite=false)
		{
		
		if($limite&&is_numeric($limite))
			{
			$limite=$limite;
			}
		else
			{
			$limite=10;
			}
		if($pagina&&is_numeric($pagina))
			{
			$pagina=$pagina;
			$inicio=($pagina-1)*$limite;
			}
		else
			{
			$pagina=1;
			$inicio=0;
			}
		//Se consulta todos los registros
		$consulta=Conectar::conexion()->query($query);
		$registros=$consulta->num_rows; //Se obtiene el total de los registros
		$total=ceil($registros/$limite);
		//Se modifica la consultar, dandole un limite y un inicio de cuando registros me tiene que dar.
		$query="$query LIMIT $inicio, $limite"; 
		$consulta=Conectar::conexion()->query($query);
		
	#	if($consulta) //Si la consulta es correcta hace lo siguiente:
			{
			while($reg=$consulta->fetch_assoc())
				{
				$this->_datos[]=$reg;
				}
				$paginacion=array();
				$paginacion['actual']=$pagina;
				$paginacion['total']=$total;
				if($pagina>1)
					{
					$paginacion['primero']=1;
					$paginacion['anterior']=$pagina-1;
					}
				else
					{
					$paginacion['primero']='';
					$paginacion['anterior']='';
					}
				if($pagina<$total)
					{
					$paginacion['ultimo']=$total;
					$paginacion['siguiente']=$pagina+1;
					}
				else
					{
					$paginacion['ultimo']='';
					$paginacion['siguiente']='';				
					}
				}
			#else
			#	echo "Problemas al traer registros";
			$this->_paginacion=$paginacion;
			return $this->_datos;
		}
	public function getPaginacion()
		{
		if($this->_paginacion)
			{
			return $this->_paginacion;
			}
		else
			{
			return false;
			}
		}

	public function paginar_p($query,$pagina=false,$limite=false)
		{
		
		if($limite&&is_numeric($limite))
			{
			$limite=$limite;
			}
		else
			{
			$limite=5;
			}
		if($pagina&&is_numeric($pagina))
			{
			$pagina=$pagina;
			$inicio=($pagina-1)*$limite;
			}
		else
			{
			$pagina=1;
			$inicio=0;
			}
		//Se consulta todos los registros
		$consulta=Conectar::conexion()->query($query);
		$registros=$consulta->num_rows; //Se obtiene el total de los registros
		$total=ceil($registros/$limite);
		//Se modifica la consultar, dandole un limite y un inicio de cuando registros me tiene que dar.
		$query="$query LIMIT $inicio, $limite"; 
		$consulta=Conectar::conexion()->query($query);
		
	#	if($consulta) //Si la consulta es correcta hace lo siguiente:
			{
			while($reg=$consulta->fetch_assoc())
				{
				$this->_datos[]=$reg;
				}
				$paginacion=array();
				$paginacion['actual']=$pagina;
				$paginacion['total']=$total;
				if($pagina>1)
					{
					$paginacion['primero']=1;
					$paginacion['anterior']=$pagina-1;
					}
				else
					{
					$paginacion['primero']='';
					$paginacion['anterior']='';
					}
				if($pagina<$total)
					{
					$paginacion['ultimo']=$total;
					$paginacion['siguiente']=$pagina+1;
					}
				else
					{
					$paginacion['ultimo']='';
					$paginacion['siguiente']='';				
					}
				}
			#else
			#	echo "Problemas al traer registros";
			$this->_paginacion=$paginacion;
			return $this->_datos;
		}





	}
?>
