@extends('layout/master')
@section('content')
<table class="table table-dark">
    <th>Nama</th>
    <th>Jawatan</th>
    <th>Action</th>
    <tr><td>Ali</td><td>Pengurus</td><td><button class="btn btn-primary">Papar</button></td></tr>
    <tr><td>Baba</td><td>Guru</td><td><button class="btn btn-warning">Papar</button></td></tr>
    <tr><td>Siti</td><td>Seniman</td><td><button class="btn btn-danger">Papar</button></td></tr> 
</table>
@endsection