@extends('layout.master')

@section('content')
 <script>
$(document).ready(function(){
     $('#addMore').click(function()
        {
            $string =   "<div class='form-group'>";
            $string +=  "<span onclick='delAtt(this)'  style='color:red;cursor:pointer;'>cancel</span><input multiple='multiple' name='attachment[]' type='file'> ";
            $string +=  "</div>";
            $('.attachment').append($string);
        })
        
        $('#send').click(function()
        {
            $('#message_status').val(1);
            $('#form').submit();
        })
        
        $('#draft').click(function()
        {
            $('#message_status').val(0);
            $('#form').submit();
        })
});     

$(function() {
    
    $('#msg_to').bind('click',function()
    {
        $('#input_list').focus();
    });
    
    function split( val ) {
      return val.split( /;\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#input_list" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "mailList", {
            key: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          $('#to').append("<div class='addressWrapper'><span onclick='delMsgTo(this)' class='delAddr'>x </span><span class='Addr'>"+terms.join( "; " )+"</span></div> ");
          var id = ui.item.value.split('|')
          var curValue = $('#message_to').val();
          $('#message_to').val(curValue + id[1]+",");
          console.log($('#message_to').val());
          this.value = "";
          return false;
        }
      });
  });
  
  function delMsgTo(elem){
    var ids = $(elem).next().text();
    var id = ids.split('|');
    id = id[1].substring(0, id[1].length - 2);
    var curValue = $('#message_to').val().split(',');
    console.log(id);
    console.log(curValue);
    var delid = curValue.indexOf(id);
    if (delid > -1) {
          curValue.splice(delid, 1);
      }
    $('#message_to').val(curValue);
    $(elem).parent().remove();
    console.log($('#message_to').val());
  }
  
  function delAtt(elem)
    {
        $(elem).parent().remove();
    }
  
</script>
<style>
    #msg_to{
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
    
    #to{
        direction: ltr;
    } 
    
    #input_list{
        margin-top: 3px;
        border:none;
    }
    
    .addressWrapper{
        min-width: 100px;
        padding: 4px;
        cursor: pointer;
        margin-right: 5px;
        margin-top: 3px;
        background-color: #eee;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        display: inline-block;
    }
</style>
<div class='row'>
    <div class='col-md-2'>
        @include('layout.partials.sidemail')
    </div>
    <div class='col-md-9 col-md-offset-1'>
        {{ Form::open(['route'=>'message.store','class'=>'form','files'=>true, 'id'=>'form'])}}
        <div class="form-group">
            {{Form::label('message_to','To :')}}
            <div id="msg_to" >
                <span id="to">
                    <div class='addressWrapper'><span onclick='delMsgTo(this)' class='delAddr'>x </span><span class='Addr'>{{$messages->user->fullname}}|{{$messages->user->id}};</span></div>
                    @foreach($messages->distribution as $distribution)
                        @if($distribution->user->id != Auth::user()->id)
                            <div class='addressWrapper'><span onclick='delMsgTo(this)' class='delAddr'>x </span><span class='Addr'>{{$distribution->user->fullname}}|{{$distribution->user->id}};</span></div>
                        @endif
                    @endforeach
                </span>
                {{Form::text('msg',null,['id'=>'input_list'])}}
            </div>
            {{Form::hidden('message_to',"$messages->message_from".","."$message_to".",",['class'=>'form-control','id'=>'message_to'])}}
            {{Form::hidden('id',"$messages->id",['class'=>'form-control','id'=>'message_to'])}}
            {{ $errors->first('message_to')}}
        </div>
        <div class="form-group">
            {{Form::label('message_title','Title :')}}
            {{Form::text('message_title',"$messages->message_title",['class'=>'form-control'])}}
            {{ $errors->first('message_title')}}
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
            {{Form::textArea('message_body',"\n\n\n\n\nFrom : ".$messages->user->fullname." \n Title : $messages->message_title\n$messages->message_body",['class'=>'form-control'])}}
            {{ $errors->first('message_body')}}
            {{ Form::hidden('message_status',0,['id'=>'message_status'])}}
        </div>
        <div class="form-group">
            {{Form::button('Send',['class'=>'btn btn-primary','id'=>'send'])}}&nbsp;&nbsp;{{Form::button('Draft',['class'=>'btn btn-primary','id'=>'draft'])}}
        </div>
        {{ Form::close()}}
    </div>
</div>

@stop    