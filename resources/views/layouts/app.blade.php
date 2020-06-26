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
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
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
          </div>
       </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#dataTableDisplay').DataTable();
            
            $(".mobile-toggle").on("click", function(){
                $(".sidebar").addClass("active-side");
            });

            $(".content").on("click", function(){
              if($(".sidebar").hasClass("active-side")) {
                $(".sidebar").removeClass("active-side");
              } else {
                $(".sidebar").addClass("active-side");
              }
            });
            
        } );
    </script>
</body>
</html>
