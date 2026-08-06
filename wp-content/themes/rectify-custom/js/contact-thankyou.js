/**
 * Opens the shared thank-you popup after a successful Gravity Forms or HubSpot
 * submission. HubSpot remains responsible for its native form POST; this
 * script only reacts to HubSpot's persisted-submission browser message.
 */
(function ($) {
    'use strict';

    // These HubSpot forms post straight to HubSpot from the browser, so
    // WordPress never sees that submission server-side. Rather than
    // configuring HubSpot's own follow-up email, the confirmation email is
    // sent from WordPress: once a matching form's "onFormSubmitted"
    // postMessage arrives below, it triggers a wp_mail() send via
    // inc/contact-confirmation-email.php or inc/quote-confirmation-email.php.
    var CONTACT_FORM_ID = 'f02ab874-fad0-436f-a5ca-56897af5b5cb';

    // The /get-a-free-quote/ page form and the sticky "Get a Quick Quote"
    // panel form - both send the same Quote Confirmation Email design.
    var QUOTE_FORM_IDS = [
        'a1c00f4d-e08e-4d15-8916-d0cc2528f9c0',
        'a64c955b-6ec4-441c-ad35-0f84c1a985b9'
    ];

    var lastFocusedElement = null;

    function sendConfirmationEmail(action, submissionValues) {
        var email;
        var firstName;

        if (!submissionValues || !window.rectifyData || !window.rectifyData.ajaxUrl) {
            return;
        }

        email = submissionValues.email || '';
        firstName = submissionValues.firstname || '';

        if (!email) {
            return;
        }

        $.post(window.rectifyData.ajaxUrl, {
            action: action,
            nonce: window.rectifyData.nonce,
            email: email,
            first_name: firstName
        });
    }

    function sendContactConfirmationEmail(submissionValues) {
        sendConfirmationEmail('rectify_contact_confirmation_email', submissionValues);
    }

    function sendQuoteConfirmationEmail(submissionValues) {
        sendConfirmationEmail('rectify_quote_confirmation_email', submissionValues);
    }

    function openModal($modal) {
        var $scroll;

        if (!$modal.length) {
            return;
        }

        lastFocusedElement = document.activeElement;
        $modal.appendTo(document.body).addClass('is-open');
        $modal.attr('aria-hidden', 'false');
        $('html').addClass('rx-thankyou-lock');

        $scroll = $modal.find('.rx-thankyou-scroll');
        if ($scroll.length) {
            $scroll.scrollTop(0);
        }

        window.setTimeout(function () {
            $modal.find('[data-rx-thankyou-close]').first().trigger('focus');
        }, 30);
    }

    function closeModal($modal) {
        $modal.removeClass('is-open');
        $modal.attr('aria-hidden', 'true');
        $('html').removeClass('rx-thankyou-lock');

        if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
            lastFocusedElement.focus();
        }
    }

    function visitHubSpotThankYouPage($modal, eventDetail) {
        var redirectUrl = eventDetail && eventDetail.redirectUrl;
        var frame;

        redirectUrl = redirectUrl || $modal.attr('data-hubspot-thankyou-url');

        if (!redirectUrl || $modal.data('hubspot-thankyou-visited')) {
            return;
        }

        $modal.data('hubspot-thankyou-visited', true);
        frame = document.createElement('iframe');
        frame.className = 'rx-hubspot-thankyou-visit';
        frame.src = redirectUrl;
        frame.title = 'HubSpot thank-you page';
        frame.tabIndex = -1;
        frame.setAttribute('aria-hidden', 'true');
        document.body.appendChild(frame);

        window.setTimeout(function () {
            if (frame.parentNode) {
                frame.parentNode.removeChild(frame);
            }
        }, 30000);
    }

    $(document).on('gform_confirmation_loaded', function (event, formId) {
        var $modal = $('#rx-thankyou-modal-' + parseInt(formId, 10));

        openModal($modal);
    });

    window.addEventListener('message', function (event) {
        var message = event.data;
        var $modal;
        var submittedFormId;

        if (!message || message.type !== 'hsFormCallback' || message.eventName !== 'onFormSubmitted') {
            return;
        }

        submittedFormId = String(message.id || '').toLowerCase();
        $modal = $('.rx-thankyou-modal[data-hubspot-form-id]').filter(function () {
            return String($(this).attr('data-hubspot-form-id') || '').toLowerCase() === submittedFormId;
        }).first();

        if (!$modal.length || !submittedFormId) {
            return;
        }

        if (submittedFormId === CONTACT_FORM_ID) {
            sendContactConfirmationEmail((message.data || {}).submissionValues);
        } else if (QUOTE_FORM_IDS.indexOf(submittedFormId) !== -1) {
            sendQuoteConfirmationEmail((message.data || {}).submissionValues);
        }

        visitHubSpotThankYouPage($modal, message.data || {});
        openModal($modal);
    });

    $(function () {
        $('.rx-thankyou-modal[data-open-on-load="true"]').each(function () {
            var $modal = $(this);
            var submittedQueryArg = $modal.attr('data-submitted-query-arg');
            var url;

            // This page state is reached through HubSpot's own redirect, which
            // is only returned after HubSpot has accepted the native form POST.
            visitHubSpotThankYouPage($modal, {});
            openModal($modal);

            // Avoid reopening the confirmation if the visitor refreshes later.
            if (submittedQueryArg && window.history && window.history.replaceState) {
                url = new URL(window.location.href);
                url.searchParams.delete(submittedQueryArg);
                window.history.replaceState({}, document.title, url.toString());
            }
        });
    });

    $(document).on('click', '[data-rx-thankyou-close]', function () {
        closeModal($(this).closest('.rx-thankyou-modal'));
    });

    $(document).on('keydown.rxThankyou', function (event) {
        var $modal = $('.rx-thankyou-modal.is-open').last();

        if (!$modal.length) {
            return;
        }

        if (event.key === 'Escape' || event.keyCode === 27) {
            closeModal($modal);
        }
    });
}(jQuery));
