import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    const sidebarIcons = document.getElementById("sidebar-icons");
    const content = document.getElementById("content");

    toggleButton.addEventListener("click", function () {
        if (sidebar.classList.contains("show")) {
            sidebar.classList.remove("show");
            sidebar.classList.add("hidden");
            sidebarIcons.classList.remove("hidden");
            sidebarIcons.classList.add("show");
            content.classList.remove("content-margin");
            content.classList.add("content-no-margin");
        } else {
            sidebar.classList.remove("hidden");
            sidebar.classList.add("show");
            sidebarIcons.classList.remove("show");
            sidebarIcons.classList.add("hidden");
            content.classList.remove("content-no-margin");
            content.classList.add("content-margin");
        }
    });
});

function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function formatAllNumbers() {
    var elements = document.querySelectorAll('.format-number');
    elements.forEach(function(element) {
        var number = parseInt(element.textContent, 10);
        element.textContent = formatNumber(number);
    });
}

window.onload = formatAllNumbers;

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

// init Swiper:
const swiper = new Swiper(".swiper", {
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
