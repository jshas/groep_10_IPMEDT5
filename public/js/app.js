
function createGrid(id){
    // const z = document.getElementsByClassName("room")[id];
    let z = document.getElementsByClassName("room")[id];
    let grid = z.querySelector(".room__grid");
    const str = z.id;
    const last = str.charAt(str.length - 1);
    gridId = parseInt(last);
    let y = 0;
    while(id == last && y <= 99){
        grid.style.display = "grid";
        grid.style.border = "1px solid black";
        grid.style.minHeight = "50vh";
        let newDiv = document.createElement("div");
        newDiv.className = "grid__item";
        grid.appendChild(newDiv)[y];
        y++;
    }
}




// grid verwijderen
function deleteGrid(id){
    let z = document.getElementsByClassName("room")[id];
    let grid = z.querySelector(".room__grid");
    grid.style.display = "none";  
}

// Confirmation dialog voor delete forms
let deleteButtons = document.querySelectorAll("[value=Delete]");

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

// Grid vullen met div's

const room1 = [1,2,3,4,5,6,7,11,13,14,15,16,17,21,22,23,24,25,26,27,81,82,83,84,85,91,92,93,94,95];
const room2 = [1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,21,22,23,24,25,26,27,28,29,81,82,83,84,85,86,87,91,92,93,94,95,96,97];
const room3 = [1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,21,22,23,24,25,26,27,28,29,81,82,83,84,85,86,87,91,92,93,94,95,96,97];

const RoomArray = [room1,room2,room3];

function sensorLocation(loc, id){
        let x = 0;
        let room = document.getElementsByClassName("room")[id];
        let grid = room.querySelector(".room__grid");
        roomGrid = RoomArray[id];
        
       for(i in roomGrid){
        // sensor
        grid.children[loc].style.backgroundColor = "green";
        // meubelen
        grid.children[roomGrid[x]].style.backgroundColor = "grey";
        x++;   
       }
    
    

   
}
