@extends('layouts/app')
@section('content')
@if(count($books)>0)
<h1>Books</h1>
<a href='/books/create' class = "btn btn-warning">New</a>
@foreach($books as $book)
<div class = "card">
<h2>Title : {{$book->title}}</h2>
<img src="storage/cover/{{$book->cover}}" style="width:200px">
<small>Created at {{$book->created_at}} by {{$book->user->name}}</small>
<a href='/books/{{$book->id}}' class="btn btn-primary" style="width:10%;">View</a>&nbsp;
@if(!Auth::guest())
@if(Auth::user()->id == $book->user->id)
<a href='/books/{{$book->id}}/edit' class="btn btn-secondary" style="width:10%;">Edit</a>
&nbsp;
<form method="POST" action="/books/{{$book->id}}">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" style="width:10%;" onclick="return confirm('Are You Sure?')">Delete</button>
</form>
@endif
@endif
</div>
@endforeach
@else
<h3>404 ERROR NOT FOUND</h3>
@endif
@endsection