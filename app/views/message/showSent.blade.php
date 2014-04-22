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
        <div class="list-group-item row">To : 
            @foreach($messages->distribution as $to)
                <span class="blok">{{$to->user->fullname}}</span>
            @endforeach
        </div>
        <div class="list-group-item row">Subject : {{$messages->message_title}} </div>
        <div class="list-group-item row">Attachment : 
            @foreach($messages->attachment as $attachment)
                <span class="blok">{{ link_to($attachment->attachment_path,$attachment->attachment_name)}}</span>
            @endforeach
        </div>
        <div class="list-group-item row">{{$messages->message_body}} </div>
        </div>
    </div>
</div>

@stop    