<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js'])
    <title>HLVendas</title>
</head>

<body>
    <div class="contentHome">
        <div class="box">
            @include('components.navbar') 
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="boxContent">
            <div class="contentTitle">
                <h1 class="title">
                    Boas-vindas ao HLVendas!
                </h1>

                <p class="text">
                    Estamos felizes em tê-lo(a) a bordo. O HLVendas é uma solução completa e fácil de usar, pensada para
                    otimizar o gerenciamento do seu negócio. Confira abaixo o que o sistema pode oferecer:
                </p>
            </div>

            <div class="contentText">
                <div class="card">
                    <div class="contentCardText">
                        <p class="text">
                            <b>Gestão de Vendas</b>: Controle completo das transações de vendas, com recursos de
                            pagamento variados, como dinheiro, cartões e Pix. Registre e autorize vendas de forma rápida
                            e segura.
                        </p>
                    </div>

                    <div class="contentCardText">
                        <p class="text">
                            <b>Controle de Estoque</b>: Acompanhe o inventário de forma eficiente e em tempo real.
                            Organize
                            seus produtos por categorias e mantenha tudo sob controle, evitando faltas ou excessos de
                            estoque.
                        </p>
                    </div>

                    <div class="contentCardText">
                        <p class="text">
                            <b>Interface Amigável</b>: A plataforma foi desenhada para ser intuitiva, permitindo que
                            você
                            gerencie seu negócio com facilidade, sem complicação.
                        </p>
                    </div>

                    <div class="contentCardText">
                        <p class="text">
                            <b>Segurança e Confiabilidade</b>: O HLVendas é um sistema seguro, com recursos de
                            autenticação
                            robusta e capacidade de recuperação em caso de falhas. Pode contar conosco para manter seus
                            dados protegidos.
                        </p>
                    </div>
                </div>
            </div>

            <div class="sobreNos">
                <h1 class="title">
                    Sobre nós
                </h1>

                <div class="boxPoucoSobre">

                    <div class="contentPerfil">
                        <div class="boxImg">
                            <img src="" alt="">
                        </div>

                        <div class="boxContentText">
                            <a href="https://www.linkedin.com/in/henri-barboza/" target="_blank">
                                <p class="text">
                                    Henri Barboza
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="contentPerfil">
                        <div class="boxImg">
                            <img src="" alt="">
                        </div>

                        <div class="boxContentText">
                            <a href="https://www.linkedin.com/in/lu%C3%ADs-felipe-05375a232/" target="_blank">
                                <p class="text">
                                    Luís Felipe
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>