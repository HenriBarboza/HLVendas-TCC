<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss','resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div>
            <h1>teste</h1>
        </div>
    </div>
    @include('components.footer') 
</body>

</html>