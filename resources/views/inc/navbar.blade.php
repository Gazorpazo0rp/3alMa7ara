<link rel="stylesheet" type="text/css" href="css/NavBar.css">
<script type="text/javascript" src="/js/NavBar.js"></script>

<nav class="nav-bar" id="Main-nav">
    <a id ="logoLink"href="/"><img id="logo" src="images/Homepage_images/logo.png"></a>
    <a id ="minilogoLink"href="/"><img id="minilogo" src="/images/customerprofile_images/minilogo.png"></a>

    <ul>
        <li> <a href="/" class="active">Home</a></li>
        <li> <a href="/Refurbishment">Refurbishment</a></li>
        <li> <a href="/Decor&Art">Decor & Art</a></li>
        <li> <a href="FireFighting_Air_Conditioning">FireFighting | Air Conditioning</a></li>
        <li> <a href="/Designs">Design</a></li>
        <li onclick="showJoinUsForm()"> <a href="#">Join us</a></li>
        <?php
        if(Session::get('loggedIn') == 2)echo'<li> <a href="/profile"><b>My Profile</b></a></li><li> <a href="|logout"><b>Log out</b></a></li>';
        else echo'<li ID="Login-nav" onclick="showLoginForm()"> <a  href="#">Login|</a></li>
        <li ID="Signup-nav"> <a  href="/Register">Sign up</a></li>';
        ?>
        
        <div class="collapse-item" onClick="Showcollapsed()"><span></span> <span></span> <span></span></div> 
    </ul>
</nav>