<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" href={{ asset("plugins/fontawesome-free/css/all.min.css") }}>
    <!-- Ionicons -->
    <link rel="stylesheet" href={{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}>   
      <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">  
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href={{ asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}> 
    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ config('app.name', 'Alekseev Studio') }}</title>       
  </head>
    <body>

      <main class="main">
        @yield('content')
      </main>
      
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <!-- jQuery -->
      <script src={{ asset("plugins/jquery/jquery.min.js") }}></script>
      <!-- jQuery UI 1.11.4 -->
      <script src={{ asset("plugins/jquery-ui/jquery-ui.min.js") }}></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      {{-- <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script> --}}
      <!-- Bootstrap 4 -->
      <script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
      <!-- Select2 -->
      <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      {{-- <script>
        $(document).ready(function() {
          $('.js-multiple-tags').select2();
          $('.js-multiple-regions').select2();         
         
        });
      </script>      --}}      
      <script>
        AOS.init();
      </script>

      <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'contacts/reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
      </script>

    </body>
</html>