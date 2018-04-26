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
		<script>
			$(document).ready(function(){
				var wrong_auth={{$_SESSION["loggedIn"]}};
				if (wrong_auth == 3) alert('Wrong username or password. Please Try again');
				
			});
			
		</script>
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
		<nav class="nav-bar" id="Main-nav">
			<a id ="logoLink"href="/"><img id="logo" src="images/Homepage_images/logo.png"></a>
			<a id ="minilogoLink"href="/"><img id="minilogo" src="/images/customerprofile_images/minilogo.png"></a>

			<ul>
				<li> <a href="/" class="active">Home</a></li>
				<li> <a href="#">Design</a></li>
				<li> <a href="#">Finishing</a></li>
				<li> <a href="#">Fire Fighting</a></li>
				<li> <a href="#">Air Conditioning</a></li>
				<li onclick="showJoinUsForm()"> <a href="#">Join us</a></li>
				<?php
				if( $_SESSION["loggedIn"] == 1|| $_SESSION["loggedIn"] == 3) echo'<li ID="Login-nav" onclick="showLoginForm()"> <a  href="#">Login/</a></li>
				<li ID="Signup-nav"> <a  href="/Register">Sign up</a></li>';
				else if($_SESSION["loggedIn"] == 2)echo'<li> <a href="/profile"><b>My Profile</b></a></li><li> <a href="/logout"><b>Log out</b></a></li>';
				?>
				
				<div class="collapse-item" onClick="Showcollapsed()"><span></span> <span></span> <span></span></div> 
			</ul>
		</nav>
	
		<div class= "main-container">
		
			<div class="Homepage-main-panel ">
				<img class="slider 	" src="images/Homepage_images/apartment.jpg">
				<img class="slider 	"  src="images/Homepage_images/apartment2.jpg">
				<img class="slider 	" src="images/Homepage_images/apartment3.jpg">
				<?php if( $_SESSION["loggedIn"] == 1|| $_SESSION["loggedIn"] == 3) echo'<div id="Homepage-main-panel-box">
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
					<p>Click this link to Try the simulation <a href="#" style="color:#FFD200">Try Now</a></p>
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion right-panel">
					<h1 style="font-size:45px;color:#FFD200;">Open a reservation form</h1>
					<p>Contact the company by filling a simple form. Fill up basic data about the apartment then choose the services you need</p>
					<p>To open a form you must <a href="/register" style="color:#FFD200">Signup </a> first. Here is a </p>
					<p>Already signued up? <a href="#" style="color:#FFD200">Open a form now</a><</p>
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
			</div>
			<div id="Login_form_div" class="Homepage_Form_div">
				<form id="Login_form" class="Homepage_Form" method="POST" action="/Login">
				@csrf
						<h1> Login</h1>
						<i class="fa fa-times"  id="close" onclick="closeLoginForm()"></i>
						
						<input type="email" name='Email' class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" required autofocus>
								@if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						<br>
						
						<input type="password" name='password' class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
								@if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						<br> 
						<label>
                            <input type="checkbox"  id = "Remember_Me_Check" name="remember" {{ old('remember') ? 'checked' : '' }}> 
							{{ __('Remember me') }}
                        </label>
						<br>
						<input type="submit" value="Login" id="Login_submit" class="Form_submit">
						<br><br>
						<a href="{{ route('password.request') }}" >forgot password? </a>
				</form>
				
			</div>
			<div id="JoinUs_form_div" class="Homepage_Form_div">
				<form id="JoinUs_form" method="POST" class="Homepage_Form"action="/JoinUs">
				@csrf
						<h1> Join us !</h1>
						<p> Fill this form to join 3alma7ara community. We'll be very happy to work with you.</p>
						<i class="fa fa-times"  id="close" onclick="closeJoinUsForm()"></i>
						
						<input type="email" name='Email' class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" required autofocus>
								@if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						<br>
						
						<input type="text" name='name' placeholder="Full name" required>
						<input type="text" name='profession' placeholder="Phone number" required>
						<input type="text" name='phoneNumber' placeholder="Profession" required>
						<input type="text" name='age' placeholder="Age" required>
						<input type="bio" name='bio' placeholder="Bio" >
						<input type="text" name='address' placeholder="Address" >
						<input type="file" name='cv'>
						<input type="submit" value="Submit" id="JoinUs_button" class="Form_submit">
						
				</form>	
			</div>
		</div> 
		
			
	</body>
</html>