<?php

class Tarea extends Database
{
	private $strTabla;

	public function __construct() {
		parent::__construct();
	}

	public function __destruct() {
		$this->closeConnection();
	}

	public function getTareas(string $tabla) {
		$this->strTabla = $tabla;
		$res = $this->query("SELECT * FROM $this->strTabla ORDER BY orden ASC");
		return $this->fetchData($res);
	}

	public function ordenarTareas($tareasOrdenadas, string $tabla) {
		$this->strTabla = $tabla;
		foreach ($tareasOrdenadas as $tarea) {
				/*Accedemos a la propiedad como si fuera un objeto, ya que lo que estamos enviado desde JS es el objetos de JSON que viene de 'sortedData'*/
				$this->query("UPDATE $this->strTabla set orden = $tarea->orden WHERE id = $tarea->id");
		}
	}

	public function crearPartido($nombre, string $tabla) {
		$this->strTabla = $tabla;
		$result = $this->query("SELECT count(*) as total FROM $this->strTabla");
		$data = $this->fetchData($result);
		$orden = ($data[0]['total'] + 1);
		$this->query("INSERT INTO $this->strTabla (partido, orden) VALUES ('$partido', $orden)");

		/*Devolvemos el 'id' por medio de la instancia de la base de datos por medio de insert_id, que devuelve el ultimo id autogenerado de la BBDD*/
		return $this->getConnectionInstance()->insert_id;
	}
}

?>