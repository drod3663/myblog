@extends('layouts.master')
@include('layouts.manage-blog-modal')

@section('title', 'Manage Posts')


@section('content')
	<div ng-app="blog">
		<div ng-controller="ManageController">
			<h2 id="blog_post_title">Manage Posts</h2>
				<div class="form-group">
					
					
					<a href="{{{ action('PostsController@index') }}}" class="btn btn-info">
						<span class="glyphicon glyphicon-th-list"></span> Return to Index</a>
				</div>

			<div class="table-responsive">
				<table class="table table-bordered" id="manage_blog_table">
					<thead>
						<th>Title</th>
						<th>Author</th>
						<th>Date Created</th>
						<th>Edit</th>
					</thead>

					<tbody>
						<tr ng-repeat="p in posts">

							<td><a href="/posts/@{{p.id}}"> @{{ p.title }} </a></td>
							<td> @{{ p.user.first_name }} @{{ p.user.last_name }} </td>
							<td> @{{ p.created_at.date }} </td>
							<td>
								<a class="btn btn-danger" id="delete" ng-click="deletePost(post.id, index)">
									<span class="glyphicon glyphicon-remove"></span> Delete</a> 
								<button type="button" class="btn btn-success" data-toggle="modal" ng-click="open($index)">
									<span class="glyphicon glyphicon-pencil"></span> Edit</button>
								
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		@yield('modal')
		</div>	

	</div>

@stop

@section('script')
  
<script type="text/javascript" src="/js/angular.min.js"></script>
<script type="text/javascript" src="/js/blog.js"></script>
<script type="text/javascript">
// Active tab in navbar functionality below
var url = window.location;
// Will only work if string in href matches with location
$('ul.nav a[href="'+ url +'"]').parent().addClass('active');
// Will also work for relative and absolute hrefs
$('ul.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');
</script>
@stop
