@extends('frontEnd.master')
@section('title')
    Blog Details
@endsection
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
    <div class="container">
        <div class="crumb-content">
            <h4 class="crumb-title"><span>Single</span> Blog Deatils</h4>
        </div>
    </div>
</div>
<!-- crumbs area end -->
<!-- course area start -->
<div class="blog-details-area ptb--120">
    <div class="container">
        <div class="row">
            <!-- course details start -->
            <div class="col-lg-8 col-md-8">

                <div class="course-details">
                    <div class="cs-thumb mb-5">
                        <img src="{{ asset('admin-assets/post-image') }}/{{ $blog_details->first()->image }}" alt="image">
                    </div>
                    <div class="cs-content">
                        <div class="blog-top-meta">
                            <ul>
                                <li><i class="fa fa-user"></i>By <span>{{ $blog_details->first()->rel_to_user->name}}</span></li>
                                <li><i class="fa fa-tag"></i> {{ $blog_details->first()->rel_to_category->category_name}}</li>
                                @php
                                    $val = 'Comment';
                                @endphp
                                <li><i class="fa fa-comment-o"></i><span>{{ $comments->count() }} {{ $comments->count() > 1 ? Str::plural($val) : $val }}</span></li>
                            </ul>
                        </div>
                        <h3 class="mb-4"><a href="#">{{ $blog_details->first()->title}} </a></h3>
                        <p>{!! $blog_details->first()->short_desp !!}</p>
                        <p>{!! $blog_details->first()->description !!}</p>
                        <div class="cs-post-share">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-12 col-sm-8">
                                    <div class="tags">
                                        <h4> <strong>TAG</strong></h4>
                                        <ul class="list-inline">
                                            @php
                                                $after_explode = explode(',', $blog_details->first()->tag_id);
                                            @endphp
                                            @foreach ($after_explode as $tag_id)
                                                @php
                                                    $tags = App\Models\Tag::where('id', $tag_id)->get();
                                                @endphp
                                                @foreach ($tags as $tag)
                                                    <li>
                                                        <a href="">{{ $tag->tag_name }}</a>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12 col-sm-4">
                                    <div class="cs-share-right">
                                        <ul class="cs-social">
                                            <li><a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- post autohr info -->
                        <div class="post-author-info">
                            <div class="thumb">
                                @if ($blog_details->first()->rel_to_user->image == null)
                                    <img src="{{ Avatar::create($blog_details->first()->rel_to_user->name)->toBase64() }}" alt="" />
                                @else
                                    <img src="{{ asset('admin-assets/user-photo') }}/{{ $blog_details->first()->rel_to_user->image }}"
                                         alt="">
                                @endif
                            </div>
                            <div class="fix">
                                <h4>{{ $blog_details->first()->rel_to_user->name }}</h4>
                                <p>Aenean id ullamcorper libero. Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna. onsectetur adipiscing elit. faucibus risus, a euismod lorem hendrerit ac nisi</p>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- comments area end -->
                @php
                    $val = 'Comment';
                @endphp
                <div class="comment-area">
                    <h4 class="comment-title">{{ $comments->count() }} {{ $comments->count() > 1 ? Str::plural($val) : $val }}</h4>
                    <ul class="comment-list">
                        @foreach ($comments as $comment)
                        <li class="comment-info-inner">
                            <article>
                                <div class="comment-thumb">
                                    @if ($comment->rel_to_guest->name)
                                        <img src="{{ Avatar::create($comment->rel_to_guest->name)->toBase64() }}" />
                                    @else
                                        <img src="{{ asset('admin-assets/user-photo') }}/{{ $comment->rel_to_guest->image }}"
                                             alt="">
                                    @endif

                                </div>
                                <div class="comment-content">
                                    <h4>{{ $comment->rel_to_guest->name }}</h4>
                                    <p>{{ $comment->comment }}</p>
                                    <div class="cs-cmnt-meta">
                                        <ul>
                                            <li>{{ $comment->created_at->diffForHumans() }}</li>
                                            <li><span>BY</span> Alebert dos</li>
                                        </ul>
                                        <a href="#reply_form" data-parent="{{ $comment->id }}" class="btn-reply">REPLY</a>
                                    </div>
                                </div>
                            </article>
                            <ul class="children">
                                @foreach ($comment->replies as $reply)
                                <li class="comment-info-inner">
                                    <article>
                                        <div class="comment-thumb">
                                            @if ($reply->rel_to_guest->name)
                                                <img src="{{ Avatar::create($reply->rel_to_guest->name)->toBase64() }}" />
                                            @else
                                                <img src="{{ asset('admin-assets/user-photo') }}/{{ $reply->rel_to_guest->image }}"
                                                     alt="">
                                            @endif
                                        </div>
                                        <div class="comment-content">
                                            <h4>{{ $reply->rel_to_guest->name }}</h4>
                                            <p>{{ $reply->comment }}</p>
                                            <div class="cs-cmnt-meta">
                                                <ul>
                                                    <li>{{ $reply->created_at->diffForHumans() }}</li>
                                                    <li><span>BY</span> Alebert dos</li>
                                                </ul>
                                                <a href="#reply_form" data-parent="{{ $reply->parent_id }}"
                                                   class="btn-reply">REPLY</a>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <!-- comments area end -->

                <!-- leave comment area start -->
                @auth('guestlogin')
                <div class="leave-comment-area">
                    <h4 class="comment-title">Leave Your Comment</h4>
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Enter your name" value="{{ Auth::guard('guestlogin')->user()->name }}" required="required">
                            </div>
                            <div class="col-md-6">
                                <input type="email" placeholder="Your Email" value="{{ Auth::guard('guestlogin')->user()->email }}" required="required">
                            </div>
                        </div>
                        <textarea name="comment" id="reply_form" placeholder="Your message here" required="required"></textarea>
                        <input type="hidden" name="post_id" class="parent"
                               value="{{ $blog_details->first()->id }}">
                        <input type="hidden" name="parent_id" class="parent">

                        <button  class="btn btn-primary btn-round" name="submit"  type="submit">Send Comment <i class="fa fa-long-arrow-right"></i></button>
                    </form>
                </div>
                @else
                    <div class="alert-warning alert">
                        <h3>Please Login to leave a comment <a class="float-right btn btn-success" href="{{ route('guest.login') }}">Login here </a></h3>
                    </div>
                @endauth
                <!-- leave comment area end -->
            </div>
            <!-- course details end -->

            <!-- sidebar start -->
            <div class="col-lg-4 col-md-4">
                <div class="sidebar">
                    <!-- widget offer start -->
                    <div class="widget widget-category">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="list">
                            @foreach ($categories as $category)
                            <li><a href="#">{{$category->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- widget offer end -->
                    <!-- widget course start -->
                    <div class="widget widget-tag">
                        <h4 class="widget-title">Tag</h4>
                        <ul class="widget-tags">
                            @php
                                $after_explode = explode(',', $blog_details->first()->tag_id);
                            @endphp
                            @foreach ($after_explode as $tag_id)
                                @php
                                    $tags = App\Models\Tag::where('id', $tag_id)->get();
                                @endphp
                                @foreach ($tags as $tag)
                                    <li >
                                        <a href="blog-layout-2.html">{{ $tag->tag_name}}</a>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                    <!-- widget course end -->
                </div>
            </div>
            <!-- sidebar end -->
        </div>
    </div>
</div>
<!-- course area end -->


@endsection

@section('script')
    <script>
        $('.btn-reply').click(function() {
            var parent_id = $(this).attr('data-parent');
            $('.parent').attr('value', parent_id);
        });
    </script>
@endsection
