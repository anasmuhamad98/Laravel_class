@extends('layouts/app')
@section('content')
<h2>Create Form</h2>
<div class = "form-group">
<form method="POST" action="/books" enctype="multipart/form-data">
@csrf
Book Title: <input type="text" class="form-control" name="title" placeholder="Insert Book Title"/>
Description: <input type="text" class="form-control" name="description" placeholder="Insert Book Description"/>
Genre:  <select class="form-control" name="genre">
            <option value="Anime">Anime</option>
            <option value="Superhero">Superhero</option>
            <option value="Fantasy">Fantasy</option>
</select>
Book Cover:
<input type="file" class="form-control" name="cover"/>
<br>
<input type="submit" class="btn btn-primary"/>
</form>
<a href='/books' class = "btn btn-danger">Back</a>
</div>
@endsection