const addBtn = document.querySelector(".search");
const inpSea = document.querySelector(".datoaBuscar");


function buscarCliente(){
    buscarClientesAjax();
}

addBtn.addEventListener("click", buscarCliente);

// function colocarHoraCita(){
//     console.log( "00:00:00 " + (document.getElementById( "horaCita").value ) + ":00");
//     let txtHora2 = document.getElementById( "horaCita2");
//     let txthora1 = document.getElementById( "horaCita"); 

//     txtHora2.value = "00:00:00 " + txthora1.value + ":00";
        
    
// }

function buscarClientesAjax(){
    try{
        $.ajax({
            url: '../controladores/controladorcita2.php',
            type: 'POST',
            data: {"accion" : "buscarCliente",
                    "search" : inpSea.value
                },
            dataType: 'json',
            success: function(msj) {
                //Seleccionar el combo a llenar
                let numId =document.getElementById( "numeroIdentificacion");
                let nom = document.getElementById( "nombres");
                let ape = document.getElementById( "apellidos");
                numId.value = "";
                
                for (var idx in msj){
                    numId.value = msj[idx].identificador;
                    nom.value = msj[idx].nombres;
                    ape.value = msj[idx].apellidos;
                    // console.log( numId );
                }
                
            },
            error: function (msj){
                alert("Búscando cliente ERROR: " + msj.description );	
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