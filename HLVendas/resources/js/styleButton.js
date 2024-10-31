document.addEventListener('DOMContentLoaded', () => {
  const menuLinks = document.querySelectorAll('.menuDesktop .lista .text a');
  const activeLink = localStorage.getItem('activeLink');

  if (activeLink) {
      document.querySelector(`.menuDesktop .lista .text a[href="${activeLink}"] i`).classList.add('active');
  }

  menuLinks.forEach(link => {
      link.addEventListener('click', (e) => {
          document.querySelectorAll('.menuDesktop .lista .text i').forEach(icon => icon.classList.remove('active'));

          const icon = link.querySelector('i');
          if (icon) {
              icon.classList.add('active');
          }

          localStorage.setItem('activeLink', link.getAttribute('href'));
      });
  });
});