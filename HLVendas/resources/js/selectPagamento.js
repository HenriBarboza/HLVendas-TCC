document.addEventListener("DOMContentLoaded", function() {
    // Pegue o seletor de forma de pagamento
    let selectPagamento = document.getElementById("formaPagamentoSelect");

    let inpvalorpago = document.getElementById("valorpago");

    // Verifique se o elemento existe no DOM antes de continuar
    if(selectPagamento){
        // Adicione o event listener para detectar mudanças no select
        selectPagamento.addEventListener("change", function() {
            // Chame a função mostrarInputs quando houver uma mudança no select
            mostrarInputs();
            calcularTroco();
        });
    }

    function restaurarValorOriginal() {
        let valorOriginal = inpvalorpago.getAttribute("data-original-value");
        inpvalorpago.value = valorOriginal;
    }

    mostrarInputs();

    // Defina a função mostrarInputs que será chamada quando o select mudar
    function mostrarInputs() {
        // Pegue o option selecionado
        let selectedOption = selectPagamento.options[selectPagamento.selectedIndex];

        // Pegue os valores desejados
        let condicaopag = selectedOption.value;
        let alterarValor = selectedOption.getAttribute("data-alterar");
        let qntparcelas = selectedOption.getAttribute("data-qntparcelas");
        let diasparcelas = selectedOption.getAttribute("data-diasparcelas");
        
        let inputqntparcelass = document.getElementById('inputqntparcelas');
        let inputdiasparcelas = document.getElementById('inputdiasparcelas');

        document.getElementById("troco").style.display = "none";
        document.getElementById("numerotransacao").style.display = "none";

        if(condicaopag == "1"){
            document.getElementById("troco").style.display = "block";
            document.getElementById("valorpago").removeAttribute("readonly");
            inputqntparcelass.value = qntparcelas;
            inputdiasparcelas.value = diasparcelas;
        }else if(condicaopag == "2" || condicaopag == "3" || condicaopag == "4") {
            document.getElementById("numerotransacao").style.display = "block";
            document.getElementById("valorpago").setAttribute("readonly", "readonly");
            inputqntparcelass.value = qntparcelas;
            inputdiasparcelas.value = diasparcelas;
            restaurarValorOriginal();
        }
    };



    calcularTroco();

    if(inpvalorpago){
        inpvalorpago.addEventListener("keyup", function() {
            calcularTroco();
        });
    }

    function calcularTroco() {
        let inpvalortotal = document.getElementById("valortotal");
        let inpvalortroco = document.getElementById("valortroco");
        let btnsalvar = document.getElementById("btnsalvar");
        let aviso = document.getElementById("avisovalor");
    
        let valortotal = parseFloat(inpvalortotal.value) || 0;
        let valorpago = parseFloat(inpvalorpago.value) || 0;
    
        // Calcule o troco
        let troco = (valorpago - valortotal);
    
        inpvalortroco.value = troco.toFixed(2); // Limitar para 2 casas decimais

        if(troco < 0){
            btnsalvar.setAttribute("disabled", "disabled");
            aviso.style.display = "block";
        } else{
            btnsalvar.removeAttribute("readonly");
            aviso.style.display = "none";
        }
    };

});