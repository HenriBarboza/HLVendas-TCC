// Selecionar Fornecedor
const botaoFornecedorID = document.querySelectorAll('.btn-fornecedor-id');
const campoFornecedorID = document.getElementById('inpFornecedorId');
const campoFornecedorNome = document.getElementById('inpFornecedorNome');

document.addEventListener('click', function (event) {
    if (event.target && event.target.matches('.btn-fornecedor-id')) {
        const botao = event.target;
        campoFornecedorID.value = botao.value;
        campoFornecedorNome.value = botao.getAttribute('data-nome');
        console.log("chamou");
    }
});

