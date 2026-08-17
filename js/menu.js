const body_element = document.body;
const header_element = document.getElementById("header");
const menu_button = document.getElementById("menu-button"); // div#menu-button in header.php
const menu = document.getElementById("menu"); // div#menu-button in header.php

var submenu = document.querySelectorAll(".sub-menu"); // ul.sub-menu generatd by WP inside menu, settings can be altered in functions.php

for (let index = 0; index < submenu.length; index++) {
    var submenu_parent = submenu[index].parentElement; // ul.sub-menu's parent element (in this case its a <a> from the nav>ul>li)
    submenu_parent.classList.add("submenu-parent");

    var span_arrow = document.createElement("span");
    span_arrow.classList.add('submenu-arrow');

    submenu[index].parentElement.appendChild(span_arrow);
}

var span_arrows = document.getElementsByClassName("submenu-arrow");

var myFunction = function () {
    var submenu_sibling = this.previousElementSibling;

    if (submenu_sibling.classList.contains('open')) {
        submenu_sibling.classList.remove('open');
        this.classList.remove('open');
    } else {
        submenu_sibling.classList.add('open');
        this.classList.add('open');
    }
};

Array.from(span_arrows).forEach(function (arrow) {
    arrow.addEventListener('click', myFunction);
});




const ATTHETOP = "topped";
const SCROLLUP = "scroll-up";
const SCROLLDOWN = "scroll-down";
let current_pos = 0;
let last_scroll = 0;
let fresh_load = 0;

// Menu tap/click detection
menu_button.addEventListener('click', (event) => {

    // Don't follow the link
    event.preventDefault();

    // Toggle 'opened' class on the .submenu
    if (menu_button.classList.contains('open')) {
        menu_button.classList.remove('open');
        menu.classList.remove('open');
        submenu.classList.remove('open');
        // submenu_parent.classList.remove('parent-open');
    } else {
        menu_button.classList.add('open');
        menu.classList.add('open');
    }

}, false);

// Submenu tap/click detection
// span_arrow.addEventListener('click', (event) => {
//     // Don't follow the link
//     event.preventDefault();

//     // Toggle 'opened' class on the .submenu
//     if (submenu.classList.contains('open')) {
//         submenu.classList.remove('open');
//         menu.classList.remove('child-open');
//         // submenu_parent.classList.remove('parent-open');
//     } else {
//         submenu.classList.add('open');
//         menu.classList.add('child-open');
//         // submenu_parent.classList.add('parent-open');
//     }
// }, false);

// window scroll to hide and reveal menu
window.addEventListener("scroll", () => {
    setNav();
});

const HOME_INTRO_AREA = document.getElementById("intro-section");
const HOME_INTRO = document.querySelectorAll('.cta-arrow');

for (var i = 0; i < HOME_INTRO.length; i++) {
    HOME_INTRO[i].addEventListener('click', () => {
        // Don't follow the link
        event.preventDefault();
        HOME_INTRO_AREA.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
}

const setNav = () => {
    getPagePosition();

    if (current_pos <= 0) {
        header_element.classList.remove(SCROLLUP);
        if (has_scrolled <= 0) {
            header_element.classList.add(ATTHETOP);
        }
        return;
    }

    if (current_pos > last_scroll && !body_element.classList.contains(SCROLLDOWN)) {
        // down
        header_element.classList.remove(ATTHETOP);
        header_element.classList.remove(SCROLLUP);
        header_element.classList.add(SCROLLDOWN);
        has_scrolled = 1;
        if (menu_button.classList.contains('open')) {
            menu_button.classList.remove('open');
            menu.classList.remove('open');
        }
    } else if (current_pos < last_scroll && header_element.classList.contains(SCROLLDOWN)) {
        // up
        header_element.classList.remove(SCROLLDOWN);
        header_element.classList.remove(ATTHETOP);
        header_element.classList.add(SCROLLUP);
    }
    last_scroll = current_pos;
}

const getPagePosition = () => {
    current_pos = window.pageYOffset;
    if (current_pos > 0 && fresh_load == 0) {
        header_element.classList.add(SCROLLUP);
        fresh_load = 1;
    }
}

getPagePosition(); //get page position to make sure menu is show if refresh happens after scrolling

if (/Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    menu.classList.remove('duration-0')
    menu.classList.add('duration-400')
}