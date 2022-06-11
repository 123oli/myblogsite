@extends('layouts.master')
@section('content')
<br/>
<div class="jumbotron jumbotron-fluid bg-dark">
  
  <div class="jumbotron-background">
    <img src="https://imgs.search.brave.com/rZxTmXR47H6iT3xPrinv7eCXeDSJCnyv-OtGxkfRUXU/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9leHBs/b3JldmVuYW5nby5j/b20vd3AtY29udGVu/dC91cGxvYWRzLzIw/MTUvMDQvdXRpY2Et/ZWxlbWVudGFyeS1z/Y2hvb2wtMDIwLmpw/Zw" class="blur ">
  </div>

  <div class="container text-white">

    <h1 class="display-4">Welcome,</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information. This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.  </p>
    <hr class="my-4">
    <p>Shrada Ma Bi Chhatreshori 6 sankhamul salyan</p>
    <a class="btn btn-primary btn-lg" href="#" role="button"> <i class="fa fa-phone"></i> 082-522181</a>

  </div>
  <!-- /.container -->
  
 
</div>
    <!--Post-layout-->
    <section class="section masonry-layout pt-20">
        <div class="container-fluid">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('all-post') }}"> All Post </a>
        </li>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-columns">
                        <!-- <h5>All Post</h5> -->
                        @foreach($posts as $post)
                            <div class="card">
                                <div class="post-card">
                                    <div class="post-card-image">
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            <img src="{{ asset("thumbnails/$post->thumbnail") }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-card-content">
                                        <h5>
                                            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                        </h5>
                                        <!-- <p>{!! \Illuminate\Support\Str::limit($post->description, 50) !!}</p> -->
                                        <div class="post-card-info">
                                            <ul class="list-inline">
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('themes/noonpost/img/author/1.jpg') }}" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">{{ $post->user->name }}</a>
                                                </li>
                                                <li class="dot"></li>
                                                <li>{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('F d, Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!--Blogs-layout-->
       
        <section class="section masonry-layout pt-20">
        <div class="container-fluid">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('all-blog') }}"> All Blog </a>
        </li>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-columns">
                    <!-- <h5>All Blogs</h5> -->
                    
                        @foreach($blogs as $post)
                            <div class="card">
                                <div class="post-card">
                                    <div class="post-card-image">
                                        <a href="{{ route('blogs.show', $post->id) }}">
                                            <img src="{{ asset("thumbnails/$post->thumbnail") }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-card-content">
                                        <h5>
                                            <a href="{{ route('blogs.show', $post->id) }}">{{ $post->title }}</a>
                                        </h5>
                                        <!-- <p>{!! \Illuminate\Support\Str::limit($post->description, 50) !!}</p> -->
                                        <div class="post-card-info">
                                            <ul class="list-inline">
                                                <li>
                                                    <a href="#">
                                                        <img src="{{ asset('themes/noonpost/img/author/1.jpg') }}" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">{{ $post->user->name }}</a>
                                                </li>
                                                <li class="dot"></li>
                                                <li>{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('F d, Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('includes.newsletter')
@endsection

