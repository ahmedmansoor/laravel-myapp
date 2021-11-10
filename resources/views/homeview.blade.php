@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="text" name="postname">
                    <input type="text" name="detail">
                    <input type="file" name="image">
                    <input type="submit" value="SUBMIT">
                </form>
                <!-- create form -->

                <a href={{route('post.index')}}> postindex </a>
                <a href={{route('post.create')}}> create post </a>



            </div>
        </div>
    </div>
</div>
@endsection