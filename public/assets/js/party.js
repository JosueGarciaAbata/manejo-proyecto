document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("container-add-vote");
    const closeBtn = document.querySelector(".cerrar");
    const formModal = document.getElementById("form-add-vote");
    
    const parties = document.querySelectorAll(".party-item");

    const closeModal = modalContainer => {
        if (modalContainer) modalContainer.style.display = "none";
    };

    closeBtn.addEventListener("click", (e) => {
        const modalContainer = closeBtn.closest(".modal");
        closeModal(modalContainer);
    });

    parties.forEach(party => {
        party.addEventListener("click", () =>modal.style.display = "block");
        const partyId = party.querySelector(".party-id").id;
        document.getElementById("id_lis").value = partyId;
    });

    window.addEventListener("click", (event) => {
        if (event.target.classList.contains("modal")) {
            const modals = document.querySelectorAll(".modal");
            modals.forEach(modal => closeModal(modal));
        }
    });
});