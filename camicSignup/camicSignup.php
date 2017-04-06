<?php 
	
      
    //sh createAPIKey.sh someone somewhere@gmail.com  01/01/2020

    ?>
	
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>caMicroscope User Signup</title>        
    </head>

    <body>

      <form id='register' action='register.php' method='post' accept-charset='UTF-8'>
      <fieldset >
        <legend>caMicroscope Sign Up Form</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        
        <div class='short_explanation'>* required fields</div>
        
        <label for='name' >Your First Name*: </label>        
        <input type='text' name='fname' id='fname' maxlength="50" />
        <br><br>
        
        <label for='name' >Your Last Name*: </label>        
        <input type='text' name='lname' id='lname' maxlength="50" />
        <br><br>
        
        <label for='email' >Your Gmail Address*:</label>
         <input type='text' name='email' id='email' maxlength="100" />
         <br><br>         
        
         <input type='submit' name='Submit' value='Submit' />
         </fieldset>
    </form>

    </body>
    </html>	
		
		
