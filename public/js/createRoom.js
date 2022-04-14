/*
* createFormGrid
* Used to display and fill in grid in the forms to create and edit rooms to the DB.  
*/

const roomGrid = document.getElementById("js--roomGrid");
const openGridCreateButton = document.getElementById("js--openCreateGrid");
const closeGridCreateButton = document.getElementById("js--closeCreateGrid"); 
const resetGridCreateButton = document.getElementById("js--resetCreateGrid"); 
const formGridItems = document.getElementsByClassName("form-grid__checkbox");
const form = document.getElementsByClassName("form__form")[0];
console.log(form);

const submitFormButton = document.getElementById('js--roomCreateSubmitButton');
console.log(submitFormButton);

// Empty Arrays to fill in on create page
let sensorGridItems = [];
let furnitureGridItems = [];
let initFlag = false; // Used to reset the checkbox values if they persisted on reload.
console.log(furnitureGridItems);

/* form-grid buttons*/
openGridCreateButton.addEventListener('click', (e) => {
    roomGrid.classList.add("form-grid--visible");
    if(!initFlag){
        for(let i = 0; i < formGridItems.length; i++){
            formGridItems[i].checked = false;
        }
        initFlag = true;
    }
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
            formGridItems[i].checked = false;
            // Empties out the arrays
            sensorGridItems.splice(0, sensorGridItems.length)
            furnitureGridItems.splice(0, furnitureGridItems.length)
        }

    }

});

// For the create room grid
function roomGridItemHandler(){
    let formGridItem = event.target;
    if(coordinate=null){
        let coordinate = formGridItem.dataset.coordinate;
    }

    switch(formGridItem.dataset.status){
        case 'empty': // If the formGridItem is an empty square, we want the gridItem to become a sensor.
            formGridItem.dataset.status = 'furniture';
            formGridItem.checked = true;
            furnitureGridItems.push(coordinate);
            console.log("FurnitureItems", furnitureGridItems);
            break;
        case 'furniture': // If the formGridItem is a furniture square, we want the gridItem to become empty again.
            console.log(formGridItem.id + " : furniture");
            formGridItem.dataset.status = 'empty';
            formGridItem.checked = false;
            formGridItem.backgroundColor = 'none';
            for( let i = 0; i < furnitureGridItems.length; i++){ 
                if ( furnitureGridItems[i] === coordinate) { 
                    furnitureGridItems.splice(i, 1); 
                }
            }
            console.log("FurnitureItems", furnitureGridItems);
            break;
    }
};

function sensorGridItemHandler(){
    let formGridItem = event.target;
    let coordinate = formGridItem.dataset.coordinate;
    switch(formGridItem.dataset.status){
        case 'empty': // If the formGridItem is an empty square, we want the gridItem to become a sensor.
            formGridItem.dataset.status = 'sensor';
            formGridItem.style.backgroundColor = 'green';
            sensorGridItems.push(coordinate);
            console.log('case: empty');
            console.log("SensorArray: ", sensorGridItems);
            break;
        case 'sensor': // If the formGridItem is an sensor square, we want the gridItem to become a furniture item.
            console.log(formGridItem.id + " : sensor");
            formGridItem.dataset.status = 'empty';
            formGridItem.style.backgroundColor = null;
            for( let i = 0; i < sensorGridItems.length; i++){  
                if ( sensorGridItems[i] === coordinate) { 
                    sensorGridItems.splice(i, 1); 
                }
            }
            console.log('case: sensor');
            console.log("SensorArray: ", sensorGridItems);
            break;
    }
}

// function formGridItemHandler(){
//     let formGridItem = event.target;
//     let coordinate = formGridItem.dataset.coordinate;
//     switch(formGridItem.dataset.status){
//         case 'empty': // If the formGridItem is an empty square, we want the gridItem to become a sensor.
//             formGridItem.dataset.status = 'sensor';
//             formGridItem.style.backgroundColor = 'green';
//             sensorGridItems.push(coordinate);
//             console.log('case: empty');
//             console.log("SensorArray: ", sensorGridItems);
//             console.log("FurnitureItems", furnitureGridItems);
//             break;

//         case 'sensor': // If the formGridItem is an sensor square, we want the gridItem to become a furniture item.
//             console.log(formGridItem.id + " : sensor");
//             formGridItem.dataset.status = 'furniture';
//             formGridItem.style.backgroundColor = 'gray';
//             for( let i = 0; i < sensorGridItems.length; i++){  
//                 if ( sensorGridItems[i] === coordinate) { 
//                     sensorGridItems.splice(i, 1); 
//                 }
//             }
//             if(furnitureGridItems.indexOf(coordinate) === -1){
//                 furnitureGridItems.push(coordinate);
//             }

//             console.log('case: sensor');
//             console.log("SensorArray: ", sensorGridItems);
//             console.log("FurnitureItems", furnitureGridItems);
//             break;

//         case 'furniture': // If the formGridItem is a furniture square, we want the gridItem to become empty again.
//             console.log(formGridItem.id + " : furniture");
//             formGridItem.dataset.status = 'empty';
//             formGridItem.style.backgroundColor = null;
//             for( let i = 0; i < furnitureGridItems.length; i++){ 
//                 if ( furnitureGridItems[i] === coordinate) { 
//                     furnitureGridItems.splice(i, 1); 
//                 }
//             }
//             if(furnitureGridItems.indexOf(coordinate) === -1){
//                 furnitureGridItems.push(coordinate);
//             }
//             console.log("SensorArray: ", sensorGridItems);
//             console.log("FurnitureItems", furnitureGridItems);
//             break;
//     }
// }