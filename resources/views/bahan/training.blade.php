@extends('layout/master')
@section('content')
This is a training page
<br>
Tajuk : {{$tajuk}}
<br>
@foreach($name as $names)
<li>
{{$names}}
</li>
@endforeach
<br>
{{$test}} 1  2  3
@endsection
