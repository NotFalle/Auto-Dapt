let cropper;

const successMessage = document.getElementById("successMessage");

const imageInput = document.getElementById("pfpInput");
const profileDropzone = document.getElementById("pfpDropzone");

const cropModal = document.getElementById("cropModal");
const cropImage = document.getElementById("cropImage");

const cropOk = document.getElementById("cropOk");
const cropCancel = document.getElementById("cropCancel");

const croppedImage = document.getElementById("croppedImage");

function openCropper(file) {
    if (!file || !file.type.startsWith("image/")) {
        alert("Endast bilder är tillåtna.");
        return;
    }

    const reader = new FileReader();

    reader.onload = function(event) {
        cropImage.src = event.target.result;
        cropModal.style.display = "flex";

        if (cropper) {
            cropper.destroy();
        }

        cropper = new Cropper(cropImage, {
            aspectRatio: 1,
            viewMode: 1,
            dragMode: "crop",
            background: false,
            cropBoxResizable: true,
            cropBoxMovable: true,
            responsive: true
        });
    };

    reader.readAsDataURL(file);
}

imageInput.addEventListener("change", function(e) {
    openCropper(e.target.files[0]);
});

profileDropzone.addEventListener("dragover", function(e) {
    e.preventDefault();
    profileDropzone.classList.add("dragover");
});

profileDropzone.addEventListener("dragleave", function() {
    profileDropzone.classList.remove("dragover");
});

profileDropzone.addEventListener("drop", function(e) {
    e.preventDefault();
    profileDropzone.classList.remove("dragover");

    openCropper(e.dataTransfer.files[0]);
});

cropOk.addEventListener("click", function() {
    const canvas = cropper.getCroppedCanvas({
        width: 300,
        height: 300
    });

    const finalImage = canvas.toDataURL("image/webp", 0.8);

    croppedImage.value = finalImage;

    profileDropzone.innerHTML = `
        <img
            src="${finalImage}"
            id="pfpPreview"
            alt="Profilbild"
        >
    `;

    cropModal.style.display = "none";
    cropper.destroy();
});

cropCancel.addEventListener("click", function() {
    cropModal.style.display = "none";

    if (cropper) {
        cropper.destroy();
    }
});

if (successMessage) {
    setTimeout(function() {
        successMessage.style.opacity = "0";

        setTimeout(function() {
            successMessage.style.display = "none";
        }, 300);
    }, 3000);
}