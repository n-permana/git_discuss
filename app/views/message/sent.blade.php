@extends('layout.master')

@section('content')
<style>
    .blok{
        border: 1px solid #ccc;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        font-style: normal;
        font-weight: normal;
        line-height: 20px;
        padding: 2px;
        margin-top: 2px;
        min-width: 100px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        display: inline-block;
    }
</style>
<div class='row'>
    <div class='col-md-2'>
        @include('layout.partials.sidemail')
    </div>
    <div class='col-md-9 col-md-offset-1'>
        <div class="list-group">
        @foreach($messages as $message)
        @if(Request::is('sent'))
        <a href="message/sent/{{$message->id}}" class="list-group-item row">
        @elseif(Request::is('draft'))
        <a href="message/draft/{{$message->id}}" class="list-group-item row">
        @endif
            <div class="col-md-4">
            @foreach($message->distribution as $distribution)
                <div class="blok">{{ $distribution->user['fullname'] }}</div>
            @endforeach
            </div>
            <div class="col-md-7 col-md-offset-1">{{ $message->message_title }}</div>
        </a>
        @endforeach
        </div>
    </div>
</div>

@stop    