@section('modal')
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">@{{ post.title }}</h4>
		      </div>

	      	<div class="modal-body">
		    	<form class="well" novalidate name="editBlog" ng-submit="editPost($index)">
					<div class="row">
				        <div class="form-group">
				            <label for="title">Title</label>
				            <input class="form-control" type="text" name="title" ng-model="post.title" required>
				        </div>

				        <div class="form-group">
				            <label for="body">Body</label>
				            <textarea class="form-control" name="body" ng-model="post.body" required></textarea> 
				        </div>
				    </div>
				    
				    <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Save changes</button>
				    </div>
			    
			    </form>
			</div>
				          
	    </div>
	  </div>
	</div>
@stop