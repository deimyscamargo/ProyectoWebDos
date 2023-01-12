// Adicion de elementos al documento HTML
function crearTag(tag) {
    var tagHTML = document.createElement(tag); 
    return tagHTML;
}

function crearTagConTexto(tag,texto) {
    var tagHTML = crearTag(tag); 
    var elementoTexto = document.
                    createTextNode(texto)
    tagHTML.appendChild(elementoTexto);
    return tagHTML;
}

function adicionarBody(elemento) {
    document.body.appendChild(elemento);
}

// Funcionalidades
validarDatos =(textProducto, textPrecio, textCantidad)=>{

    let bool = (textProducto.trim() === '') || (textPrecio === '') || (textCantidad==='')

    if(bool){
        return false
    }else{
        return true
    }

}

adicionarElementoTabla =(codigo, nombre)=>{

    document.getElementById("tftable").innerHTML += `
        <tr>
            <td>${codigo}</td>
            <td>${nombre}</td>
            <td>
                <a href="">Editar</a> &emsp;
                <a href="">Eliminar</a>
            
            </td>

        </tr>
    `;

}

adicionarDatos = () =>{

    let texCodigo = document.getElementById('codigo').value
    let textNombre = document.getElementById('nombre').value

        if(validarDatos(texCodigo,textNombre)){
            
            adicionarElementoTabla(texCodigo,textNombre)

            document.getElementById('codigo').value = ''
            document.getElementById('codigo').focus()
            document.getElementById('nombre').value = ''
        } else{
            alert('Hay ampos vacios')
        }

}

// segunda tabla


adicionarElementoTabla2 =(codigo, nombre)=>{

    document.getElementById("tftable2").innerHTML += `
        <tr>
            <td>${codigo}</td>
            <td>${nombre}</td>

            <td>
                <a href="">Editar</a> &emsp;
                <a href="">Eliminar</a>
            
            </td>

        </tr>
    `;

}

adicionarDatos2 = () =>{

    let texCodigo = document.getElementById('codigo').value
    let textNombre = document.getElementById('nombre').value
    


        if(validarDatos(texCodigo,textNombre)){
            
            adicionarElementoTabla2(texCodigo,textNombre)

            document.getElementById('codigo').value = ''
            document.getElementById('codigo').focus()
            document.getElementById('nombre').value = ''

        } else{
            alert('Hay ampos vacios')
        }

}

//tercera tabla
adicionarElementoTabla3 =(tipoidentificacion,numeroidentificacion,nombres,apellidos, direccion,  usuario)=>{

    document.getElementById("tftable3").innerHTML += `
        <tr>
            <td>${tipoidentificacion}</td>
            <td>${numeroidentificacion}</td>
            <td>${nombres}</td>
            <td>${apellidos}</td>
            <td>${direccion}</td>
            <td>${usuario}</td>
            <td>
                <a href="">Editar</a> &emsp;
                <a href="">Eliminar</a>
            
            </td>

        </tr>
    `;

}

adicionarDatos3 = () =>{

    let txttipoidentificacion = document.getElementById('tipoidentificacion').value
    let textNumeroIdentificacion = document.getElementById('numeroidentificacion').value
    let txtNombres = document.getElementById('nombre').value
    let txtApellidos = document.getElementById('apellidos').value
    let txtDireccion = document.getElementById('direccion').value
    let txtUsuario = document.getElementById('usuario').value
    let txtContraseña = document.getElementById('contraseña').value
    let txtConfirmarContraseña = document.getElementById('confirmarcontraseña').value


        if(validarDatos(txttipoidentificacion,textNumeroIdentificacion, txtNombres,txtApellidos, txtDireccion, txtUsuario, txtContraseña, txtConfirmarContraseña)){
            
            adicionarElementoTabla3(txttipoidentificacion,textNumeroIdentificacion, txtNombres, txtApellidos, txtDireccion, txtUsuario, txtContraseña, txtConfirmarContraseña)

            document.getElementById('tipoidentificacion').value = ''
            document.getElementById('tipoidentificacion').focus()
            document.getElementById('nombre').value = ''
            document.getElementById('numeroidentificacion').value = ''

            document.getElementById('apellidos').value = ''
            document.getElementById('direccion').value = ''
            document.getElementById('usuario').value = ''
            document.getElementById('contraseña').value = ''
            document.getElementById('confirmarcontraseña').value = ''




        } else{
            alert('Hay ampos vacios')
        }

}


//cuarta tabla 


