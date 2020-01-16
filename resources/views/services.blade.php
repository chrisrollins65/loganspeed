@extends('layouts.main')

@section('title')
- @lang('services.services')
@endsection

@section('head')
    <link href="{!! mix('/css/services.css') !!}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h1>@lang('services.services')</h1>
    <p>@lang('services.typesOfServices')</p>

    <img src="{!! asset('img/messenger-boxes.jpg') !!}" id="messengerImg" class="pull-right" />
    <div class="media serviceSection">
        {!! flaticon('motorcycle', ['align-self-center'], 'serviceIcon') !!}
        <div class="media-body">
            <h5 class="mt-0">@lang('services.cyclists')</h5>
            @lang('services.cyclistsDescription')
        </div>
    </div>

    <div class="media serviceSection">
        {!! flaticon('delivery-truck-1', ['align-self-center'], 'serviceIcon') !!}
        <div class="media-body">
            <h5 class="mt-0">@lang('services.vans')</h5>
            @lang('services.vansDescription')
        </div>
    </div>

    <div class="media serviceSection">
        {!! flaticon('frontal-truck', ['align-self-center'], 'serviceIcon') !!}
        <div class="media-body">
            <h5 class="mt-0">@lang('services.trucks')</h5>
            @lang('services.trucksDescription')
        </div>
    </div>

    <div class="media serviceSection">
        {!! flaticon('international-logistics-delivery-truck-symbol-with-world-grid-behind', ['align-self-center'], 'serviceIcon') !!}
        <div class="media-body">
            <h5 class="mt-0">@lang('services.international')</h5>
            {!! mdtrans('services.internationalDescription') !!}
        </div>
    </div>

    <div class="media serviceSection">
        {!! flaticon('containers-on-oceanic-ship', ['align-self-center'], 'serviceIcon') !!}
        <div class="media-body">
            <h5 class="mt-0">@lang('services.customs')</h5>
            @lang('services.customsDescription')
        </div>
    </div>

    <div class="media serviceSection">
        {!! flaticon('storage', ['align-self-center'], 'serviceIcon') !!}
        <div class="media-body">
            <h5 class="mt-0">@lang('services.storage')</h5>
            {!! mdtrans('services.storageDescription') !!}
        </div>
    </div>

    <div class="text-center">
        <button id="contactBtn" class="btn-outline-primary btn btn-xl text-uppercase js-scroll-trigger" data-target="contact-container">@lang('home.contactUs')</button>
    </div>
</div>

<section id="inmobirapidServices">
    <div id="inmobirapidHeader">
        <div class="container">
            <img id="inmobirapidLogo" src="{!! asset('img/inmobi-rapid-logo.jpg') !!}" /> <h1 class="align-bottom">Servicios inmobiliarios</h1>
        </div>
    </div>
    <div class="container">

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.adminFincas')</h5>
            {!! mdtrans('services.inmobirapid.administracionFincasDesc') !!}
        </div>

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.legalAdvice')</h5>
            {!! mdtrans('services.inmobirapid.legalAdviceDesc') !!}
        </div>

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.propertyWorks')</h5>
            {!! mdtrans('services.inmobirapid.propertyWorksDesc') !!}
        </div>

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.repairs')</h5>
            {!! mdtrans('services.inmobirapid.repairsDesc') !!}
        </div>

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.contracts')</h5>
            {!! mdtrans('services.inmobirapid.contractsDesc') !!}
        </div>

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.ite')</h5>
        </div>

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.attention')</h5>
        </div>

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.rentals')</h5>
        </div>

        <div class="serviceSection">
            <h5 class="text-uppercase">@lang('services.inmobirapid.certificates')</h5>
        </div>

    </div>
</section>

<section id="contactSection">
@include('subs.contactForm')
</section>

@endsection
