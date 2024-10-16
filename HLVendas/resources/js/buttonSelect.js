// Selecionar Fornecedor
const campoFornecedorID = document.getElementById('inpFornecedorId');
const campoFornecedorNome = document.getElementById('inpFornecedorNome');

const campoClienteID = document.getElementById('inpClienteId');
const campoClienteNome = document.getElementById('inpClienteNome');

document.addEventListener('click', function (event) {
    if (event.target && event.target.matches('.btn-fornecedor-id')) {
        const botao = event.target;
        campoFornecedorID.value = botao.value;
        campoFornecedorNome.value = botao.getAttribute('data-nome');
    }
});

document.addEventListener('click', function (event) {
    if (event.target && event.target.matches('.btn-cliente-id')) {
        const botao = event.target;
        campoClienteID.value = botao.value;
        campoClienteNome.value = botao.getAttribute('data-nome');
    }
});

