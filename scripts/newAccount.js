let visibleIcon = document.querySelectorAll(".visible-icon")[0];
let visibleIconConfirm = document.querySelectorAll(".visible-icon")[1];

let passwordInput = document.querySelectorAll("input[type=password]")[0];
let passwordInputConfirm = document.querySelectorAll("input[type=password]")[1];

let isVisible = false;
let isVisibleConfirm = false;

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

visibleIconConfirm.addEventListener('click', () => {
    if(!isVisibleConfirm) {
        passwordInputConfirm.setAttribute("type", "text");
        visibleIconConfirm.setAttribute("src", "./assets/visibilityoff.svg")
        isVisibleConfirm = !isVisibleConfirm
    } else {
        passwordInputConfirm.setAttribute("type", "password");
        visibleIconConfirm.setAttribute("src", "./assets/visibility.svg")
        isVisibleConfirm = !isVisibleConfirm
    }
})