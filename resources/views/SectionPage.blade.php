
<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Refurbishment</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/main.js"></script>

	</head>
	<body>
	@include('inc.navbar')
	@include('inc.messages')
	<div id="fh5co-main">
		<div class="fh5co-overlay-mobile"></div>
		<div id="fh5co-home" class="js-fullheight" data-section="home">

			<div class="flexslider">
				
				<div class="fh5co-overlay"></div>
				<div class="fh5co-text">
					<div class="container" id="title">
						<div class="row text-center">
							<h1 class="animate-box">{{$Address}}</h1>
							<div class="fh5co-go animate-box">
								<a href="#" class="js-fh5co-next">
									View Projects
									<span><i class="icon-arrow-down2"></i></span>
								</a>
								
							</div>
						</div>
					</div>
				</div>
			  	<ul class="slides">
			   	<li style="background-image: url(images/Section/refurbishment.jpg);" data-stellar-background-ratio="0.5"></li>
			  	</ul>
			</div>
		</div>

		<div id="fh5co-content">
			<div class="container">
				<div class="row r-pb">
					<div class="col-md-8 col-md-offset-2 text-center section-heading">
						<p class="fh5co-lead animate-box">{{$Paragraph}}</p>
					</div>
				</div>

				<div class="row">
					<figure class="animate-box">
						<img src="images/Section/p1.jpg" alt="" class="img-responsive">
					</figure>
					<figure class="animate-box">
						<img src="images/Section/p2.jpg" alt="" class="img-responsive">
					</figure>
					<figure class="animate-box">
						<img src="images/Section/p3.jpg" alt="" class="img-responsive">
					</figure>
					<figure class="animate-box">
						<img src="images/Section/p4.jpg" alt="" class="img-responsive">
					</figure>
					</div>
	
			</div>
		</div>

		<div class="footer">
				<div id="footer_left">

				</div>
				<div id="footer_right">
					
				</div>
			</div>

	

	</body>
</html>

