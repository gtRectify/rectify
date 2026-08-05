/**
 * "Email" popup on the Meet the Team page.
 *
 * Clicking a card's own EMAIL button opens a popup addressed to just that
 * one person - one recipient per submission, no multi-select. Sends
 * server-side via wp_ajax_rectify_send_staff_email - see inc/staff-email.php.
 */
(function () {
    'use strict';

    var modal = document.getElementById('rx-mtt-email-modal');
    var recipientNameEl = document.getElementById('rx-mtt-email-recipient-name');
    var recipientEmailInput = document.getElementById('rx-mtt-recipient-email');
    var form = document.getElementById('rx-mtt-email-form');
    var statusEl = document.getElementById('rx-mtt-email-status');
    var lastFocusedElement = null;

    if (!modal || !form || !recipientNameEl || !recipientEmailInput) {
        return;
    }

    function setStatus(message, state) {
        statusEl.textContent = message || '';
        if (state) {
            statusEl.setAttribute('data-state', state);
        } else {
            statusEl.removeAttribute('data-state');
        }
    }

    function openModal(email, name) {
        lastFocusedElement = document.activeElement;
        recipientEmailInput.value = email;
        recipientNameEl.textContent = name || email;
        setStatus('', null);
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.documentElement.classList.add('rx-mtt-email-lock');

        window.setTimeout(function () {
            var firstField = form.querySelector('#rx-mtt-sender-name');
            if (firstField) {
                firstField.focus();
            }
        }, 30);
    }

    function closeModal() {
        if (!modal.classList.contains('is-open')) {
            return;
        }

        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.documentElement.classList.remove('rx-mtt-email-lock');

        if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
            lastFocusedElement.focus();
        }
    }

    document.querySelectorAll('.rx-mtt-email').forEach(function (emailLink) {
        var email = emailLink.getAttribute('data-email');

        if (!email) {
            return;
        }

        emailLink.addEventListener('click', function (event) {
            event.preventDefault();
            openModal(email, emailLink.getAttribute('data-name'));
        });
    });

    modal.querySelectorAll('[data-rx-mtt-email-close]').forEach(function (el) {
        el.addEventListener('click', closeModal);
    });

    document.addEventListener('keydown', function (event) {
        if ((event.key === 'Escape' || event.keyCode === 27) && modal.classList.contains('is-open')) {
            closeModal();
        }
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var senderName = form.sender_name.value.trim();
        var senderEmail = form.sender_email.value.trim();
        var subject = form.subject.value.trim();
        var message = form.message.value.trim();
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!recipientEmailInput.value) {
            setStatus('No recipient selected.', 'error');
            return;
        }

        if (!senderName || !senderEmail || !subject || !message) {
            setStatus('Please fill in all fields.', 'error');
            return;
        }

        if (!emailPattern.test(senderEmail)) {
            setStatus('Please enter a valid email address.', 'error');
            return;
        }

        if (typeof window.rectifyData === 'undefined') {
            setStatus('Unable to send right now. Please try again later.', 'error');
            return;
        }

        var submitBtn = form.querySelector('.rx-mtt-email-submit');
        submitBtn.disabled = true;
        setStatus('Sending…', null);

        var body = new URLSearchParams();
        body.set('action', 'rectify_send_staff_email');
        body.set('nonce', window.rectifyData.nonce);
        body.set('rx_mtt_company', form.rx_mtt_company.value);
        body.set('recipient_email', recipientEmailInput.value);
        body.set('sender_name', senderName);
        body.set('sender_email', senderEmail);
        body.set('subject', subject);
        body.set('message', message);

        fetch(window.rectifyData.ajaxUrl, {
            method: 'POST',
            credentials: 'same-origin',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: body.toString()
        })
            .then(function (response) { return response.json(); })
            .then(function (data) {
                submitBtn.disabled = false;

                if (data && data.success) {
                    setStatus((data.data && data.data.message) || 'Message sent.', 'success');

                    window.setTimeout(function () {
                        form.reset();
                        form.subject.value = 'Message from website visitor';
                        closeModal();
                    }, 1200);
                } else {
                    var errorMessage = (data && data.data && data.data.message) || 'Something went wrong. Please try again.';

                    if (data && data.data && data.data.debug) {
                        errorMessage += ' [' + data.data.debug + ']';
                    }

                    setStatus(errorMessage, 'error');
                }
            })
            .catch(function () {
                submitBtn.disabled = false;
                setStatus('Something went wrong. Please try again.', 'error');
            });
    });
}());
