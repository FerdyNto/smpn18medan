// Navbar Fixed
window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("shadow-nav");
    } else {
        header.classList.remove("shadow-nav");
    }
};
