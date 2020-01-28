<!DOCTYPE html>

<html lang="{!! app()->getLocale() !!}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} @yield('title')</title>
    <link href="{!! asset('css/vendor.css') !!}" rel="stylesheet">
    <link href="{!! mix('/css/app.css') !!}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="img/logos/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/logos/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/logos/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/logos/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/logos/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/logos/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/logos/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/logos/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/logos/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/logos/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logos/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logos/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logos/favicon-16x16.png">
    <link rel="manifest" href="img/logos/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/logos/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    @yield('head')
</head>
<body class="@yield('bodyClass')">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{!! iRoute('getHome') !!}">{{ config('app.name') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{!! iRoute('getCompany') !!}">@lang('company.company')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! iRoute('getServices') !!}">@lang('services.services')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! iRoute('getRates') !!}">@lang('rates.rates')</a>
                </li>
                <li class="nav-item">
                    @if(!empty($isHome))
                        <a class="nav-link js-scroll-trigger" data-target="contact-container" href="#">@lang('main.nav.contact')</a>
                    @else
                        <a class="nav-link" href="{!! iRoute('getContact') !!}">@lang('main.nav.contact')</a>
                    @endif
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="facebookNav" href="https://www.facebook.com/loganspeedsl/" target="_blank"><i class="fa fa-facebook-square"></i></a>
                </li>
                <li class="nav-item" id="instagramNavItem">
                    <a class="nav-link" id="instagramNav" href="https://www.instagram.com/loganspeedsl/" target="_blank"><i class="fa fa-instagram"></i></a>
                </li>
                @foreach ($appLanguages as $appLang)
                <li class="nav-item">
                    <a class="nav-link nav-lang" href="{!! iRoute(Route::currentRouteName(), [], true, $appLang) !!}">
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
<footer class="site-footer">
    <div class="container text-center">
        <p class="wow fadeInUp">© {!! date('Y') !!} Logan Speed S.L. | <i class="fa fa-phone"></i> @lang('main.phone') | <i class="fa fa-envelope"></i> @lang('main.email')
        <br /><a href="https://www.google.es/maps/place/Carrer+de+Lleida,+18,+08970+Sant+Joan+Desp%C3%AD,+Barcelona/@41.3687811,2.0716484,17z/data=!3m1!4b1!4m5!3m4!1s0x12a49964355cfa11:0xd89fa132e13edb11!8m2!3d41.3687771!4d2.0738371"><i class="fa fa-map-marker"></i> @lang('main.address')</a>
        <br />Website developed by <a href="https://leowebservices.com">Leo Web Services</a></p>
    </div>
</footer>
<!--site-footer end-->

<script src="{!! asset('js/vendor.js') !!}"></script>
<script src="{!! mix('/js/app.js') !!}"></script>
<script>
    var logan = {
        'contactPostUrl': @json(iRoute('postContact'))
    };

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
