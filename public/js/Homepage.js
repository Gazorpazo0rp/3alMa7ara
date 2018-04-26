
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
        scrollTop: $("#how-it-works-container").offset().top-100
  		  }, 1000); 
		});

		// mouse scroll for nav-bar
		$(window).scroll(function(){	
			if(window.pageYOffset>900){
				if($('#logo').css('display')!='none'){
					console.log($('#logo').css('display'));
					$('#logo').fadeOut(1000);
					$('#minilogo').fadeIn(1000);
				}
			}
			if(window.pageYOffset<900){
				if($('#logo').css('display')!='block'){
					console.log($('#logo').css('display'));
					$('#minilogo').fadeOut(1000);
					$('#logo').fadeIn(1000);
				}
			}
			
		});
			
			
	});
	

		//slider JS
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
			// nav bar mobile collapse button
			function Showcollapsed(){
				var navBarUl= document.getElementById('Main-nav');
				if(navBarUl.className==="nav-bar"){
					navBarUl.className+=" collapsed";
				}
				else navBarUl.className= "nav-bar";
			}
			//how it works divs
			var howItWorksIndex=0;
			function howItWorks(n){
				$(".how-it-works-explantion").each(function(i){
					if(n==i){
						$("html,body").animate({
						scrollTop: $(this).offset().top-60
					}, 250*i+600 )
					
					}
				});
				
				}
				function showLoginForm(){
					$('#Login_form_div').animate({
						top:0
					},1000);
				}
				function closeLoginForm(){
					$('#Login_form_div').animate({
						top:-900
					},1000);
				}
				function showJoinUsForm(){
					$('#JoinUs_form_div').animate({
						top:0
					},1000);
				}
				function closeJoinUsForm(){
					$('#JoinUs_form_div').animate({
						top:-900
					},1000);
				}