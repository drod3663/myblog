@extends('layouts.master')

@section('title')
Resume
@stop

@section('style')
    <style>
        body {
            background-color: #f2f2f2;
        }
    </style>
    @stop



@section('content')
    <div class ="container">
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
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
            <li><a href="{{action('PostsController@index')}}">Blog</a></li>
            <li><a href="{{action('HomeController@showResume')}}">Resume</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    
    <h3 style="text-align: center">David Rodriguez</h3>
    <h4 style="color: grey; text-align: center">Full Stack Web Developer</h4>
    <h5 style="text-align: center"> San Antonio, TX 78259 | (210) 379-6843 | drod63@gmail.com</h5>

    <br>
    <h4 style="text-align: center">Why Me?</h4>
    <h4>
    <p>• <span style="color:grey">Leadership skills.</span> Over 5 years managing a variety of adults in a fast paced environment.</p>
    <p>• <span style="color:grey">Dedicated.</span> Eager and ready to help my team in any capacity to get the job done.</p>
    <p>• <span style="color:grey">Motivated.</span> Committed to bring my knowledge of programming and service to an
    exceptional company</p>
    </h4>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <br>

    <h3><b>Skills</b></h3>
    <h4>HTML5, CSS3, Javascript, Jquery, AngularJS, Git & Github, MySql, PHP, Laravel Framework</h4>
    <br>
    <h3><b>Full Stack Projects</b></h3>
    <h4><em>borqgaming.com </em></h4>
    <h4>Text adventure game modeled after the 80s classic, Zork.</h4>
    <h4>https://github.com/Borq-Gaming/borq.dev</h4>
    <h4><em>tremendousupside.com </em></h4>
    <h4>A personal website built to include a little about me as well as a portfolio of small projects and a blog.</h4>
    <h4><em>Laravel Blog Project </em></h4>
    <h4>Personal blog built using Laravel. </h4>
    <br>

    <h3><b>Education</b></h3>
    <h4>Codeup - <em>San Antonio, TX</em></h4>
    <h4>June 2015-October 2015</h4>
    <h4>A 4-month long full-stack web development boot camp focused on the LEMP-JS Stack. Practiced agile development, pair-programming 
    and scrum methods.</h4>
    <h4>Texas A&M University - <em>College Station, TX</em></h4>
    <h4>August 2002 – May 2006</h4>
    <h4>Studied business and economics</h4>
    <br>

    <h3><b>Experience</b></h3>
    <h4>Assistant Manager<h4>
    <h4><em>Chick-fil-A - San Antonio, TX</em></h4>
    <h4>January 2006 - June 2015</h4>
    <ul>
        <li>Managed daily operations to include employee attendance, retention, equipment maintenance, customer satisfaction, 
            product inventory, daily safety and food temperature audits and perform restaurant quality assessments. </li>
        <li>Co-managed employee schedules, new hires, employee performance and benchmark cost saving production. </li>
        <li>Managed food arrangement for outside sales events, catered events and promotional activities.</li>
    </ul>
    <h4>Sales Associate</h4>
    <h4><em>Albertson's - San Antonio, TX</em></h4>
    <h4>June 2000 - September 2000</h4>
    <ul>
        <li>Worked part time as a bagger and support team member to cashiers and managers. </li>
        <li>Learned time management between school studies, work and extracurricular activities</li>
        <li>Learned to effectively communicate with customers and team members.</li>
    </ul>

    </div>

@stop
