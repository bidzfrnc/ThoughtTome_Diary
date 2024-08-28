var gallery_Upload = document.getElementById("gallery_Upload");

var upload_btn = document.getElementById("upload_btn");

var cancel_btn = document.getElementsByClassName("cancel_btn")[0];

upload_btn.onclick = function() {
    gallery_Upload.style.display = "block";
}

cancel_btn.onclick = function() {
    gallery_Upload.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == gallery_Upload) {
        gallery_Upload.style.display = "none";
    }
}

document.addEventListener("click", function(event) {
    // ... Your existing event listeners ...

    // "Cancel" button is clicked
    if (event.target.id === "cancel_btn") {
        var orderForm = event.target.closest(".gallery_Upload");
        var form = orderForm.querySelector("form");
        
        // Reset the form
        form.reset();
        
        // Remove the "active" class to hide the order form
        orderForm.classList.remove("active");
    }
})



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