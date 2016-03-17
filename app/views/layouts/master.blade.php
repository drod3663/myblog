<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link href="http://code.jboxcdn.com/0.3.2/jBox.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/css/textbox.css">
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('style')
    <title>@yield('title')</title>
     
</head>

<body ng-app="blog">
<!-- Static navbar -->
   <!--  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{action('HomeController@showHomepage')}}">TREMENDOUS UPSIDE</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
            <li><a href="{{action('HomeController@showAbout')}}">About</a></li>
            <!-- <li><a href="{{action('HomeController@showPortfolio')}}">Works</a></li> -->
            <!-- <li><a href="{{action('PostsController@index')}}">Blog</a></li>
            <li><a href="{{action('HomeController@showResume')}}">Resume</a></li> -->

          <!-- </ul> --> 
       <!--  </div> --><!--/.nav-collapse -->
      <!-- </div>
    </div> -->
   
    
   <div class="content">
   
    @yield('content')
   </div>
   
   


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://code.jboxcdn.com/0.3.2/jBox.min.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
  
    <script src="/js/bootstrap.min.js"></script>
@yield('script')

@yield('footer')
</body>
</html>