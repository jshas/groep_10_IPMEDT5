
// Grid vullen met div's
var selectedGrid1 = document.querySelectorAll(".room__grid")[0];
var selectedGrid2 = document.querySelectorAll(".room__grid")[1];

function createGrid(sensorId){
    var y = 0;
    while(sensorId == 4 && y <= 99){
    selectedGrid1.style.display = "grid";
    selectedGrid1.style.border = "1px solid black";
    selectedGrid1.style.minHeight = "50vh";
    var newDiv = document.createElement("div");
    newDiv.className = "grid__item";
    selectedGrid1.appendChild(newDiv)[y];
    y++;
    }
    var y = 0;
    while(sensorId == 2 && y <= 99){
    selectedGrid2.style.display = "grid";
    selectedGrid2.style.border = "1px solid black";
    selectedGrid2.style.minHeight = "50vh";
    var newDiv = document.createElement("div");
    newDiv.className = "grid__item";
    selectedGrid2.appendChild(newDiv)[y];
    y++;
    }
}

// grid vullen
function fillgrid(){  
    var gridInput = document.getElementById("grid-text").value;
    var selectedDiv1 = document.getElementsByClassName("grid__item")[gridInput];
    selectedDiv1.style.backgroundColor = "black";
    var selectedDiv2 = document.getElementsByClassName("grid__item")[gridInput];
    selectedDiv2.style.backgroundColor = "black";
}

// grid verwijderen
function deleteGrid(){
    selectedGrid1.style.display = "none";
    selectedGrid2.style.display = "none";
}

function sensorLocation(locX,locY){


    selectedGrid1.children[locX].style.backgroundColor = "green";
    console.log(selectedGrid1.children[locX]);
    console.log(locY);
    console.log(locX);
}