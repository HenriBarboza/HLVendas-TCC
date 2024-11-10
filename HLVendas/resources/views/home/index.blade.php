<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    @include('components.navbar') 
    <div class="container">
        <div class="box-content">
            <div class="content-text">
                <h1 class="title">
                    Lorem Ipsum
                </h1>

                <p class="text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book.
                </p>
            </div>
        </div>
    </div>
</body>

</html>