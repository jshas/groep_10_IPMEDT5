function createGrid(loc, id) {
    const grid = document.getElementsByClassName("room__grid")[id - 1];
    grid.style.display = "grid";
    let y = 0
    while(y < 99){
        let newDiv = document.createElement("div");
        newDiv.className = "grid__item";
        grid.appendChild(newDiv)[y];
        y++;
    }
    // Call function to fill grid (if location array is not empty)
    if (loc !== []) {
        gridFill(loc, id, grid);
    }
}

// grid verwijderen
function deleteGrid(id) {
    let grid = document.getElementsByClassName("room__grid")[id - 1];
    grid.style.display = "none";
}

// Grid vullen met div'
const room1 = [
    1, 2, 3, 4, 5, 6, 7, 8, 9,
    11, 12, 13, 14, 15, 16, 17, 18, 19,
    21, 22, 23, 24, 25, 26, 27, 28, 29,
    81, 82, 83, 84, 85, 86, 87,
    91, 92, 93, 94, 95, 96, 97]
const room2 = [
    1, 2, 3, 4, 5, 6, 7, 8, 9,
    11, 13, 14, 15, 16, 17,
    21, 22, 23, 24, 25, 26, 27,
    81, 82, 83, 84, 85,
    91, 92, 93, 94, 95];
const room3 = [
    1, 2, 3, 4, 5, 6, 7, 8, 9,
    11, 12, 13, 14, 15, 16, 17, 18, 19,
    21, 22, 23, 24, 25, 26, 27, 28, 29,
    31, 32, 33, 34, 35, 36, 37, 38, 39,
    81, 82, 83, 84, 85, 86, 87,
    91, 92, 93, 94, 95, 96, 97];
const roomArray = [room1, room2, room3];


function gridFill(loc, id, grid) {
    let x = 0;
    roomLayout = roomArray[id - 1]; // bijv. room3 

    let sensorLocations = []
    loc.forEach(sensor => {
        sensorLocations.push(sensor.location);
    });

    // Assign furniture grid items
    for (i in roomLayout) {+
        // meubelen 
        grid.children[roomLayout[x]].classList.add("grid__item--furniture");
        x++;
    }
    // Assign sensor grid items
    sensorLocations.forEach(loc => {
        grid.children[loc].classList.remove("grid__item--furniture");
        grid.children[loc].classList.add("grid__item--sensor");
    });

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
        if (result) {
            deleteButton.parentNode.submit();
        }
    });

});

