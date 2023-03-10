<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IST || @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/png" href="{{asset('frontEndAssets')}}/assets/images/icon/favicon.ico">
    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/typography.css">
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/default-css.css">
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/responsive.css">
    <!--color css-->
    <link rel="stylesheet" id="triggerColor" href="{{asset('frontEndAssets')}}/assets/css/triggerplate/color-0.css">
    <link rel="stylesheet" href="{{asset('frontEndAssets')}}/assets/css/styles.css">
    @yield('link')
    <!-- modernizr css -->
</head>
<body>

<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- prealoader area end -->

@include('frontEnd.include.header')
@yield('content')
@include('frontEnd.include.footer')

<script>
var navbar = document.getElementById("navbar");
var m_menu_active = document.getElementById("m_menu_active");

window.onscroll = function (){
if (window.pageYOffset >=m_menu_active.offsetTop){
navbar.classList.add("sticky");
}
else {
navbar.classList.remove("sticky");
}

}
</script>
<!-- jquery latest version -->
<script src="{{asset('frontEndAssets')}}/assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('frontEndAssets')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('frontEndAssets')}}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
<!-- others plugins -->
<script src="{{asset('frontEndAssets')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('frontEndAssets')}}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('frontEndAssets')}}/assets/js/jquery.slicknav.min.js"></script>
<script src="{{asset('frontEndAssets')}}/assets/js/plugins.js"></script>
<script src="{{asset('frontEndAssets')}}/assets/js/scripts.js"></script>
@yield('script')

</body>
</html>
