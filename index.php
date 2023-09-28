<?php
	
	require_once('app/Config.php');
	require_once('app/Database.php');
	require_once('app/Tarea.php');

	//$tabla = "tareas";
	
	$tareas = (new Tarea())->getTareas(DB_TABLE);
	
	/*var_dump($tareas);
	die();*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Drag & Drop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<h1>COMUNIDAD DE MADRID</h1>
		<div class="filas">
			<div class="listPosicion">
				<?php foreach ($tareas as $tarea): ?>
					<div class="elemPosicion">
						<p><?php echo $tarea['orden']; ?></p>
					</div>
				<?php endforeach; ?>
			</div>
			<ul class="tareas" id="tareas">
				<?php foreach ($tareas as $tarea): ?>
					<li class="tarea" data-id="<?php echo $tarea['id']; ?>" onmouseenter="clickPartido(this)" onmouseleave="unclickPartido(this)">
						<div class="bloqueIzq">
							<img class="imgPartido" src="img/<?php echo $tarea['codigo']; ?>">
							<p><?php echo $tarea['partido']; ?></p>
						</div>
						<div class="bloqueDch">
							<p class="escano"><?php echo $tarea['escano']; ?></p>
							<img class="imgDrag" src="img/drag.png" alt="Coger y soltar">
						</div>					
					</li>
				<?php endforeach; ?>			
			</ul>
		</div>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/draggable/1.0.0-beta.12/sortable.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.6/axios.min.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>

</body>
</html>