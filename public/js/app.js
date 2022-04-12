function createGrid(){
        var y = 0;
        selectedGrid.style.display = "grid";
        selectedGrid.style.border = "1px solid black";
        while(y <= 99){
            selectedGrid.style.minHeight = "50vh";
            var newDiv = document.createElement("div");
            newDiv.className = "grid__item";
            selectedGrid.appendChild(newDiv)[y];
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

