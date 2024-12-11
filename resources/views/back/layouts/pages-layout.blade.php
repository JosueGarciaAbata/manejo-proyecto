<!doctype html>
<!--
* @link https://tabler.io
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('page-title')</title>
    <!-- CSS files -->

    <link rel="stylesheet" href="/back/dist/css/tabler.min.css">
    <link rel="stylesheet" href="/back/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="/back/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="/back/dist/css/tabler-vendors.min.css">
    <link rel="stylesheet" href="/back/dist/css/demo.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!--Toastr -->
    <link rel="stylesheet" href="/back/dist/libs/ijaboCropTool/ijaboCropTool.min.css"> <!-- Ijabo Crop Tool -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">
    <!-- Sweet Alert2 -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.3/themes/smoothness/jquery-ui.css">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="/amsify/amsify.suggestags.css">

    <link rel="stylesheet" href="/back/dist/libs/ijabo/ijabo.min.css">

    <!--Amsify-->
    @stack('stylesheets')
    @livewireStyles
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    <style>
        .swal2-popup {
            font-size: .85rem;
        }
    </style>

</head>

<body>
    <script src="{{ asset('back/dist/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
        <!-- Navbar -->
        @include('back.layouts.inc.header')

        <!-- Page -->
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    @yield('page-header')
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>

            <!-- Page Footer -->
            @include('back.layouts.inc.footer')
        </div>
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js"></script><!-- Jquery-ui-->
    <!-- Amsify -->
    <script src="/amsify/jquery.amsify.suggestags.js"></script>
    <!-- Libs JS -->
    <script src="/back/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
    <script src="/back/dist/libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
    <script src="/back/dist/libs/jsvectormap/dist/maps/world.js" defer></script>
    <script src="/back/dist/libs/jsvectormap/dist/maps/world-merc.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script><!-- Toastr -->
    <script src="/back/dist/libs/ijaboCropTool/ijaboCropTool.min.js"></script> <!-- Ijabo Crop Tool -->
    <script src="/back/dist/libs/ijabo/jquery.ijaboViewer.min.js"></script> <!-- Ijabo Viewer -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script><!-- Sweet Alert2 -->

    <script src="/back/dist/libs/ijabo/ijabo.min.css"></script>
    <!-- Tabler Core -->
    <script src="/back/dist/js/tabler.min.js" defer></script>
    <script src="/back/dist/js/demo.min.js" defer></script>
    <!-- CKEditor -->
    <script src="/ckeditor/ckeditor.js"></script>

    {{-- Toastr Script for Livewire --}}
    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right",
                "closeButton": true
            }
        })
        //Amsify
        $('input[name="post_tags"]').amsifySuggestags();


        window.addEventListener('showToastr', event => {
            const data = event.detail[0]; 
            console.log(data);

            // Asegúrate de que el tipo sea válido y la función existe
            if (data && toastr[data.type] && typeof data.message === 'string') {
                toastr[data.type](data.message);
            } else {
                console.error('Invalid toastr type or message:', data);
            }
        });

        window.addEventListener('try-console', event => {
            console.log('Hi');
        });
    </script>

    <script>
        document.addEventListener('scrollToTopContent', function() {
            document.getElementById('page-wrapper').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>

    <script>
        document.addEventListener('scrollToTopContent', function() {
            document.getElementById('page-wrapper').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>
    @stack('scripts')
    @livewireScripts

</body>

</html>
