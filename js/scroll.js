const ABOUT_AREA = document.getElementById("about");
const ABOUT_CTA = document.querySelectorAll("[href = '#about']");

const PRICING_AREA = document.getElementById("pricing");
const PRICING_CTA = document.querySelectorAll("[href = '#pricing']");

const CONTACT_AREA = document.getElementById("contact");
const CONTACT_CTA = document.querySelectorAll("[href = '#contact']");

for (var i = 0; i < ABOUT_CTA.length; i++) {
    ABOUT_CTA[i].addEventListener('click', (event) => {
        // Don't follow the link
        event.preventDefault();
        ABOUT_AREA.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
}

for (var i = 0; i < PRICING_CTA.length; i++) {
    PRICING_CTA[i].addEventListener('click', (event) => {
        // Don't follow the link
        event.preventDefault();
        PRICING_AREA.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
}

for (var i = 0; i < CONTACT_CTA.length; i++) {
    CONTACT_CTA[i].addEventListener('click', (event) => {
        // Don't follow the link
        event.preventDefault();
        CONTACT_AREA.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
}
