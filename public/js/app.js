

// Grid vullen met div's
var selectedGrid1 = document.querySelectorAll(".room__grid")[0];
var selectedGrid2 = document.querySelectorAll(".room__grid")[1];

const room1 = [1,2,3,4,5,6,7,11,13,14,15,16,17,21,22,23,24,25,26,27,81,82,83,84,85,91,92,93,94,95];
const room2 = [1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,21,22,23,24,25,26,27,28,29,81,82,83,84,85,86,87,91,92,93,94,95,96,97];

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
function deleteGrid(sensorId){
    if(sensorId == 4){
        selectedGrid1.style.display = "none";
    }
   if(sensorId == 2){
    selectedGrid2.style.display = "none";
   }
  
}

// Confirmation dialog voor delete forms
let deleteButtons = document.querySelectorAll("[value=Delete]");
console.log(deleteButtons);
deleteButtons.forEach(deleteButton => {
    // Voorkomt dat de form submit zonder bevestiging
    deleteButton.parentNode.addEventListener('submit', (e) => {
        e.preventDefault();
    })
    // Linkt de 
    deleteButton.addEventListener('click', (e) => {
        let parentType = deleteButton.parentElement.classList[0];
        console.log(parentType);
        let result = window.confirm("Are you sure you want to delete this element?");
        if(result){
            deleteButton.parentNode.submit();
        }
      });
    
});

function sensorLocation(loc, sensorId){
    var x = 0;
    if(sensorId == 4){
        selectedGrid1.children[loc].style.backgroundColor = "green";
        console.log(loc);
        for (i in room1){
            selectedGrid1.children[room1[x]].style.backgroundColor = "grey";
            x++;
        }
    }

    if(sensorId == 2){
        selectedGrid2.children[loc].style.backgroundColor = "green";
        console.log(loc);
        for (i in room2){
            selectedGrid2.children[room2[x]].style.backgroundColor = "grey";
            x++;
        }

    }
   
}
