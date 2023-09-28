<?php

	require_once('../Config.php');
	require_once('../Database.php');
	require_once('../Tarea.php');

	/*Recibimos la variable 'data' de 'formData' por metodo POST*/
	$data = $_POST['data'];
	//Convertimos un json en un array
	$tareasOrdenadas = json_decode($data);
	//Llamamos al método del modelo y pasamos los parametros
	(new Tarea())->ordenarTareas($tareasOrdenadas, DB_TABLE);

?>