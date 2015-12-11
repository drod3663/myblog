<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<style>
body {
    background-color: #F0F0F0;
}
.message{
    position:relative;
    top:70px;
}
.welcome{
    position:relative;
    left: 400px;
    color: white;
    bottom:45px;
    
}
.row {
    position: relative;
    left: 15px;
}

.col-sm-3 {
    float: right;
}

.clearfix {
    overflow: auto;
}


/*.content{ 
    position:relative;
    top:20px;
    float: left;
}*/
/*.col-md-8 {
    /*float: left;
/*    position:relative;
    top:20px;

}*/

</style>


</head>
<body ng-app="blog">

<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{action('HomeController@showHomepage')}}">David Rodriguez</a>
          <a class="navbar-brand" href="{{action('PostsController@index')}}">Silent Earth</a>
        </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            @if(Auth::check())
                <li class="active"><a href="{{action('PostsController@create')}}">Create Post</a></li>
            @endif
            @if(!Auth::check())
                <li><a href="{{action('HomeController@showLogin')}}">Login</a></li>
            @endif
            @if(Auth::check())
                <li><a href="{{action('PostsController@getManage')}}">Manage Posts</a></li>
            @endif
            @if(Auth::check())
                <li><a href="{{action('HomeController@doLogout')}}">Logout</a></li>
            @endif
           <!--  @if(Auth::check())
                <h3><strong><div class="welcome">{{"Welcome"}} {{{Auth::user()->first_name}}} </h3></strong></div>
            @endif -->
        </ul>
            
        
    </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav>

    
    <div class="container">
    <div class="message">
  
 @if (Session::has('successMessage'))
            <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
        @endif

        @if($errors->has())

            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
    </div>
    </div>
@endif
 


        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="https://github.com/drod3663/">GitHub</a></li>
              <li><a href="https://twitter.com/kingofspades63">Twitter</a></li>
              
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->


 <div class="col-md-8">
    @yield('content')
</div>   
    @yield('footer')

    

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="offcanvas.js"></script>
  



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
@yield('script')


</body>
</html>