<?php 	
    
?>
	
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>caMicroscope User Signup</title> 
        <script type='text/javascript' src='gen_validatorv4.js'  xml:space="preserve"></script>		
    </head>

    <body>

      <form id='registerForm' name="registerForm" action='register.php' method='post' accept-charset='UTF-8'>
     
        <legend>caMicroscope Sign Up Form</legend>        
        
        <div class='short_explanation'>* required fields</div>
        
        <label for='fname' >User's First Name*: </label>        
        <input type='text' name='fname' id='fname' maxlength="50" />
        <br><br>
        
        <label for='lname' >User's Last Name*: </label>        
        <input type='text' name='lname' id='lname' maxlength="50" />
        <br><br>
        
        <label for='email' >User's Gmail Address*:</label>
         <input type='text' name='email' id='email' maxlength="100" />
         <br><br>         
        
         <input type='submit' name='Submit' value='Submit' />
     
    </form>    

    <script type='text/javascript'>
     // <![CDATA[       
    var frmvalidator  = new Validator("registerForm");
    
    frmvalidator.addValidation("fname","req","Please enter user's First Name");
    frmvalidator.addValidation("fname","maxlen=20",	"Max length for First Name is 20");
    frmvalidator.addValidation("fname","alpha","Alphabetic chars only,no space between letters");
  
    frmvalidator.addValidation("lname","req","Please enter user's Last Name");
    frmvalidator.addValidation("lname","maxlen=20","Max length for Last Name is 20");
    frmvalidator.addValidation("lname","alpha","Alphabetic chars only,no space between letters");

    frmvalidator.addValidation("email","req","Please enter user's Email");
    frmvalidator.addValidation("email","maxlen=50", "Max length for Email is 50");
    frmvalidator.addValidation("email","email");
    // ]]>
   </script>  

 </body>
 </html>	
		
		
