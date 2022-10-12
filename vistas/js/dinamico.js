const addBtn = document.querySelector(".add");

const input = document.querySelector(".inp-group");



function removeInput(){
    this.parentElement.remove();
}



function addInput(){
   

    let select = document.createElement("select");
 
    let option1 = document.createElement("option");
    option1.setAttribute("value", "value1");
    let option1Texto = document.createTextNode("---Seleccionar---");
    option1.appendChild(option1Texto);
 
    let option2 = document.createElement("option");
    option2.setAttribute("value", "value2");
    let option2Texto = document.createTextNode("Aceites");
    option2.appendChild(option2Texto);
 
    let option3 = document.createElement("option");
    option3.setAttribute("value", "value3");
    let option3Texto = document.createTextNode("Estetoscopio");
    option3.appendChild(option3Texto);
 
    select.appendChild(option1);
    select.appendChild(option2);
    select.appendChild(option3);
 

    const costo = document.createElement("input");
    costo.disabled = true;
    costo.type="number";
    costo.placeholder="$";

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
}

addBtn.addEventListener("click", addInput);


////////////////////////////////////////

const addBtn2 = document.querySelector(".add2");

const input2 = document.querySelector(".inp-group2");


function removeInput2(){
    this.parentElement.remove();
}

function addInput2(){
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
 

    const costo = document.createElement("input");
    costo.disabled = true;
    costo.type="number";
    costo.placeholder="$";

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
}

addBtn2.addEventListener("click", addInput2);

/////////////////////////////////////////////////////////////////

