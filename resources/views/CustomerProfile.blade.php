<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/CustomerProfile.css" />
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Questrial" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="/js/jquery.min.js"></script>
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
        <a id ="logoLink"href="/"><img id="logo" src="/images/customerprofile_images/logo.png"></a>
        <a id ="minilogoLink"href="/"><img id="minilogo" src="/images/customerprofile_images/minilogo.png"></a>

        <ul>
            <li> <a href="/" class="active">Home</a></li>
            <li> <a href="#">Design</a></li>
            <li> <a href="#">Finishing</a></li>
            <li> <a href="#">Fire Fighting</a></li>
            <li> <a href="#">Air Conditioning</a></li>
            <li ID="Login-nav"> <a  href="/logout">Logout</a></li>
            <div class="collapse-item" onClick="Showcollapsed()"><span class="collapse-bars"></span> <span class="collapse-bars"></span><span class="collapse-bars"></span></div> 
            
        </ul>
    </nav>
    
    <div class="data-panel">
        <div class="basic-data">
            <div class="show-data"> 
                <h1 class="data-panel-title">Personal Data</h1>
                <div class="info-panels">
                    <i class="material-icons" id="name-icon">account_circle</i>
                    <div class="show-data-boxes" id="show-name">{{$User_Data['name']}}</div>
                </div>
                <div class="info-panels">
                        <i class="fa fa-envelope"  id="mail-icon"></i>
                    <div class="show-data-boxes" id="show-email">{{$User_Data['email']}}</div>
                </div>
                <div class="info-panels">
                    <i class="fa fa-mobile-phone" id="mobile-icon"></i> 
                    <div class="show-data-boxes" id="show-mobilenumber">{{$User_Data['phone']}}</div>
                </div>      

                        <div class="editdata-button">
                            <button class="button" id="edit" onclick="editdata()">Edit</button>
                        </div>
            </div>


           
           
           <div class="edit-data">
                 
                <h1 class="data-panel-title ">Personal Data</h1>
                <form class="edit-basic-data-form" method="POST" action="/EditProfile">
                {{ csrf_field() }}
                        <div class="info-panels">
                            <i class="material-icons" id="name-icon">account_circle</i>
                            <div class="name"><input type="text" name="name" id="name-input" required/></div>
                        </div>
                        <div class="info-panels">
                                <i class="fa fa-envelope"  id="mail-icon"></i>
                            <div class="email-textbox"> <input type="text" name="email" id="email-input" required/></div>
                        </div>
                        <div class="info-panels">
                            <i class="fa fa-mobile-phone" id="mobile-icon"></i> 
                            <div class="mobilenumber-textbox"><input type="text" name="phone" id="mobilenumber-input" required/></div>
                        </div>
                        <div class="savedata-button">
                            <button class="button" id="save">Save</button>
                        </div>
                </form>
               
            </div>
        </div>
        
        
        
        <div class="addresses">

            <div class="show-addresses">
                <h1 class="data-panel-title">Addresses</h1>
                <?php
                foreach($Apartment_Data as $AP)
                echo'
                <div class="info-panels">
                        <i class="fa fa-map-marker" id="gps-icon"></i>
                        <div class="show-addresses-boxes" id="show-address">'.$AP['Location'].'</div>
                    </div>';
                ?>
                <div class="editaddresses-button">
                        <button class="button" id="edit" onclick="editaddresses()">Edit</button>
                    </div>
            </div>

            <div class="edit-addresses">
                    <h1 class="data-panel-title">Addresses</h1>
                    <form class="edit-addresses-form" method="POST" action="/EditApartment">
                    {{ csrf_field() }}
                @foreach ($Apartment_Data as $AP)
                    <div class="info-panels">
                            <i class="fa fa-map-marker" id="gps-icon"></i>
                            <div class="address"><input type="text" name="address[]" value="{{$AP['Location']}}" placeholder="Add new address" required/></div>
                            <a><img class="remove-address-icon" src="/images/customerprofile_images/remove.PNG" onclick="RemoveAddress(this)"></a>
                    </div> 
                @endforeach
                        <div class="add-new-address" style="display:inline-flex;" onclick="AddAddress(this)">
                        <a><img class="add-address-icon" src="/images/customerprofile_images/add_address.PNG" ></a>
                        <h1 id="new-address-command">Add a new address!</h1>
                        </div>
                        <div class="saveaddresses-button">
                                <button class="button" id="save" >Save</button>
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
    
    function editdata(){
        $('.show-data').hide();
        $('.edit-data').show();
        document.getElementById('name-input').value ="{{$User_Data['name']}}";
        document.getElementById('email-input').value = "{{$User_Data['email']}}";
        document.getElementById('mobilenumber-input').value = "{{$User_Data['phone']}}";
    }

    function editaddresses(){
     
        document.getElementById('name-input').value ="<?php echo $Apartment_Data[0]['Location'];?>";
        $('.show-addresses').hide();
        $('.edit-addresses').show();   
    }

    function AddAddress(adder){
        
        var check = true;
        for(var i = 0; i < $('input[name="address[]"]').length;i++){
                if( $('input[name="address[]"]').eq(i).val() == "")
                        check = false;
        }
        if(check){
            $(adder).before('<div class="info-panels" style="display:none">'+
                            '<i class="fa fa-map-marker" id="gps-icon"></i>'+
                            '<div class="address"><input type="text" name="address[]" placeholder="Add new address" required/></div>'+
                            '<a><img class="remove-address-icon" src="/images/customerprofile_images/remove.PNG" onclick="RemoveAddress(this)"></a>'+
                            '</div>'
                    );
                    $(adder).prev().slideToggle();
                  
        }
      
    }

    function RemoveAddress(remover){
        if($('input[name="address[]"]').length>1){

            
          $(remover).parent().parent().slideToggle("medium",function(){
          $(this).remove();
        });
        }
    }

    
 
</script>
</body>
</html>