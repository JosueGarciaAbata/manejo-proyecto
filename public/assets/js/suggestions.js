document.addEventListener("DOMContentLoaded", () => {
    // Verifica si el título es "Suggestions"
    if (document.title !== "Suggestions") return;

    const modal = document.getElementById("ventanaModal");
    const suggestions = document.querySelectorAll(".event-one__single");
    const btnAddSuggestion = document.getElementById("add-suggestion");
    const closeBtns = document.querySelectorAll(".cerrar");
    const formModal = document.getElementById("form-add-suggestion");

    // Función para cerrar modales
    const closeModal = (modalContainer) => {
        if (modalContainer) {
            modalContainer.style.display = "none";
        }
    };

    // Cierra el modal al hacer clic en los botones de cerrar
    closeBtns.forEach(closeBtn => {
        closeBtn.addEventListener("click", (e) => {
            const modalContainer = closeBtn.closest(".modal");
            closeModal(modalContainer);
        });
    });

    // Añade un evento de clic a cada sugerencia
    suggestions.forEach(suggestion => {
        suggestion.addEventListener("click", () => {
            modal.style.display = "block";
            modal.querySelector("#title").textContent = suggestion.querySelector(".event-one__title").textContent;
            modal.querySelector("#description").textContent = suggestion.querySelector(".suggestion-details").textContent;
        });
    });

    // Abre el formulario de añadir sugerencia
    btnAddSuggestion.addEventListener("click", () => {
        formModal.style.display = "block";
    });

    // Cierra el modal si se hace clic fuera de él
    window.addEventListener("click", (event) => {
        if (event.target.classList.contains("modal")) {
            // Cierra todos los modales
            const modals = document.querySelectorAll(".modal");
            modals.forEach(modal => closeModal(modal));
        }
    });
});

