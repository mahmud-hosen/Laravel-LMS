<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Home</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/images/header/favicon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/sass/style.css') }}" />

    @livewireStyles
</head>

<body>

    @livewire('frontend.inc.header')

    {{ $slot }}

    @livewire('frontend.inc.footer')


    <script src="{{ asset('assets/plugins/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/multi-animated-counter.js') }}"></script>
    <script src="{{ asset('assets/plugins/js/aos.js') }}"></script>
    <script src="https://kit.fontawesome.com/46f35fbc02.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')

    @livewireScripts
</body>

</html>
