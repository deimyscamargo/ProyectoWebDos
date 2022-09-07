/**
 * Función encargada de crear el cabezado de la tabla de clientes
 * encargada de mostrar la información del usuario almacada de manera local.
 * @param {Object} Objeto Literal encargado de almacenar la información de los clientes
 * y poder mostrarla.
 */
const createTable = (clients) => {
    return `
    <table class="table table-striped">
        <thead>
            <tr class="bg-info">
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Fecha Compra</th>
                <th scope="col">Metodo Compra</th>
                <th scope="col">Categoría</th>
                <th scope="col">Marca Auto</th>
                <th scope="col">Nombre Auto</th>
                <th scope="col">Modelo Auto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Importe</th>
                <th scope="col">Valor Unitario</th>
                <th scope="col">Utilidad</th>
                <th scope="col">Utilidad Total</th>
            </tr>
        </thead>
        <tbody>
            ${createTableData(clients)}
        </tbody>
    </table>
    `;
};


/**
 * Función encarda de realizar la insersión de la informacién obtenida
 * del localStore e insertandola de manera dinamica en el uso de las
 * columnas de la tablas.
 * @param {object} Objeto El cual tiene toda la información de los clientes almacenados en el
 * localStorage
 */
const createTableData = (clients) => {
    let html = "";

    clients.forEach((client) => {
        html += `
        <tr>
            <td>${client.name}</td>
            <td>${client.age}</td>
            <td>${client.date}</td>
            <td>${client.byMethod}</td>
            <td>${client.category}</td>
            <td>${client.brand}</td>
            <td>${client.carName}</td>
            <td>${client.carYear}</td>
            <td>${client.quantity}</td>
            <td>${client.importe}</td>
            <td>${client.unitValue}</td>
            <td>${client.utility}</td>
            <td>${client.totalUtility}</td>
        </tr>
        `;
    });
    return html;
};

/**
 * Evento que permite disparar la funcion de ordenamiento de los reportes
 * situados en el local storage, haciendo llamado de la información almacenada de manera local
 * e insertandola de manera dinamica.
 */
const dataBtn = document.getElementById("dataBtn");

dataBtn.addEventListener("click", () => {
    const data = localStorage.getItem("clients");
    const clients = JSON.parse(data);

    const table = document.querySelector(".table");
    table.innerHTML = `
    <div>
      ${createTable(clients)}
    </div>
    `;
});