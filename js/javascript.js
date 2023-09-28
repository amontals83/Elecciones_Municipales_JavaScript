
window.onload = () => {

/*------------------------MOVER PARTIDO---------------------*/	
	
	const sortable = new Sortable.default(document.querySelectorAll('ul'), {draggable: 'li'});

	//sortable.on('sortable:start', () => console.log('start'));
	//sortable.on('sortable:start', () => console.log('sorted'));
	sortable.on('sortable:stop', () => {
		setTimeout(() => {
			const tareas = document.getElementsByClassName('tarea');
			const sortedData = new Array();
			/*Spread Operator para convertir el HTMLCollection en array
			y asi recorrer los 'li' y a cada uno se le asigna un index para
			determinar su posicion en la tabla*/
			[...tareas].forEach((tarea, index) => {
				//console.log(tarea.getAttribute('data-id'), (index+1));
				sortedData.push({
					id: tarea.getAttribute('data-id'), 
					orden: (index + 1)
				});
			})
			//Creamos un objeto para guardar el JSON
			let formData = new FormData();
			/*Añadimos datos y convertimos 'sortedData' en string
			para enviar un JSON al servidor*/
			formData.append('data', JSON.stringify(sortedData));
			//console.log(JSON.stringify(sortedData));

			/*Para las peticiones asinconas con Ajax, crearemos promesas con 
			Axios. Creamos el archivo y pasamos los datos. Si la promesa es
			satisfactoria: 'then', si no, 'catch*/
			axios.post('app/api/ordenarTareas.php', formData)
				.then(res => console.log(res))
				.catch(err => console.log(err));
		}, 100);		
	});
}

function clickPartido(elemento){
	elemento.style.opacity = "0.5";
};

function unclickPartido(elemento){
	elemento.style.opacity = "1.0";
};