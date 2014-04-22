@extends('layout.master')

@section('content')
<div class='row'>
    <div class='col-md-2'>
        @include('layout.partials.sidemail')
    </div>
    <div class='col-md-9 col-md-offset-1'>
        <div class="list-group">
        @foreach($messages as $message)
        <a href="message/show/{{$message->message_id}}" class="list-group-item row {{$message->is_read == 0 ? 'active':''}}">
            <div class="col-md-3">{{ $message->message->user->fullname }}</div>
            <div class="col-md-8 col-md-offset-1">{{ $message->message->message_title }}</div>
        </a>
        @endforeach
        </div>
    </div>
</div>

@stop    