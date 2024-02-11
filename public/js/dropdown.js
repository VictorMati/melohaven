// dropdown.js

document.addEventListener("DOMContentLoaded", function () {
    var usernameElement = document.querySelector('.username');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    if (usernameElement) {
        usernameElement.addEventListener('mouseover', function () {
            showDropdown();
        });

        usernameElement.addEventListener('mouseout', function () {
            hideDropdown();
        });

        dropdownMenu.addEventListener('mouseover', function () {
            showDropdown();
        });

        dropdownMenu.addEventListener('mouseout', function () {
            hideDropdown();
        });
    }

    function showDropdown() {
        if (dropdownMenu) {
            dropdownMenu.style.display = 'block';
        }
    }

    function hideDropdown() {
        if (dropdownMenu) {
            dropdownMenu.style.display = 'none';
        }
    }
});
