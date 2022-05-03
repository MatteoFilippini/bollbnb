// preparo immagine placeholder (immagine di default se non trovo nulla)
const placeholder = "https://marcolanci.it/utils/placeholder.jpg";

// recupero elementi del form
const imageInput = document.getElementById('default_image');
const imagePreview = document.getElementById('preview');

imageInput.addEventListener('change', () => {
    // controllo iniziale se trovo file
    if (imageInput.files && imageInput.files[0]) {
        let reader = new FileReader();
        reader.readAsDataURL(imageInput.files[0]);

        reader.onload = (e) => {
            imagePreview.setAttribute('src', e.target.result);
        }
    } else imagePreview.setAttribute('src', placeholder);
})