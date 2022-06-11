@extends('layouts.master')

@section('content')
<section class="pt-55 mb-50 mt-100 container widget">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead class="thead-dark rounded    ">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($blogs as $blog)
                  <tr>
                    <th scope="row">{{ $blog->id }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{!! $blog->description !!}</td>
                    <td class="d-flex">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fa fa-pencil-alt"></i></a>
                        <a href="{{ route('blogs.delete', $blog->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>


        </div>
    </div>
</section>
@endsection
