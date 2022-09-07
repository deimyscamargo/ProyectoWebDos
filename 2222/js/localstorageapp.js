//DOM ELements
const clientForm = document.getElementById("clientForm");
const ClientsContainer = document.querySelector(".clients");

const nameInput = clientForm["name"];
const ageInput = clientForm["age"];
const dateInput = clientForm["date"];
const byMethodInput = clientForm["byMethod"];
const categoryInput = clientForm["category"];
const brandInput = clientForm["brand"];
const carNameInput = clientForm["carName"];
const carYearInput = clientForm["carYear"];
const quantityInput = clientForm["quantity"];
const importeInput = clientForm["importe"];
const unitValueInput = clientForm["unitValue"];
const utilityInput = clientForm["utility"];
const totalUtilityInput = clientForm["totalUtility"];

const clients = JSON.parse(localStorage.getItem("clients")) || [];

const addClient = (name, age, date, byMethod, category, brand, carName, carYear, quantity, importe, unitValue, utility, totalUtility) => {
    clients.push({
        name,
        age,
        date,
        byMethod,
        category,
        brand,
        carName,
        carYear,
        quantity,
        importe,
        unitValue,
        utility,
        totalUtility
    });

    localStorage.setItem("clients", JSON.stringify(clients));

    return {name, age, date, byMethod, category, brand, carName, carYear, quantity, importe, unitValue, utility, totalUtility};
};

const createClientElement = ({name, age, date, byMethod, category, brand, carName, carYear, quantity, importe, unitValue, utility, totalUtility}) => {
    //Create Elements
    const clientDiv = document.createElement("div");
    const clientName = document.createElement("p");
    const clientAge = document.createElement("p");
    const clientByMethod = document.createElement("p");
    const clientCategory = document.createElement("p");
    const clientDate = document.createElement("p");
    const clientBrand = document.createElement("p");
    const clientCarName = document.createElement("p");
    const clientCarYear = document.createElement("p");
    const clientQuantity = document.createElement("p");
    const clientImporte = document.createElement("p");
    const clientUnitValue = document.createElement("p");
    const clientUtility = document.createElement("p");
    const clientTotalUtility = document.createElement("p");

    //Fill content
    clientName.innerHTML = name;
    clientAge.innerHTML = age;
    clientDate.innerHTML = date;
    clientByMethod.innerHTML = byMethod;
    clientCategory.innerHTML = category;
    clientBrand.innerHTML = brand;
    clientCarName.innerHTML = carName;
    clientCarYear.innerHTML = carYear;
    clientQuantity.innerHTML = quantity;
    clientImporte.innerHTML = importe;
    clientUnitValue.innerHTML = unitValue;
    clientUtility.innerHTML = utility;
    clientTotalUtility.innerHTML = totalUtility;

    //Add to DOM
    clientDiv.append(clientName, clientAge, clientDate, clientByMethod, clientCategory, clientBrand, clientCarName, clientCarYear, clientQuantity, clientImporte, clientUnitValue, clientUtility, clientTotalUtility);
    ClientsContainer.appendChild(clientDiv);

    ClientsContainer.style.display = clients.length == 0 ? "none" : "flex";
};

ClientsContainer.style.display = clients.length == 0 ? "none" : "flex";

clients.forEach(createClientElement);

clientForm.onsubmit = (e) => {
    e.preventDefault();

    const newClient = addClient(
        nameInput.value,
        ageInput.value,
        dateInput.value,
        byMethodInput.value,
        categoryInput.value,
        brandInput.value,
        carNameInput.value,
        carYearInput.value,
        quantityInput.value,
        importeInput.value,
        unitValueInput.value,
        utilityInput.value,
        totalUtilityInput.value
    );

    createClientElement(newClient);

    nameInput.value = "";
    ageInput.value = "";
    dateInput.value = "";
    byMethodInput.value = "";
    categoryInput.value = "";
    brandInput.value = "";
    carNameInput.value = "";
    carYearInput.value = "";
    quantityInput.value = "";
    importeInput.value = "";
    unitValueInput.value = "";
    utilityInput.value = "";
    totalUtilityInput.value = "";
};