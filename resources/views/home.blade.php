@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Books') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <th>Book Title</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    @foreach($books as $book)
                    <tr><td>{{$book->title}}</td>
                    <td><a href="/books/{{$book->id}}" class="btn btn-primary">View</a></td>
                    <td><a href="/books/{{$book->id}}/edit" class="btn btn-primary">Edit</a></td>
                    <td>
                    <form method="post" action="/books/{{$book->id}}">
                    @csrf
                    @method('delete')
                    <button type = "submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection