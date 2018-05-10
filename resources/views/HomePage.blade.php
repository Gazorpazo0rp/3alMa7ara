<!DOCTYPE html> 
<html>
	<head>

		<link rel="stylesheet" type="text/css" href="css/homepageStyle.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="/js/Homepage.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<style>
		#Remember_Me_Check
		{
			width : 20px !important;
			height : 20px !important;
			
		}
		</style>
		<?php

		//echo (auth::user()->status);
		?>
	</head>
	<body>
		@include('inc.navbar')
		@include('inc.messages')
		<div class= "main-container">
		
			<div class="Homepage-main-panel ">
				<img class="slider 	" src="images/Homepage_images/apartment.jpg">
				<img class="slider 	" src="images/Homepage_images/apartment2.jpg">
				<img class="slider 	" src="images/Homepage_images/apartment3.jpg">
				<?php if( Session::get('loggedIn') == 1|| Session::get('loggedIn') == 3) echo'<div id="Homepage-main-panel-box">
					<h2>Pick your worker and make a reservation now</h2>
					<h4 style="color:#FFD200">Sign Up now for free and join the platform</h2>
					<button>Sign Up</button>
				</div>';?>
				
			
				<button class="w3-button w3-display-left " onclick="slideAnimate(-1)" id="left">&#10094;</button>
				<button class="w3-button w3-display-right " onclick="slideAnimate(1)" id="right">&#10095;</button>
				<i id="Down-arrow" class="fa fa-angle-double-down" style="font-size:36px" ></i> 
			</div>

			<div id="how-it-works-container">
			<h1 style=" width:100%;margin-left:-5%!important ;text-align:center; margin-top:0px; padding-top:50px; padding-bottom:50px;" >How it works</h1>
			<div class="how-it-works" onclick="howItWorks(0)"><img src="images/Homepage_images/PickYourDesign.png"><h4 style="text-align:center">Customize your own design</h4></div>
				<div  class="how-it-works"  onclick="howItWorks(1)"><img src="images/Homepage_images/formLogo2.png"><h4 style="text-align:center">Open a reservation form</h4></div>
				<div  class="how-it-works" onclick="howItWorks(2)"><img src="images/Homepage_images/pickWorker.png"><h4 style="text-align:center">Pick your worker or designer</h4></div>
				<div  class="how-it-works" onclick="howItWorks(3)"><img src="images/Homepage_images/money.png"><h4 style="text-align:center">Review the estimated cost </h4></div>
				<div  class="how-it-works" onclick="howItWorks(4)"><img src="images/Homepage_images/submit.png"><h4 style="text-align:center">Submit and wait for contact </h4></div>
			</div>
			<div class="how-it-works-exp-container">
				<div class="how-it-works-explantion left-panel">
					<h1 style="font-size:45px;color:#FFD200;">Personalize your own design</h1>
					<p>Use the simulation to pick the colors for the floor,the walls, the roof and the furniture for Your appartment.</p>
					<p>You Don't have to go through this step. It's optional.</p>
					<p>Click this link to Try the simulation <a href="/Simulator" style="color:#FFD200">Try Now</a></p>
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion right-panel">
					<h1 style="font-size:45px;color:#FFD200;">Open a reservation form</h1>
					<p>Contact the company by filling a simple form. Fill up basic data about the apartment then choose the services you need</p>
					<p>To open a form you must <a href="/register" style="color:#FFD200">Signup </a> first. Here is a </p>
					<p>Already signued up? <a href="/Reservation" style="color:#FFD200">Open a form now</a></p>
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion left-panel">
					<h1 style="font-size:45px;color:#FFD200;">Pick your own worker or designer</h1>
					<p>A variety of professional workers and designers are waiting for you to check them out.</p>
					<p>You can open each worker's page. There,you can view his rating, hourly rate, reviews, and watch his previous deliverings.</p>
					<p>Each worker's availability is displayed in the form. Have the joy of picking.</p>
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion right-panel">
					<h1 style="font-size:45px;color:#FFD200;">Review the estimated cost</h1>
					<p>After choosing the services, The website will estimate the cost you will be charged to help you out.</p>
					<p>You can change your workers after this estimation. You can also input a certain cost and the 
						website will find you the best fitting worker or designer.</p>
					
					<img src="images/Homepage_images/apartment3.jpg">
				</div>
				<div class="how-it-works-explantion left-panel">
					<h1 style="font-size:45px;color:#FFD200;">Submit and wait for contact</h1>
					<p>After submitting the form, The company will contact you shortly to confirm the order.</p>
					<p>Those steps will help you decide which worker to go in the easiest, most efficient way</p>
					<img src="images/Homepage_images/apartment2.jpg">
				</div>
				
			</div>
			<div class="footer">
				<div id="footer_left">

				</div>
				<div id="footer_right">
					
				</div>
			
			
	</body>
</html>