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


//////////////////////////////////////////////////


// addBtn.addEventListener("click", addInput);

// function colocarDescripcionServicio(){
    
//     let txtDescripcion = document.getElementById( "descripcion" );
//     let selElemento = document.getElementById( "citas_idcita"); 

//     if( selElemento ){
//         txtDescripcion.value = "";
//         if( selElemento.selectedIndex > 0 ){
//             var seleccionado = selElemento.options[selElemento.selectedIndex];
//             txtDescripcion.value = seleccionado.getAttribute("data-desc");
//         }
//     }
// }



// /////////////////////////////////////////////////////////////////
// //Llenar select elementos
// function llenarSelect( action, combo, tipo ){
    
//     try{
//         $.ajax({
//             url: '../controladores/controladorservicio2.php',
//             type: 'POST',
//             data: {"accion" : action,
//                     "tipo" : tipo 
//                 },
//             dataType: 'json',
//             success: function(msj) {
//                 //Seleccionar el combo a llenar
//                 var sel = $("#"+combo);
//                 sel.empty();
                
//                 sel.append('<option value="-1" data-costo="-1">--Seleccione--</option>');	

//                 for (var idx in msj){
//                     sel.append('<option value="' + msj[idx].indice  + '" data-costo="' + msj[idx].valor + '">' + msj[idx].nombre +'</option>');	
//                 }
                
//             },
//             error: function (msj){
//                 alert("Llenar el Combo ERROR: " + msj.description );	
//             }
//         });
//     }catch( miError ){
//         if( miError.description ){
//             alert("Error detectado (Descr): " + miError.description );
//         }else{
//             alert("Error detectado (Error): " + miError );
//         }
//     }
// }












