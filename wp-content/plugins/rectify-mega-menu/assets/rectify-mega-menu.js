document.addEventListener('DOMContentLoaded', function () {
  const parents = document.querySelectorAll('.rx-mega-parent');

  if (!parents.length || window.innerWidth > 860) {
    return;
  }

  parents.forEach(function (parent) {
    parent.addEventListener('click', function (event) {
      const link = event.target.closest('a');
      if (!link || !parent.contains(link)) {
        return;
      }

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
