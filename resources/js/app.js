import "./bootstrap";

if (localStorage.getItem("dark-mode") == "true") {
    document.documentElement.classList.toggle("dark");
}

const toggleButton = document.querySelector(".toggle-button");
toggleButton.addEventListener("click", () => {
    document.documentElement.classList.toggle("dark");
    if (document.documentElement.classList.contains("dark")) {
        localStorage.setItem("dark-mode", true);
    } else {
        localStorage.setItem("dark-mode", false);
    }
});
