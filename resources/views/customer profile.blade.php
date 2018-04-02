<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/customer profile.css" />
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Questrial" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="js/jquery.min.js"></script>
    <script>
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
<body>
    
    <nav class="nav-bar" id="Main-nav">
        <a id ="logoLink"href="#"><img id="logo" src="images/customerprofile_images/logo.png"></a>
        <a id ="minilogoLink"href="#"><img id="minilogo" src="images/customerprofile_images/minilogo.png"></a>

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
    
    <div class="data-panel">
        <div class="basic-data">
            <div class="show-data">
                    <h1 class="data-panel-title">Personal Data</h1>
                    <form action="/">
                        <div class="info-panels">
                            <i class="material-icons" id="name-icon">account_circle</i>
                            <div class="show-data-boxes" id="show-name">Abdo ElHengel</div>
                        </div>
                        <div class="info-panels">
                                <i class="fa fa-envelope"  id="mail-icon"></i>
                            <div class="show-data-boxes" id="show-email">hengalawy86@yahoo.com</div>
                        </div>
                        <div class="info-panels">
                            <i class="fa fa-mobile-phone" id="mobile-icon"></i> 
                            <div class="show-data-boxes" id="show-mobilenumber">01222451225</div>
                        </div>
                  
                         <div class="gender">
                              <label class="radio-container">Male
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                              </label>
                              <label class="radio-container">Female
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                              </label>
                              <label class="radio-container">Other
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                              </label>
                            </br> </br> </br> 
                        </div>
                        <div class="editdata-button">
                            <button class="button" id="edit" onclick="editdata()">Edit</button>
                        </div>
                </form>
               
            </div>
            <div class="edit-data">
                 
                <h1 class="data-panel-title ">Personal Data</h1>
                <form action="/">
                        <div class="info-panels">
                            <i class="material-icons" id="name-icon">account_circle</i>
                            <div class="name"><input type="text" name="name" id="name-input" placeholder="Name" required/></div>
                        </div>
                        <div class="info-panels">
                                <i class="fa fa-envelope"  id="mail-icon"></i>
                            <div class="email-textbox"> <input type="text" name="name" id="email-input" placeholder="Email" required/></div>
                        </div>
                        <div class="info-panels">
                            <i class="fa fa-mobile-phone" id="mobile-icon"></i> 
                            <div class="mobilenumber-textbox"><input type="text" name="name" id="mobilenumber-input" placeholder="Mobile number" required/></div>
                        </div>
                  
                         <div class="gender">
                              <label class="radio-container">Male
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                              </label>
                              <label class="radio-container">Female
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                              </label>
                              <label class="radio-container">Other
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                              </label>
                            </br> </br> </br> 
                        </div>
                        <div class="savedata-button">
                            <button class="button" id="save" onclick="showdata()">Save</button>
                        </div>
                </form>
               
            </div>
        </div>
        
        
        
        <div class="addresses">

            <div class="show-addresses">
                <h1 class="data-panel-title">Addresses</h1>
                <div class="info-panels">
                        <i class="fa fa-map-marker" id="gps-icon"></i>
                        <div class="show-addresses-boxes" id="show-address">25 mesaddak st. dokki</div>
                    </div>
                <div class="info-panels">
                        <i class="fa fa-map-marker" id="gps-icon"></i>
                        <div class="show-addresses-boxes" id="show-address">25 mesaddak st. dokki</div>
                    </div>
                        
                <div class="editaddresses-button">
                        <button class="button" id="edit" onclick="editaddresses()">Edit</button>
                    </div>
            </div>

            <div class="edit-addresses">
                    <h1 class="data-panel-title">Addresses</h1>
                    <form action="/">
                        <div class="info-panels">
                                <i class="fa fa-map-marker" id="gps-icon"></i>
                            <div class="address"><input type="text" name="address" id="address-input" placeholder="Address" required/></div>
                        </div>
                        <div class="info-panels">
                                <i class="fa fa-map-marker" id="gps-icon"></i>
                            <div class="address"><input type="text" name="address" id="address-input" placeholder="Address" required/></div>
                        </div>
                        <div class="saveaddresses-button">
                                <button class="button" id="save" onclick="showaddresses()">Save</button>
                            </div>
                </form>   
                
            </div>
               
        </div>

    </div>
    
    <div class="footer">
        <div id="footer_left">

        </div>
        <div id="footer_right">

    </div>






<script>
   
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
        
    function showdata(){
        $('.edit-data').hide();
        $('.show-data').show();
    }

    function editdata(){
        $('.show-data').hide();
        $('.edit-data').show();
    }
    function showaddresses(){
        $('.edit-addresses').hide();
        $('.show-addresses').show();
    }

    function editaddresses(){
        $('.show-addresses').hide();
        $('.edit-addresses').show();
    }

   
</script>
</body>
</html>