

// let ima = 1;

// const addBtn2 = document.querySelector(".add2");

// const input2 = document.querySelector(".inp-group2");


// function removeInput2(){
//     this.parentElement.remove();
// }

// function addInput2(){
  
//     let select = document.createElement("select");
//     select.setAttribute("name","maquina[]" );
//     select.setAttribute("id","maquina" + ima );
//     select.setAttribute("data-idx", ima );
//     select.setAttribute( "onchange", "colocarCosto(" + ima + ")" );


//     const costo = document.createElement("input");
//     costo.disabled = true;
//     costo.type="number";
//     costo.placeholder="$";
//     costo.setAttribute("name", "costoMaquina[]");
//     costo.setAttribute("id", "costoMaquina" + ima );

//     const btn=document.createElement("a");
//     btn.className="delete";
//     btn.innerHTML = "&times";

//     btn.addEventListener("click", removeInput2);

//     const flex=document.createElement("div");
//     flex.className = "flex";

//     input2.appendChild(flex);
//     flex.appendChild(select);
//     flex.appendChild(costo);
//     flex.appendChild(btn);

//     llenarSelect( 'datosTodos', 'maquina' + ima, 'Maquina' );
//     ima++;

// }

// function colocarCosto( idxmaquina ){
//     let txtCosto = document.getElementById( "costoMaquina" + idxmaquina );
//     let selMaquina = document.getElementById( "maquina" + idxmaquina ); 
//     if( selMaquina ){
//         txtCosto.value = "";
//         if( selMaquina.selectedIndex > 0 ){
//             var seleccionado = selMaquina.options[selMaquina.selectedIndex];
//             txtCosto.value = seleccionado.getAttribute("data-costo");
//         }
//     }

//     //sumarCostos();
// }

// addBtn2.addEventListener("click", addInput2);
























// /////////////////////////////////////////////////////////////////
// //Llenar select elementos
// function llenarSelect( action, combo, tipo ){
    
//     try{
//         $.ajax({
//             url: '../controladores/controladorservicio2.php',
//             type: 'POST',
//             data: {"accion" : action,
//                     "tipo" : tipo 
//                   },
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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




// const addBtn = document.querySelector(".add");

// const input = document.querySelector(".inp-group");

// let iel = 1;



// function removeInput(){
//     this.parentElement.remove();
// }


// function addInput(){
//     let select = document.createElement("select");
//     select.setAttribute("name","estudio[]" );
//     select.setAttribute("id","estudio" + iel );
//     select.setAttribute("data-idx", iel );
//     select.setAttribute( "onchange", "colocarCosto(" + iel + ")" );


//     const costo = document.createElement("input");
//     costo.disabled = true;
//     costo.type="number";
//     costo.placeholder="$";
//     costo.setAttribute("name", "costoElemento[]");
//     costo.setAttribute("id", "costoElemento" + iel );

//     const btn=document.createElement("a");
//     btn.className="delete";
//     btn.innerHTML = "&times";

//     btn.addEventListener("click", removeInput);

//     const flex=document.createElement("div");
//     flex.className = "flex";

//     input.appendChild(flex);
//     flex.appendChild(select);
//     flex.appendChild(costo);
//     flex.appendChild(btn);

//     llenarSelect( 'datosTodos', 'estudio' + iel, 'Elemento' );
//     iel++;
// }

// function colocarCosto( idxelem ){
//     let txtCosto = document.getElementById( "costoElemento" + idxelem );
//     let selElemento = document.getElementById( "estudio" + idxelem ); 
//     if( selElemento ){
//         txtCosto.value = "";
//         if( selElemento.selectedIndex > 0 ){
//             var seleccionado = selElemento.options[selElemento.selectedIndex];
//             txtCosto.value = seleccionado.getAttribute("data-costo");
//         }
//     }

//     sumarCostos();
// }

