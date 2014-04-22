@extends('layout.master')

@section('content')
<div class="row  col-md-10">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>{{ $question->title}}</h4>
                <p>Question by 
                    @if(Auth::check())
                        @if($question->user->username != Auth::user()->username)
                            {{ link_to("question/user/{$question->user->id}",$question->user->username)}}
                        @else
                            You
                        @endif
                    @else     
                         {{ link_to("question/user/{$question->user->id}",$question->user->username)}}
                    @endif
                    at {{ $question->created_at}}</p>
                <hr>
                <p>
                    {{ $question->content }}
                </p>
                    @if(count($question->question_Attachment) > 0)
                     <hr>
                        Attachment :
                        @foreach($question->question_Attachment as $attachment)
                        <br>
                            {{link_to("download/$attachment->attachment_path",$attachment->attachment_name,['target'=>'_blank'])}}
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
    
        <hr>
        <h3>Answers : </h3>
        @foreach($answers as $answer)
               <div class="row">
                    <div class="panel panel-default" @if($question->best_answer_id == $answer->id) style="background-color:lavender;" @endif>
                        <div class="panel-body">
                            @if(Auth::check())
                                @if($answer->user->username != Auth::user()->username)
                                    {{ link_to("question/user/{$answer->user_id}",$answer->user->username)}} at {{ $answer->created_at }}
                                @else
                                    {{ $answer->user->username}} at {{ $answer->created_at }}
                                @endif
                             @else
                                {{ $answer->user->username}} at {{ $answer->created_at }}
                             @endif
                             
                             @if(Auth::check())
                                @if($answer->user_id != Auth::user()->id && $question_owner == Auth::user()->id && $question->best_answer_id == 0)
                                    {{link_to("answer/best/{$answer->id}/{$question_id}",'Mark as Answer',['class'=>'label label-primary'])}}
                                @endif
                             @endif
                            
                            @if($question->best_answer_id == $answer->id)
                                <span class="label label-primary glyphicon glyphicon-ok"> Answer</span>
                            @endif
                            <hr>
                            {{ $answer->answer }}
                        </div>
                    </div>
                </div>
        @endforeach
        
        @if(Auth::guest())
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ link_to('users/create','Sign Up')}} or {{ link_to('login','Login')}} to reply
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::open(['route'=>'answer.store']) }}
                    <div class="form-group">
                        {{ Form::textArea('answer',null,['cols'=>150,'rows'=>5,'class'=>'form-control']) }}
                        {{ Form::hidden('question_id',"{$question_id}")}}
                        {{ Form::hidden('user_id',null)}}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Reply', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @endif
</div>
@stop    