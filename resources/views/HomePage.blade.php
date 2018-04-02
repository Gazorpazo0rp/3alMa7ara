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
		
	</head>
	<body>
	
		<nav class="nav-bar" id="Main-nav">
			<a id ="logoLink"href="#"><img id="logo" src="images/Homepage_images/logo.jpg"></a>
			<ul>
				<li> <a href="#" class="active">Home</a></li>
				<li> <a href="#">Design</a></li>
				<li> <a href="#">Finishing</a></li>
				<li> <a href="#">Fire Fighting</a></li>
				<li> <a href="#">Air Conditioning</a></li>
				<li ID="Login-nav" onclick="showLoginForm()"> <a  href="#">Login/</a></li>
				<li ID="Signup-nav"> <a  href="/register">Sign up</a></li>
				<div class="collapse-item" onClick="Showcollapsed()"><span></span> <span></span> <span></span></div> 
			</ul>
		</nav>
	
		<div class= "main-container">
		
			<div class="Homepage-main-panel ">
				<img class="slider 	" src="images/Homepage_images/apartment.jpg">
				<img class="slider 	"  src="images/Homepage_images/apartment2.jpg">
				<img class="slider 	" src="images/Homepage_images/apartment3.jpg">
				<div id="Homepage-main-panel-box">
					<h2>Pick your worker and make a reservation now</h2>
					<h4 style="color:#FFD200">Sign Up now for free and join the platform</h2>
					<button>Sign Up</button>
				</div>
				<button class="w3-button w3-display-left " onclick="slideAnimate(-1)" id="left">&#10094;</button>
				<button class="w3-button w3-display-right " onclick="slideAnimate(1)" id="right">&#10095;</button>
				<i id="Down-arrow" class="fa fa-angle-double-down" style="font-size:36px" ></i> 
			</div>
			<div id="how-it-works-container">
				</br><h1 style="text-align:center">How it works</h1></br></br>
				<div class="how-it-works" onclick="howItWorks(0)"><img src="images/Homepage_images/PickYourDesign.png"><h4 style="text-align:center">Customize your own design</h4></div>
				<div  class="how-it-works"  onclick="howItWorks(1)"><img src="images/Homepage_images/formLogo2.png"><h4 style="text-align:center">Open a reservation form</h4></div>
				<div  class="how-it-works" onclick="howItWorks(2)"><img src="images/Homepage_images/pickWorker.png"><h4 style="text-align:center">Pick your own worker or designer</h4></div>
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
					<h1 style="font-size:45px;color:#FFD200;">Personalize your own design</h1>
					<p>Use the simulation to pick the colors for the floor,the walls, the roof and the furniture for Your appartment</p>
					<p>You Don't have to go through this step. It's optional.</p>
					<p>Click this link to Try the simulation <a href="#" style="color:#FFD200">Try Now</a></p>
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion left-panel">
					<h1 style="font-size:45px;color:#FFD200;">Personalize your own design</h1>
					<p>Use the simulation to pick the colors for the floor,the walls, the roof and the furniture for Your appartment</p>
					<p>You Don't have to go through this step. It's optional.</p>
					<p>Click this link to Try the simulation <a href="#" style="color:#FFD200">Try Now</a></p>
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion right-panel">
					<h1 style="font-size:45px;color:#FFD200;">Personalize your own design</h1>
					<p>Use the simulation to pick the colors for the floor,the walls, the roof and the furniture for Your appartment</p>
					<p>You Don't have to go through this step. It's optional.</p>
					<p>Click this link to Try the simulation <a href="#" style="color:#FFD200">Try Now</a></p>
					<img src="images/Homepage_images/apartment3.jpg">
				</div>
				<div class="how-it-works-explantion left-panel">
					<h1 style="font-size:45px;color:#FFD200;">Personalize your own design</h1>
					<p>Use the simulation to pick the colors for the floor,the walls, the roof and the furniture for Your appartment</p>
					<p>You Don't have to go through this step. It's optional.</p>
					<p>Click this link to Try the simulation <a href="#" style="color:#FFD200">Try Now</a></p>
					<img src="images/Homepage_images/apartment2.jpg">
				</div>
				
			</div>
			<div class="footer">
				<div id="footer_left">

				</div>
				<div id="footer_right">

				</div>
			</div>
			<div id="Login_form_div">
				<form id="Login_form">
						<h1> Login</h1>
						<i class="fa fa-times"  id="close" onclick="closeLoginForm()"></i>
						<input type="text" placeholder="E-mail" required>
						<br>
						
						<input type="text" name="lastname" placeholder="Password" required>
						<br><br>
						<input type="submit" value="Login" id="Login_button">
						<br><br>
						<a href="#" >forgot password? </a>
				</form>
			</div>
		</div> 
		
			
	</body>
</html>