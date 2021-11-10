@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href={{route('post.index')}}> Go back </a>
            <h1>Edit Details</h1>
            <div class="card">
                <!-- create form -->
                <form action="{{route('post.update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <img src="{{asset('/storage/postfolder/'.$post->image)}}" width="100" height="100">

                    <input type="text" name="postname" value="{{$post->name}}">
                    <input type="text" name="detail" value="{{$post->detail}}">
                    <input type="file" name="image" value="{{$post->image}}">
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <input type="submit" value="SUBMIT">
                </form>
                <!-- table -->


            </div>
        </div>
    </div>
</div>
@endsection