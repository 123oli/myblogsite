@extends('layouts.master')

@section('content')
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>New Blog</h5>
                </div>
                <form  action="{{ route('blogs.store') }}" class="sign-form widget-form" method="post" enctype="multipart/form-data">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @csrf
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Blog title" required>
                        </div>
                        <div class="form-group">
                            <label>Blog Description</label>
                            <textarea class="ckeditor form-control" name="description" placeholder="Enter Blog description" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input class="form-control" name="thumbnail" type="file">
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn-custom">Create Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
