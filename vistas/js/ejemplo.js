const labels = ['Tipo 1', 'Tipo 2', 'Tipo 3', 'Tipo 4']

const graph = document.querySelector("#grafica");

const data = {
	labels: labels,
	datasets: [{
		label:"Tipo de servicio",
		data: [10000000, 20000000, 3000000, 4000000],
		backgroundColor: 'rgba(9, 129, 176, 0.2)'
	}]
};

const config = {
	type: 'bar',
	data: data,
	};
new Chart(graph, config);
/////////////////////////////////////

const labels2 = ['Semanal', 'Quincenal', 'Mensual']

const graph2 = document.querySelector("#grafica2");

const data2 = {
	labels: labels2,
	datasets: [{
		label:"Importe por Mes, Quincena o Semana",
		data: [10000000, 20000000, 3000000, 4000000],
		backgroundColor: 'rgba(213, 245, 227 )'
	}]
};

const config2 = {
	type: 'bar',
	data: data2,
	};
new Chart(graph2, config2);

///////////////////////////////////////////////
const labels3 = ['Factor 1', 'Factor 2', 'Factor 3', 'Factor 4']

const graph3 = document.querySelector("#grafica3");

const data3 = {
	labels: labels3,
	datasets: [{
		label:"Evolución de clientes(Positiva o Negativa)",
		data: [10,20,30,40,50],
		backgroundColor: 'rgba(235, 222, 240)'
	}]
};

const config3 = {
	type: 'bar',
	data: data3,
	};
new Chart(graph3, config3);