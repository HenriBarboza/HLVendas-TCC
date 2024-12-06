import Swal from "sweetalert2";

function deleteEntity(form, redirectUrl, entityName) {
    let formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Para depuração

        if (data.success) {
            // Exibe a resposta de sucesso
            Swal.fire('Excluído!', `${data.success}`, 'success')
                .then(() => {
                    // Redireciona para a URL de redirecionamento específica
                    window.location.href = redirectUrl; // Redireciona para a página correspondente
                });
        } else if (data.error) {
            // Exibe a resposta de erro
            Swal.fire('Erro!', `${data.error}`, 'error');
        }
    })
    .catch(error => {
        Swal.fire('Erro!', 'Houve um problema ao excluir.', 'error');
    });
}

// Função que lida com a lógica de exclusão
function handleDeleteButtonClick(event, form, redirectUrl, entityName) {
    event.preventDefault(); // Impede o envio do formulário até confirmar

    Swal.fire({
        title: 'Tem certeza?',
        text: 'Você não poderá reverter isso!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sim, excluir!',
    }).then((result) => {
        if (result.isConfirmed) {
            // Envia o formulário via AJAX para a função genérica
            deleteEntity(form, redirectUrl, entityName);
        }
    });
}

// Seleciona os botões e formulários para exclusão
document.addEventListener('DOMContentLoaded', function() {
    const deleteClienteButton = document.querySelector('.btn-excluir-cliente');
    const deleteFuncionarioButton = document.querySelector('.btn-excluir-funcionario');
    const deleteProdutoButton = document.querySelector('.btn-excluir-produto');
    const deleteEstoqueButton = document.querySelector('.btn-excluir-estoque');
    const deleteVendaButton = document.querySelector('.btn-excluir-venda');
    const deleteCompraButton = document.querySelector('.btn-excluir-compra');
    const deleteFornecedorButton = document.querySelector('.btn-excluir-fornecedor');
    const condicaoButton = document.querySelector('.btn-excluir-condicao');
    const contaButton = document.querySelector('.btn-excluir-conta');
    const clienteForm = document.querySelector('#deleteClienteForm');
    const funcionarioForm = document.querySelector('#deleteFuncionarioForm');
    const produtoForm = document.querySelector('#deleteProdutoForm');
    const estoqueForm = document.querySelector('#deleteEstoqueForm');
    const vendaForm = document.querySelector('#deleteVendaForm');
    const compraForm = document.querySelector('#deleteCompraForm');
    const fornecedorForm = document.querySelector('#deleteFornecedorForm');
    const condicaoForm = document.querySelector('#deleteCondicaoForm');
    const contaForm = document.querySelector('#deleteContaForm');

    // Verifica se os botões existem antes de adicionar o event listener
    if (deleteClienteButton && clienteForm) {
        deleteClienteButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, clienteForm, '/cliente', 'Cliente');
        });
    }

    if (deleteFuncionarioButton && funcionarioForm) {
        deleteFuncionarioButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, funcionarioForm, '/funcionario/create', 'Funcionário');
        });
    }

    if (deleteProdutoButton && produtoForm) {
        deleteProdutoButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, produtoForm, '/produto', 'Produto');
        });
    }

    if (deleteEstoqueButton && estoqueForm) {
        deleteEstoqueButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, estoqueForm, '/estoque', 'Estoque');
        });
    }

    if (deleteVendaButton && vendaForm) {
        deleteVendaButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, vendaForm, '/venda', 'Venda');
        });
    }

    if (deleteCompraButton && compraForm) {
        deleteCompraButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, compraForm, '/compra', 'Compra');
        });
    }

    if (deleteFornecedorButton && fornecedorForm) {
        deleteFornecedorButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, fornecedorForm, '/fornecedor', 'Fornecedor');
        });
    }

    if (condicaoButton && condicaoForm) {
        condicaoButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, condicaoForm, '/condicaoPagamento', 'CondicaoPagamento');
        });
    }

    if (contaButton && contaForm) {
        contaButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, contaForm, '/conta', 'Conta');
        });
    }
});