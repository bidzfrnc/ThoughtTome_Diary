var signUpForm = document.getElementById("signUpForm");

var signUp_Btn = document.getElementById("signUp1");

var close_signUp = document.getElementsByClassName("close")[0];

signUp_Btn.onclick = function() {
    signUpForm.style.display = "block";
}

close_signUp.onclick = function() {
    signUpForm.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == signUpForm) {
        signUpForm.style.display = "none";
    }
}

document.addEventListener("click", function(event) {
    // ... Your existing event listeners ...

    // "Cancel" button is clicked
    if (event.target.id === "closebtn") {
        var orderForm = event.target.closest(".signUpForm");
        var form = orderForm.querySelector("form");
        
        // Reset the form
        form.reset();
        
        // Remove the "active" class to hide the order form
        orderForm.classList.remove("active");
    }
})

    // Get a reference to the file input and image element
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('preview');

    // Add an event listener to the file input
    imageInput.addEventListener('change', function() {
        // Check if a file was selected
        if (imageInput.files.length > 0) {
            const selectedImage = imageInput.files[0];
            
            // Create a URL for the selected image
            const imageURL = URL.createObjectURL(selectedImage);
            
            // Update the image element's src attribute to display the selected image
            imagePreview.src = imageURL;
        } else {
            // Clear the image preview if no file was selected
            imagePreview.src = "";
        }
    });