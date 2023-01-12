const addBtn = document.querySelector(".add");

const input = document.querySelector(".inp-group");

let iel = 1;

function removeInput(){
    this.parentElement.remove();
}

function addInput(){
    let select = document.createElement("select");
    select.setAttribute("name","elemento[]" );
    select.setAttribute("id","elemento" + iel );
    select.setAttribute("data-idx", iel );
    select.setAttribute( "onchange", "colocarCosto(" + iel + ")" );


    const costo = document.createElement("input");
    costo.disabled = true;
    costo.type="number";
    costo.placeholder="$";
    costo.setAttribute("name", "costoElemento[]");
    costo.setAttribute("id", "costoElemento" + iel );

    const btn=document.createElement("a");
    btn.className="delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput);

    const flex=document.createElement("div");
    flex.className = "flex";

    input.appendChild(flex);
    flex.appendChild(select);
    flex.appendChild(costo);
    flex.appendChild(btn);

    llenarSelect( 'datosTodos', 'elemento' + iel, 'Elemento' );
    iel++;
}

function colocarCosto( idxelem ){
    let txtCosto = document.getElementById( "costoElemento" + idxelem );
    let selElemento = document.getElementById( "elemento" + idxelem ); 
    if( selElemento ){
        txtCosto.value = "";
        if( selElemento.selectedIndex > 0 ){
            var seleccionado = selElemento.options[selElemento.selectedIndex];
            txtCosto.value = seleccionado.getAttribute("data-costo");
        }
    }

    sumarCostos();
}

function colocarCostoM( idxmaquina ){
    let txtCosto = document.getElementById( "costoMaquina" + idxmaquina );
    let selMaquina = document.getElementById( "maquina" + idxmaquina ); 
    if( selMaquina ){
        txtCosto.value = "";
        if( selMaquina.selectedIndex > 0 ){
            var seleccionado = selMaquina.options[selMaquina.selectedIndex];
            txtCosto.value = seleccionado.getAttribute("data-costo");
        }
    }

    sumarCostos();
}

function sumarCostos(){
    let suma = 0;
    for (let i = 1; i < iel; i++) {
        let txtCosto1 = document.getElementById( "costoElemento" + i );
        let txtCosto2 = document.getElementById( "costoMaquina" + i );

        if( txtCosto1 ){
            suma += parseInt( txtCosto1.value );
        }

        if( txtCosto2 ){
            suma += parseInt( txtCosto2.value );
        }
    }

    let txtCostoTotal = document.getElementById( "costoTotal" );
    txtCostoTotal.value = suma;

    let txtPorcentaje = document.getElementById( "porcentajeGanancia" );
    let precio = suma + suma * ( txtPorcentaje.value.trim().length > 0 ? parseInt( txtPorcentaje.value ) : 0 ) / 100;

    let txtPrecio = document.getElementById( "precio" );
    txtPrecio.value = precio;
}

addBtn.addEventListener("click", addInput);

function colocarDescripcion(){
    
    let txtDescripcion = document.getElementById( "descripcion" );
    let selElemento = document.getElementById( "categorias_idcategoria" ); 

    if( selElemento ){
        txtDescripcion.value = "";
        if( selElemento.selectedIndex > 0 ){
            var seleccionado = selElemento.options[selElemento.selectedIndex];
            txtDescripcion.value = seleccionado.getAttribute("data-desc");
        }
    }
}

////////////////////////////////////////

const addBtn2 = document.querySelector(".add2");

const input2 = document.querySelector(".inp-group2");


function removeInput2(){
    this.parentElement.remove();
}

function addInput2(){
    let select = document.createElement("select");
    select.setAttribute("name", "maquina[]");
    select.setAttribute("id","maquina" + iel );
    select.setAttribute("data-idx", iel );
    select.setAttribute( "onchange", "colocarCostoM(" + iel + ")" );

    const costo = document.createElement("input");
    costo.disabled = true;
    costo.type="number";
    costo.placeholder="$";
    costo.setAttribute("name", "costoMaquina[]");
    costo.setAttribute("id", "costoMaquina" + iel );

    const btn=document.createElement("a");
    btn.className="delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput2);

    const flex=document.createElement("div");
    flex.className = "flex";

    input2.appendChild(flex);
    flex.appendChild(select);
    flex.appendChild(costo);
    flex.appendChild(btn);

    llenarSelect( 'datosTodos', 'maquina' + iel, 'Maquina' );
    iel++;
}

addBtn2.addEventListener("click", addInput2);

/////////////////////////////////////////////////////////////////
//Llenar select elementos
function llenarSelect( action, combo, tipo ){
    
    try{
        $.ajax({
            url: '../controladores/controladorservicio2.php',
            type: 'POST',
            data: {"accion" : action,
                    "tipo" : tipo 
                },
            dataType: 'json',
            success: function(msj) {
                //Seleccionar el combo a llenar
                var sel = $("#"+combo);
                sel.empty();
                
                sel.append('<option value="-1" data-costo="-1">--Seleccione--</option>');	

                for (var idx in msj){
                    sel.append('<option value="' + msj[idx].indice  + '" data-costo="' + msj[idx].valor + '">' + msj[idx].nombre +'</option>');	
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
