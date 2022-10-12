
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

addBtn3.addEventListener("click", addInput3);

