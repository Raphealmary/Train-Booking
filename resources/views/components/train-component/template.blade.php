<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "" }}</title>
    @vite('resources/css/app.css')
    <x-train-component.favicon />
    <style>
        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.0)),
            url("{{asset('img/train1.jpeg')}}");
            background-size: cover;
            background-position: center;
            animation-name: slider;
            animation-duration: 10s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
        }



        .train-card {
            transition: transform 0.3s ease;
        }

        .train-card:hover {
            transform: translateY(-5px);
        }

        .slider-container {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            transition: opacity 0.5s ease;
        }

        .slide.active {
            opacity: 1;
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        .overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .bottom-nav {
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out;
        }

        .bottom-nav.active {
            transform: translateY(0);
        }
    </style>
    <link rel="stylesheet" href="{{ asset("assest/toastr/toastr.min.css") }}">
    <script src="{{ asset('assest/jquery.min.js')}}"></script>
</head>

<body class="font-sans bg-gray-50">
    {{ $slot }}


    <script src="{{ asset('assest/lucide.min.js')}}"></script>

    <script src="{{ asset('assest/script.js')}}"></script>

    <script src="{{ asset('assest/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('assest/toastr/toastConfig.js')}}"></script>
    <?php if (!empty($msg)) {
    ?>
        <script>
            toastr["{{ $type }}"]("{{$msg }}");
        </script>
    <?php }
    ?>
</body>

</html>