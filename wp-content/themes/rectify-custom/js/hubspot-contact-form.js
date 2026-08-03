/**
 * Progressive presentation enhancement for the Contact Us HubSpot form.
 *
 * The Figma design (node 94:99) labels every field by its placeholder rather
 * than a visible label, with a trailing "*" on the required ones.
 *
 * HubSpot remains responsible for every field, label, validation message,
 * consent control, submission and confirmation. Nothing here adds, removes or
 * renames a field - only the placeholder attribute is written, and the label
 * stays in the DOM (visually hidden by CSS) so the accessible name and
 * HubSpot's own validation keep working.
 */
(function () {
    'use strict';

    var rootSelector = '.rx-contact-page .rx-contact-form-panel';

    /**
     * The design's placeholder wording, keyed by HubSpot field name. HubSpot's
     * own placeholders are shorter than the design ("Email", "Message"), so
     * these override them; delete an entry to hand that string back to HubSpot,
     * where it can be set on the field instead. The "*" is appended from the
     * field's own required state rather than hard-coded.
     */
    var designPlaceholders = {
        firstname: 'First Name',
        lastname: 'Last Name',
        email: 'Email Address',
        phone: 'Phone number',
        message: 'Description of Issues'
    };

    /**
     * A HubSpot field label is `<span>Label</span><span class="hs-form-required">*</span>`.
     * Read the label without that asterisk span so it is never doubled up.
     */
    function labelText(field) {
        var label = field.querySelector(':scope > label');
        var clone;

        if (!label) {
            return '';
        }

        clone = label.cloneNode(true);

        clone.querySelectorAll('.hs-form-required').forEach(function (node) {
            node.remove();
        });

        return clone.textContent.replace(/\s+/g, ' ').trim();
    }

    function applyPlaceholder(field) {
        var input = field.querySelector('input.hs-input, textarea.hs-input');
        var text;

        if (!input || input.type === 'checkbox' || input.type === 'radio' || input.type === 'file') {
            return;
        }

        // Fall back to the field's own label for anything the design does not
        // name, so a field added in HubSpot later still reads as a placeholder.
        text = designPlaceholders[input.name] || '';

        if (!text) {
            if (input.getAttribute('placeholder')) {
                return;
            }

            text = labelText(field);
        }

        if (!text) {
            return;
        }

        input.setAttribute('placeholder', text + (input.required ? '*' : ''));
    }

    function enhanceForm(root) {
        var form = root.querySelector('form.hs-form');

        if (!form) {
            return false;
        }

        form.querySelectorAll('.hs-form-field').forEach(applyPlaceholder);
        form.classList.add('rx-hs-figma-form');

        return true;
    }

    function init() {
        document.querySelectorAll(rootSelector).forEach(function (root) {
            var observer;

            if (enhanceForm(root)) {
                return;
            }

            // HubSpot injects the form asynchronously, so watch for it instead
            // of racing the embed script.
            observer = new MutationObserver(function () {
                if (enhanceForm(root)) {
                    observer.disconnect();
                }
            });

            observer.observe(root, {
                childList: true,
                subtree: true
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
}());
