<!DOCTYPE html>



<html>
<section class="form"  id="signup_form">
<h1 style="font-size:45px;color:#FFD200;">Register</h1>
<hr>
<form style="display:block" method="POST" action="/SubmitRegistration">
    <label for="name">Name</label>
    <input type="text" id="firstname" name="name"  required >
	
	<label for="mob-_num">Mobile Number</label>
    <input type="text" id="mob_num" name="mob_num" required >

    <label for="E-mail">E-mail</label>
    <input type="text" id="E-mail" name="E_mail" required >
	
	<label for="pw">Password</label>
    <input type="password" id="pw" name="pw" required>
    
  
   <button type="submit"> Submit</button>
  </form>
</section>
</body>



</html>