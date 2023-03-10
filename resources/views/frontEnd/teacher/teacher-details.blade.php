@extends('frontEnd.master')
@section('title')
    Teacher Details
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Our</span> teachers</h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- teacher details area start -->
<div class="teacher-details pt--120 pb--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="tch-left-thumb">
                    <img src="{{ asset('admin-assets/teacher-image') }}/{{ $teacher_details->first()->image }}" alt="image">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="teacher-contenttchd-content pl-5 pb-5">
                    <h3>{{ $teacher_details->first()->name }}</h3>
                    <span>{{ $teacher_details->first()->position }}</span>
                    <ul class="list-inline mt-4 mb-4">
                        <li><a href="{{ $teacher_details->first()->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $teacher_details->first()->github }}"><i class="fa fa-github"></i></a></li>
                        <li><a href="{{ $teacher_details->first()->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo <span>inventore</span> veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet voluptatem.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- teacher details area end -->
@endsection
