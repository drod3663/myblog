@extends('layouts.home')

@section('content')
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome!</h1>
        <p>This is a personal website I created during my time at Codeup. Included are my resume, a portfolio containing projects I worked on inside and outside of class, and a personal blog. Feel free to learn a little about me.</p>
        <p><a class="btn btn-primary btn-lg" href="{{action('HomeController@showHomepage')}}" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Resume</h2>
          <p>Here you will find my resume if you interested in hiring me. </p>
          <p><a class="btn btn-default" href="{{action('HomeController@showResume')}}" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Portfolio</h2>
          <p>Here you can find links to things I worked on inside and outside of class. </p>
          <p><a class="btn btn-default" href="{{action('HomeController@showPortfolio')}}" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Blog</h2>
          <p>Created during my time at Codeup, feel free to check out some of my posts as well as what I created. </p>
          <p><a class="btn btn-default" href="{{action('PostsController@index')}}" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>
@stop

@section('footer')
      
        <p>&copy; tremendousupside.com 2015</p>
@stop      

    </div> <!-- /container -->

    
