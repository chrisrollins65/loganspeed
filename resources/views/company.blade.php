@extends('layouts.main')

@section('title')
- @lang('company.company')
@endsection

@section('content')
    <div class="container">
        <h1>Logan Speed S.L</h1>

        <h3>@lang('company.slogan')</h3>

        <div class="row align-items-center">
            <div class="col-md-8">
                {!! mdtrans('company.body') !!}
            </div>

            <div class="col-md-4">
                <img src="{!! asset('img/delivery-man.jpg') !!}"/>
            </div>
        </div>
    </div>
@endsection
