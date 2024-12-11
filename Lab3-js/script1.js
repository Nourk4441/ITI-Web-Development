
const app = document.getElementById("app");


const container = document.createElement("div");
container.style.backgroundColor = "#d4cfcf";
container.style.padding = "20px";
container.style.borderRadius = "10px";
container.style.width = "400px";
container.style.margin = "auto";
container.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.2)";
container.style.fontFamily = "Arial, sans-serif";


const taskInput = document.createElement("input");
taskInput.type = "text";
taskInput.placeholder = "Add your Task Here";
taskInput.style.width = "calc(100% - 60px)";
taskInput.style.padding = "10px";
taskInput.style.border = "none";
taskInput.style.borderRadius = "5px";
taskInput.style.marginBottom = "10px";
taskInput.style.fontSize = "16px";
container.appendChild(taskInput);


const addButton = document.createElement("button");
addButton.textContent = "Add";
addButton.style.backgroundColor = "#f8e6c2";
addButton.style.border = "none";
addButton.style.padding = "10px 15px";
addButton.style.borderRadius = "5px";
addButton.style.cursor = "pointer";
addButton.style.fontSize = "14px";
addButton.style.marginLeft = "10px";
addButton.onmouseover = () => (addButton.style.backgroundColor = "#f7d9a2");
addButton.onmouseout = () => (addButton.style.backgroundColor = "#f8e6c2");
container.appendChild(addButton);


const taskList = document.createElement("div");
container.appendChild(taskList);


app.appendChild(container);


addButton.onclick = () => {
    const taskValue = taskInput.value.trim();

    if (taskValue === "") {
        alert("Please enter a task.");
        return;
    }

  
    const taskDiv = document.createElement("div");
    taskDiv.style.display = "flex";
    taskDiv.style.alignItems = "center";
    taskDiv.style.marginBottom = "10px";
    taskDiv.style.padding = "10px";
    taskDiv.style.borderRadius = "5px";
    taskDiv.style.backgroundColor = "#ececec";
    taskDiv.style.fontSize = "16px";

    const taskText = document.createElement("span");
    taskText.textContent = taskValue;
    taskText.style.flex = "1";
    taskText.style.wordWrap = "break-word";

 
    const doneButton = document.createElement("button");
    doneButton.textContent = "Done";
    doneButton.style.backgroundColor = "#f8e6c2";
    doneButton.style.border = "none";
    doneButton.style.padding = "5px 10px";
    doneButton.style.borderRadius = "5px";
    doneButton.style.cursor = "pointer";
    doneButton.style.marginLeft = "5px";
    doneButton.onmouseover = () => (doneButton.style.backgroundColor = "#f7d9a2");
    doneButton.onmouseout = () => (doneButton.style.backgroundColor = "#f8e6c2");
    doneButton.onclick = () => {
        taskDiv.style.backgroundColor =
            taskDiv.style.backgroundColor === "rgb(120, 183, 107)"
                ? "#ececec"
                : "#78b76b";
        taskDiv.style.color =
            taskDiv.style.backgroundColor === "rgb(120, 183, 107)" ? "white" : "black";
    };

 
    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Delete";
    deleteButton.style.backgroundColor = "#f8e6c2";
    deleteButton.style.border = "none";
    deleteButton.style.padding = "5px 10px";
    deleteButton.style.borderRadius = "5px";
    deleteButton.style.cursor = "pointer";
    deleteButton.style.marginLeft = "5px";
    deleteButton.onmouseover = () => (deleteButton.style.backgroundColor = "#f7d9a2");
    deleteButton.onmouseout = () => (deleteButton.style.backgroundColor = "#f8e6c2");
    deleteButton.onclick = () => {
        taskList.removeChild(taskDiv);
    };

   
    taskDiv.appendChild(taskText);
    taskDiv.appendChild(doneButton);
    taskDiv.appendChild(deleteButton);


    taskList.appendChild(taskDiv);


    taskInput.value = "";
};