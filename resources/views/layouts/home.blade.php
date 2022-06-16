<!DOCTYPE html>
<html lang="en-gb" dir="ltr">


<!--   19 Nov 2019 03:38:47 GMT -->
<!--  --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- / -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OCM</title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.png" >
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
  <script src="{{ asset('js/uikit.js') }}"></script>
</head>

<body class="uk-background-body">

<header id="header">
	<div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent ; top: #header" >
	  <nav class="uk-navbar-container uk-letter-spacing-small uk-text-bold" >
	    <div class="uk-container" >
	      <div class="uk-position-z-index" data-uk-navbar>
	        <div class="uk-navbar-left">
	          <a class="uk-navbar-item uk-logo" href="/">OCM</a>
	        </div>
	        <div class="uk-navbar-right">
	          <ul class="uk-navbar-nav uk-visible@m" data-uk-scrollspy-nav="closest: li; scroll: true; offset: 80">
	            <li class="uk-active"><a href="/">Courses</a></li>
	            <li ><a href="/">Events</a></li>
	          </ul>
            {{-- @if (Auth::check())
                        <div >
                            Logged in as {{ Auth::user()->name }}
                            <form action="{{ route('auth.logout') }}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" value="Logout" class="btn btn-info">
                            </form>
                        </div>
                    @else --}}
                        {{-- <form action="{{ route('auth.login') }}" method="post">
                            {{ csrf_field() }}
                            <input type="email" name="email" placeholder="Email" />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="submit" value="Login" class=" uk-active">
                        </form> --}}
                        {{-- <div><a class="uk-button uk-button-primary-light" href="{{ route('auth.login') }}">Sign In</a></div>
	          </div>   
                    @endif
	          </div> --}}
            <div style="margin-right:60px"></div>

            @if (Auth::check())
             <div class="uk-navbar-item">

                 <form action="{{ route('auth.logout') }}" method="post">
                                {{ csrf_field() }}
                    <input type="submit" value="Logout" class="uk-button uk-button-danger">
                </form>
	          </div> 
            @else
            <div class="uk-navbar-item">
	            <div><a class="uk-button uk-button-default" href="{{ route('auth.register') }}">Register</a></div>
	          </div> 
               <div class="uk-navbar-item">
	            <div><a class="uk-button uk-button-primary-light" href="{{ route('auth.login') }}">login</a></div>
	          </div>    

            @endif
	             

           
	          <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
	            data-uk-navbar-toggle-icon></span></a>
	        </div>
	      </div>
	    </div>
	  </nav>
	</div>
</header>


{{-- 
<div class="uk-section uk-margin-top">
  <div class="uk-container">
    <div class="uk-grid-small uk-flex uk-flex-middle" data-uk-grid>
      <div class="uk-width-expand@m">
        <h2>Popular Courses</h2>
      </div>
    </div>
    <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match uk-margin-medium-top" data-uk-grid>
      <div>
        <div class="uk-card uk-card-small uk-card-default uk-card-hover uk-border-rounded-large uk-overflow-hidden">
          <div class="uk-card-media-top uk-inline uk-light">
            <img src="https://source.unsplash.com/gMsnXqILjp4/640x380" alt="Course Title">
            <div class="uk-position-cover uk-overlay-xlight"></div>
            <div class="uk-position-small uk-position-top-left">
              <span class="uk-label uk-text-bold uk-text-price">$27.00</span>
            </div>
            <div class="uk-position-small uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>            
          </div>
          <div class="uk-card-body">
            <h3 class="uk-card-title uk-margin-small-bottom">Business Presentation Course</h3>
            <div class="uk-text-muted uk-text-small">Thomas Haller</div>
            <div class="uk-text-muted uk-text-xxsmall uk-rating uk-margin-small-top">
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.75"></span>
              <span class="uk-margin-small-left uk-text-bold">5.0</span>
              <span>(324)</span>
            </div>
          </div>
          <a href="course.html" class="uk-position-cover"></a>
        </div>
      </div>
          
    </div>
    <div class="uk-text-center uk-margin-large-top">
        
  </div>
</div> --}}
@yield('main')
</body>


