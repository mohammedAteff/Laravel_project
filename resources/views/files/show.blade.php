@extends('layouts.app')

@section('content')

<h1 class="text-center text-info">Files name : {{$file->title}}</h1>

<div class="container col-6">
    <div class="card">
        File Title : {{$file->title}}
        <div class="card-body">
      File Description :
      {{$file->description}}

      {{$file->mainFile}}

        <a href="{{ route('file.download', $file->id ) }}" class="btn btn-info m-2 btn-block">Download</a >
        </div>
    </div>
</div>



@endsection