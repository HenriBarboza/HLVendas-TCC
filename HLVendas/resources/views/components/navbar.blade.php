@vite(['resources/scss/header.scss', 'resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="content">
    <div class="navbar">
        <div class="logo">
            <img src="storage\app\public\images\revenue.png" alt="">
            <h1>HLVendas</h1>
        </div>

        <div class="menuDesktop">
            <ul class="lista">
                <li class="text">
                    <a href="/cliente/create">
                        <i class="fa-solid fa-circle-user"></i>
                        Clientes
                    </a>
                </li>
                <li class="text">
                    <a href="/produto/create">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        Produtos
                    </a>
                </li>
                <li class="text">
                    <a href="/venda/create">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        Venda
                    </a>
                </li>
                <li class="text">
                    <a href="/compra/create">
                        <i class="fa-solid fa-basket-shopping"></i>
                        Compra
                    </a>
                </li>
                <li class="text">
                    <a href="/fornecedor/create">
                        <i class="fa-solid fa-handshake"></i>
                        Fornecedores
                    </a>
                </li>
                <li class="text">
                    <a href="/funcionario/create">
                        <i class="fa-solid fa-user-tie"></i>
                        Funcionarios
                    </a>
                </li>
                <li class="text">
                    <a href="/conta/create">
                        <i class="fa-solid fa-cash-register"></i>
                        Conta
                    </a>
                </li>
            </ul>
        </div>

        @if (Auth::check())
            <div class="dropdown items-center">
                <button
                    class="dropdown-trigger inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div><?php    echo Auth::user()->name; ?></div>

                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>

                <div class="dropdown-content">
                    <a href="<?php    echo route('profile.edit'); ?>" class="dropdown-link">
                        <?php    echo __('Profile'); ?>
                    </a>

                    <!-- Authentication -->
                    <form method="POST" action="<?php    echo route('logout'); ?>" id="logout-form">
                        <?php    echo csrf_field(); ?>
                        <a href="<?php    echo route('logout'); ?>" class="dropdown-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <?php    echo __('Log Out'); ?>
                        </a>
                    </form>
                </div>
            </div>
        @else
            <div class="perfil">
                <div class="content-perfil">
                    <p class="text">
                        <a href="/login">Entre</a>
                    </p>
                    <p class="text">
                        <a href="/register">Registre-se</a>
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>