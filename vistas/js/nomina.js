const addBtn = document.querySelector(".search");
const inpSea = document.querySelector(".datoaBuscar");


function buscarPersona(){
    
    buscarPersonaAjax();
    
}

addBtn.addEventListener("click", buscarPersona);


function colocarSalario(){
    
    let txtSalario = document.getElementById( "salario");
    let selElemento = document.getElementById( "cargos_idcargo"); 

    if( selElemento ){
        txtSalario.value = "0";
        if( selElemento.selectedIndex > 0 ){
            var seleccionado = selElemento.options[selElemento.selectedIndex];
            txtSalario.value = seleccionado.getAttribute("data-salario");
        }
    }
}


function buscarPersonaAjax(){
    try{
        $.ajax({
            url: '../controladores/controladornomina2.php',
            type: 'POST',
            data: {"accion" : "buscarPersona",
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
                    numId.value = msj[idx].numeroIdentificacion;
                    nom.value = msj[idx].nombres;
                    ape.value = msj[idx].apellidos;
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