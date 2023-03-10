@extends('frontEnd.master')
@section('title')
    Password Reset
@endsection
@section('content')
    <!--Login-->
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title"><span>About </span>Us</h4>
            </div>
        </div>
    </div>
    <div class="contact-form-area pb--120">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="cnt-title">
                        <h4>Reset Your Password</h4>

                    </div>

                </div>
            </div>
            <div class="contact-form">
                <form action="{{ route('guest.pass.reset')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" name="token" value="{{ $token }}">
                            <input type="password" name="password" placeholder="Password" style="text-align: center">
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="Confirm Password" placeholder="password_confirmation" style="text-align: center">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit">Reset Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
