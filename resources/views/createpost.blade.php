@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- create form -->
                <form action="{{route('post.store')}}" method="POST">
                    {{csrf_field()}}
                    <input type="text" name="postname">
                    <input type="text" name="detail">
                    <input type="submit" value="SUBMIT">
                </form>
                <!-- table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">name</th>
                            <th scope="col">detail</th>
                            <th scope="col">image</th>
                            <th scope="col">create by</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->name}}</th>
                            <td>{{$post->detail}}</td>
                            <td>{{$post->image}}</td>
                            <td>{{$post->users->name}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection