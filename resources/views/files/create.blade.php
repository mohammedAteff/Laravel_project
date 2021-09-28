@extends('layouts.app')

@section('content')
<!-- /resources/views/post/create.blade.php -->

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
<h1 class="text-center text-info">Add File page</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action=" {{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Upload your file</label>
                    <input type="file" name="fileinput" class="form-control">

                </div>

                <div class="form-group">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="userID" class="form-control">
                </div>

                <button class="btn btn-info btn-block">Send Data</button>

            </form>
        </div>
    </div>
</div>


@endsection