// Mendapatkan referensi ke elemen dengan ID "myElement"
let footer = document.getElementById("footer");

// Fungsi untuk menambah atau menghapus kelas "active" saat tombol di klik
function toggleClass() {
    footer.classList.toggle("fixed-bottom");
}

// Fungsi untuk memeriksa apakah halaman dapat discroll ke bawah
function isPageScrollable() {
    return document.documentElement.scrollHeight > window.innerHeight;
}

if (!isPageScrollable()) {
    toggleClass();
}
