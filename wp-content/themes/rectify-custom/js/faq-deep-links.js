(function () {
    'use strict';

    function revealTarget() {
        if (!window.location.hash) {
            return;
        }

        var target = document.getElementById(window.location.hash.slice(1));
        if (!target) {
            return;
        }

        var details = target.matches('details') ? target : target.closest('details');
        if (details) {
            details.open = true;
        }

        var item = target.closest('.rx-faq-item');
        if (item) {
            item.classList.add('is-active');
            var button = item.querySelector('.rx-faq-question');
            if (button) {
                button.setAttribute('aria-expanded', 'true');
            }
        }

        window.setTimeout(function () {
            target.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 100);
    }

    if (document.readyState === 'loading') {
        window.addEventListener('DOMContentLoaded', revealTarget);
    } else {
        revealTarget();
    }

    // Re-align after images and fonts above the FAQ have finished loading.
    window.addEventListener('load', revealTarget);
    window.addEventListener('pageshow', revealTarget);
    window.addEventListener('hashchange', revealTarget);
}());
