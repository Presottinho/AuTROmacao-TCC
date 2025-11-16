document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.dropdown-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      const isOpen = content.classList.contains('open');

      document.querySelectorAll('.dropdown-content.open').forEach(c => {
        c.classList.remove('open');
        c.previousElementSibling.classList.remove('active');
      });

      if (!isOpen) {
        content.classList.add('open');
        btn.classList.add('active');
      } else {
        content.classList.remove('open');
        btn.classList.remove('active');
      }
    });
  });
});
