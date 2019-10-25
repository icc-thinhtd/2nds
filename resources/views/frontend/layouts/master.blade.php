<!DOCTYPE html>
<html lang="en">
<head>
    <title>2nds - Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/styles/bootstrap4/bootstrap.min.css">
    <link href="/assets/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/styles/responsive.css">
    @yield('css')
</head>

<body>

<div class="super_container">

{{--    @include('frontend.includes.user_menu');--}}

    <!-- Header -->

    @include('frontend.includes.header');

    @yield('content');


    <!-- Recently Viewed -->

    @include('frontend.includes.viewed');



    <!-- Brands -->

    @include('frontend.includes.brands');

    <!-- Newsletter -->

    @include('frontend.includes.newsletter');

    <!-- Footer -->

    @include('frontend.includes.footer');


</div>

<script src="/assets/frontend/js/jquery-3.3.1.min.js"></script>
<script src="/assets/frontend/styles/bootstrap4/popper.js"></script>
<script src="/assets/frontend/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/assets/frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="/assets/frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="/assets/frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/assets/frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="/assets/frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/assets/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/assets/frontend/plugins/slick-1.8.0/slick.js"></script>
<script src="/assets/frontend/plugins/easing/easing.js"></script>
<script src="/assets/frontend/js/custom.js"></script>
</body>

</html>
