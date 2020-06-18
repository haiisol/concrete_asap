<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Concrete ASAP Administrator') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
       <div class="wrapper ">
          @include('layouts.sidebar')
          <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="5e3b0485-7bb0-4952-0d9d-2bc475b66c30">
             <!-- Navbar -->
             @include('layouts.navbar')
             <!-- End Navbar -->
             <div class="content">
                @yield('content')
             </div>
             <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                   <div class="row">
                      <nav class="footer-nav">
                         <ul>
                            <li>
                               <a href="/" target="_blank">TWMG</a>
                            </li>
                            <li>
                               <a href="/" target="_blank">Blog</a>
                            </li>
                            <li>
                               <a href="/" target="_blank">Licenses</a>
                            </li>
                         </ul>
                      </nav>
                      <div class="credits ml-auto">
                         <span class="copyright">
                            ©
                           2019, made with <i class="fa fa-heart heart"></i> by TWMG
                         </span>
                      </div>
                   </div>
                </div>
             </footer>
          </div>
       </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#dataTableDisplay').DataTable();
        } );
    </script>
</body>
</html>