<footer class="uk-section uk-section-secondary uk-section-large">
	<div class="uk-container uk-text-muted">
		<div class="uk-child-width-1-2@s uk-child-width-1-5@m" data-uk-grid>
			<div>
				<h5>Company</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Marketing Tools</a></li>
					<li><a class="uk-link-muted" href="#">Presentations</a></li>
					<li><a class="uk-link-muted" href="#">Professionals</a></li>
					<li><a class="uk-link-muted" href="#">Appointments</a></li>
					<li><a class="uk-link-muted" href="#">Stores</a></li>
				</ul>
			</div>
			<div>
				<h5>Community</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Webinars</a></li>
					<li><a class="uk-link-muted" href="#">Developers</a></li>
					<li><a class="uk-link-muted" href="#">Platforms</a></li>
					<li><a class="uk-link-muted" href="#">Workshops</a></li>
					<li><a class="uk-link-muted" href="#">Local Meetups</a></li>
				</ul>
			</div>
			<div>
				<h5>Join Us</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Our Initiatives</a></li>
					<li><a class="uk-link-muted" href="#">Giving Back</a></li>
					<li><a class="uk-link-muted" href="#">Communities</a></li>
					<li><a class="uk-link-muted" href="#">Youth Program</a></li>
					<li><a class="uk-link-muted" href="#">Charity</a></li>
				</ul>
			</div>
			<div>
				<h5>Contact</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Contact Form</a></li>
					<li><a class="uk-link-muted" href="#">LinkedIn</a></li>
					<li><a class="uk-link-muted" href="#">Facebook</a></li>
					<li><a class="uk-link-muted" href="#">Instagram</a></li>
					<li><a class="uk-link-muted" href="#">Visit Us</a></li>
				</ul>
			</div>
			<div>
				<div class="uk-margin">
					<a href="#" class="uk-logo">Sprin</a>
				</div>
				<div class="uk-margin uk-text-small">				
					<p><a href="templateshub.net">Templateshub</a></p>
				</div>
				<div class="uk-margin">
					<div data-uk-grid class="uk-child-width-auto uk-grid-small">
						<div class="uk-first-column">
							<a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link uk-icon"
								target="_blank"></a>
						</div>
						<div>
							<a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link uk-icon"
								target="_blank"></a>
						</div>
						<div>
							<a href="mailto:info@blacompany.com" data-uk-icon="icon: mail" class="uk-icon-link uk-icon"
								target="_blank"></a>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
</footer>

<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">
    <a class="uk-logo" href="index-2.html">Sprin</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
      <li class="uk-active"><a href="index-2.html">Courses</a></li>
      <li ><a href="events.html">Events</a></li>
      <li ><a href="course.html">Course</a></li>
      <li ><a href="event.html">Event</a></li>
      <li ><a href="search.html">Search</a></li>
      <li ><a href="sign-in.html">Sign In</a></li>
      <li ><a href="sign-up.html">Sign Up</a></li>
    </ul>
    <div class="uk-margin-medium-top">
      <a class="uk-button uk-width-1-1 uk-button-primary-light" href="sign-up.html">Sign Up</a>
    </div>
    <div class="uk-margin-medium-top uk-text-center">
      <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
        <div>
          <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>
</div>
   <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
    $(document).ready(function() {
      $('#mybutton').hide().delay(2000).fadeIn(1200);
  });
    </script>
</html>




<!--   19 Nov 2019 03:39:33 GMT -->



{{-- <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> OCM</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
    
   

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">OCM</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <div class="col-lg-6 text-right" style="padding-top: 10px">
                    @if (Auth::check())
                        <div style="color:white">
                            Logged in as {{ Auth::user()->email }}
                            <form action="{{ route('auth.logout') }}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" value="Logout" class="btn btn-info">
                            </form>
                        </div>
                    @else
                        <form action="{{ route('auth.login') }}" method="post">
                            {{ csrf_field() }}
                            <input type="email" name="email" placeholder="Email" />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="submit" value="Login" class="btn btn-info">
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">

                @yield('sidebar')

            </div>

            <div class="col-md-9">

                <div class="row">

                    @yield('main')

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; OCM 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

</body>

</html> --}}
