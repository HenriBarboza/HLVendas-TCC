// Selecionar Fornecedor
const botaoFornecedorID = document.querySelectorAll('.btn-fornecedor-id');
const campoFornecedorID = document.getElementById('inpFornecedorId');
const campoFornecedorNome = document.getElementById('inpFornecedorNome');


botaoFornecedorID.forEach(botao => {
    botao.onclick = function () {
        campoFornecedorID.value = botao.value;
        campoFornecedorNome.value = botao.getAttribute('data-nome');
        console.log("chamou");
    };
});

