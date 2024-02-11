// toggle.js

document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".sidebar");
    const sidebarToggle = document.querySelector(".sidebar-toggle");

    // Initial check for screen size
    toggleSidebar();

    // Add event listener for window resize
    window.addEventListener("resize", toggleSidebar);

    function toggleSidebar() {
        // Get the window width
        const windowWidth = window.innerWidth;

        // Check if the window width is less than or equal to 768px (example for mobile)
        if (windowWidth <= 768) {
            sidebar.classList.add("hidden");
        } else {
            sidebar.classList.remove("hidden");
        }
    }

    // Add click event listener to the toggle button
    sidebarToggle.addEventListener("click", function () {
        sidebar.classList.toggle("hidden");
    });
});
