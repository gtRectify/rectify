(function () {
    var AUTOPLAY_DELAY = 4000;
    var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function stepWidth(grid) {
        var card = grid.querySelector('.rx-ii-solution-card');
        if (!card) {
            return grid.clientWidth;
        }

        var gap = parseFloat(getComputedStyle(grid).columnGap || getComputedStyle(grid).gap || '0') || 0;

        return card.getBoundingClientRect().width + gap;
    }

    function initSlider(track) {
        var grid = track.querySelector('.rx-ii-solutions-grid');
        var prevBtn = track.querySelector('.rx-ii-solutions-prev');
        var nextBtn = track.querySelector('.rx-ii-solutions-next');

        if (!grid || !prevBtn || !nextBtn) {
            return;
        }

        var autoplayTimer = null;

        function maxScroll() {
            return grid.scrollWidth - grid.clientWidth;
        }

        function isScrollable() {
            return maxScroll() > 1;
        }

        function arrowsVisible() {
            return getComputedStyle(nextBtn).display !== 'none';
        }

        function refresh() {
            var scrollable = isScrollable();

            prevBtn.classList.toggle('is-hidden', !scrollable);
            nextBtn.classList.toggle('is-hidden', !scrollable);
        }

        function goTo(left) {
            grid.scrollTo({ left: left, behavior: 'smooth' });
        }

        function next() {
            var atEnd = grid.scrollLeft >= maxScroll() - 1;
            goTo(atEnd ? 0 : grid.scrollLeft + stepWidth(grid));
        }

        function prev() {
            var atStart = grid.scrollLeft <= 1;
            goTo(atStart ? maxScroll() : grid.scrollLeft - stepWidth(grid));
        }

        function stopAutoplay() {
            if (autoplayTimer) {
                clearInterval(autoplayTimer);
                autoplayTimer = null;
            }
        }

        function startAutoplay() {
            stopAutoplay();

            if (prefersReducedMotion || !isScrollable() || !arrowsVisible()) {
                return;
            }

            autoplayTimer = setInterval(next, AUTOPLAY_DELAY);
        }

        prevBtn.addEventListener('click', function () {
            prev();
            startAutoplay();
        });

        nextBtn.addEventListener('click', function () {
            next();
            startAutoplay();
        });

        track.addEventListener('mouseenter', stopAutoplay);
        track.addEventListener('mouseleave', startAutoplay);
        track.addEventListener('focusin', stopAutoplay);
        track.addEventListener('focusout', startAutoplay);

        window.addEventListener('resize', function () {
            refresh();
            startAutoplay();
        });

        refresh();
        startAutoplay();
    }

    function init() {
        document.querySelectorAll('.rx-ii-solutions-track').forEach(initSlider);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
