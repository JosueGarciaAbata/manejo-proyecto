document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("container-add-vote");
    const closeBtn = document.querySelector(".cerrar");

    const candidates = document.querySelectorAll(".candidate-item");

    const closeModal = (modalContainer) => {
        if (modalContainer) modalContainer.style.display = "none";
    };

    closeBtn.addEventListener("click", (e) => {
        const modalContainer = closeBtn.closest(".modal");
        closeModal(modalContainer);
    });

    candidates.forEach((candidate) => {
        candidate.addEventListener(
            "click",
            () => (modal.style.display = "block")
        );
        const candidateId = candidate.querySelector(".cd-pic").id;
        document.getElementById("id_can").value = candidateId;
    });

    window.addEventListener("click", (event) => {
        if (event.target.classList.contains("modal")) {
            const modals = document.querySelectorAll(".modal");
            modals.forEach((modal) => closeModal(modal));
        }
    });
});
