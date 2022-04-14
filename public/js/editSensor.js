/*
    FOR: EDITING SENSOR VALUES AND GRID
 */

const sensorInput = document.getElementById("location");
let grid = document.getElementById("js--roomGrid");
let previousValue = 0;
let layoutArray = [];
const gridItems = document.getElementsByClassName("form-grid__item")
let GRID_FILLED = false;


for(let i = 0; i < gridItems.length ; i++){
    gridItems[i].addEventListener('click', (e) => {
        sensorInput.value = gridItems[i].dataset.coordinate;
        gridItems[previousValue].classList.remove("form-grid__item--selected");
        gridItems[i].classList.add("form-grid__item--selected");
        previousValue = gridItems[i].dataset.coordinate;

    })
}

// Runs only once
if(GRID_FILLED === false && gridItems.length > 99){
    // Retrieve current number to use as the previousnumber on 'update' in the numberbox eventlistener.
    previousValue = parseInt(grid.dataset.currentSensor);
    console.log(typeof previousValue);
    let layoutArray = JSON.parse(grid.dataset.room);
    console.log(typeof layoutArray);
    console.log(typeof grid.dataset.room)

    

    // Loops through array retrieved from $room->layout
    layoutArray.forEach(furnitureCoordinate =>{
        for(let i = 0; i < gridItems.length ; i++){
            if (gridItems[i].dataset.coordinate == furnitureCoordinate) {
                gridItems[i].classList.add("grid__item--furniture")
            }
        }
    });

    gridItems[previousValue].classList.remove("grid__item--furniture")
    gridItems[previousValue].classList.add("grid__item--sensor");
    

    GRID_FILLED === true;

};


sensorInput.addEventListener('change', (e) => {
    let currentInput = sensorInput.value;
            gridItems[currentInput].dataset.coordinate;
            gridItems[previousValue].classList.remove("form-grid__item--selected");
            gridItems[currentInput].classList.add("form-grid__item--selected");
            previousValue = currentInput
    });
