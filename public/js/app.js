/*
* Form Grid
* Used to display and fill in grid in the forms to create and edit rooms to the DB.  
*/

const roomGrid = document.getElementById("js--roomGrid");
const openGridCreateButton = document.getElementById("js--openCreateGrid");
const closeGridCreateButton = document.getElementById("js--closeCreateGrid"); 
const resetGridCreateButton = document.getElementById("js--resetCreateGrid"); 
const formGridItems = document.getElementsByClassName("form-grid__item");
console.log(formGridItems);
// Empty Arrays to fill in on create page
let sensorGridItems = [];
let furnitureGridItems = [];

/* form-grid buttons*/
openGridCreateButton.addEventListener('click', (e) => {
    roomGrid.classList.add("form-grid--visible");
});

closeGridCreateButton.addEventListener('click', (e) => {
    roomGrid.classList.remove("form-grid--visible");
});

resetGridCreateButton.addEventListener('click', (e) => {
    if(window.confirm("Are you sure you want to reset the grid?")){
        console.log(formGridItems.length)
        console.log("ok")

        for(let i = 0; i < formGridItems.length; i++){
            formGridItems[i].dataset.status = 'empty';
            formGridItems[i].style.backgroundColor = null;
            // Empties out the arrays
            sensorGridItems.splice(0, sensorGridItems.length)
            furnitureGridItems.splice(0, furnitureGridItems.length)
        }

    }

});



function formGridItemHandler(){
    let formGridItem = event.target;
    let coordinate = formGridItem.dataset.coordinate;
    switch(formGridItem.dataset.status){
        case 'empty': // If the formGridItem is an empty square, we want the gridItem to become a sensor.
            formGridItem.dataset.status = 'sensor';
            formGridItem.style.backgroundColor = 'green';
            sensorGridItems.push(coordinate);
            console.log('case: empty');
            console.log("SensorArray: ", sensorGridItems);
            console.log("FurnitureItems", furnitureGridItems);
            break;

        case 'sensor': // If the formGridItem is an sensor square, we want the gridItem to become a furniture item.
            console.log(formGridItem.id + " : sensor");
            formGridItem.dataset.status = 'furniture';
            formGridItem.style.backgroundColor = 'gray';
            for( let i = 0; i < sensorGridItems.length; i++){  
                if ( sensorGridItems[i] === coordinate) { 
                    sensorGridItems.splice(i, 1); 
                }
            }
            if(furnitureGridItems.indexOf(coordinate) === -1){
                furnitureGridItems.push(coordinate);
            }

            console.log('case: sensor');
            console.log("SensorArray: ", sensorGridItems);
            console.log("FurnitureItems", furnitureGridItems);
            break;

        case 'furniture': // If the formGridItem is a furniture square, we want the gridItem to become empty again.
            console.log(formGridItem.id + " : furniture");
            formGridItem.dataset.status = 'empty';
            formGridItem.style.backgroundColor = null;
            for( let i = 0; i < furnitureGridItems.length; i++){ 
                if ( furnitureGridItems[i] === coordinate) { 
                    furnitureGridItems.splice(i, 1); 
                }
            }
            if(furnitureGridItems.indexOf(coordinate) === -1){
                furnitureGridItems.push(coordinate);
            }
            console.log("SensorArray: ", sensorGridItems);
            console.log("FurnitureItems", furnitureGridItems);
            break;
    }

}

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

// Grid vullen met div'+
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

