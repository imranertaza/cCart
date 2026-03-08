document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            if (window.innerWidth <= 767.98) {
                const submenu = this.parentElement.querySelector('.dropdown-menu');
                const isSvgClick = e.target.closest('.dropdown-icon'); // Only SVG triggers submenu

                if (submenu && isSvgClick) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Toggle submenu
                    submenu.classList.toggle('show');
                    this.setAttribute('aria-expanded', submenu.classList.contains('show'));

                    // Close other open submenus at same level
                    const siblingMenus = this.parentElement.parentElement.querySelectorAll('.dropdown-menu.show');
                    siblingMenus.forEach(menu => {
                        if (menu !== submenu) {
                            menu.classList.remove('show');
                            const siblingToggle = menu.previousElementSibling;
                            if (siblingToggle) siblingToggle.setAttribute('aria-expanded', 'false');
                        }
                    });
                }
                // Otherwise, allow link to work normally
            }
        });
    });

    // Close all dropdowns when clicking outside
    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 767.98) {
            if (!e.target.closest('.dropdown') && !e.target.closest('.dropdown-submenu')) {
                const openMenus = document.querySelectorAll('.dropdown-menu.show');
                openMenus.forEach(menu => {
                    menu.classList.remove('show');
                    const toggle = menu.previousElementSibling;
                    if (toggle) toggle.setAttribute('aria-expanded', 'false');
                });
            }
        }
    });
});
