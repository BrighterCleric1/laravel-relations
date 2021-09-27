@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a href="{{ route('articles.index') }}"><button class="btn btn-dark">Go to Articles</button></a>
        <div class="row">
            <div class="col"><h1>{{$articles->title}}</h1></div>
        </div> 
        <div class="row">
            <div class="col"><h3>{{$articles->subtitle}}</h3></div>
        </div>
        <div class="row">
            <div class="col">
                <h3>
                    @foreach ($articles->tag as $tag)
                        {{$tag->name}}
                    @endforeach
                </h3>
            </div>
        </div>  
        <div class="row">
            <div class="col"><img src="{{$articles->image}}" alt=""></div>
        </div> 
        <div class="row">
            <div class="col"><div>{{$articles->author->name}}   {{$articles->published_at}}</div></div>
        </div>
        <div class="row">
            <div class="col"><article>{{$articles->content}} </article></div>
        </div>
        @foreach ($articles->comment as $comment)
            <div class="card">
                <div class="card-header">
                {{$comment->user}}
                </div>
                <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{$comment->commentContent}}</p>
                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
                </div>
            </div>
        @endforeach
        <div>
            <hr>
            <h2>ADD A COMMENT</h2>
        </div>
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
    
            <div class="form-group">
                <label for="User">User</label>
                <input class="form-control" type="text" id="user" name="user">
            </div>
            <div class="form-group">
                <label for="contentComment">Content</label>
                <input class="form-control" type="text" id="contentComment" name="contentComment">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Create comment">
            </div>
        </form>
          
    </div>
    
    
@endsection