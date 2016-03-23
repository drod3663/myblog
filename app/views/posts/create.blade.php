
@extends('layouts.master')
@section('title')
Posts
@stop


@section('content')
	<div class="container well col-md-8 col-md-offset-2" id="create_posts">
		<h1>Posts Input</h1>
		{{ Form::open(array('action' => 'PostsController@store', 'method' => 'POST', 'id' => 'create_post_form', 'files' => true)) }}
			
			<div class="form-group @if($errors->has('title')) has-error @endif">
				<label class="control-label" name="title" for="title">Title</label>
				<input type="text" name="title" class="form-control"value="{{{ Input::old('title') }}}" placeholder="Title">
			</div>

			<div class="form-group @if($errors->has('body')) has-error @endif">
				<label class="control-label" name="body" for="body">Body</label>
				<div class="wmd-panel">
	                <div id="wmd-button-bar"></div>
                	@if(!empty($post->body))
		                <textarea class="wmd-input form-control" name="body" cols="50" rows="10" id="wmd-input">{{{$post->body}}}</textarea>
	                @else
		                 <textarea class="wmd-input form-control" name="body" cols="50" rows="10" id="wmd-input"></textarea>
                	@endif
		            </div>
	            <label>Preview:</label>
	            <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
	            <br/>
			</div>

			<div class="form-group">
				{{ Form::file('image') }}
			</div>

			<div class="form-group">
				<button class="btn btn-success" type="submit">
					<span class="glyphicon glyphicon-ok"></span> Submit</button>
				<a class="btn btn-info" href="{{{ action('PostsController@index')}}}">
					<span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
			</div>

			
		{{ Form::close() }}
	</div>
@stop

@section('script')
<script type="text/javascript">
    (function () {
        
        var converter = new Markdown.Converter();
        
        var editor = new Markdown.Editor(converter);
        
        editor.run();
    })();
</script>
@stop