// function colocarCostoM( idxmaquina ){
//     let txtCosto = document.getElementById( "costoMaquina" + idxmaquina );
//     let selMaquina = document.getElementById( "maquina" + idxmaquina ); 
//     if( selMaquina ){
//         txtCosto.value = "";
//         if( selMaquina.selectedIndex > 0 ){
//             var seleccionado = selMaquina.options[selMaquina.selectedIndex];
//             txtCosto.value = seleccionado.getAttribute("data-costo");
//         }
//     }

//     sumarCostos();
// }



// addBtn.addEventListener("click", addInput);


// ////////////////////////////////////////

// const addBtn2 = document.querySelector(".add2");

// const input2 = document.querySelector(".inp-group2");


// function removeInput2(){
//     this.parentElement.remove();
// }

// function addInput2(){
//     let select = document.createElement("select");
//     select.setAttribute("name", "maquina[]");
//     select.setAttribute("id","maquina" + iel );
//     select.setAttribute("data-idx", iel );
//     select.setAttribute( "onchange", "colocarCostoM(" + iel + ")" );
 
//     const costo = document.createElement("input");
//     costo.disabled = true;
//     costo.type="number";
//     costo.placeholder="$";
//     costo.setAttribute("name", "costoMaquina[]");
//     costo.setAttribute("id", "costoMaquina" + iel );

//     const btn=document.createElement("a");
//     btn.className="delete";
//     btn.innerHTML = "&times";

//     btn.addEventListener("click", removeInput2);

//     const flex=document.createElement("div");
//     flex.className = "flex";

//     input2.appendChild(flex);
//     flex.appendChild(select);
//     flex.appendChild(costo);
//     flex.appendChild(btn);

//     llenarSelect( 'datosTodos', 'maquina' + iel, 'Maquina' );
//     iel++;
// }

// addBtn2.addEventListener("click", addInput2);

// /////////////////////////////////////////////////////////////////
// //Llenar select elementos
// function llenarSelect( action, combo, tipo ){
    
//     try{
//         $.ajax({
//             url: '../controladores/controladorservicio2.php',
//             type: 'POST',
//             data: {"accion" : action,
//                     "tipo" : tipo 
//                   },
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


const addBtn = document.querySelector(".add");

const input = document.querySelector(".inp-group");

let iel = 1;

function removeInput(){
    this.parentElement.remove();
}

function addInput(){
    const estudios = document.createElement("textarea");
        estudios.type="text";
        estudios.cols="80";
        estudios.rows="3";
        estudios.placeholder="Estudios";

        estudios.setAttribute("name","estudio[]" );
        estudios.setAttribute("id","estudio" + iel );
        estudios.setAttribute("data-idx", iel );

        const btn=document.createElement("a");
        btn.className="delete";
        btn.innerHTML = "&times";

        btn.addEventListener("click", removeInput);

        const flex=document.createElement("div");
        flex.className = "flex";
        input.appendChild(flex);
        flex.appendChild(estudios);
        flex.appendChild(btn);

        llenarSelect( 'datosTodos', 'estudio' + iel, 'Estudio');
        iel++;
}

addBtn.addEventListener("click", addInput);


////////////////////////////////////////

const addBtn2 = document.querySelector(".add2");

const input2 = document.querySelector(".inp-group2");


function removeInput2(){
    this.parentElement.remove();
}

function addInput2(){
        const experticia = document.createElement("textarea");
        experticia.type="text";
        experticia.cols="80";
        experticia.rows="3";
        experticia.placeholder="Experticia";

        experticia.setAttribute("name","experticia[]" );
        experticia.setAttribute("id","experticia" + iel );
        experticia.setAttribute("data-idx", iel );

        const btn=document.createElement("a");
        btn.className="delete";
        btn.innerHTML = "&times";

        btn.addEventListener("click", removeInput2);

        const flex=document.createElement("div");
        flex.className = "flex";
        input.appendChild(flex);
        flex.appendChild(experticia);
        flex.appendChild(btn);

        llenarSelect( 'datosTodos', 'experticia' + iel, 'Experticia');
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
