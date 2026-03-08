document.addEventListener('DOMContentLoaded', function () {
    // Prevent Bootstrap's default dropdown behavior on mobile for submenus
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
      toggle.addEventListener('click', function (e) {
        if (window.innerWidth <= 767.98) {
          e.preventDefault();
          e.stopPropagation();
          const parent = this.parentElement;
          const submenu = parent.querySelector('.dropdown-menu');
          if (submenu) {
            // Toggle the submenu
            submenu.classList.toggle('show');
            this.setAttribute('aria-expanded', submenu.classList.contains('show'));

            // Close other submenus at the same level
            const siblingMenus = parent.parentElement.querySelectorAll('.dropdown-menu.show');
            siblingMenus.forEach(menu => {
              if (menu !== submenu) {
                menu.classList.remove('show');
                const siblingToggle = menu.previousElementSibling;
                if (siblingToggle) {
                  siblingToggle.setAttribute('aria-expanded', 'false');
                }
              }
            });
          }
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
            if (toggle) {
              toggle.setAttribute('aria-expanded', 'false');
            }
          });
        }
      }
    });

  });