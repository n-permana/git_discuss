@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-md-8">Welcome {{$user->username}}</div>
    <div class="col-md-4"><a href="#">Logout</a></div>
</div>
@stop    