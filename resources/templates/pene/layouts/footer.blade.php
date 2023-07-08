<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <x-application-logo-dark/>
                        <p>We’re a leading international banking group committed to building a sustainable business over the long-term. We operate in some of the world's most dynamic markets and have been for over 15 years.</p>
                    </div>

                    <ul class="social-links">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Company</h3>

                    <ul class="list">
                        <li><a href="{{route('page', 'about')}}">About Us</a></li>
                        <li><a href="{{route('page', 'service')}}">Services</a></li>
                        <li><a href="{{route('register')}}">E-Banking</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Support</h3>

                    <ul class="list">
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Address</h3>

                    <ul class="footer-contact-info">
                        <li><span>Location:</span> {{config('app.name')}}</li>
                        <li><span>Email:</span> <a href="mailto:{{config('app.email')}}"><span>{{config('app.email')}}</span></a></li>
                        <li><span>Phone:</span> <a href="tel:{{config('app.phone')}}">{{config('app.phone')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <p>Copyright @<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear())</script> {{config('app.name')}} <p>
        </div>
    </div>
</footer>
<!-- End Footer Area -->
