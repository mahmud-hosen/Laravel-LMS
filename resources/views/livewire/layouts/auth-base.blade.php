<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    {{-- Toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Black+Ops+One&family=ZCOOL+QingKe+HuangYou&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Saira+Condensed:wght@300&family=ZCOOL+QingKe+HuangYou&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: #046a70;
            font-size: 15px;
        }

        button {
            background: #046a70;
            border: none;
            width: 50%;
            padding: 7px 10px;
            border-radius: 15px;
            color: white;
        }

        button:hover {
            background: #055f64;
            transition-duration: .3s;
        }

        button:disabled {
            background: #032325;
        }


        .content {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card {
            min-height: 50vh;
            background: transparent;
            border: none;
        }

        .card-body {
            background: white;
            border-radius: 20px;
        }

        .logo {
            height: 100px;
            width: 100px;
            margin-top: -50px;
        }

        .form-control {
            font-size: 13.5px;
        }

        .form-control:focus {
            box-shadow: none;
        }


        .title {
            /* font-family: 'Black Ops One', cursive; */
            font-family: 'ZCOOL QingKe HuangYou', cursive;
            font-size: 30px;
        }

    </style>

    @livewireStyles
</head>

<body>


    {{ $slot }}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    @stack('scripts')

    @livewireScripts
</body>

</html>
