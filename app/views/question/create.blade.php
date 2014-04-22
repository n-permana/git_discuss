@extends('layout.master')

@section('content')
<script>
    $(document).ready( function() {
        $('#addMore').click(function()
        {
            $string =   "<div class='form-group'>";
            $string +=  "<span onclick='delAtt(this)'>cancel</span><input multiple='multiple' name='attachment[]' type='file'> ";
            $string +=  "</div>";
            $('.attachment').append($string);
        })
    });
    
    function delAtt(elem)
    {
        $(elem).parent().remove();
    }
</script>
<div class='row'>
    <div class='col-md-4'>
        <h3>Create new question</h3>
    </div>
</div>
<div class='row' style="margin-top: 10px;padding-left: 20px;">
    {{ Form::open(['route'=>'question.store','class'=>'form','files'=>true])}}
    <div class="form-group">
        {{Form::label('categorie','Categorie :')}}
        {{Form::select('categorie_id',$categories,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title','Title :')}}
        {{Form::text('title',null,['class'=>'form-control'])}}
        {{ $errors->first('title')}}
    </div>
    <div class="form-group">
        {{Form::label('content','Content :')}}
        {{Form::textArea('content',null,['class'=>'form-control'])}}
        {{ $errors->first('content')}}
    </div>
    <div class="attachment">
        <div class="form-group">
            {{Form::label('attachment','Attachment :')}} 
            {{Form::file('attachment[]',['multiple'=>'multiple'])}}
        </div>
    </div>
    <span class="btn btn-primary" id="addMore">Add more attachment</span>
    <div>&nbsp;</div>
    <div class="form-group">
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    {{ Form::close()}}
</div>
@stop    