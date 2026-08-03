/**
 * Sticky "Get a Quick Quote" tab + slide-in panel, shown on every page.
 *
 * HubSpot remains responsible for the form itself (rendered by
 * rectify_pb_hubspot_embed()); this script only opens/closes the panel and,
 * on a successful submission, closes it so the shared thank-you popup
 * (opened separately by contact-thankyou.js) is the only thing left open.
 */
(function () {
    'use strict';

    // Must match the form_id passed to rectify_pb_hubspot_embed() in
    // template-parts/sticky-quick-quote.php.
    var STICKY_QUOTE_FORM_ID = 'a64c955b-6ec4-441c-ad35-0f84c1a985b9';

    var root = document.getElementById('rx-sticky-quote');
    var tab = document.getElementById('rx-sticky-quote-tab');
    var panel = document.getElementById('rx-sticky-quote-panel');
    var lastFocusedElement = null;

    if (!root || !tab || !panel) {
        return;
    }

    function openPanel() {
        lastFocusedElement = document.activeElement;
        root.classList.add('is-open');
        panel.setAttribute('aria-hidden', 'false');
        tab.setAttribute('aria-expanded', 'true');
        document.documentElement.classList.add('rx-sq-lock');

        window.setTimeout(function () {
            var closeBtn = panel.querySelector('.rx-sticky-quote-close');
            if (closeBtn) {
                closeBtn.focus();
            }
        }, 30);
    }

    function closePanel() {
        if (!root.classList.contains('is-open')) {
            return;
        }

        root.classList.remove('is-open');
        panel.setAttribute('aria-hidden', 'true');
        tab.setAttribute('aria-expanded', 'false');
        document.documentElement.classList.remove('rx-sq-lock');

        if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
            lastFocusedElement.focus();
        } else {
            tab.focus();
        }
    }

    tab.addEventListener('click', function () {
        if (root.classList.contains('is-open')) {
            closePanel();
        } else {
            openPanel();
        }
    });

    panel.querySelectorAll('[data-rx-sq-close]').forEach(function (el) {
        el.addEventListener('click', closePanel);
    });

    document.addEventListener('keydown', function (event) {
        if ((event.key === 'Escape' || event.keyCode === 27) && root.classList.contains('is-open')) {
            closePanel();
        }
    });

    window.addEventListener('message', function (event) {
        var message = event.data;

        if (!message || message.type !== 'hsFormCallback' || message.eventName !== 'onFormSubmitted') {
            return;
        }

        if (String(message.id || '').toLowerCase() === STICKY_QUOTE_FORM_ID) {
            closePanel();
        }
    });
}());
