const iconInput = document.getElementById("icon_file"),
    representantInput = document.getElementById("representant_file"),
    iconPreview = document.getElementById("icon-preview"),
    representantPreview = document.getElementById("representant-preview");

const handleFileUpdate = (event, preview) => {
    console.log("asdasd");
    console.log(preview);
    
    const file = event.target.files[0];
    console.log(file);
    if (file && file.type.startsWith("image/")) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        alert("Por favor, selecciona una imagen válida.");
    }
};

iconInput.addEventListener("change", (event) =>
    handleFileUpdate(event, iconPreview)
);
representantInput.addEventListener("change", (event) =>
    handleFileUpdate(event, representantPreview)
);
