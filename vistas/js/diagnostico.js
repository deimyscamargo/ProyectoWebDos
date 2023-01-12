const addBtn = document.querySelector(".add");

const input = document.querySelector(".inp-group");

let iel = 1;

function removeInput(){
    this.parentElement.remove();
}

function addInput(){
    const diagnostico = document.createElement("textarea");
    diagnostico.type = "text";
    diagnostico.cols = "80";
    diagnostico.rows = "3";
    diagnostico.placeholder = "Diagnostico";
    diagnostico.setAttribute("name", "diagnostico[]");
    diagnostico.setAttribute("id", "diagnostico" + iel);

    let select = document.createElement("select");
    select.setAttribute("name","servicio[]" );
    select.setAttribute("id","servicio" + iel );
    select.setAttribute("data-idx", iel );
    select.setAttribute( "onchange", "colocarServicio(" + iel + ")" );


    const precio = document.createElement("input");
    precio.type="number";
    precio.placeholder="Precio servicio ";
    precio.setAttribute("name", "precio[]");
    precio.setAttribute("id", "precio" + iel );
    precio.disabled = true;

    // precio.setAttribute("readonly" );




    const numSesiones = document.createElement("input");
    numSesiones.type="number";
    numSesiones.placeholder="Número de sesiones";
    numSesiones.setAttribute("name", "numSesion[]");
    numSesiones.setAttribute("id", "numSesion" + iel );

    const btn=document.createElement("a");
    btn.className="delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput);

    const flex=document.createElement("div");
    flex.className = "flex";

    input.appendChild(flex);
    flex.appendChild(diagnostico);
    flex.appendChild(select);
    flex.appendChild(precio);
    flex.appendChild(numSesiones);
    flex.appendChild(btn);

    llenarSelect( 'datosTodos', 'servicio' + iel, 'Servicio' );
    iel++;
}

function colocarServicio( idxelem ){
    let txtPrecio = document.getElementById( "precio" + idxelem );
    let selElemento = document.getElementById( "servicio" + idxelem ); 
    if( selElemento ){
        txtPrecio.value = "";
        if( selElemento.selectedIndex > 0 ){
            var seleccionado = selElemento.options[selElemento.selectedIndex];
            txtPrecio.value = seleccionado.getAttribute("data-precio");
        }
    }
}

addBtn.addEventListener("click", addInput);


//Llenar select servicio
function llenarSelect( action, combo, tipo ){
    
    try{
        $.ajax({
            url: '../controladores/controladordiagnostico.php',
            type: 'POST',
            data: {"accion" : action,
                    "tipo" : tipo 
                },
            dataType: 'json',
            success: function(msj) {
                //Seleccionar el combo a llenar
                var sel = $("#"+combo);
                sel.empty();
                
                sel.append('<option value="-1" data-numSesiones="-1">--Seleccione--</option>');	

                for (var idx in msj){
                    sel.append('<option value="' + msj[idx].indice  + '" data-precio="' + msj[idx].precio + '">' + msj[idx].valor +'</option>');	
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


































