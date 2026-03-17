<section class="contact section-spacing" id="contact">
    <div class="container" id="contact-container">
        <h2 class="text-center">@lang('home.contactSection.heading')</h2>

        <div class="row">
            <div class="col-md-5 col-sm-6">

                <!--contact form-->

                <div class="contact-form">
                    <form role="form" action="{!! iRoute('postContact') !!}" method="post" id="contact-form">
                        @csrf
                        <input type="text" class="wow fadeInUp form-control" name="name" id="name"
                               placeholder="@lang('home.contactSection.form.name')" required>
                        <input type="email" class="wow fadeInUp form-control" name="email" id="email"
                               placeholder="@lang('home.contactSection.form.email')" required>
                        <textarea class="wow fadeInUp form-control" name="body" id="message" rows="3"
                                  placeholder="@lang('home.contactSection.form.message')" required></textarea>

                        <div class="captchaquestiondiv">
                            <label for="captchaquestion">@lang('form.captchaquestion')</label>
                            <input type="text" name="captchaquestion" placeholder="Captcha answer"
                                   class="captchaquestion" value=""/>
                        </div>
                        <button type="submit" class="wow fadeInUp btn btn-default submit-btn" id="submit-btn"
                                value="Send">@lang('home.contactSection.form.submit')</button>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2994.2613008442313!2d2.0704582764390578!3d41.36840729717165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a499643b0aa107%3A0x290b59b380a3f657!2sCarrer%20de%20Sant%20Feliu%20de%20Llobregat%2C%203%2C%20local%202%2C%2008970%20Sant%20Joan%20Desp%C3%AD%2C%20Barcelona!5e0!3m2!1sen!2ses!4v1773782992006!5m2!1sen!2ses"
                        width="635" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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