window.onload = function () {
  const loader = document.querySelector('.loader');
  if (loader) {
      setTimeout(function () {
          loader.classList.add('hide'); // Esconde o loader
      }, 500)
  }
};