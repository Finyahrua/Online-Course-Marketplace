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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
  <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="{{ asset('js/uikit.js') }}"></script>
  <script src="{{ asset('js/html2canvas.min.js') }}"></script>
 
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
	            {{-- <li ><a href="/">Events</a></li> --}}
	          </ul>
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


@yield('main')

</body>


<footer class="uk-section uk-section-secondary uk-section-large">
	<div class="uk-container uk-text-muted">
		<div class="uk-child-width-1-2@s uk-child-width-1-5@m" data-uk-grid>
			<div>
				<h5>Company</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Marketing Tools</a></li>
				
				</ul>
			</div>
		
			<div>
				<h5>Join Us</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="#">Our Initiatives</a></li>
					<li><a class="uk-link-muted" href="#">Giving Back</a></li>
				
				</ul>
			</div>
			<div>
				<h5>Contact</h5>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-muted" href="finaddy@gmail.com">email</a></li>
					<li><a class="uk-link-muted" href="#">LinkedIn</a></li>
					<li><a class="uk-link-muted" href="#">Facebook</a></li>
					
				</ul>
			</div>
			<div>
				<div class="uk-margin">
					<a href="#" class="uk-logo">OCM</a>
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
							<a href="mailto:finaddy@gmail.com" data-uk-icon="icon: mail" class="uk-icon-link uk-icon"
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
  <script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
   <script src="{{ asset('js/html2canvas.min.js') }}"></script>
  <script>
    document.getElementById("btn_convert").addEventListener("click", function() {
		html2canvas(document.getElementById("print_cer"),
			{
				allowTaint: true,
				useCORS: true
			}).then(function (canvas) {
				var anchorTag = document.createElement("a");
				document.body.appendChild(anchorTag);
				//document.getElementById("previewImg").appendChild(canvas);
				anchorTag.download = "filename.jpg";
				anchorTag.href = canvas.toDataURL();
				anchorTag.target = '_blank';
				anchorTag.click();
			});
  });
  </script>
  
  <script>

    function print() {
      var node = document.getElementById("print_cer");

      domtoimage
        .toJpeg(node)
        .then(function (dataUrl) {
          var img = new Image();
          img.src = dataUrl;
          document.appendChild(img);
        })
        .catch(function (error) {
          console.error("oops, something went wrong!", error);
        });
    }
  </script>
    <script>
    $(document).ready(function() {
      $('#mybutton').hide().delay(2000).fadeIn(1200);
  });
    </script>
</html>





