
let updatesModal = document.getElementById("updatesModal");
let postsModal = document.getElementById("postsModal");
let viewfriendsModal = document.getElementById("viewfriendsModal");
let viewFollowingModal = document.getElementById("viewfollowingModal");
let addfriendsModal = document.getElementById("addfriendsModal");

let updbtn = document.getElementById("updbtn");
let postsbtn = document.getElementById("postsbtn");

let viewfriendsbtn = document.getElementById("viewfriendsbtn");
let viewfollowersbtn = document.getElementById("viewfollowingbtn");
let addfriendsbtn = document.getElementById("addfriendsbtn");

let updSpan = document.getElementById("updClose");
let postsSpan = document.getElementById("postsClose");
let viewfriendsSpan = document.getElementById("viewfriendsClose");
let viewfollowingSpan = document.getElementById("viewfollowingClose");
let addfriendsSpan = document.getElementById("addfriendsClose");


function escapeHtml(message) {
    return message.replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;");
}

// var max = 150;
// var textarea = document.querySelector('textarea');
// var info = document.querySelector('#info');

// //Init the count for the first time
// info.textContent = max - textarea.value.length;

// textarea.addEventListener('input', function() {
//   info.textContent = max - this.value.length;
// })

// When the user clicks the updatebutton, open the modal
updbtn.onclick = function () {
    updatesModal.style.display = "block";
}
postsbtn.onclick = function () {
    postsModal.style.display = "block";
}
viewfriendsbtn.onclick = function () {
    viewfriendsModal.style.display = "block";
}

viewfollowingbtn.onclick = function () {
    viewfollowingModal.style.display = "block";
}
addfriendsbtn.onclick = function () {
    addfriendsModal.style.display = "block";
}


var updateMessage = document.getElementById("updateNotification");

updSpan.onclick = function () {
    updateMessage.style.display = "none";
    updatesModal.style.display = "none";
    document.getElementById("updatesForm").reset()

}

var postsMessage = document.getElementById("postsNotification");

postsSpan.onclick = function () {
    if (postsMessage.style.display == "inline") {
        makeRefresh = true;
    }
    postsMessage.style.display = "none";
    postsModal.style.display = "none";
    document.getElementById("postsForm").reset()
    if (makeRefresh == true) {
        window.location.reload();
    }
}

var conMessage = document.getElementById("viewfriendsNotification");

viewfriendsSpan.onclick = function () {
    if (conMessage.style.display == "inline") {
        makeRefresh = true;
    }
    conMessage.style.display = "none";
    viewfriendsModal.style.display = "none";
    document.getElementById("viewfriendsForm").reset()
    if (makeRefresh == true) {
        window.location.reload();
    }
}

viewfollowingSpan.onclick = function () {
    if (conMessage.style.display == "inline") {
        makeRefresh = true;
    }
    conMessage.style.display = "none";
    viewfollowingModal.style.display = "none";
    document.getElementById("viewfollowingForm").reset()
    if (makeRefresh == true) {
        window.location.reload();
    }
}

var addfriendsMessage = document.getElementById("addfriendsNotification");

addfriendsSpan.onclick = function () {
    if (addfriendsMessage.style.display == "inline") {
        makeRefresh = true;
    }
    addfriendsMessage.style.display = "none";
    addfriendsModal.style.display = "none";
    document.getElementById("addfriendsForm").reset()
    if (makeRefresh == true) {
        window.location.reload();
    }

}


window.onclick = function (event) {
    if (event.target == updatesModal) {
        if (updateMessage.style.display == "inline") {
            makeRefresh = true;
        }
        updateMessage.style.display = "none";
        updatesModal.style.display = "none";
        document.getElementById("updatesForm").reset()
        if (makeRefresh == true) {
            window.location.reload();
        }
    }
    else if (event.target == postsModal) {
        if (postsMessage.style.display == "inline") {
            makeRefresh = true;
        }
        postsMessage.style.display = "none";
        postsModal.style.display = "none";
        document.getElementById("postsForm").reset()
        if (makeRefresh == true) {
            window.location.reload();
        }
    } else if (event.target == viewfriendsModal) {
        conMessage.style.display = "none";
        viewfriendsModal.style.display = "none";
        document.getElementById("viewfriendsForm").reset()
    } else if (event.target == addfriendsModal) {
        if (addfriendsMessage.style.display == "inline") {
            makeRefresh = true;
        }
        addfriendsMessage.style.display = "none";
        addfriendsModal.style.display = "none";
        document.getElementById("addfriendsForm").reset()
        if (makeRefresh == true) {
            window.location.reload();
        }
    }
}

document.getElementById("addfriendsForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);

    var confirmation = document.getElementById("addfriendsNotification");

    confirmation.style.display = "inline";


    fetch(this.action, {
        method: this.method,
        body: formData
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

document.getElementById("updatesForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);

    var confirmation = document.getElementById("updateNotification");

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


document.getElementById("postsForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    const formData = new FormData();
    let postText = document.querySelector('.poststxtbox').value;
    postText = escapeHtml(postText)
    formData.append('postText', postText);

    var confirmation = document.getElementById("postsNotification");

    confirmation.style.display = "inline";

    fetch('../src/data/friendsBE/posts.php', {
        method: 'POST',
        body: formData
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        return response.text();
    })
        .then(data => {
            console.log(data); // Log the response from the PHP file
            // You can add further handling here, like showing a success message

            // postsMessage.style.display = "none";
            // postsModal.style.display = "none";
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
        });
});

document.getElementById("viewfriendsForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);

    var confirmation = document.getElementById("viewfriendsNotification");

    confirmation.style.display = "inline";


    fetch(this.action, {
        method: this.method,
        body: formData
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