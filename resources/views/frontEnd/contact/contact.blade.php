@extends('frontEnd.master')
@section('title')
    Contact
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Contact </span>Us</h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- contact info area start -->
<div class="contact-info ptb--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="cnt-info">
                    <h4>Contact Info</h4>
                    <p>House # 54, Road # 15/A (Old-26)
                        Dhanmondi (East of Shankar Bus Stand)
                        Dhaka-1209.</p>
                    <ul class="address">
                        <li><i class="fa fa-phone"></i>+1 (2) 345 6789</li>
                        <li><i class="fa fa-phone"></i>+1 (2) 345 6789</li>
                        <li><i class="fa fa-envelope"></i>contact@yourdomain.com</li>
                    </ul>
                    <ul class="social list-inline mt-5">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="google-map">
                    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.870723817235!2d90.36972176218009!3d23.75198899238438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf52189ebcf5%3A0x10081ab90b263871!2sInstitute%20of%20Science%20%26%20Technology%20(IST)!5e0!3m2!1sen!2sbd!4v1678382441207!5m2!1sen!2sbd" width="730" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact info area end -->
<!-- contact form area start -->
<div class="contact-form-area pb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="cnt-title">
                    <h4>Get in touch <span>with us</span></h4>
                    <p>Quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut </p>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="name" placeholder="Enter your name">
                    </div>
                    <div class="col-md-4">
                        <input type="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="subject" placeholder="Subject">
                    </div>
                    <div class="col-12">
                        <textarea name="msg" id="msg" placeholder="Your message here"></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit">SEND TO US</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- contact form area end -->
@endsection
