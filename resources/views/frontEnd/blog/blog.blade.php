@extends('frontEnd.master')
@section('title')
    Blog
@endsection
@section('content')

<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Blog</span></h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- blog area start -->
<div class="blog-area  pt--120 pb--70">
    <div class="container">
        <div class="row">
            <!-- blog single start -->
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="card mb-5">
                    <img class="card-img-top" src="{{asset('admin-assets/post-image')}}/{{ $blog->image }}" style="width: 348px; height: 216px;" alt="image">
                    <div class="card-body p-25">
                        <ul class="list-inline blog-meta mb-3">
                            <li><i class="fa fa-clock-o"></i> {{$blog->created_at->format('M')}} {{$blog->created_at->format('d')}}, {{$blog->created_at->format('Y')}}</li>
                            <li><i class="fa fa-user"></i>{{ $blog->rel_to_user->name}}</li>
                        </ul>
                        <h4 class="card-title mb-4"><a href="{{route('blog.details', $blog->slug)}}">{{ $blog->title }}</a></h4>
                        <p class="card-text">{!! substr($blog->short_desp,0,89) !!}</p>
                        <a class="btn btn-primary btn-round btn-sm" href="{{route('blog.details', $blog->slug)}}"> Read More </a>
                    </div>
                </div><!-- card -->
            </div>
            @endforeach

            <!-- blog single end -->
        </div>
    </div>
</div>
<!-- blog area end -->
@endsection
