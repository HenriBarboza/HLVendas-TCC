document.addEventListener('DOMContentLoaded', function () {
    const custoInput = document.getElementById('custo');
    const percCustoInput = document.getElementById('perccusto');
    const percPrazoInput = document.getElementById('percprazo');
    const precoAvistaInput = document.getElementById('precoavista');
    const precoAprazoInput = document.getElementById('precoaprazo');

    // Função para calcular o preço à vista
    function calcularPrecoAvista() {
        const custo = parseFloat(custoInput.value) || 0;
        const percentualCusto = parseFloat(percCustoInput.value) || 0;

        const precoAvista = custo + (custo * percentualCusto / 100);
        precoAvistaInput.value = precoAvista.toFixed(2);
        calcularPrecoPrazo(); // Atualizar o preço a prazo também
    }

    // Função para calcular o percentual sobre o custo
    function calcularPercentualCusto() {
        const custo = parseFloat(custoInput.value) || 0;
        const precoAvista = parseFloat(precoAvistaInput.value) || 0;

        if (custo > 0) {
            const percentualCusto = ((precoAvista - custo) / custo) * 100;
            percCustoInput.value = percentualCusto.toFixed(2);
        } else {
            percCustoInput.value = 0;
        }
        calcularPrecoPrazo(); // Atualizar o preço a prazo também
    }

    // Função para calcular o preço à prazo
    function calcularPrecoPrazo() {
        const precoAvista = parseFloat(precoAvistaInput.value) || 0;
        const percentualPrazo = parseFloat(percPrazoInput.value) || 0;

        const precoAprazo = precoAvista + (precoAvista * percentualPrazo / 100);
        precoAprazoInput.value = precoAprazo.toFixed(2);
    }

    // Função para calcular o percentual de prazo
    function calcularPercentualPrazo() {
        const precoAvista = parseFloat(precoAvistaInput.value) || 0;
        const precoAprazo = parseFloat(precoAprazoInput.value) || 0;

        if (precoAvista > 0) {
            const percentualPrazo = ((precoAprazo - precoAvista) / precoAvista) * 100;
            percPrazoInput.value = percentualPrazo.toFixed(2);
        } else {
            percPrazoInput.value = 0;
        }
    }

    // Event listeners
    percCustoInput.addEventListener('input', calcularPrecoAvista);
    custoInput.addEventListener('input', calcularPrecoAvista);
    precoAvistaInput.addEventListener('input', calcularPercentualCusto);
    percPrazoInput.addEventListener('input', calcularPrecoPrazo);
    precoAprazoInput.addEventListener('input', calcularPercentualPrazo);
});
