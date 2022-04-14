// All input checkboxes from createRoom scipt
// This script is used to pre-fill the input checkboxes
const previousLayoutArray = document.getElementsByClassName("form")[0].dataset.previousLayout;
z

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
