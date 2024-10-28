function toggleContent(type) {
    const content = document.querySelector(`.${type}-content`);
    const button = content.nextElementSibling;

    if (content.style.maxHeight === "150px" || !content.style.maxHeight) {
        content.style.maxHeight = content.scrollHeight + "px";
        button.textContent = "Show less";
    } else {
        content.style.maxHeight = "150px";
        button.textContent = "Read more";
    }
}
