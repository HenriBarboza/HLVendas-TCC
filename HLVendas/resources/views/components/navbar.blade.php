@vite(['resources/scss/header.scss', 'resources/css/app.css', 'resources/js/app.js'])

<div class="content">
    <div class="navbar">
        <div class="logo">
            <img src="storage\app\public\images\revenue.png" alt="">
            <h1>HLVendas</h1>
        </div>

        <div class="menuDesktop">
            <ul class="lista">
                <li class="text">
                    <i class="fa-solid fa-circle-user"></i>
                    <a href="/cliente/create">
                        Clientes
                    </a>
                </li>
                <li class="text">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <a href="/produto/create">
                        Produtos
                    </a>
                </li>
                <li class="text">
                    <i class="fa-solid fa-money-bill-wave"></i>
                    <a href="/venda/create">
                        Venda
                    </a>
                </li>
                <li class="text">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <a href="/compra/create">
                        Compra
                    </a>
                </li>
                <li class="text">
                    <i class="fa-solid fa-handshake"></i>
                    <a href="/fornecedor/create">
                        Fornecedores
                    </a>
                </li>
            </ul>
        </div>

        @if (Auth::check())
            <div class="dropdown align-right" style="width: 48px;">
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
                        <a href="">Entre</a>
                    </p>
                    <p class="text">
                        <a href="">Registre-se</a>
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>