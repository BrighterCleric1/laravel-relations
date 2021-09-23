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
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="subtitle">Subtitle</label>
            <input class="form-control" type="text" id="subtitle" name="subtitle">
        </div>
        <div class="form-group">
            <label for="author_id">Author</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="author_id">Options</label>
                </div>
                <select class="custom-select" id="author_id" name="author_id">
                    <option selected>Choose...</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control" type="text" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="published_at">Date of publication</label>
            <input class="form-control" type="datetime" name="published_at" id="published_at">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Create article">
        </div>
    </form>

</div>
    
@endsection