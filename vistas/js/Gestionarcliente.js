const labels = ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4']

const graph = document.querySelector("#grafica");

const data = {
	labels: labels,
	datasets: [{
		label:"Tipo de servicio",
		data: [10, 20, 30, 40],
		backgroundColor: 'rgb(0, 0, 139)'
	}]
};

const config = {
	type: 'bar',
	data: data,
	};
new Chart(graph, config);
