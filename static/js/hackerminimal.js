window.addEventListener("load", function setupMenu(event) {
    // only run the event listener once
    window.removeEventListener(event.type, setupMenu, false);

    // Handle the mobile navigation menu
    var menuOpen = false;
    var hamburgerMenu = document.getElementById("hamburger");
    var menu = document.getElementById("menu-main-menu");
    hamburger.addEventListener("click", (event) => {
        menu.style.visibility = menuOpen ? "hidden" : "visible";
        menu.style.display = menuOpen ? "none" : "block";
        menuOpen = !menuOpen;
    });

}, false);