adicionarElementoTabla4 =(nit, razon, direccion, ciudad, telefono)=>{

    document.getElementById("tftable4").innerHTML += `
        <tr>
            <td>${nit}</td>
            <td>${razon}</td>
            <td>${direccion}</td>
            <td>${ciudad}</td>
            <td>${telefono}</td>
            <td>
                <a href="">Editar</a> &emsp;
                <a href="">Eliminar</a>
            
            </td>

        </tr>
    `;

}

adicionarDatos4 = () =>{

    let texNit = document.getElementById('nit').value
    let razon = document.getElementById('razon').value
    let txtDireccion = document.getElementById('direccion').value
    let txtciudad = document.getElementById('ciudad').value
    let txttelefono = document.getElementById('telefono').value




        if(validarDatos(texNit,razon, txtDireccion,txtciudad, txttelefono )){
            
            adicionarElementoTabla4(texNit,razon, txtDireccion, txtciudad, txttelefono)

            document.getElementById('nit').value = ''
            document.getElementById('nit').focus()
            document.getElementById('razon').value = ''
            document.getElementById('direccion').value = ''
            document.getElementById('ciudad').value = ''
            document.getElementById('telefono').value = ''



        } else{
            alert('Hay ampos vacios')
        }

}


adicionarElementoTabla5 =(codigocompra, fecha, proveedor, total, codigoproducto,precioUnitario,cantidad)=>{

    document.getElementById("tftable5").innerHTML += `
        <tr>
            <td>${codigocompra}</td>
            <td>${fecha}</td>
            <td>${proveedor}</td>
            <td>${total}</td>
            <td>${codigoproducto}</td>
            <td>${parseFloat(precioUnitario)}</td>
            <td>${parseInt(cantidad)}</td>
            <td>${precioUnitario*cantidad}</td>

            <td>
            <a href="">Editar</a> &emsp;
            <a href="">Eliminar</a>
        
        </td>
        </tr>
    `;

}

adicionarDatos5 = () =>{

    let texCodigoCompra = document.getElementById('codigocompra').value
    let texFecha = document.getElementById('fecha').value
    let textProveedor = document.getElementById('proveedor').value
    let textTotal = document.getElementById('total').value
    let textcodigoproducto = document.getElementById('codigoproducto').value
    let texPrecio = document.getElementById('precio').value
    let texCantidad = document.getElementById('cantidad').value

        if(validarDatos(texCodigoCompra,texFecha,textProveedor,textTotal,textcodigoproducto,texPrecio,texCantidad)){
            
            adicionarElementoTabla5(texCodigoCompra,texFecha, textProveedor, textTotal, textcodigoproducto,texPrecio,texCantidad)

            document.getElementById('codigocompra').value = ''
            document.getElementById('codigocompra').focus()
            document.getElementById('fecha').value = ''
            document.getElementById('proveedor').value = ''
            document.getElementById('total').value = ''
            document.getElementById('codigoproducto').value = ''
            document.getElementById('precio').value = ''
            document.getElementById('cantidad').value = ''

        } else{
            alert('Hay ampos vacios')
        }

      
    
}

/***codigo js de los factores */

const addBtn3 = document.querySelector(".add3");

const input3 = document.querySelector(".inp-group3");


function removeInput3(){
    this.parentElement.remove();
}

function addInput3(){
    let select = document.createElement("select");
 
    let option1 = document.createElement("option");
    option1.setAttribute("value", "value1");
    let option1Texto = document.createTextNode("---Seleccionar---");
    option1.appendChild(option1Texto);
 
    let option2 = document.createElement("option");
    option2.setAttribute("value", "value2");
    let option2Texto = document.createTextNode("Ondas de choque");
    option2.appendChild(option2Texto);
 
    let option3 = document.createElement("option");
    option3.setAttribute("value", "value3");
    let option3Texto = document.createTextNode("Ultrasonidos");
    option3.appendChild(option3Texto);
 
    select.appendChild(option1);
    select.appendChild(option2);
    select.appendChild(option3);
 

    const btnSubir = document.createElement("input");
    btnSubir.type="button";
    btnSubir.value="Sube";
    btnSubir.className="btnSubir";

    const btnBajar = document.createElement("input");
    btnBajar.type="button";
    btnBajar.value="Baja";
    btnBajar.className="btnBajar";



    const btn=document.createElement("a");
    btn.className="delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput3);

    const flex=document.createElement("div");
    flex.className = "flex";

    input3.appendChild(flex);
    flex.appendChild(select);
    flex.appendChild(btnSubir);
    flex.appendChild(btnBajar);
    flex.appendChild(btn);
}

// addBtn3.addEventListener("click", addInput3);

