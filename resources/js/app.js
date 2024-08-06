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
