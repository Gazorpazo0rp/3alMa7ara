<link rel="stylesheet" type="text/css" href="css/NavBar.css">
<script type="text/javascript" src="js/NavBar.js"></script>

<nav class="nav-bar" id="Main-nav">
    <a id ="logoLink"href="/"><img id="logo" src="/images/Homepage_images/logo.png"></a>
    <a id ="minilogoLink"href="/"><img id="minilogo" src="/images/customerprofile_images/minilogo.png"></a>

    <ul>
        <li> <a href="/" class="active">Home</a></li>
        <li> <a href="/Section/0">Refurbishment</a></li>
        <li> <a href="/Section/1">Design</a></li>
        <li> <a href="/Section/2">Decor & Furniture</a></li>
        <li> <a href="/Section/3">FireFighting | Air Conditioning</a></li>
        <li onclick="showJoinUsForm()"> <a href="#">Join us</a></li>
        <?php
        if(Session::get('loggedIn') == 2)echo'<li> <a href="/profile"><b>My Profile</b></a></li><li> <a href="/logout"><b>Log out</b></a></li>';
        else echo'<li ID="Login-nav" onclick="showLoginForm()"> <a  href="#">Login|</a></li>
        <li ID="Signup-nav"> <a  href="/Register">Sign up</a></li>';
        if(Session::get('lang') == 0)echo'<li> <a href="changeLang/1">بالعربية</a></li>';
        else echo'<li> <a href="changeLang/0">ُEnglish</a></li>';
        ?>
        
        <div class="collapse-item" onClick="Showcollapsed()"><span></span> <span></span> <span></span></div> 
    </ul>
</nav>
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
    <form id="JoinUs_form" method="POST" class="Homepage_Form"action="/JoinUs"enctype = "multipart/form-data">
    @csrf
            <h1> Join us !</h1>
            <p> Fill this form to join 3alma7ara community. We'll be very happy to work with you.</p>
            <i class="fa fa-times"  id="close" onclick="closeJoinUsForm()"></i>
            
            <input type="email" name='email' class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            <br>
            <input type="text" name='name' placeholder="Full name" required>
            <label class="profession"> نجار

            <input type="radio" name='profession' placeholder="Profession" value="0" checked>
            </label>
            <label class="profession"> محار

            <input type="radio" name='profession' placeholder="Profession" value="1">
            </label>
            <label class="profession"> مبلط

            <input type="radio" name='profession' placeholder="Profession" value="2">
            </label>

            <input type="text" name='phoneNumber' placeholder="Phone number" required>
            <input type="text" name='age' placeholder="Age" required>
            <input type="bio" name='bio' placeholder="Bio" >
            <input type="text" name='address' placeholder="Address" >
            <lable>upload CV<input type="file" name='cv'></label>
            <lable>upload Image<input type="file" name='image'></label>

            <input type="submit" value="Submit" id="JoinUs_button" class="Form_submit">
            
    </form>	
</div>
</div> 
