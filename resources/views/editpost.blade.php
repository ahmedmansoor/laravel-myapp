@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- create form -->
                <form action="{{route('post.update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="text" name="postname" value="{{$post->name}}">
                    <input type="text" name="detail">
                    <input type="file" name="image">
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <input type="submit" value="SUBMIT">
                </form>
                <!-- table -->


            </div>
        </div>
    </div>
</div>
@endsection