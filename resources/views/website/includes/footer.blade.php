    <!--Footer section start-->
    <footer class="footer-section section" id="contact_us" style="background-image: url({{asset("website/assets")}}/images/bg/footer-bg.jpg)">

        <!--Footer Top start-->
        <div class="footer-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
            <div class="container">
                <div class="row row-25">

                    <!--Footer Widget start-->
                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <img src="{{asset("$setting->logo")}}" alt="" style="    height: 150px;">
                        <p>{{ $setting->title .' - '. $setting->desc }}</p>
                        {{-- <div class="footer-social">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                        </div> --}}
                    </div>
                    <!--Footer Widget end-->

                    <!--Footer Widget start-->
                    <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
                        <h4 class="title"><span class="text">{{ __('website.contact_us') }}</span><span class="shape"></span></h4>
                        <ul>
                            <li><i class="fa fa-map-o"></i><span>{{ $setting->location }}</span></li>
                            <li><i class="fa fa-phone"></i><span>{{ $setting->mobile }}</span></li>
                            <li><i class="fa fa-envelope-o"></i><span>{{ $setting->email }}</span></li>
                        </ul>
                    </div>
                    <!--Footer Widget end-->


                    <!--Footer Widget start-->
                    <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
                        <h4 class="title"><span class="text">{{ __("website.useful_links") }}</span><span class="shape"></span></h4>
                        <ul>
                            <li><a href="{{ route("website.policy") }}">{{ __('website.policy') }}</a></li>
                            <li><a href="{{ route("website.TermsAndConditions") }}">{{ __('website.TermsAndConditions') }}</a></li>
                       </ul>
                    </div>
                    <!--Footer Widget end-->

                    <!--Footer Widget start-->
                    {{-- <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <h4 class="title"><span class="text">Newsletter</span><span class="shape"></span></h4>

                        <p>Subscribe our newsletter and get all latest news about our latest properties, promotions, offers and discount</p>

                        <form id="mc-form" class="mc-form footer-newsletter" >
                            <input id="mc-email" type="email" autocomplete="off" placeholder="Email Here.." />
                            <button id="mc-submit"><i class="fa fa-paper-plane-o"></i></button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->

                    </div> --}}
                    <!--Footer Widget end-->

                </div>
            </div>
        </div>
        <!--Footer Top end-->

        <!--Footer bottom start-->
        <div class="footer-bottom section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright text-center">
                            <p>Copyright &copy;2024 <a  href="#">{{ $setting->title }}</a>. Made By Creative Solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer bottom end-->

     </footer>
     <!--Footer section end-->
</div>

<!-- Placed js at the end of the document so the pages load faster -->

<!-- All jquery file included here -->
{{-- <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script> --}}
<script src="{{asset("website")}}/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{asset("website")}}/assets/js/vendor/jquery-migrate-1.4.1.min.js"></script>
<script src="{{asset("website")}}/assets/js/popper.min.js"></script>
<script src="{{asset("website")}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset("website")}}/assets/js/plugins.js"></script>
<script src="{{asset("website")}}/assets/js/map-place.js"></script>
<script src="{{asset("website")}}/assets/js/main.js"></script>

</body>

</html>
