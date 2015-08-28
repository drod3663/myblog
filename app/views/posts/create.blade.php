
@extends('layouts.master')
@section('style')
<style>
.col-sm-3 {
    padding-bottom: 100px;
}
</style>
@stop

<div class="col-md-8">
@section('content')

{{ Form::token() }}
{{ Form::open(array('action' => array('PostsController@store'))) }}
	@include('posts.create-edit-form')
{{ Form::close() }}

{{Form::open(array('action'=>'PostsController@store', 'method' => 'POST', 'id' => 'create-post-form', 'files' =>true))}}
{{Form::label('Add Picture', 'Add Picture')}}
{{Form::file('image')}}
{{Form::close()}}

</div>

@stop

