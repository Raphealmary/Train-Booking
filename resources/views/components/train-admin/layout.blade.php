<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "" }}</title>
    <x-train-component.favicon />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("assest/toastr/toastr.min.css") }}">

    @vite('resources/css/app.css')

</head>

<body class="font-sans bg-gray-50">
    {{ $slot }}


    <script src="{{ asset('assest/jquery.min.js')}}"></script>
    <script src="{{ asset('assest/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('assest/toastr/toastConfig.js')}}"></script>
    <script src="{{ asset('assest/lucide.min.js')}}"></script>

    <script src="{{ asset('assest/init-alpine.js') }}"></script>
    <script src="{{ asset('assest/alpinejs.js') }}"></script>
    <script src="{{ asset('assest/Chart.min.js') }}"></script>

    <script src="{{ asset('assest/charts-lines.js') }}"></script>
    <script src="{{ asset('assest/charts-pie.js') }}"></script>
    <script src="{{ asset('assest/script.js')}}"></script>
    <?php if (!empty($msg)) {
    ?>
        <script>
            toastr["{{ $type }}"]("{{$msg }}");
        </script>
    <?php  }
    ?>
</body>

</html>