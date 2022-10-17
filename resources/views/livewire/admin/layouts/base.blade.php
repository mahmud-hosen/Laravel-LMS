<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/images/favicon.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/codemirror/theme/monokai.css') }}">

    {{-- Toaster --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    @livewireStyles
</head>
<style>

    @import url('https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap');

    body{
        font-size: 15px;
        font-family: 'Titillium Web', sans-serif;
    }

    textarea{
        resize: none;
    }

    .floatbtn{
        position: fixed;
        z-index: 9999999999;
        right: 40%;
        bottom: 55%;
        font-size: 11.5px;
        border-radius: 10px;
        padding: 1px 10px;
        color: black;
        background: white;
    }

    .btn-sm{
        padding: 1px 8px;
    }

    .cstm_file{
        padding: 3px;
        font-size: 11.5px;
    }

    .cstm_file_lg{
        padding: 4.3px;
        font-size: 14px;
    }

    .swal2-popup {
        font-size: .7rem !important;
    }

    .sinput{
        border: 1px solid #CED4DA;
        border-radius: 4px;
        padding: 3px 7px;
        font-size: 12.5px;
    }
    .sinput:focus{
        border: 1px solid #046A70;
        box-shadow: none;
        outline: none;
    }
    .search_cont{
        text-align: right;
    }
    .sort_cont{
        text-align: left;
    }

    @media screen and (max-width: 720px) {
        .search_cont{
            text-align: center;
        }
        .sort_cont{
            text-align: center;
        }
    }

    .fa-minus-circle{
        color: red;
    }
    .fa-plus-circle{
        color: #046A70;
    }
    /* tr:nth-child(odd) {
        background-color: white;
    }

    tr:nth-child(even) {
        background-color: #F2F2F2;
    }

    th {
        background-color: #e7e6e6;
    } */
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .select2.select2-container .select2-selection {
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        padding: 4px;
        font-size: 16px;
        height: 39px;
        outline: none !important;
        transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection__arrow {
        height: 33px;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
        color: #333;
        line-height: 32px;
        padding-right: 33px;
    }

    

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
        background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
        -webkit-border-radius: 0 3px 0 0;
        -moz-border-radius: 0 3px 0 0;
        border-radius: 0 3px 0 0;
        height: 33px;
    }

    /* .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
        border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
        height: auto;
        min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
        margin-top: 0;
        height: 32px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
        display: block;
        padding: 0 4px;
        line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
    background-color: #f8f8f8;
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    margin: 4px 4px 0 0;
    padding: 0 6px 0 22px;
    height: 24px;
    line-height: 24px;
    font-size: 12px;
    position: relative;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
    position: absolute;
    top: 0;
    left: 0;
    height: 22px;
    width: 22px;
    margin: 0;
    text-align: center;
    color: #e74c3c;
    font-weight: bold;
    font-size: 16px;
    } */

    .select2-container .select2-dropdown {
        background: white;
        border: 1px solid #cccccc;
        font-size: 15px;
    }

    .select2-container .select2-dropdown .select2-search {
        padding: 5px;
    }

    .select2-container .select2-dropdown .select2-search input {
        outline: none !important;
        border: 1px solid grey !important;
        padding: 2px 6px !important;
        font-size: 14px;
    }

    .select2-container .select2-dropdown .select2-results {
        padding: 5px;
    }

    .select2-container .select2-dropdown .select2-results ul {
        padding: 0px 0px 5px 0px;
    }
    .select2-container .select2-dropdown .select2-results ul .select2-results__option{
        padding: 3px 7px;
    }
    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
        background-color: #046A70;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    [class*="sidebar-dark-"] .nav-sidebar > .nav-item > .nav-link.active {
        color: #ffffff;
        box-shadow: none;
    }

    .act_btn{
        width: 75px;
    }

    input.checkbox {
        width: 25px;
        height: 25px;
    }
</style>
<body class="hold-transition sidebar-mini control-sidebar-slide-open layout-navbar-fixed layout-fixed layout-footer-fixed">
    <div class="wrapper">
        @livewire('admin.inc.nav-bar')
        @livewire('admin.inc.side-nav')
        
        <div class="content-wrapper">
            {{ $slot }}
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright <a href="">Morning Glory School & College</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0
            </div>
        </footer>
    </div>
    
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- CodeMirror -->
    <script src="{{ asset('admin/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('admin/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('admin/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>

    {{-- sweet alert 2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Toaster --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Custom Toaster -->
    <script src="{{ asset('admin/dist/js/tstr.js') }}"></script>
    <!-- Custom SWL -->
    <script src="{{ asset('admin/dist/js/swl.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('.select2').select2({
                dropdownAutoWidth : true,
            });
            $('.select2_2').select2({
                dropdownAutoWidth : true,
            });
        });
    </script>

    <script>
        @if(Session::has('success'))
            toastr.options =
                {
                    "progressBar" : true,
                    "positionClass": "toast-bottom-left"
                }
                toastr.success("{{ session('success') }}");
        @endif
    </script>

    @livewireScripts

    @stack('scripts')
</body>
</html>