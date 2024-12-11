document.addEventListener("DOMContentLoaded", function () {
    const API_URL = "https://jsonplaceholder.typicode.com/users";

    
    const loadDataBtn = document.createElement("button");
    loadDataBtn.textContent = "Load Data";
    document.body.appendChild(loadDataBtn);

    const fetchByIdInput = document.createElement("input");
    fetchByIdInput.type = "number";
    fetchByIdInput.placeholder = "Enter ID";
    fetchByIdInput.style.marginLeft = "10px";
    document.body.appendChild(fetchByIdInput);

    const fetchByIdBtn = document.createElement("button");
    fetchByIdBtn.textContent = "Get Data by ID";
    document.body.appendChild(fetchByIdBtn);

    const dataTable = document.createElement("table");
    dataTable.border = "1";
    dataTable.style.marginTop = "20px";
    dataTable.style.borderCollapse = "collapse";
    dataTable.style.width = "100%";
    document.body.appendChild(dataTable);

    const thead = document.createElement("thead");
    const headerRow = document.createElement("tr");
    const headers = ["ID", "Name","UserName", "Email"];
    headers.forEach((header) => {
        const th = document.createElement("th");
        th.textContent = header;
        headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);
    dataTable.appendChild(thead);

    const tbody = document.createElement("tbody");
    dataTable.appendChild(tbody);

    
    const fetchData = async () => {
        try {
            const response = await fetch(API_URL);
            const data = await response.json();
            displayData(data);
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    };

    
    const fetchDataById = async () => {
        const id = fetchByIdInput.value.trim();
        if (!id) {
            alert("Please enter a valid ID.");
            return;
        }

        try {
            const response = await fetch(`${API_URL}/${id}`);
            if (response.ok) {
                const data = await response.json();
                displayData([data]); 
            } else {
                alert("No data found for the provided ID.");
            }
        } catch (error) {
            console.error("Error fetching data by ID:", error);
        }
    };

    
    const displayData = (data) => {
        tbody.innerHTML = ""; 
        data.forEach((item) => {
            const row = tbody.insertRow();
            row.insertCell(0).textContent = item.id;
            row.insertCell(1).textContent = item.name;
            row.insertCell(2).textContent = item.username
            row.insertCell(3).textContent = item.email;
        });
    };

    
    loadDataBtn.addEventListener("click", fetchData);
    fetchByIdBtn.addEventListener("click", fetchDataById);
});
