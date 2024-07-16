@vite(['resources/scss/header.scss', 'resources/scss/global.scss', 'resources/css/app.css', 'resources/js/app.js'])

<div class="navbar">
    <div>
        <h1>HLVendas</h1>
    </div>
    <div>
        <ul class="lista">
        <a href="/cliente">
            <li class="text">Clientes</li>
        </a>
        <a href="/produto/create">
            <li class="text">Produtos</li>
        </a>
        <a href="/venda">
            <li class="text">Venda</li>
        </a>
        <a href="/">
            <li class="text">Fornecedores</li>
        </a>
        </ul>
    </div>
    <div class="Perfil">
        <a href="">Entre</a>
        <a href="">Registre-se</a>
    </div>
</div>