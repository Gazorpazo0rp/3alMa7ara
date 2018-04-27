<nav class="nav-bar" id="Main-nav">
    <a id ="logoLink"href="/"><img id="logo" src="images/Homepage_images/logo.png"></a>
    <a id ="minilogoLink"href="/"><img id="minilogo" src="/images/customerprofile_images/minilogo.png"></a>

    <ul>
        <li> <a href="/" class="active">Home</a></li>
        <li> <a href="#">Design</a></li>
        <li> <a href="#">Finishing</a></li>
        <li> <a href="#">Fire Fighting</a></li>
        <li> <a href="#">Air Conditioning</a></li>
        <li onclick="showJoinUsForm()"> <a href="#">Join us</a></li>
        <?php
        if( $_SESSION["loggedIn"] == 1|| $_SESSION["loggedIn"] == 3) echo'<li ID="Login-nav" onclick="showLoginForm()"> <a  href="#">Login/</a></li>
        <li ID="Signup-nav"> <a  href="/Register">Sign up</a></li>';
        else if($_SESSION["loggedIn"] == 2)echo'<li> <a href="/profile"><b>My Profile</b></a></li><li> <a href="/logout"><b>Log out</b></a></li>';
        ?>
        
        <div class="collapse-item" onClick="Showcollapsed()"><span></span> <span></span> <span></span></div> 
    </ul>
</nav>