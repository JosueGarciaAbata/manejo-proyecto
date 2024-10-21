<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'UTA')</title>

    @include('layouts.partials.favicons')
    @include('layouts.partials.styles')
</head>

<body>
    @include('components.preloader')
    <div class="page-wrapper">
        @include('components.topbar')
        @include('components.header')

        <main>
            @yield('content')
        </main>

        @include('components.footer')
    </div>

    @include('layouts.partials.scripts')
</body>

</html>
