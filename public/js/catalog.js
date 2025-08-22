// Contoh kecil interaksi JS
document
    .querySelector(".search-box button")
    .addEventListener("click", function () {
        let keyword = document.querySelector(".search-box input").value;
        alert("Kamu mencari: " + keyword);
    });
