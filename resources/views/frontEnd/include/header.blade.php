<!-- header area start -->
<div class="col-lg-2 col-sm-5">
    <!-- Button trigger modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login Here</h5>
                    @if (session('resetsucces'))
                        <div class="alert alert-success">
                            {{ session('resetsucces') }}
                        </div>
                    @endif
                    @if (session('verify'))
                        <div class="alert alert-success">
                            {{ session('verify') }}
                        </div>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  action="{{ route('guest.login.req') }}" class="sign-form widget-form " method="post">
                        @csrf
                        <input type="email" name="email" placeholder="Enter Your Email.." required="">
                        <input type="password" name="password" placeholder="Enter Your Password">
                        <label class="checkbox-inline mr-5"><input type="checkbox" value="">Remember Me</label>
                        <a class="primary-color" href="{{ route('guest.pass.reset.req') }}"><u>Forgot password</u></a>
                        <input class="btn btn-primary btn-sm" type="submit" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please Sign Up Here</h5>
                    @if (session('reqsend'))
                        <div class="alert alert-success">
                            {{ session('reqsend') }}
                        </div>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guest.store') }}" class="signup-form text-center" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="name" placeholder="Full Name">
                            </div>
                        </div>
                        <input type="email" name="email" placeholder="Enter Your Email.." required="">
                        <input type="password" name="password" placeholder="Enter Your Password">
                        <label class="checkbox-inline"><input type="checkbox" value="">I Agree</label>
                        <input class="btn btn-primary btn-sm" type="submit" value="Register Now">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<header id="header">
<!-- header top area start -->
<div class="header-top">
    <div class="container">
        <div class="row d-flex flex-center">
            <div class="col-sm-6">
                <div class="ht-address">
                    <ul>
                        <li><i class="fa fa-phone"></i>+88 017 2693 7910</li>
                        <li><i class="fa fa-envelope"></i>info@example.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ht-social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" ><i class="fa fa-search search_btn"></i></a></li>
                        <li>
                            <ul>
                                <li>
                                    {{session('Guest_login')}}
                                    @auth('guestlogin')
                                        <ul>
                                            <li>
                                                <a style="color: white; margin-left: 65px">{{ Auth::guard('guestlogin')->user()->name }}</a>
                                            </li>
                                            <li>
                                                <a class="btn btn-primary btn-round" style="padding: 7px 7px; font-size: 14px; margin-left: 15px;" href="{{ route('guest.logout') }}">Logout</a>
                                            </li>
                                        </ul>
                                       @else
                                        <ul>
                                            <li>
                                                <a data-toggle="modal" data-target="#exampleModal" style="padding: 7px 7px; font-size: 14px; margin-left: 70px;" class="btn btn-primary btn-round" href="#">Log in</a>
                                            </li>
                                            <li>
                                                <a data-toggle="modal" data-target="#exampleModal2" style="padding: 7px 7px; font-size: 14px; margin-left: 2px;" class="btn btn-primary btn-round" href="#">Sign Up</a>
                                            </li>
                                        </ul>
                                        @endauth
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header top area end -->

<!-- header bottom area start -->
<div class="header-bottom">
    <div class="container">
        <div class="header-bottom-inner">
            <div class="row align-items-center">
                <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12 d-none d-lg-block">
                    <div class="main-menu">
                        <nav id="navbar">
                            <a href="{{route('/')}}"><img src="{{asset('frontEndAssets')}}/assets/images/icon/logo.png" alt="logo"></a>
                            <ul id="m_menu_active">
                                <li class="active">
                                    <a href="{{route('/')}}">Home</a>
                                </li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li>
                                    <a href="{{route('courses')}}">Courses</a>
                                </li>
                                <li><a href="{{route('teacher')}}">teacher</a>
                                </li>
                                <li><a href="javascript:void(0);">Archive</a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('event') }}">Events</a></li>
                                        <li><a href="{{route('blog')}}">Blogs</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12 d-block d-lg-none">
                    <div id="mobile_menu"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header bottom area end -->
</header>
<!-- header area end -->

<!-- offset search area start -->
<div class="offset-search">
    <form action="#">
        <input type="text" name="search" placeholder="Sarch here...">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<!-- offset search area end -->

<!-- body overlay area start -->
<div class="body_overlay"></div>
<!-- body overlay area end -->

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
