
@extends('layouts.master')

@section('content')
<div class="content">


  	
<!-- <form id='login' action='login.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='username' >UserName*:</label>
<input type='text' name='username' id='username'  maxlength="50" />
 
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
 
<input type='submit' name='Submit' value='Submit' />
 
</fieldset>
</form> -->

  	{{ Form::token() }}
	{{ Form::open(array('action' => array('HomeController@doLogin'))) }}
        
   

    <div class="form-group @if($errors->has('email')) has-error @endif">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group @if($errors->has('password')) has-error @endif">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', null, ['class' => 'form-control']) }}
</div>

<button class="btn btn-primary">Submit</button>
 {{ Form::close() }}

	<!-- <form action="{{{ action('PostsController@store') }}}" method="POST">
	

		<input class="form-control" type="text" name="title" value="{{{ Input::old('title') }}}" placeholder="Title" />
		<textarea class="form-control" rows="3" name="body"  placeholder="Body">{{{ Input::old('body') }}}</textarea>

		<button type="submit">Add New Post</button>

	</form>

{{ $errors->first('email', '<span class="bg-primary">Please include email and password</span>') }}
</div>
@stop 

