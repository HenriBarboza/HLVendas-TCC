import Swal from 'sweetalert2';


document.getElementById('btn-conta').addEventListener('click', () => {
    Swal.fire({
        title: 'Escolha uma opção',
        text: 'Clique em um dos botões abaixo para ser redirecionado.',
        showCancelButton: true,
        confirmButtonText: 'Conta',
        cancelButtonText: 'Condição de Pagamento',
        confirmButtonColor: '#6b6b6a',
        cancelButtonColor: '#6b6b6a',
        reverseButtons: true // Inverte a ordem dos botões (Cancelar à esquerda)
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/conta/create';
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            window.location.href = '/condicaoPagamento/create';
        }
    });
});