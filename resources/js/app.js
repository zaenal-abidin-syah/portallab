import "./bootstrap";

// if (localStorage.getItem("dark-mode") == "true") {
//     document.documentElement.classList.toggle("dark");
// }

const toggleButton = document.querySelector(".toggle-button");
toggleButton.addEventListener("click", () => {
    document.documentElement.classList.toggle("dark");
    if (document.documentElement.classList.contains("dark")) {
        localStorage.setItem("dark-mode", true);
    } else {
        localStorage.setItem("dark-mode", false);
    }
});

$(document).ready(function () {
    $("#matakuliah-table").DataTable();
});

$(document).ready(function () {
    $("#fasilitas-table").DataTable();
});

$(document).ready(function () {
    $("#publikasi-table").DataTable();
});
$(document).ready(function () {
    $("#buku-table").DataTable();
});
$(document).ready(function () {
    $("#riset-table").DataTable();
});
$(document).ready(function () {
    $("#pengabdian-table").DataTable();
});
$(document).ready(function () {
    $("#kegiatan-table").DataTable();
});
