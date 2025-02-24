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
    let tables = $(
        "#matakuliah-table, #fasilitas-table, #publikasi-table, #buku-table, #riset-table, #pengabdian-table, #kegiatan-table"
    ).DataTable();

    truncateText();

    // Jalankan truncateText() setiap kali halaman berubah di semua tabel
    tables.on("draw.dt", function () {
        truncateText();
    });
});

// $(document).ready(function () {
//     $("#fasilitas-table").DataTable();
// });

// $(document).ready(function () {
//     $("#publikasi-table").DataTable();
// });
// $(document).ready(function () {
//     $("#buku-table").DataTable();
// });
// $(document).ready(function () {
//     $("#riset-table").DataTable();
// });
// $(document).ready(function () {
//     $("#pengabdian-table").DataTable();
// });
// $(document).ready(function () {
//     $("#kegiatan-table").DataTable();
// });

function truncateText() {
    document.querySelectorAll(".judul-table").forEach((el) => {
        const fullText = el.getAttribute("data-judul");
        let maxLength;

        if (window.innerWidth < 640) {
            // sm
            maxLength = 30;
        } else if (window.innerWidth < 768) {
            // md
            maxLength = 60;
        } else if (window.innerWidth < 1290) {
            // lg
            maxLength = 90;
        } else {
            maxLength = 400;
        }

        el.textContent =
            fullText.length > maxLength
                ? fullText.substring(0, maxLength) + "..."
                : fullText;
    });
}

window.addEventListener("DOMContentLoaded", truncateText);
window.addEventListener("resize", truncateText);
