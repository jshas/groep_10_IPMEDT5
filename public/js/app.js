
// Grid vullen met div's
var k = 0;
const gridArray = [1,2,3,4,5,6,7,8,9,10];
const testGrids = document.querySelectorAll(".room__grid");
var testGridId = document.querySelectorAll(".room__grid").id;
var selectedGrid = document.querySelectorAll(".room__grid")[k];


function createGrid(){
testGrids[k].id = gridArray[k];
k++;
var y = 0;
selectedGrid.style.display = "grid";
selectedGrid.style.border = "1px solid black";
while(y <= 99){
    selectedGrid.style.minHeight = "50vh";
    var newDiv = document.createElement("div");
    newDiv.className = "grid__item";
    selectedGrid.appendChild(newDiv)[y];
    y++;
}
}
// grid vullen
function fillgrid(){  
    var gridInput = document.getElementById("grid-text").value;
    var selectedDiv = document.getElementsByClassName("grid__item")[gridInput];
    selectedDiv.style.backgroundColor = "black";
}

// grid verwijderen
function deleteGrid(){
    selectedGrid.style.display = "none";
}