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
</div>
@endsection
