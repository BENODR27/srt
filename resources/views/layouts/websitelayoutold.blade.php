<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SR</title>

    <!--Essential css files-->
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/fancybox.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    {{-- <link rel="stylesheet" href="assets/css/style.css"> --}}
    @include('includes.style')


    <!--favicon-->
    <link rel="icon" href="assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>

<body>

 <!--preloader start-->
 <div class="preloader">
        <h1 class="display-1">SR</h1>
        <div class="preload-progress">
            <span></span>
        </div>
    </div>
    <!--preloader end-->
    @include('includes.webheader')

@yield('content')


@include('includes.webfooter')


    <!--Esential Js Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/fancybox.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/script.js"></script>



</body>

</html>