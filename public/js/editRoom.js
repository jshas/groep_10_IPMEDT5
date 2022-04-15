// All input checkboxes from createRoom scipt
// This script is used to pre-fill the input checkboxes
let layout = currentRoom['layout'];
console.log(layout);
layoutArray = JSON.parse(layout);
console.log("layoutarray", layoutArray);
// let formGridItems = document.querySelectorAll([".form-grid__item"]);    

let PREPOPULATE_FLAG = false;




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

console.log(formGridItems);

function populateEditFormGrid(){
    for(let i=0; i < layoutArray.length; i++){
        layoutArray[i]
        console.log(layoutArray[i])
        formGridItems[layoutArray[i]].dataset.status = 'furniture';
        formGridItems[layoutArray[i]].checked = true;
        // formGridItems[layoutArray[i]].style.backgroundColor = 'gray';

        formGridItems[layoutArray[i]].classList.add('form-grid__checkbox--checked');
        console.log(formGridItems[layoutArray[i]].classList, formGridItems[layoutArray[i]].dataset.coordinate)
        furnitureGridItems.push(layoutArray[i]);

    }
    console.log("FurnitureItems", furnitureGridItems);
}

if(PREPOPULATE_FLAG === false){
    populateEditFormGrid();
    PREPOPULATE_FLAG = true;
}
