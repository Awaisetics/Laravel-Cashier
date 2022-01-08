@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Post') }}
                </div>

                <div class="card-body">
                    <form class="form" action="/post/update/{{$post->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Title"><br>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="7" placeholder="Body">{{$post->body}}</textarea>
                        </div><br>
                        <input type="submit" class="btn btn-primary float-right" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection