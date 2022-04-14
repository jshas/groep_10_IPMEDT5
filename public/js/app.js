function createGrid(id, loc, layout) {
    let grid = document.getElementsByClassName("room__grid")[id - 1];
    grid.style.display = "grid";
    let y = 0
    while (y < 99) {
        let newDiv = document.createElement("div");
        newDiv.className = "grid__item";
        newDiv.dataset.coordinate = y;
        grid.appendChild(newDiv)[y];

        y++;
    }
    // Call function to fill grid (if location array is not empty)
    if (loc !== []) {
        gridFill(loc, id, layout);
    }
}

// grid verwijderen
function hideGrid(id) {
    let grid = document.getElementsByClassName("room__grid")[id - 1];
    grid.style.display = "none";
}


function gridFill(loc, id, layout) {
    let grid = document.getElementsByClassName("room__grid")[id - 1];
    let gridItems = grid.children;
    console.log(gridItems);
    console.log(loc);
    console.log(id);
    console.log(layout);
    let x = 0;
    let layoutArray = Array.from(layout);
    // Assign furniture grid 

    // Loops through array retrieved from $room->layout
    layoutArray.forEach(furnitureCoordinate =>{
        for(let i = 0; i < gridItems.length ; i++){
            if (gridItems[i].dataset.coordinate == furnitureCoordinate) {
                gridItems[i].classList.add("grid__item--furniture")
            }
        }
    });

    loc.forEach(sensorLocation => {
        console.log("sensorloc: ",)
        for(let i = 0; i < gridItems.length ; i++){
            if (gridItems[i].dataset.coordinate == sensorLocation.location) {
                gridItems[i].classList.remove("grid__item--furniture")
                gridItems[i].classList.add("grid__item--sensor")
            }

        }
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

