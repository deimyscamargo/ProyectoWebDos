$( document ).ready(function() {
    cargarDatosPaciente();
});

function cargarDatosPaciente(){
    let txtIdCita = document.getElementById('citas_idcita');

    try{
        $.ajax({
            url: '../controladores/controladorcliente2.php',
            type: 'POST',
            data: {"accion" : "buscarPersona",
                    "search" : txtIdCita.value
                },
            dataType: 'json',
            success: function(msj) {
                //Seleccionar el combo a llenar
                let tipoIdentificacion =document.getElementById( "tipoIdentificacion");
                let identificador = document.getElementById( "identificador");
                let nombres = document.getElementById( "nombres");
                let apellidos =document.getElementById( "apellidos");
                let direccionDeResidencia = document.getElementById( "direccionDeResidencia");
                let numeroCelular = document.getElementById( "numeroCelular");
                let numeroCelularAcompanante =document.getElementById( "numeroCelularAcompanante");
                let correoElectronico = document.getElementById( "correoElectronico");
                let correoAcompanante = document.getElementById( "correoAcompanante");
                // numId.value = "";
                
                for (var idx in msj){
                    tipoIdentificacion.value = msj[idx].tipoIdentificacion;
                    identificador.value = msj[idx].identificador;
                    nombres.value = msj[idx].nombres;
                    apellidos.value = msj[idx].apellidos;
                    direccionDeResidencia.value = msj[idx].direccionDeResidencia;
                    numeroCelular.value = msj[idx].numeroCelular;
                    numeroCelularAcompanante.value = msj[idx].numeroCelularAcompanante;
                    correoElectronico.value = msj[idx].correoElectronico;
                    correoAcompanante.value = msj[idx].correoAcompanante;
                    // console.log( numId );
                }
                
            },
            error: function (msj){
                alert("Llenar el Combo ERROR: " + msj.description );	
            }
        });
    }catch( miError ){
        if( miError.description ){
            alert("Error detectado (Descr): " + miError.description );
        }else{
            alert("Error detectado (Error): " + miError );
        }
    }
    

}
