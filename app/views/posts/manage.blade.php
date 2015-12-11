@extends('layouts.master')


@section('content')

<div ng-app="blog">
<div ng-controller="ManageController">

	<table class="table table-bordered">
		<tr>
		    <td>Title</td>
		    <td>Author</td> 
		    <td>Created</td>
		</tr>
		<tr ng-repeat="post in posts">
		    <td><a href="/posts/@{{ post.id }}">@{{ post.title }}</a></td>
		    <td> @{{post.user.first_name }} @{{post.user.last_name}}</td>
		    <td> @{{post.created_at.date}}  </td>
		    <td><button type="button" ng-click="deletePost($index)">Delete</button></td>
		</tr>
	</table> 

</div>
</div>

@stop

@section('script')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
<script type="text/javascript" src="/js/blog.js"></script>
@stop
