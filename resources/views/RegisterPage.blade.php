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
            });
        </script>

        </head>
<body>
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
            <input type="text" placeholder="Password" name="password" required class="wider_input"><br>
            <input type="text" placeholder="Confirm Password" name="confirm_password" required class="wider_input"><br>
            <input type="text" placeholder="apartment address" name="apartment1" required   style="width:65%"> <img class="add" scr="/images/Homepage_images/addIcon.png" onclick="AddApartment()"><br>
            
        </div>
        <input type="submit" id="submit_button">

    </form>
    <script>
        function AddApartment(){
            // add input
        var new_input=document.createElement("INPUT");
        new_input.setAttribute("type","text");
        new_input.setAttribute("name","apartment1");
        new_input.setAttribute("placeholder","Appartment Address");
        new_input.setAttribute("style","width:65%");
            //add icon
        var new_add_icon= document.createElement("IMG");
        new_add_icon.setAttribute("src","images/Homepage_images/addIcon.png");
        new_add_icon.setAttribute("class","add");
        new_add_icon.setAttribute("onclick","AddApartment()");
        count++;
        input_name="apartment"+count;
        new_add_icon.setAttribute("name",input_name);
        console.log(input_name);
        //append to div
        document.getElementById("inputs_div").appendChild(new_input);
        document.getElementById("inputs_div").appendChild(new_add_icon);
        }

    </script>
</body>



</html>