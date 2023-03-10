@extends('frontend.master')
@section('title')
    Password Reset
@endsection
@section('content')
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title"><span>About </span>Us</h4>
            </div>
        </div>
    </div>
    <!-- contact form area start -->
    <div class="contact-form-area pb--120">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="cnt-title">
                        <h4>Password Reset Request Form</h4>
                        @if (session('reqsend'))
                            <div class="alert alert-success">
                                {{ session('reqsend') }}
                            </div>
                            @endif
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form action="{{ route('guest.pass.reset.req.send')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="email" style="text-align: center" name="email" placeholder="Your Email">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit">Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- contact form area end -->
@endsection

