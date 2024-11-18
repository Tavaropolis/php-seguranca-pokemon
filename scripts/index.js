let visibleIcon = document.querySelector(".visible-icon");
let passwordInput = document.querySelector("input[type=password]");

let isVisible = false;

visibleIcon.addEventListener('click', () => {
    if(!isVisible) {
        passwordInput.setAttribute("type", "text");
        visibleIcon.setAttribute("src", "./assets/visibilityoff.svg")
        isVisible = !isVisible
    } else {
        passwordInput.setAttribute("type", "password");
        visibleIcon.setAttribute("src", "./assets/visibility.svg")
        isVisible = !isVisible
    }
})