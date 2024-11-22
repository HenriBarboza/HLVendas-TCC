import Swal from "sweetalert2";

// document.getElementById("deleteForm").addEventListener("submit", function (e) {
//     e.preventDefault();

//     Swal.fire({
//         title: "Tem certeza?",
//         text: "Você não poderá reverter isso!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Sim, excluir!",
//         cancelButtonText: "Cancelar",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             e.target.submit();
//         }
//     });
// });

// import Swal from "sweetalert2";

// const deleteButton = document.querySelector('.btn-excluir');
// const form = document.querySelector('#deleteForm');

// deleteButton.addEventListener('click', function(event) {
//     event.preventDefault(); // Impede o envio do formulário até confirmar

//     Swal.fire({
//         title: 'Tem certeza?',
//         text: 'Você não poderá reverter isso!',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#3085d6',
//         confirmButtonText: 'Sim, excluir!',
//     }).then((result) => {
//         if (result.isConfirmed) {
//             // Envia o formulário via AJAX
//             deleteCliente();
//             deleteFuncionario();
//         }
//     });
// });

// function deleteCliente() {
//     let formData = new FormData(form);

//     fetch(form.action, {
//         method: 'POST',
//         body: formData,
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         }
//     })
//     .then(response => response.json())
//     .then(data => {
//         console.log(data); // Para depuração

//         if (data.success) {
//             // Exibe a resposta de sucesso com o nome do cliente
//             Swal.fire('Excluído!', `${data.success}`, 'success')
//                 .then(() => {
//                     // Redireciona para a página de listagem de clientes ou qualquer outra página
//                     window.location.href = '/cliente'; // Exemplo de redirecionamento para a lista de clientes
//                 });
//         } else if (data.error) {
//             // Exibe a resposta de erro com o nome do cliente
//             Swal.fire('Erro!', `${data.error}`, 'error');
//         }
//     })
//     .catch(error => {
//         Swal.fire('Erro!', 'Houve um problema ao excluir o cliente.', 'error');
//     });
// }

// function deleteFuncionario() {
//     let formData = new FormData(form);

//     fetch(form.action, {
//         method: 'POST',
//         body: formData,
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         }
//     })
//     .then(response => response.json())
//     .then(data => {
//         console.log(data); // Para depuração

//         if (data.success) {
//             // Exibe a resposta de sucesso com o nome do cliente
//             Swal.fire('Excluído!', `${data.success}`, 'success')
//                 .then(() => {
//                     // Redireciona para a página de listagem de clientes ou qualquer outra página
//                     window.location.href = '/funcionario'; // Exemplo de redirecionamento para a lista de clientes
//                 });
//         } else if (data.error) {
//             // Exibe a resposta de erro com o nome do cliente
//             Swal.fire('Erro!', `${data.error}`, 'error');
//         }
//     })
//     .catch(error => {
//         Swal.fire('Erro!', 'Houve um problema ao excluir o cliente.', 'error');
//     });
// }

// import Swal from "sweetalert2";

// Função genérica para deletar qualquer entidade
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
    const clienteForm = document.querySelector('#deleteClienteForm');
    const funcionarioForm = document.querySelector('#deleteFuncionarioForm');

    // Verifica se os botões existem antes de adicionar o event listener
    if (deleteClienteButton && clienteForm) {
        deleteClienteButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, clienteForm, '/cliente', 'Cliente');
        });
    }

    if (deleteFuncionarioButton && funcionarioForm) {
        deleteFuncionarioButton.addEventListener('click', function(event) {
            handleDeleteButtonClick(event, funcionarioForm, '/funcionario', 'Funcionário');
        });
    }
});
