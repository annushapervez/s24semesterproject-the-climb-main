
document.addEventListener("DOMContentLoaded", function() {
    const editButton = document.getElementById("edit-button");
    const textFields = document.querySelectorAll(".text-box");
    const updateButton = document.getElementById("update-button");
    const modal = document.getElementById("modal1");
    const modalCloseButton = document.querySelector(".modal-content1 .close1");
    const modalSubmitButton = document.getElementById("modal-submit");
    const errorContainer = document.querySelector('.error-message');

    let isEditing = false;

    function toggleEditingMode() {
        isEditing = !isEditing;
        localStorage.setItem('isEditing', isEditing.toString());

        editButton.textContent = isEditing ? "Save Changes" : "Edit Profile";
        updateButton.style.display = isEditing ? "inline" : "none";
        
        textFields.forEach(function(field) {
            field.readOnly = !isEditing;
        });
    }

    textFields.forEach(function(field) {
        field.readOnly = !isEditing;
    });

    editButton.textContent = isEditing ? "Save Changes" : "Edit Profile";
    updateButton.style.display = isEditing ? "inline" : "none";

    editButton.addEventListener("click", toggleEditingMode);

    if (localStorage.getItem('isEditing') === 'true') {
        toggleEditingMode();
    }
    updateButton.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    modalCloseButton.addEventListener('click', function() {
        errorContainer.innerHTML = '';
        modal.style.display = 'none';
    });

    editButton.addEventListener("click", function() {
        if (!isEditing) {
            const formData = new FormData();
    
            textFields.forEach(function(field) {
                formData.append(field.name, field.value);
            });
    
            fetch('../src/data/userprofileBE/UserProfile_backend.php', {
                method: 'POST',
                body: formData
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Failed to update profile information');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    
    });
    modalSubmitButton.addEventListener("click", function() {
        const selectedRadioButton = document.querySelector(".image-grid input[type='radio']:checked");
        if (selectedRadioButton) {
            const selectedImagePath = selectedRadioButton.value;
            const formData = new FormData();
            formData.append('profile-photo', selectedImagePath);

            fetch('../src/data/userprofileBE/UserProfile_backend.php', {
                method: 'POST',
                body: formData
            }).then(response => {
                if (response.ok) {
                    // Update profile image on the page
                    document.querySelector('.profile-image').src = selectedImagePath;
                    // Close the modal
                    modal.style.display = 'none';
                } else {
                    throw new Error('Failed to update profile photo');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        } else {
            errorContainer.innerHTML = ''; 
            const errorText = document.createElement('div');
            errorText.textContent = "Please select an image.";
            errorText.style.color = "red"; 
            errorText.style.fontSize = "14px"; 
            errorContainer.appendChild(errorText);
        }
    });
});