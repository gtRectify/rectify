/**
 * Progressive presentation enhancement for the Get a Free Quote HubSpot form.
 *
 * HubSpot remains responsible for every field, label, validation message,
 * consent control, upload limit, submission, and confirmation. This script
 * only adds a decorative layer to the native file input after HubSpot injects
 * the form asynchronously.
 */
(function () {
    'use strict';

    var rootSelector = '.rx-quotation-page .rx-quotation-form';

    function textBeforeFirstBreak(element) {
        var node;

        if (!element) {
            return '';
        }

        for (node = element.firstChild; node; node = node.nextSibling) {
            if (node.nodeType === Node.TEXT_NODE && node.textContent.trim()) {
                return node.textContent.trim();
            }

            if (node.nodeName === 'BR') {
                break;
            }
        }

        return '';
    }

    function createUploadUi(field, input) {
        var inputWrap = input.parentElement;
        var description = field.querySelector('.hs-field-desc');
        var limitText = textBeforeFirstBreak(description);
        var uploadUi;
        var uploadCopy;
        var uploadAction;
        var uploadSecondary;
        var uploadHint;

        if (!inputWrap || inputWrap.querySelector('.rx-hs-upload-ui')) {
            return;
        }

        uploadUi = document.createElement('span');
        uploadUi.className = 'rx-hs-upload-ui';
        uploadUi.setAttribute('aria-hidden', 'true');

        uploadCopy = document.createElement('span');
        uploadCopy.className = 'rx-hs-upload-copy';

        uploadAction = document.createElement('strong');
        uploadAction.className = 'rx-hs-upload-action';
        uploadAction.textContent = 'Click to upload';

        uploadSecondary = document.createElement('span');
        uploadSecondary.className = 'rx-hs-upload-secondary';
        uploadSecondary.textContent = ' or drag and drop';

        uploadHint = document.createElement('small');
        uploadHint.className = 'rx-hs-upload-hint';
        uploadHint.textContent = limitText || 'Choose a file to attach';

        uploadCopy.appendChild(uploadAction);
        uploadCopy.appendChild(uploadSecondary);
        uploadCopy.appendChild(uploadHint);
        uploadUi.appendChild(uploadCopy);
        inputWrap.appendChild(uploadUi);

        input.addEventListener('change', function () {
            var file = input.files && input.files[0];

            uploadAction.textContent = file ? file.name : 'Click to upload';
            uploadSecondary.textContent = file ? '' : ' or drag and drop';
            uploadHint.textContent = file ? 'File selected' : (limitText || 'Choose a file to attach');
            inputWrap.classList.toggle('has-file', Boolean(file));
        });

        ['dragenter', 'dragover'].forEach(function (eventName) {
            input.addEventListener(eventName, function () {
                inputWrap.classList.add('is-dragging');
            });
        });

        ['dragleave', 'drop'].forEach(function (eventName) {
            input.addEventListener(eventName, function () {
                inputWrap.classList.remove('is-dragging');
            });
        });
    }

    function enhanceForm(root) {
        var form = root.querySelector('form');

        if (!form) {
            return false;
        }

        form.querySelectorAll('.hs-fieldtype-file input[type="file"]').forEach(function (input) {
            createUploadUi(input.closest('.hs-fieldtype-file'), input);
        });

        form.classList.add('rx-hs-figma-form');
        return true;
    }

    function init() {
        var roots = document.querySelectorAll(rootSelector);

        roots.forEach(function (root) {
            var observer;

            if (enhanceForm(root)) {
                return;
            }

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
