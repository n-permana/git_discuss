@extends('layout.master')

@section('content')
<div class='row'>
    <div class='col-md-4'>
        <h3>All question By {{ $user->username }}</h3>
    </div>
    
    <div class='col-md-4 col-md-offset-4'>
       
    </div>
</div>
<div class='row' style="margin-top: 10px;padding-left: 20px;">
    <table class='table-striped col-md-10'>
        <thead>
            <tr>
                <th>Category</th>
                <th>Title</th>
                <th>Response</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ link_to("question/categorie/{$question->categorie->id}",$question->categorie->categorie_name)}}</td>
                <td>{{link_to("question/{$question->id}",$question->title)}}</td>
                <td>{{$question->post_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop    