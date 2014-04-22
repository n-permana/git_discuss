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
        padding: 4px;
        direction: ltr;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }
</style>    
<div class='row'>
    <div class='col-md-2'>
        @include('layout.partials.sidemail')
    </div>
    <div class='col-md-9 col-md-offset-1'>
        <div class="list-group">
        <div class="list-group-item row">From : {{$messages->user->fullname}}</div>
        <div class="list-group-item row">To : 
        @foreach($messages->distribution as $distribution)
            @if($distribution->user->id == Auth::user()->id)
                <span class="blok">Me</span>
            @else
                <span class="blok">{{$distribution->user->fullname}}</span>
            @endif
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
        <hr>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ link_to('message/reply/'.$messages->id,'Reply')}}, {{ link_to('message/replyAll/'.$messages->id,'Reply All')}}, or {{ link_to('message/forward/'.$messages->id,'Forward')}}
                </div>
            </div>
        </div>
    </div>
</div>

@stop    