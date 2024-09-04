@vite(['resources/scss/header.scss', 'resources/scss/global.scss', 'resources/css/app.css', 'resources/js/app.js'])
<div class="navbar">
    <div>
        <h1>HLVendas</h1>
    </div>
    <div>
        <ul class="lista">
        <a href="/cliente/create">
            <li class="text">Clientes</li>
        </a>
        <a href="/produto/create">
            <li class="text">Produtos</li>
        </a>
        <a href="/venda/create">
            <li class="text">Venda</li>
        </a>
        <a href="/compra/create">
            <li class="text">Compra</li>
        </a>
        <a href="/fornecedor/create">
            <li class="text">Fornecedores</li>
        </a>
        <a href="/funcionario/create">
            <li class="text">Funcionarios</li>
        </a>
        </ul>
    </div>
    <div class="Perfil">
        <a href="">Entre</a>
        <a href="">Registre-se</a>
    </div>
</div>