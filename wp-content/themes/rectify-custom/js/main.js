/**
 * Rectify Custom Theme - Main JavaScript
 */

(function() {
    'use strict';

    // Mobile menu toggle
    function initMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const mainNav = document.querySelector('.main-navigation');

        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                mainNav.classList.toggle('is-open');
                this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'false' ? 'true' : 'false');
            });
        }
    }

    // Smooth scroll for anchor links
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Add active class to current menu item
    function initActiveMenuState() {
        const currentUrl = window.location.href;
        const menuItems = document.querySelectorAll('.main-navigation a');

        menuItems.forEach(item => {
            if (item.href === currentUrl) {
                item.parentElement.classList.add('active');
            }
        });
    }

    // Accessible dropdown menu
    function initDropdownMenu() {
        const menuItems = document.querySelectorAll('.main-navigation li');

        menuItems.forEach(item => {
            const link = item.querySelector('a');
            const submenu = item.querySelector('ul');

            if (submenu) {
                link.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        item.classList.toggle('expanded');
                    }
                });
            }
        });
    }

    // Image lazy loading (if needed)
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            const images = document.querySelectorAll('img[data-src]');

            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
        }
    }

    // Auto-refresh preview when theme files change
    function initThemeAutoRefresh() {
        const refreshUrl = '/wp-content/themes/rectify-custom/theme-refresh-check.php';
        let lastModified = 0;

        function checkForUpdates() {
            fetch(refreshUrl + '?t=' + Date.now(), { cache: 'no-store' })
                .then(response => response.ok ? response.json() : null)
                .then(data => {
                    if (!data || !data.modified) {
                        return;
                    }

                    if (lastModified && data.modified > lastModified) {
                        window.location.reload();
                    }

                    lastModified = data.modified;
                })
                .catch(() => {});
        }

        checkForUpdates();
        setInterval(checkForUpdates, 2000);
    }

    // Initialize all functions when DOM is ready
    function init() {
        initMobileMenu();
        initSmoothScroll();
        initActiveMenuState();
        initDropdownMenu();
        initLazyLoad();
        initThemeAutoRefresh();
    }

    // Wait for DOM to be fully loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
