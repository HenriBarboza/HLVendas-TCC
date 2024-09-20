document.addEventListener('DOMContentLoaded', function () {
  const inputs = document.querySelectorAll('.inputWrapper');

  inputs.forEach(input => {
    const label = input.previousElementSibling;

    input.addEventListener('focus', () => {
      if (label) {
        label.classList.add('active');
      }
      input.classList.add('filled');
    });

    input.addEventListener('blur', () => {
      if (input.value === '') {
        if (label) {
          label.classList.remove('active');
        }
        input.classList.remove('filled');
      }
    });

    if (input.value !== '') {
      if (label) {
        label.classList.add('active');
      }
      input.classList.add('filled');
    }
  });
});