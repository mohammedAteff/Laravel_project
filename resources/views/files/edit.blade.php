@extends('layouts.app')

@section('content')
<!-- /resources/views/post/create.blade.php -->

<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
<h1 class="text-center text-info">Update File page</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action=" {{ route('file.update' , $file->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$file->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" value="{{$file->description}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">update your file :{{$file->mainFile}} </label>
                    <input type="file" name="fileinput"value="{{$file->fileinput}}"  class="form-control">

                    <button class="btn btn-info btn-block">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection