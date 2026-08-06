document.addEventListener('DOMContentLoaded', function () {
  // The homepage template (rectify-homepage-draft2-v3/assets/js/rectify-home.js)
  // loads its own richer mega-menu accordion controller and sets this flag once
  // it has attached its click handlers. Without this check, both scripts attach
  // a click listener to the same links: each one independently reads the
  // current `is-open` state and toggles it, so on a single tap the first
  // handler opens the submenu and the second immediately closes it again,
  // making the accordion appear completely unresponsive. Skip attaching here
  // when the richer controller already has it covered.
  if (window.__rxMegaMenuInit) {
    return;
  }

  const parents = document.querySelectorAll('.rx-mega-parent');

  if (!parents.length || window.innerWidth > 860) {
    return;
  }

  // Claim the shared flag so any other controller sharing this page (e.g.
  // the theme's global main.js fallback accordion) knows a handler is
  // already attached and skips wiring up its own — see the comment above
  // for why a second handler makes the accordion look unresponsive.
  window.__rxMegaMenuInit = true;

  parents.forEach(function (parent) {
    // Only the top-level link toggles the accordion. Attaching this to
    // `parent` instead (delegating via event.target.closest('a')) would also
    // catch taps on real destination links inside the open submenu — e.g.
    // "Cracked Walls" or "EXPLORE MORE SOLUTIONS" — and preventDefault() them
    // into a dead click that just closes the panel instead of navigating.
    const topLink = parent.querySelector(':scope > .rx-mega-link');
    if (!topLink) {
      return;
    }

    topLink.addEventListener('click', function (event) {
      event.preventDefault();
      const isOpen = parent.classList.contains('is-open');
      parents.forEach(function (item) {
        item.classList.remove('is-open');
      });

      if (!isOpen) {
        parent.classList.add('is-open');
      }
    });
  });

  document.addEventListener('click', function (event) {
    if (!event.target.closest('.rx-mega-parent')) {
      parents.forEach(function (item) {
        item.classList.remove('is-open');
      });
    }
  });
});
