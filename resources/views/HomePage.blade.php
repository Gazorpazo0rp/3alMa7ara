<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/homepageStyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="/js/Homepage.js"></script>
    <script src="js/jssor.slider-27.4.0.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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


<body style="padding:0px; margin:0px; margin-top:0px!important;background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
	
		@include('inc.navbar')
		@include('inc.messages')

    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="js/jssor.slider-27.4.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideWidth: 720,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1400;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 051 css*/
        .jssorb051 .i {position:absolute;cursor:pointer;}
        .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;}
        .jssorb051 .i:hover .b {fill-opacity:.7;}
        .jssorb051 .iav .b {fill-opacity: 1;}
        .jssorb051 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:130px!important;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            @foreach($images as $image)
            <div>
                <img data-u="image" src="storage/homepageImages/{{$image->imagepath}}" />
            </div>
            @endforeach
           
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:35px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:35px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
	<!-- #endregion Jssor Slider End -->
	


		<div class= "main-container">
			<!-- Old slider
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
			-->
			<div id="how-it-works-container">
			    <h1 style=" width:100%;margin-left:-5%!important ;text-align:center; margin-top:0px; padding-top:50px; padding-bottom:50px;" >How it works</h1>
			    <div class="how-it-works" onclick="howItWorks(0)"><img src="images/Homepage_images/PickYourDesign.png"><h4 style="text-align:center">Customize your own design</h4></div>
				<div  class="how-it-works"  onclick="howItWorks(1)"><img src="images/Homepage_images/formLogo2.png"><h4 style="text-align:center">Open a reservation form</h4></div>
				<div  class="how-it-works" onclick="howItWorks(2)"><img src="images/Homepage_images/pickWorker.png"><h4 style="text-align:center">Pick your worker or designer</h4></div>
				<div  class="how-it-works" onclick="howItWorks(3)"><img src="images/Homepage_images/money.png"><h4 style="text-align:center">Review the estimated cost </h4></div>
				<div  class="how-it-works" onclick="howItWorks(4)"><img src="images/Homepage_images/submit.png"><h4 style="text-align:center">Submit and wait for contact </h4></div>
			</div>
			<div class="how-it-works-exp-container">
				<div class="how-it-works-explantion left-panel" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <?php if(Session::get('lang') == 0)echo'<h1 style="font-size:45px;color:#FFD200;">Personalize your own design</h1>
					<p>Use the simulation to pick the colors for the floor,the walls, the roof and the furniture for Your appartment.</p>
					<p>You Don\'t have to go through this step. It\'s optional.</p>
					<p>Click this link to Try the simulation <a href="/Simulator" style="color:#FFD200">Try Now</a></p>';
                    else echo'<h1 style="font-family:Cairo!important;font-size:45px;color:#FFD200;text-align:right">اختار الديزاين اللى انت عايزه</h1>
					<p style="font-family:Cairo!important;text-align:right">.السيميوليشن هيساعدك تختار ألوان حيطان و سقف و ألوان الاثاث فى شقتك</p>
					<p style="font-family:Cairo!important;text-align:right">لو مقرر الألوان ف الخطوة دى مش الزامية</p>
					<p style="font-family:Cairo!important;text-align:right">لينك السيميوليشن .. ادخل جرب ! <a href="/Simulator" style="color:#FFD200">جرب السيميوليشن</a></p>';
                    ?>
					
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion right-panel" data-aos="fade-up"data-aos-anchor-placement="top-bottom">
					<h1 style="font-size:45px;color:#FFD200;">Open a reservation form</h1>
					<p>Contact the company by filling a simple form. Fill up basic data about the apartment then choose the services you need</p>
					<p>To open a form you must <a href="/register" style="color:#FFD200">Signup </a> first. Here is a </p>
					<p>Already signued up? <a href="/Reservation" style="color:#FFD200">Open a form now</a></p>
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion left-panel" data-aos="fade-up"data-aos-anchor-placement="top-bottom">
					<h1 style="font-size:45px;color:#FFD200;">Pick your own worker or designer</h1>
					<p>A variety of professional workers and designers are waiting for you to check them out.</p>
					<p>You can open each worker's page. There,you can view his rating, hourly rate, reviews, and watch his previous deliverings.</p>
					<p>Each worker's availability is displayed in the form. Have the joy of picking.</p>
					<img src="images/Homepage_images/apartment.jpg">
				</div>
				<div class="how-it-works-explantion right-panel" data-aos="fade-up"data-aos-anchor-placement="top-bottom">
					<h1 style="font-size:45px;color:#FFD200;">Review the estimated cost</h1>
					<p>After choosing the services, The website will estimate the cost you will be charged to help you out.</p>
					<p>You can change your workers after this estimation. You can also input a certain cost and the 
						website will find you the best fitting worker or designer.</p>
					
					<img src="images/Homepage_images/apartment3.jpg">
				</div>
				<div class="how-it-works-explantion left-panel" data-aos="fade-up"data-aos-anchor-placement="top-bottom">
					<h1 style="font-size:45px;color:#FFD200;">Submit and wait for contact</h1>
					<p>After submitting the form, The company will contact you shortly to confirm the order.</p>
					<p>Those steps will help you decide which worker to go in the easiest, most efficient way</p>
					<img src="images/Homepage_images/apartment2.jpg">
				</div>
				
			</div>
			@include('inc.footer')
</body>
</html>











