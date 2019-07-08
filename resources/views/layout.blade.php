<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/gh/shipotech/mdbootstrap-4.8.2/mdbootstrap.min.css"/>
    <!-- Your custom styles (optional) -->
    <link href=" {{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!--Header-->
    @yield('header')
    <!--Header-->

<!--Main-->
<div class="container">
    @yield('main')
</div>
<!--Main-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Bootstrap tooltips -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"
        integrity="sha256-fTuUgtT7O2rqoImwjrhDgbXTKUwyxxujIMRIK7TbuNU=" crossorigin="anonymous" defer></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/shipotech/mdbootstrap-4.8.2/mdbootstrap.min.js"
        defer></script>
<!-- LazySize -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/shipotech/portfolio_assets/lazysizes.min.js"
        defer></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/shipotech/portfolio_assets/unveilhooks.min.js"
        defer></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/shipotech/portfolio_assets/images-loading.js"
        defer></script>

    <!--Page Scripts-->
    @yield('scripts')
    <!--Page Scripts-->

<!--Funciones-->
<script type="text/javascript">
    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!--Funciones-->
</body>

</html>