@extends('layouts.main')

@section('head')
    <link href="{!! mix('/css/home.css') !!}" rel="stylesheet">
@endsection

@section('content')
<!--main-->
<section class="main">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!--welcome-message-->
                <header class="welcome-message text-center">
                    <img src="{!! asset('img/logan-logo.png') !!}" />
                    <h1><span class="rotate" id="slogan">@lang('home.rotatingHeader')</span></h1>
                </header>
                <!--welcome-message end-->

                <div class="text-center">

                </div>

                <div class="text-center wow fadeInUp" id="contactHeading">
                    <button id="contactBtn" class="btn-outline-light btn btn-xl text-uppercase js-scroll-trigger" data-target="contact-container">@lang('home.contactUs')</button>
                    <h3 class="align-center"><i class="fa fa-phone"></i> @lang('main.phone')</h3>
                </div>

            </div>
        </div>
    </div>
</section>
<!--main end-->

<!--inmobi rapid-->
<section id="inmobirapid" class="section-spacing">
    <div class="container">
        <img src="{!! asset('img/inmobi-rapid-logo.jpg') !!}" />
        <h2 class="text-uppercase">@lang('home.inmobirapid.realEstate')</h2>
        <h3>@lang('home.inmobirapid.description')</h3>
        <a href="{!! iRoute('getServices') !!}#inmobirapidServices" id="inmobirapidServicesBtn" class="btn-outline-light btn btn-xl text-uppercase">@lang('home.inmobirapid.moreInfo')</a>
    </div>
</section>
<!--inmobi rapid end-->

<!--Features-->

<section class="features section-spacing">
    <div class="container" id="services-container">
        <h2 class="text-center">@lang('home.featuredServices')</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center">{!! flaticon('motorcycle', ['align-self-center x3'], 'serviceIcon') !!}</div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 3-->
                        <h4>@lang('services.cyclists')</h4>
                        <p>@lang('services.cyclistsDescription')</p>
                        <!--features 3 end-->
                    </div>
                </div>
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center">{!! flaticon('delivery-truck-1', ['align-self-center x3'], 'serviceIcon') !!}</div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 4-->
                        <h4>@lang('services.vans')</h4>
                        <p>@lang('services.vansDescription')</p>
                        <!--features 4 end-->
                    </div>
                </div>
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center">{!! flaticon('frontal-truck', ['align-self-center x3'], 'serviceIcon') !!}</div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 4-->
                        <h4>@lang('services.trucks')</h4>
                        <p>@lang('services.trucksDescription')</p>
                        <!--features 4 end-->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center">{!! flaticon('international-logistics-delivery-truck-symbol-with-world-grid-behind', ['align-self-center x3'], 'serviceIcon') !!}</div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 3-->
                        <h4>@lang('services.international')</h4>
                        <p>{!! mdtrans('services.internationalDescription') !!}</p>
                        <!--features 3 end-->
                    </div>
                </div>
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center">{!! flaticon('containers-on-oceanic-ship', ['align-self-center x3'], 'serviceIcon') !!}</div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 4-->
                        <h4>@lang('services.customs')</h4>
                        <p>@lang('services.customsDescription')</p>
                        <!--features 4 end-->
                    </div>
                </div>
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center">{!! flaticon('storage', ['align-self-center x3'], 'serviceIcon') !!}</div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 4-->
                        <h4>@lang('services.storage')</h4>
                        <p>{!! mdtrans('services.storageDescription') !!}</p>
                        <!--features 4 end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Features end-->

<section class="second-bg section-spacing">
    <div class="overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>@lang('home.secondSection.1')</h2>
                <h2>@lang('home.secondSection.2')</h2>
                <h4>&mdash; @lang('home.secondSection.3')</h4>
            </div>
        </div>
    </div>
</section>

<!--CONTACT-->

@include('subs.contactForm')

<!--CONTACT END-->
@endsection

@section('js')
<script src="{!! asset('js/vendor-home.js') !!}"></script>
<script src="{!! mix('/js/home.js') !!}"></script>
@endsection
