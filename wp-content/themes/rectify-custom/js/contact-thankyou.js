/**
 * Opens the shared thank-you popup after a successful Gravity Forms or HubSpot
 * submission. HubSpot remains responsible for its native form POST; this
 * script only reacts to HubSpot's persisted-submission browser message.
 */
(function ($) {
    'use strict';

    var lastFocusedElement = null;

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
