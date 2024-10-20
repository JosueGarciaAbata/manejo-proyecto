{{-- Haciendo uso de plantillas --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Un yield permite añadir un solo contenido --}}
    <title>@yield('title')</title>

    {{-- Permite añadir más contenido--}}
    @stack('css')
</head>
<body>
    
    <header>
        
    </header>

    {{-- Especifica que se reemplazará por un contenido variable. --}}
    @yield('content')

    <footer>

    </footer>

    @stack('js')    
</body>
</html>