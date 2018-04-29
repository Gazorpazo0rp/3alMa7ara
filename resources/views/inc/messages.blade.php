<?php 
		$message = Session::get('Message');
        if($message != "")
            {
                echo "<script type='text/javascript'>alert('$message');</script>";
                Session::put('Message',"");
            }
?>
