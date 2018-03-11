@extends('layouts.main')

@section('title')
- @lang('rates.rates')
@endsection

@section('head')
    <link href="{!! mix('/css/rates.css') !!}" rel="stylesheet">
@endsection

@section('bodyClass')
@endsection

@section('header')
@endsection

@section('content')
    <div class="container">
        <h1>@lang('rates.rates')</h1>

        <div class="row">
            <div class="col-md-4">
                <img src="{!! asset('img/moto.jpg') !!}"/>
            </div>

            <div class="col-md-8 col-lg-8 order-md-first">
                <ul class="leaders">
                    <li class="notLeader">
                        <strong>@lang('rates.motos')</strong>
                    </li>
                    <li class="">
                        <span>@lang('rates.onlyDocuments')</span>
                        <span class="rate">3.50€</span>
                    </li>
                    <li class="notLeader">
                        <strong>@lang('rates.motosDirect')</strong>
                    </li>
                    <li class="">
                        <span>@lang('rates.address')</span>
                        <span class="rate">4.90€</span>
                    </li>
                    <li class="">
                        <span>@lang('rates.kilos')</span>
                        <span class="rate">0.55€ (@lang('rates.outOfCity'))</span>
                    </li>
                    <li class="">
                        <span>@lang('rates.waitTime')</span>
                        <span class="rate">@lang('rates.noCharge')*</span>
                    </li>
                    <li class="notLeader">
                        @lang('rates.rainyDay')
                    </li>
                    <li class="">
                        <span>@lang('rates.excess')</span>
                        <span class="rate">@lang('rates.everyExcess', ['rate' => '2.90€'])</span>
                    </li>
                </ul>
                <p class="footnote">*@lang('rates.waitTimeChargeNote')</p>

                <ul class="leaders">
                    <li>
                        <span><strong>@lang('rates.repeatServices')</strong></span>
                        <span class="rate">@lang('rates.consult')</span>
                    </li>
                    <li>
                        <span><strong>@lang('rates.servicesByHour')</strong></span>
                        <span class="rate">@lang('rates.consult')</span>
                    </li>
                </ul>

                <ul class="leaders">
                    <li>
                        <span>{!! mdtrans('rates.trucks') !!}</span>
                        <span class="rate">@lang('rates.trucksPerHour')</span>
                    </li>
                    <li>
                        <span>@lang('rates.kilos')</span>
                        <span class="rate">@lang('rates.trucksPerKilo')</span>
                    </li>
                </ul>

                <p>@lang('rates.subscribers')</p>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container -->
    @include('subs.contactForm')
@endsection

@section('js')
@endsection