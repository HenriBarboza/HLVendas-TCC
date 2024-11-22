<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/header.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/styleButton.js', 'resources/js/alert.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="content">
        <div class="navbar">
            <div class="contentLogo">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('images/logo02.png') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="menuDesktop">
                <ul class="lista">
                    <li class="text">
                        <a href="/cliente/create">
                            <i class="fa-solid fa-circle-user icon tooltip" data-tooltip="Clientes"></i>
                        </a>
                    </li>
                    <li class="text">
                        <a href="/produto/create">
                            <i class="fa-solid fa-boxes-stacked icon tooltip" data-tooltip="Produtos"></i>
                        </a>
                    </li>
                    <li class="text">
                        <a href="/venda/create">
                            <i class="fa-solid fa-money-bill-wave icon tooltip" data-tooltip="Venda"></i>
                        </a>
                    </li>
                    <li class="text">
                        <a href="/compra/create">
                            <i class="fa-solid fa-basket-shopping icon tooltip" data-tooltip="Compra"></i>
                        </a>
                    </li>
                    <li class="text">
                        <a href="/fornecedor/create">
                            <i class="fa-solid fa-handshake icon tooltip" data-tooltip="Fornecedores"></i>
                        </a>
                    </li>
                    <li class="text">
                        <a href="/funcionario/create">
                            <i class="fa-solid fa-user-tie icon tooltip" data-tooltip="Funcionarios"></i>
                        </a>
                    </li>
                    @if(@Auth::user()->id === 1)
                        <li class="text">
                            <a id="btn-conta">
                                <i class="fa-solid fa-cash-register icon tooltip" data-tooltip="Conta"></i>
                            </a>
                        </li>
                    @endif
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
                            <?php    echo __('Perfil'); ?>
                        </a>

                        <form method="POST" action="<?php    echo route('logout'); ?>" id="logout-form">
                            <?php    echo csrf_field(); ?>
                            <a href="<?php    echo route('logout'); ?>" class="dropdown-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <?php    echo __('Sair'); ?>
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
</body>

</html>