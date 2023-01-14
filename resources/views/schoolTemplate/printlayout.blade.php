<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset("school/assets/img/favicon/favicon.ico")}}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"
  />
  {{-- Font Awesome --}}
  <script src="https://kit.fontawesome.com/95ceeb6c25.js" crossorigin="anonymous"></script>

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{ asset("school/assets/vendor/fonts/boxicons.css")}}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset("school/assets/vendor/css/core.css")}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset("school/assets/vendor/css/theme-default.css")}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset("school/assets/css/demo.css")}}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset("school/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}}" />

  <link rel="stylesheet" href="{{ asset("school/assets/vendor/libs/apex-charts/apex-charts.css")}}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{ asset("school/assets/vendor/js/helpers.js")}}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset("school/assets/js/config.js")}}"></script>
</head>
<body>
  
  @yield('content')
  
  <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset("school/assets/vendor/libs/jquery/jquery.js")}}"></script>
    <script src="{{ asset("school/assets/vendor/libs/popper/popper.js")}}"></script>
    <script src="{{ asset("school/assets/vendor/js/bootstrap.js")}}"></script>
    <script src="{{ asset("school/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}"></script>

    <script src="{{ asset("school/assets/vendor/js/menu.js")}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset("school/assets/vendor/libs/apex-charts/apexcharts.js")}}"></script>

    <!-- Main JS -->
    <script src="{{ asset("school/assets/js/main.js")}}"></script>

    <!-- Page JS -->
    <script src="{{ asset("school/assets/js/dashboards-analytics.js")}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Print JS -->
    <script src="{{ asset("school/assets/js/jquery.printPage.js")}}"></script>
</body>
</html>


  
  
