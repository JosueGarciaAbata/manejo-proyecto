document.addEventListener("DOMContentLoaded", () => {
    // Verifica si el título es "Suggestions"
    if (document.title !== "Suggestions") return;

    const modal = document.getElementById("ventanaModal");
    const suggestions = document.querySelectorAll(".event-one__single");
    const span = document.getElementsByClassName("cerrar")[0];

    // Cierra el modal al hacer clic en el botón de cerrar
    span.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Añade un evento de clic a cada sugerencia
    suggestions.forEach((suggestion) => {
        suggestion.addEventListener("click", () => {
            modal.style.display = "block";
            
            // Obtiene y establece el título y la descripción del modal
            modal.querySelector("#title").textContent = suggestion.querySelector('.event-one__title').textContent;
            modal.querySelector("#description").textContent = suggestion.querySelector('.suggestion-details').textContent;
        });
    });

    // Cierra el modal si se hace clic fuera de él
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
