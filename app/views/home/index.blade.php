@extends('layout.master')

@section('content')
<div class='row'>
    <div class='col-md-2'>
       {{ link_to("question/categorie/all"," All Categories",['class'=>'label label-default glyphicon glyphicon-th-list'])}}
    </div>
    <div class='col-md-6'>
        @foreach($categories as $categori)
            {{ link_to("question/categorie/{$categori->categorie_name}",$categori->categorie_name,['class'=>'label label-info'])}}
        @endforeach
    </div>
    <div class='col-md-4'>
        {{ Form::open(['class'=>'form-inline','role'=>'form']) }}
        <div class='form-group'>
            {{ Form::text('search',null,['class'=>'form-control'])}}
        </div>
        {{ Form::submit('Search',['class' => 'btn btn-default']) }}
        {{ Form::close() }}
    </div>
</div>
<div class='row' style="margin-top: 10px;padding-left: 20px;">
    <table class='table-striped col-md-10'>
        <thead>
            <tr>
                <th>Category</th>
                <th>Title</th>
                <th>Response</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ link_to("question/categorie/{$question->categorie->categorie_name}",$question->categorie->categorie_name)}}</td>
                <td>{{link_to("question/{$question->id}",$question->title)}}</td>
                <td>{{$question->post_count}}</td>
                <td>{{link_to("question/user/{$question->user->id}",$question->user->username)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop    