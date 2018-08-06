<!DOCTYPE html>



<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/RegisterPage.css">    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
            var count=0;
            var input_name="";
            $(document).ready(function(){
                $('.main-container').animate({
                    top:0},500);
                    $('.add').attr('src','images/Homepage_images/addIcon.png');
                    $('.add').attr('state','add');
                    $('.add').attr('class','add');
            });

        </script>
        <style>
            .nav-bar{
                top:0px;
            }
        </style>
        </head>
<body>
        @include('inc.messages')
        @include('inc.navbar')
<div class="main-container">
    <form class="signup_form" method="POST" action="SubmitRegistration">
        {{ csrf_field() }}
        <h1 style="text-align: center"> Sign Up </h1>
        <div id="inputs_div">
            <input type="text" placeholder="First Name" name="first_name" required>
            <input type="text" placeholder="Last Name" name="last_name" required><br>
            <input type="text" placeholder="Mobile" name="mobile" required>
            <input type="text" placeholder="Age" name="age"><br>
            <div class="vertical_line"></div>
            <input type="text" placeholder="E-mail" name="email" required class="wider_input"><br>
            <input type="password" placeholder="Password" name="password" required class="wider_input"><br>
            <input type="password" placeholder="Confirm Password" name="confirm_password" required class="wider_input"><br>
            <!--<input type="text" placeholder="apartment address" name="apartment0" style="width:65%" class="apartment_input"> 
             <img class="add" scr="/images/Homepage_images/addIcon.png" onclick="AddApartment(1)"><br>
            <img class="add" id="apartment0" scr="images/Homepage_images/addIcon.png" onclick="AddApartment(this)" state="add">--><br>
        
        </div>
        <input type="submit" id="submit_button">

    </form>
    <script>
        





        function AddApartment(passed){

            var apartment_inputs=document.getElementsByClassName("apartment_input");
            var icons=document.getElementsByClassName("add");
            //console.log(count);
            if(passed.getAttribute("state")=="add"){

                // add input
                if(apartment_inputs[count].value!=""){
                    console.log('trig');
                icons[count].setAttribute("src","images/Homepage_images/remove.png");
                icons[count].setAttribute("state","remove");

                var new_input=document.createElement("INPUT");
                new_input.setAttribute("type","text");
                new_input.setAttribute("placeholder","Appartment Address");
                new_input.setAttribute("style","width:65%");
                new_input.setAttribute("class","apartment_input");
                

                    //add icon
                var new_add_icon= document.createElement("IMG");
                new_add_icon.setAttribute("src","images/Homepage_images/addIcon.png");
                new_add_icon.setAttribute("class","add");
                new_add_icon.setAttribute("onclick","AddApartment(this)");
                new_add_icon.setAttribute("state","add");
                

                count++;
                input_name="apartment"+count;
                new_input.setAttribute("name",input_name);
                new_add_icon.setAttribute("id",input_name);

                //console.log(count);
                //append to div
                $(new_input).hide(0);
                $('#inputs_div').append(new_input);
                $(new_input).show(1000);
                $(new_add_icon).hide(0);
                $('#inputs_div').append(new_add_icon);
                $(new_add_icon).show(1000);
                }
            }
            else{
                passed.style.display="none";  
                document.getElementsByName(passed.getAttribute("id"))[0].style.display="none";
                document.getElementsByName(passed.getAttribute("id"))[0].value="";
                //count--;
            }
            console.log(count);

            }

         


    </script>
    			@include('inc.footer')

</body>



</html>