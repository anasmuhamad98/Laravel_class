@extends('layouts/app')
@section('content')
<h2>Edit Book</h2>
<div class = "form-group">
<form method="POST" action="/books/{{$book->id}}" enctype="multipart/form-data">
@csrf
@method('PUT')
Book Cover :<img src="/storage/cover/{{$book->cover}}" style="width:200px"><br>
Update Cover:<input type="file" class="form-control" name="cover"/>
Book Title: <input type="text" class="form-control" name="title" value="{{$book->title}}"/>
Description: <input type="text" class="form-control" name="description" value="{{$book->desc}}"/>
Genre:  <select class="form-control" name="genre">
            <option value="{{$book->genre}}">{{$book->genre}}</option>
            <option value="Anime">Anime</option>
            <option value="Superhero">Superhero</option>
            <option value="Fantasy">Fantasy</option>
</select>
<br>
<button type="submit" class="btn btn-primary" style="width:10%;" onclick="return confirm('Are You Sure?')">Update</button>
</form>
<a href='/books/{{$book->id}}' class = "btn btn-danger">Back</a>
</div>
@endsection