@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('articles.index') }}"><button class="btn btn-dark">Go to Articles</button></a>
        <div class="row">
            <div class="col"><h1>{{$articles->title}}</h1></div>
        </div> 
        <div class="row">
            <div class="col"><h3>{{$articles->subtitle}}</h1></div>
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
    </div>
    
@endsection