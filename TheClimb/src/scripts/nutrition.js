// Get the modal
let calModal = document.getElementById("calModal");
let nutrientsModal = document.getElementById("nutrientsModal");
let mealModal = document.getElementById("mealModal");

// Get the button that opens the modal
let calBtn = document.getElementById("calBtn");
let nutrientsBtn = document.getElementById("nutrientsBtn");
let mealBtn = document.getElementById("mealBtn");

// Get the <span> element that closes the modal
let calSpan = document.getElementById("calClose");
let nutrientsSpan = document.getElementById("nutrientsClose");
let mealSpan = document.getElementById("mealClose");

// When the user clicks the button, open the modal
calBtn.onclick = function() {
    calModal.style.display = "block";
}
// When the user clicks the button, open the modal
nutrientsBtn.onclick = function() {
    nutrientsModal.style.display = "block";
}
// When the user clicks the button, open the modal
mealBtn.onclick = function() {
    mealModal.style.display = "block";
}
var conMessage = document.getElementById("calorieNotification");
var nutrientMessage = document.getElementById("nutrientNotification");
var mealMessage = document.getElementById("mealNotification");

//TODO: Might need to refresh the page when the modal is closed
//      After submitting data
let makeRefresh=false;
// When the user clicks on <span> (x), close the modal
calSpan.onclick = function() {
    if(conMessage.style.display == "inline"){
        makeRefresh=true;
    }
    conMessage.style.display="none";
    calModal.style.display = "none";
    document.getElementById("calorieForm").reset()

    if (makeRefresh==true){
        window.location.reload();
    }

}
// When the user clicks on <span> (x), close the modal
nutrientsSpan.onclick = function() {
    if(nutrientMessage.style.display == "inline"){
        makeRefresh=true;
    }
    nutrientMessage.style.display="none";
    nutrientsModal.style.display = "none";
    document.getElementById("nutrientForm").reset()
    if (makeRefresh==true){
        window.location.reload();
    }

}
// When the user clicks on <span> (x), close the modal
mealSpan.onclick = function() {
    if(mealMessage.style.display == "inline"){
        makeRefresh=true;
    }
    mealMessage.style.display="none";
    mealModal.style.display = "none";
    document.getElementById("mealForm").reset()
    if (makeRefresh==true){
        window.location.reload();
    }

}

// When the user clicks anywhere outside the modal, close it
window.onclick = function(event) {
    if (event.target == calModal) {
        if(conMessage.style.display == "inline"){
            makeRefresh=true;
        }
        conMessage.style.display="none";
        calModal.style.display = "none";
        document.getElementById("calorieForm").reset()

    } else if (event.target == nutrientsModal) {
        if(nutrientMessage.style.display == "inline"){
            makeRefresh=true;
        }
        nutrientMessage.style.display="none";
        nutrientsModal.style.display = "none";
        document.getElementById("nutrientForm").reset()

    } else if (event.target == mealModal){
        if(mealMessage.style.display == "inline"){
            makeRefresh=true;
        }
        mealMessage.style.display="none";
        mealModal.style.display = "none";
        document.getElementById("mealForm").reset()

    }
    if (makeRefresh==true){
        window.location.reload();
    }


}

document.getElementById("calorieForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);

    var confirmation = document.getElementById("calorieNotification");

    confirmation.style.display = "inline";

    var queryString = new URLSearchParams(formData).toString();
    var url = this.action + "?" + queryString;


    fetch(url, {
        method: "GET"
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Log the response from the PHP file
            // You can add further handling here, like showing a success message
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
        });
});

document.getElementById("nutrientForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);

    var confirmation = document.getElementById("nutrientNotification");

    confirmation.style.display = "inline";

    var queryString = new URLSearchParams(formData).toString();
    var url = this.action + "?" + queryString;


    fetch(url, {
        method: "GET"
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Log the response from the PHP file
            // You can add further handling here, like showing a success message
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
        });
});

document.getElementById("mealForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);

    var confirmation = document.getElementById("mealNotification");

    confirmation.style.display = "inline";

    var queryString = new URLSearchParams(formData).toString();
    var url = this.action + "?" + queryString;


    fetch(url, {
        method: "GET"
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Log the response from the PHP file
            // You can add further handling here, like showing a success message
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
        });
});

var itemSelected=false;
$("#search").autocomplete({
    source: '/CSE442-542/2024-Spring/cse-442s/TheClimb/src/data/nutritionBE/search.php',
    minLength: 0,
    autoFocus: true,
    select: selected,


})

$("#search").on('input', function () {
    var count = $('#search').autocomplete("widget").find( "li" ).length;
    console.log("something changed")
    itemSelected = false;
});


function selected() {
     itemSelected = true;
}

document.getElementById("dupeMealForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    if(itemSelected == false){ alert("please select an item from the list"); }
    // else { allowSubmit = true; alert("true" + count); }
    if (!itemSelected) return false;


    var formData = new FormData(this);

    var confirmation = document.getElementById("mealNotification");

    confirmation.style.display = "inline";

    var queryString = new URLSearchParams(formData).toString();
    var url = this.action + "?" + queryString;


    fetch(url, {
        method: "GET"
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Log the response from the PHP file
            // You can add further handling here, like showing a success message
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
        });
});





function refresh(){
    url = new URL(window.location.href);
    if (!url.searchParams.has('date')) {
        document.form.submit();
    }
}
