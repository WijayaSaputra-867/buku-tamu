const footer = document.querySelector("footer");
window.addEventListener("scroll", function () {
    if (window.scrollY + window.innerHeight >= document.body.scrollHeight) {
        footer.classList.toggle("fixed-bottom");
    } else {
        footer.classList.toggle("fixed-bottom");
    }
});
