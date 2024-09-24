document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', function() {
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
        menuToggle.setAttribute('aria-expanded', !isExpanded);
        mobileMenu.classList.toggle('hidden');
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            // Hide the mobile menu when resizing to desktop size
            mobileMenu.classList.add('hidden');
            menuToggle.setAttribute('aria-expanded', false);
        }
    });
});
