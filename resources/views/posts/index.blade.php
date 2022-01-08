@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Posts') }}
                    @can('write post')
                    <a class="float-right btn btn-sm btn-success" href="/post/create">Write Post</a>
                    @endcan
                </div>

                <div class="card-body">

                    @if (count($posts)>0)

                    @foreach ($posts as $post)
                    <ul>
                        <li>
                            <a href="/post/{{$post->id}}">{{$post->title}}</a>

                            @can('edit post')
                            <a href="/post/edit/{{$post->id}}" class="float-right btn btn-sm btn-primary">Edit</a>
                            @endcan

                            @can('delete post')
                            <form class="float-right" action="/post/delete/{{$post->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="mr-3 btn btn-sm btn-danger" value="Delete">
                            </form>
                            @endcan
                        </li>
                    </ul>
                    @endforeach

                    @else
                    {{ __('No Posts Yet!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection