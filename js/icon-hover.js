const iconHoverButtons = document.querySelectorAll(".icon-hover-button");

iconHoverButtons.forEach(function(button) {
    const icon = button.querySelector(".hover-icon");

    if (!icon) {
        return;
    }

    const normalIcon = icon.dataset.normal;
    const hoverIcon = icon.dataset.hover;

    button.addEventListener("mouseenter", function() {
        icon.classList.remove(normalIcon);
        icon.classList.add(hoverIcon);
    });

    button.addEventListener("mouseleave", function() {
        icon.classList.remove(hoverIcon);
        icon.classList.add(normalIcon);
    });
});