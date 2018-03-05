<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} @yield('title')</title>
    <link href="{!! asset('css/vendor.css') !!}" rel="stylesheet">
    <link href="{!! mix('/css/app.css') !!}" rel="stylesheet">
    @yield('head')
</head>
<body class="@yield('bodyClass')">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{!! url('/') !!}">{{ config('app.name') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" data-target="contact-container" href="#">@lang('main.nav.contact')</a>
                </li>
                @foreach ($appLanguages as $appLang)
                <li class="nav-item">
                    <a class="nav-link nav-lang" href="{!! str_replace($appLanguages, $appLang, url()->current()) !!}">
                        <img alt="@lang('main.languages.' . $appLang)" title="@lang('main.languages.' . $appLang)" src="{!! asset('img/flags/' . $appLang . '.png') !!}" />
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

@yield('header')

<div id="mainWrapper">
@yield('content')
</div><!-- /#mainWrapper -->

<!--site-footer-->
<footer class="site-footer section-spacing">
    <div class="container text-center">
        <p class="wow fadeInUp">© {!! date('Y') !!} Logan Speed S.L. | <i class="fa fa-phone"></i> @lang('main.phone') | <i class="fa fa-envelope"></i> @lang('main.email')
        <br /><a href="https://www.google.es/maps/place/Carrer+de+Lleida,+18,+08970+Sant+Joan+Desp%C3%AD,+Barcelona/@41.3687811,2.0716484,17z/data=!3m1!4b1!4m5!3m4!1s0x12a49964355cfa11:0xd89fa132e13edb11!8m2!3d41.3687771!4d2.0738371"><i class="fa fa-map-marker"></i> @lang('main.address')</a></p>
    </div>
</footer>
<!--site-footer end-->

<script src="{!! asset('js/vendor.js') !!}"></script>
<script src="{!! mix('/js/app.js') !!}"></script>
<script>
    if( $('.captchaquestiondiv').length ){
        $('.captchaquestiondiv').hide();
    }
    $('input, textarea, select').focus(function(){
        if( $('.captchaquestiondiv').length ){
            $('.captchaquestion').val("{{ trans('form.captchaanswer') }}");
        }
    });
</script>
@yield('js')

</body>
</html>
