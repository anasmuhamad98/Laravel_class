@extends('layouts/app')
@section('content')
@if($book!=NULL)
<div>
    @if(!Auth::guest())
    <a href='/books/{{$book->id}}/edit' class = "btn btn-warning">Edit</a>
    @endif
    <table class = "table">
        <th></th>
        <th>Title</th>
        <th>Description</th>
        <th>Genre </th>
        <th>Created at </th>
        <tr>
            <td><img src="/storage/cover/{{$book->cover}}" style="width:200px"></td>
            <td>{{$book->title}}</td>
            <td>{{$book->desc}}</td>
            <td>{{$book->genre}}</td>
            <td>{{$book->created_at}}</td>
        </tr>
</table>
</div>
@else
<h3>404 ERROR NOT FOUND</h3>
@endif
<a href='/books' class = "btn btn-primary" style="float:right">Back</a>
@endsection