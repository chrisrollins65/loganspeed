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
                    <img src="img/logo.png" />
                    <h1><span class="rotate">@lang('home.rotatingHeader')</span></h1>
                </header>
                <!--welcome-message end-->

                <!--sub-form-->
                <div class="text-center">
                    <button class="btn-primary btn btn-xl text-uppercase js-scroll-trigger" data-target="contact-container">@lang('home.contactUs')</button>
                </div>
                <!--sub-form end-->

            </div>
        </div>
    </div>
</section>
<!--main end-->

<!--Features-->

<section class="features section-spacing">
    <div class="container">
        <h2 class="text-center">@lang('home.featuredServices')</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center"><i class="fa fa-clock-o fa-3x"></i></div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 3-->
                        <h4>@lang('home.featured.1.header')</h4>
                        <p>@lang('home.featured.1.body')</p>
                        <!--features 3 end-->
                    </div>
                </div>
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center"><i class="fa fa-truck fa-3x"></i></div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 4-->
                        <h4>@lang('home.featured.2.header')</h4>
                        <p>@lang('home.featured.2.body')</p>
                        <!--features 4 end-->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center"><i class="fa fa-road fa-3x"></i></div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 3-->
                        <h4>@lang('home.featured.3.header')</h4>
                        <p>@lang('home.featured.3.body')</p>
                        <!--features 3 end-->
                    </div>
                </div>
                <div class="wow fadeInUp product-features row">
                    <div class="col-md-2 col-sm-2 col-xs-2 text-center"><i class="fa fa-globe fa-3x"></i></div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <!--features 4-->
                        <h4>@lang('home.featured.4.header')</h4>
                        <p>@lang('home.featured.4.body')</p>
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

<section class="contact section-spacing" id="contact">
    <div class="container" id="contact-container">
        <h2 class="text-center">@lang('home.contactSection.heading')</h2>
        <div class="row">
            <div class="col-md-5 col-sm-6">

                <!--contact form-->

                <div class="contact-form">
                    <form role="form" action="{!! route('postContact') !!}" method="post" id="contact-form">
                        @csrf
                        <input type="text" class="wow fadeInUp form-control" name="name" id="name" placeholder="@lang('home.contactSection.form.name')" required>
                        <input type="email" class="wow fadeInUp form-control" name="email" id="email" placeholder="@lang('home.contactSection.form.email')" required>
                        <textarea class="wow fadeInUp form-control" name="body" id="message" rows="3" placeholder="@lang('home.contactSection.form.message')" required></textarea>
                        <div class="captchaquestiondiv">
                            <label for="captchaquestion">@lang('form.captchaquestion')</label>
                            <input type="text" name="captchaquestion" placeholder="Captcha answer" class="captchaquestion" value="" />
                        </div>
                        <button type="submit" class="wow fadeInUp btn btn-default submit-btn" id="submit-btn" value="Send">@lang('home.contactSection.form.submit')</button>
                    </form>

                    <!--contact form end-->
                    <div class="success-cf">
                        <p>@lang('home.contactSection.form.success')</p>
                    </div>
                    <div class="error-cf">
                        <p>@lang('home.contactSection.form.error')</p>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-sm-6 order-md-first">
                <!--map-->
                <div class="wow fadeInUp map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d374.28035295255137!2d2.073788818166198!3d41.36880878276302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49964355cfa11%3A0xd89fa132e13edb11!2sCarrer+de+Lleida%2C+18%2C+08970+Sant+Joan+Desp%C3%AD%2C+Barcelona!5e0!3m2!1sen!2ses!4v1520020565366" width="635" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
                <ul class="wow fadeInUp address">
                    <li><i class="fa fa-map-marker"></i>@lang('main.address')</li>
                    <li><i class="fa fa-phone"></i>@lang('main.phone')</li>
                    <li><i class="fa fa-envelope"></i>@lang('main.email')</li>
                </ul>
                <!--map end-->
            </div>

        </div>
    </div>
</section>

<!--CONTACT END-->
@endsection

@section('js')
<script type="text/javascript">
    var logan = {
        'contactPostUrl': @json(route('postContact'))
    };
</script>
<script src="{!! asset('js/vendor-home.js') !!}"></script>
<script src="{!! mix('/js/home.js') !!}"></script>
@endsection
