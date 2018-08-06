<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$Worker['name']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/WorkerProfile.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/css/NavBar.css" />

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
<?php $cnt=0; $professionNameArray=[0=>'نجار',1=>'محار',2=>'مبلط']?>

<body scrollingeffect()>
        @include('inc.messages')
    	@include('inc.navbar')
    
                 <!-- <a href="#">
                        <span class="glyphicon glyphicon-camera" id="profile-pic-icon"></span>
                      </a> -->
    <div class="main-container">
        <div class="info" id="info">
            <div class="profile-pic">
                 <img id="worker-image" src="/storage/WorkerProfilePictures/{{$Worker->imagepath}}">
                 <a href="#" class="profile-pic-overlay">
                   <div class="profile-pic-text">
                        <span class="glyphicon glyphicon-camera" id="camera-icon"></span>
                        <div>Update</div>
                   </div>
                </a>
            </div>
           <div class="rest-of-info">
           <h2 id="worker-name">{{$Worker['name']}}</h2>
            <h2 id="worker-job">{{$professionNameArray[$Worker['profession']]}}</h2>
            <div class="secondary-data">
                    <div>
                            <img id="salary" src="/images/workerprofile_images/salary.png">
                    </div>
                    <div>
                            <img id="rate" src="/images/workerprofile_images/rate.png">
                            <div class="rating-stars">

                            {{$Worker->rate}}<span class="fa fa-star checked"></span>
                                    
                            </div>
                     </div>
            </div>
           </div>
        </div>
        <div class="profile" id="profile">
            <div class="bio">
                <h1>Bio</h1>
                <p id="bio-paragraph">{{$Worker['bio']}}</p>
            </div>
            <div class="line-separator"></div>
            <h1>Know me!</h1>
            
            <div class="line-separator"></div>
            <h1>Latest projects</h1>
            <div class="panel-container">
                <div class="gallery-slider ">
                        @foreach($Worker_Images as $Image)
                        <img src="/storage/Worker_images/{{$Image->imagepath}}" alt="" class="slider ">
                        @endforeach
                    <button class="w3-button w3-display-left " onclick="slideAnimate(-1)" id="left">&#10094;</button>
                    <button class="w3-button w3-display-right " onclick="slideAnimate(1)" id="right">&#10095;</button>
                </div>
            </div>
            <div class="line-separator"></div>
            <?php $cnt=0;?>
            <div class="reviews" style="margin-bottom:10%;" >
                <h1  style="margin-bottom:7%;">Reviews</h1>
                @foreach($Comments['commentBody'] as $Comment)
                <div id="review1"> <h2>{{$Comments['CommentersData'][$cnt]['name']}}</h2>
                <p>{{$Comment['body']}}</p></div>
                <?php $cnt++;?>
                 @endforeach
                 
            </div>
            <form id="comment-form" method="POST" action="/SubmitComment">
                    {{ csrf_field() }}

                <h2>Add a comment </h2>
                <input name="comment" type="text" placeholder="Add a comment on this workers artworks">
                <input name="workerId" style="display:none;" value={{$Worker['id']}}>

                <input type="submit">
             </form>
             
<section class='rating-widget'>
  
        <!-- Rating Stars Box -->
        <div class='rating-stars text-center'>
          <ul id='stars'>
            <li class='star' title='Poor' data-value='1'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Fair' data-value='2'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Good' data-value='3'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Excellent' data-value='4'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='WOW!!!' data-value='5'>
              <i class='fa fa-star fa-fw'></i>
            </li>
          </ul>
          <button id="submitRate">Submit Rating</button>

        </div>
        
        <div class='success-box'>
          <div class='clearfix'></div>
          <div class='text-message'></div>
          <div class='clearfix'></div>
        </div>
        
        
        
      </section>
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
            //console.log(window.pageYOffset);
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
    <script>
        var ratingValue=0;
        var msg = "";
        $(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
   
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    //console.log(ratingValue);
    
  });
  
  $('#submitRate').click(function(){

    $.ajax({
        method:'GET',
        url: "/rate/"+ratingValue+"/"+{{$Worker['id']}},
        success: function(response){
            if(response==="")
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
            else             $('.success-box div.text-message').html("<span>" + response + "</span>");

        },
        error:function(jqXHR, textStatus, errorThrown) { 
            console.log(jqXHR);
            //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
    
  });
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}

    </script>

</body>
</html>