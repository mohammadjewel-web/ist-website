@extends('frontEnd.master')
@section('content')
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Login </span></h4>
        </div>
    </div>
</div>
<!-- contact form area start -->
<div class="contact-form-area pb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="cnt-title">
                    <h4>Login</h4>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success')}}
                        </div>
                    @endif
                    @if (session('verified'))
                        <div class="alert alert-success">
                            {{ session('verified')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form action="{{ route('guest.login.req')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit">Enter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- contact form area end -->

@endsection
@section('script')
@if (session('login_success'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '{{ session('login_success') }}'
        })
    </script>
@endif
@endsection
