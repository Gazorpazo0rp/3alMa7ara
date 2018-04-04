<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/WorkerProfile.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nova+Flat|Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Patua+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <script>

            $(document).ready(function(){
                //initialize slider
                $(".slider").each(function(index){
                    if(index==0) {
                       $(this).animate({
                           "left":"0%" 
                        },1200);
                    }
        
                });
               
                document.getElementById("left").style.display="none";
                
        
                // scroll down button in home page
                $("#Down-arrow").click(function(){
          $("html,body").animate({
                scrollTop: $("#how-it-works-container").offset().top-150
            },1500); 
            });

                    
        });
            var currentIndex=1;
			var allSlides = document.getElementsByClassName("slider");
		
        function slideAnimate(passed ){
			var allSlides = document.getElementsByClassName("slider");
		if(passed==1){
			$(allSlides[currentIndex-1]).animate({
					"left":"100%" 
					},{duration: 1200, queue: false});
					$(allSlides[currentIndex]).animate({
					"left":"0%" 
					},{duration: 1200, queue: false});
					currentIndex++;
		}
		if(passed==-1){
			$(allSlides[currentIndex-1]).animate({
					"left":"-100%" 
					},{duration: 1200, queue: false});
					$(allSlides[currentIndex-2]).animate({
					"left":"0%" 
					},{duration: 1200, queue: false});
					currentIndex--;
		}
		if(currentIndex ==1) 
				document.getElementById("left").style.display="none";
			else 
				document.getElementById("left").style.display="block";
			if(currentIndex > allSlides.length-1) {
				document.getElementById("right").style.display="none";
			}
			else 
				document.getElementById("right").style.display="block";
		}
            
            </script>
</head>
<body scrollingeffect()>
    	<nav class="nav-bar" id="Main-nav">
                <a id ="logoLink"href="#"><img id="logo" src="images/workerprofile_images/logo.png"></a>
                <a id ="minilogoLink"href="#"><img id="minilogo" src="images/workerprofile_images/minilogo.png"></a>

            <ul>
                <li> <a href="#" class="active">Home</a></li>
                <li> <a href="#">Design</a></li>
                <li> <a href="#">Finishing</a></li>
                <li> <a href="#">Fire Fighting</a></li>
                <li> <a href="#">Air Conditioning</a></li>
                <li ID="Login-nav"> <a  href="#">Login/</a></li>
                <li ID="Signup-nav"> <a  href="#">Sign up</a></li>
                <div class="collapse-item" onClick="Showcollapsed()"><span class="collapse-bars"></span> <span class="collapse-bars"></span><span class="collapse-bars"></span></div> 
                
            </ul>
    </nav>
    
                 <!-- <a href="#">
                        <span class="glyphicon glyphicon-camera" id="profile-pic-icon"></span>
                      </a> -->
    <div class="main-container">
        <div class="info" id="info">
            <div class="profile-pic">
                 <img id="worker-image" src="images/workerprofile_images/plumber.jpg">
                 <a href="#" class="profile-pic-overlay">
                   <div class="profile-pic-text">
                        <span class="glyphicon glyphicon-camera" id="camera-icon"></span>
                        <div>Update</div>
                   </div>
                </a>
            </div>
           <div class="rest-of-info">
            <h2 id="worker-name">Ashraf Kamal</h2>
            <h2 id="worker-job">Plumber</h2>
            <div class="secondary-data">
                    <div>
                            <img id="salary" src="images/workerprofile_images/salary.png">
                            <h2 id="salary-value">250 L.E./day</h2> 
                    </div>
                    <div>
                            <img id="rate" src="images/workerprofile_images/rate.png">
                            <div class="rating-stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                            </div>
                     </div>
            </div>
           </div>
        </div>
        <div class="profile" id="profile">
            <div class="bio">
                <h1>Bio</h1>
                <p id="bio-paragraph">Plumber,34 years old, graduated from faculty of plumbering el3ezba university.I love my job very much that
                            my mum sometimes brings food to me in the bathroom to have my llunch on my favourite seat which is banio</p>
            </div>
            <div class="line-separator"></div>
            <h1>Know me!</h1>
            <video  class="video" controls>
                    <source src="images/workerprofile_images/worker.mp4" type="video/mp4">
                  </video>
            <div class="line-separator"></div>
            <h1>Latest projects</h1>
            <div class="panel-container">
                <div class="gallery-slider ">
                    <img class="slider 	" src="images/workerprofile_images/apartment.jpg">
                    <img class="slider 	"  src="images/workerprofile_images/apartment2.jpg">
                    <img class="slider 	" src="images/workerprofile_images/apartment3.jpg">
                    <img class="slider 	"  src="images/workerprofile_images/apartment2.jpg">
                    <img class="slider 	"  src="images/workerprofile_images/apartment2.jpg">
                    <img class="slider 	"  src="images/workerprofile_images/apartment2.jpg">
                    <img class="slider 	"  src="images/workerprofile_images/apartment2.jpg">
                    <button class="w3-button w3-display-left " onclick="slideAnimate(-1)" id="left">&#10094;</button>
                    <button class="w3-button w3-display-right " onclick="slideAnimate(1)" id="right">&#10095;</button>
                </div>
            </div>
            <div class="line-separator"></div>
            <div class="reviews" style="margin-bottom:10%;" >
                <h1  style="margin-bottom:7%;">Reviews</h1>
                <div id="review1"> <h2>Hamada</h2>
                    <p>You are a bad worker, you are an asshole motha fucka</p></div>
                <div><h2>Shireen</h2>
                    <p>I want this worker once again, he's very hot!</p></div>
                <div id="review1"> <h2>Sameh</h2>
                    <p>OMG! you are an amazing worker, ur hands are rolled in silk baby</p></div>
                <div> <h2>Sameh</h2>
                    <p>OMG! you are an amazing worker, ur hands are rolled in silk baby</p></div>
                <div id="review1"><h2>Salma Hayek</h2>
                    <p>I want this worker once again, he's very hot!</p></div>
                <div><h2>Vin Diesel</h2>
                    <p>OMG! you are an amazing worker, ur hands are rolled in silk baby</p></div>
                <div id="review1"><h2>Sarah</h2>
                    <p>I want this worker once again, he's very hot!</p></div>
            </div>
        </div>
    </div>

    <div class="footer">
            <div id="footer_left">

            </div>
            <div id="footer_right">

            </div>

    </div>
    <script>
    	$(document).ready(function(){
            $(window).scroll(function(){
                scrollingeffect();
            });
        });
        function Showcollapsed(){
				var navBarUl= document.getElementById('Main-nav');
				if(navBarUl.className==="nav-bar"){
					navBarUl.className+=" collapsed";
				}
				else {
                    navBarUl.className= "nav-bar";
                }
                
            $('#logo').hide();
            $('#minilogo').hide();
			}
            
        var profile  = document.getElementById('profile');   
        var info  = document.getElementById('info'); 
        var endofprofile = profile.offsetTop+profile.offsetHeight;
        var endofinfo = info.offsetTop+info.offsetHeight;
     

        function scrollingeffect() {

         var actualheight = $(window).height()+window.pageYOffset;
        if (window.pageYOffset  < 30) {
            $('#minilogo').slideUp(300);
            $('#logo').slideDown(500);
        } else {
            $('#logo').slideUp(300);
            $('#minilogo').slideDown(500);
        }
        if (actualheight  >= endofprofile+$(window).height()-endofinfo) {
            $('.info').css("bottom",actualheight-endofprofile);
        } 
        else{
            $('.info').css("bottom","");
        }
        }
    </script>
</body>
</html>