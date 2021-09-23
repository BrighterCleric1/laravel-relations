@extends('layouts.app')




@section('content')
  <div class="go-create">
    <a href="{{ route('articles.create') }}"><button class="btn btn-dark">Create Article</button></a>
  </div>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Subtitle</th>
        <th scope="col">Image</th>
        <th scope="col">Author</th>
        <th scope="col">Published at</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
        <tr>
            <th scope="row">{{ $article->id}}</th>
            <td>{{ $article->title}}</td>
            <td>{{ $article->subtitle}}</td>
            <td><img class="intro-img" src="{{$article->image}}" alt=""></td>
            <td>{{ $article->author->name}}</td>
            <td>{{ $article->published_at}}</td>
            <td><a href="{{ route('articles.show', $article) }}"><button type="button" class="btn btn-success"><i class="bi bi-eye"></i></button></a></td>
            <td><a href="{{ route('articles.edit', $article) }}"><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button></a></td>
            <td> 
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{$article->id}}">
                <i class="bi bi-x-square"></i>
              </button>
              <div class="modal fade" id="modal-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title font-black" id="exampleModalLabel">ALERT</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body font-black" >
                      Are you sure about deleting this article?
                    </div>
                    <div class="modal-footer">
                      <form action="{{ route('articles.destroy', $article) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete article</button>
                      </form>  
                    </div>
                  </div>
                </div>
              </div>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table> 

@endsection 