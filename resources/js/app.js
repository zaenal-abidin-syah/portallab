// import "./bootstrap";

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

if (window.location.pathname == '/laboratorium') {
    $(document).ready(function () {
        let tables = $(
            "#matakuliah-table, #fasilitas-table, #pengabdian-table, #kegiatan-table, #publikasi-table, #buku-table, #riset-table"
        ).DataTable();

        truncateText();

        // Jalankan truncateText() setiap kali halaman berubah di semua tabel
        tables.on("draw.dt", function () {
            truncateText();
        });
    });
}

function truncateText() {
    document.querySelectorAll(".judul-table").forEach((el) => {
        const fullText = el.getAttribute("data-judul");
        let maxLength;

        if (window.innerWidth < 768) {
            // md
            maxLength = 80;
        } else if (window.innerWidth < 992) {
            // lg
            maxLength = 100;
        } else if (window.innerWidth < 1200) {
            // lg
            maxLength = 150;
        }

        el.textContent =
            fullText.length > maxLength
                ? fullText.substring(0, maxLength) + "..."
                : fullText;
    });
    document.querySelectorAll(".judul2-table").forEach((el) => {
        const fullText = el.getAttribute("data-judul");
        let maxLength;

        if (window.innerWidth < 576) {
            // sm
            maxLength = 18;
        } else if (window.innerWidth < 768) {
            // md
            maxLength = 30;
        } else if (window.innerWidth < 992) {
            // lg
            maxLength = 40;
        } else if (window.innerWidth < 1200) {
            // lg
            maxLength = 65;
        } else if (window.innerWidth < 1320) {
            // lg
            maxLength = 65;
        } else {
            maxLength = 80;
        }

        el.textContent =
            fullText.length > maxLength
                ? fullText.substring(0, maxLength) + "..."
                : fullText;
    });
}



window.addEventListener("DOMContentLoaded", truncateText);
window.addEventListener("resize", truncateText);