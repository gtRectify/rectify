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

    // Sitewide mobile nav drawer (hamburger toggle + accordion submenus)
    function initMobileNavDrawer() {
        const toggle = document.querySelector('.rx-menu-toggle');
        const closeBtn = document.querySelector('.rx-menu-close');
        const menu = document.getElementById('rx-mobile-menu');

        if (!toggle || !menu) {
            return;
        }

        const mobileQuery = window.matchMedia('(max-width: 860px)');

        function closeAccordions() {
            menu.querySelectorAll('.rx-menu > li.is-open').forEach(function(li) {
                li.classList.remove('is-open');
            });
        }

        function closeMenu() {
            document.body.classList.remove('rx-menu-open');
            toggle.setAttribute('aria-expanded', 'false');
        }

        function openMenu() {
            document.body.classList.add('rx-menu-open');
            toggle.setAttribute('aria-expanded', 'true');
        }

        toggle.addEventListener('click', function() {
            if (document.body.classList.contains('rx-menu-open')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', closeMenu);
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && document.body.classList.contains('rx-menu-open')) {
                closeMenu();
            }
        });

        mobileQuery.addEventListener('change', function(e) {
            if (!e.matches) {
                closeMenu();
                closeAccordions();
            }
        });

        menu.querySelectorAll('.rx-menu > li').forEach(function(li) {
            const submenu = li.querySelector('.rx-mega-submenu');
            const link = li.querySelector('a');

            if (!submenu || !link) {
                return;
            }

            link.addEventListener('click', function(e) {
                if (!mobileQuery.matches) {
                    return;
                }

                e.preventDefault();

                const isOpen = li.classList.contains('is-open');

                menu.querySelectorAll('.rx-menu > li.is-open').forEach(function(other) {
                    if (other !== li) {
                        other.classList.remove('is-open');
                    }
                });

                li.classList.toggle('is-open', !isOpen);
            });
        });
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

    // Case study filter tabs
    function initCaseStudyFilters() {
        const filterBar = document.querySelector('.rx-case-study-filters');

        if (!filterBar) {
            return;
        }

        const buttons = filterBar.querySelectorAll('.rx-case-study-filter');
        const cards = document.querySelectorAll('.rx-case-study-card');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                buttons.forEach(btn => {
                    btn.classList.remove('is-active');
                    btn.setAttribute('aria-selected', 'false');
                });
                this.classList.add('is-active');
                this.setAttribute('aria-selected', 'true');

                const filter = this.getAttribute('data-filter');

                cards.forEach(card => {
                    const matches = filter === 'all' || card.getAttribute('data-category') === filter;
                    card.style.display = matches ? '' : 'none';
                });
            });
        });
    }

    // News and insights filter tabs
    function initNewsFilters() {
        const filterBar = document.querySelector('.rx-news-filters');

        if (!filterBar) {
            return;
        }

        const buttons = filterBar.querySelectorAll('.rx-news-filter');
        const cards = document.querySelectorAll('.rx-news-card');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                buttons.forEach(btn => {
                    btn.classList.remove('is-active');
                    btn.setAttribute('aria-selected', 'false');
                });
                this.classList.add('is-active');
                this.setAttribute('aria-selected', 'true');

                const filter = this.getAttribute('data-filter');

                cards.forEach(card => {
                    const matches = filter === 'all' || card.getAttribute('data-category') === filter;
                    card.style.display = matches ? '' : 'none';
                });
            });
        });
    }

    // Residential FAQ accordion
    function initFaqAccordion() {
        const items = document.querySelectorAll('.rx-faq-item');

        if (!items.length) {
            return;
        }

        items.forEach(item => {
            const question = item.querySelector('.rx-faq-question');

            if (!question) {
                return;
            }

            question.addEventListener('click', function() {
                const isActive = item.classList.contains('is-active');

                items.forEach(other => {
                    other.classList.remove('is-active');
                    const otherQuestion = other.querySelector('.rx-faq-question');
                    if (otherQuestion) {
                        otherQuestion.setAttribute('aria-expanded', 'false');
                    }
                });

                if (!isActive) {
                    item.classList.add('is-active');
                    question.setAttribute('aria-expanded', 'true');
                }
            });
        });
    }

    // Initialize all functions when DOM is ready
    function init() {
        initMobileMenu();
        initMobileNavDrawer();
        initSmoothScroll();
        initActiveMenuState();
        initDropdownMenu();
        initLazyLoad();
        initThemeAutoRefresh();
        initCaseStudyFilters();
        initNewsFilters();
        initFaqAccordion();
    }

    // Wait for DOM to be fully loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
