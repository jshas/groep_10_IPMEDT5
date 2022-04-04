
// Grid vullen met div's
var selectedGrid = document.getElementsByClassName("room__grid")[0];
function createGrid(){
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

function fillgrid(){  
    var gridInput = document.getElementById("grid-text").value;
    var selectedDiv = document.getElementsByClassName("grid__item")[gridInput];
    selectedDiv.style.backgroundColor = "black";
}
function deleteGrid(){
    selectedGrid.style.display = "none";
}