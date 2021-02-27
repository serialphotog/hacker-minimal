window.addEventListener("load", function setupMenu(event) {
    // only run the event listener once
    window.removeEventListener(event.type, setupMenu, false);

    // Handle the mobile navigation menu
    var menuOpen = false;
    var hamburgerMenu = document.getElementById("hamburger");
    hamburger.addEventListener("click", (event) => {
        var menu = document.getElementById("menu-main-menu");
        menu.style.visibility = menuOpen ? "hidden" : "visible";
        menu.style.display = menuOpen ? "none" : "block";
        menuOpen = !menuOpen;
    });
}, false);
