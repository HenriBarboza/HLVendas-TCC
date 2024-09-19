document.addEventListener('DOMContentLoaded', function () {
  function formatCpf(value) {
    value = value.replace(/\D/g, '');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    return value.length > 14 ? value.slice(0, 14) : value;
  }

  function formatCnpj(value) {
    value = value.replace(/\D/g, '');
    value = value.replace(/^(\d{2})(\d)/, '$1.$2');
    value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
    value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
    value = value.replace(/(\d{4})(\d)/, '$1-$2');
    return value.length > 18 ? value.slice(0, 18) : value;
  }

  function formatCpfCnpj() {
    const cpfCnpjInput = document.querySelectorAll('.cpfcnpj');
    if (cpfCnpjInput) {
      cpfCnpjInput.forEach(function (cpfCnpjInput) {
        cpfCnpjInput.addEventListener('input', function () {
          let value = cpfCnpjInput.value.replace(/\D/g, '');
          cpfCnpjInput.value = value.length <= 11 ? formatCpf(value) : formatCnpj(value);
        });
      });
    }
  }

  function formatOnlyCpf() {
    const cpfInput = document.querySelectorAll('.cpf');
    if (cpfInput) {
      cpfInput.forEach(function (cpfInput) {
        cpfInput.addEventListener('input', function () {
          cpfInput.value = formatCpf(cpfInput.value);
        });
      });
    }
  }

  function formatPhone() {
    const phoneInput = document.querySelectorAll('.phone');
    if (phoneInput) {
      phoneInput.forEach(function (phoneInput) {
        phoneInput.addEventListener('input', function () {
          let value = phoneInput.value;
          value = value.replace(/\D/g, '');
          value = value.length <= 14 ? value.replace(/^(\d{2})(\d)/, '($1) $2').replace(/(\d{5})(\d{0,4})$/, '$1-$2') : value.replace(/^(\d{2})(\d{2})(\d{5})(\d{0,4})$/, '+55 $1 $2 $3-$4');
          phoneInput.value = value;
        });
      });
    }
  }

  function formatNumber() {
    const numberInput = document.querySelectorAll('.number');
    if (numberInput) {
      numberInput.forEach(function (numberInput) {
        numberInput.addEventListener('input', function () {
          numberInput.value = numberInput.value.replace(/\D/g, '');
        });
      });
    }
  }

  function formatCEP() {
    const cep = document.querySelectorAll('.cep');
    if (cep) {
      cep.forEach(function (cep) {
        cep.addEventListener('input', function () {
          let value = cep.value;
          value = value.replace(/\D/g, '');
          value = value.replace(/(\d{5})(\d{0,3})$/, '$1-$2');
          cep.value = value;
        });
      });
    }
  }

  formatCpfCnpj();
  formatOnlyCpf();
  formatPhone();
  formatNumber();
  formatCEP();
});