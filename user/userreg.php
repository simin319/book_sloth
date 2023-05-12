<!DOCTYPE html>
<html >
<head>
<title>Book Sloth</title>   
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/lrDecor.css">
</head>
<body>
<div>
   <a href="http://localhost/LMS/index.php">◀ Homepage</a>
</div>
<div>
   <h1>Sign Up for New User</h1>
</div>   
</div>
 <div class="container">
      <div id="login">
        <form method="post">
          <fieldset class="clearfix">
            <p><span class="fontawesome-user"></span><input type="text"  name="ID" value="User ID Number" onBlur="if(this.value == '') this.value = 'User ID Number'" onFocus="if(this.value == 'User ID Number') this.value = ''" required></p> 
            <p><span class="fontawesome-user"></span><input type="text"  name="f_name" value="First Name" onBlur="if(this.value == '') this.value = 'First Name'" onFocus="if(this.value == 'First Name') this.value = ''" required></p> 
            <p><span class="fontawesome-user"></span><input type="text"  name="l_name" value="Last Name" onBlur="if(this.value == '') this.value = 'Last Name'" onFocus="if(this.value == 'Last Name') this.value = ''" required></p> 
            <p><span class="fontawesome-user"></span><input type="text" name="phone"  value="Phone Number" onBlur="if(this.value == '') this.value = 'Phone Number'" onFocus="if(this.value == 'Phone Number') this.value = ''" required></p>
            <p><span class="fontawesome-user"></span><input type="text"  name="email" value="Email" onBlur="if(this.value == '') this.value = 'Email'" onFocus="if(this.value == 'Email') this.value = ''" required></p> 
            <p><span class="fontawesome-user"></span><input type="text"  name="adr" value="Address" onBlur="if(this.value == '') this.value = 'Address'" onFocus="if(this.value == 'Address') this.value = ''" required></p> 
            <p><span class="fontawesome-lock"></span><input type="password"  name="pass" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p>  
            <p><input type="submit" name="sub"  value="Confirm Sign Up"></p>
          </fieldset>
        </form>
      </div>
      <?php
        if(isset($_POST['sub'])){
            $con=mysqli_connect("localhost","root","","library");
            $newUser="INSERT INTO user (ID,f_name,l_name,phone,email,adr,pass) VALUES ('$_POST[ID]','$_POST[f_name]','$_POST[l_name]','$_POST[phone]','$_POST[email]','$_POST[adr]','$_POST[pass]')";
            if (mysqli_query($con,$newUser))
            {
                echo "<script type='text/javascript'> alert('Sign Up Complete!')</script>";
            }
            else
            {
                echo "<script type='text/javascript'> alert('An Unexpected Error Occurred!')</script>";
            }
        }
      ?>
</body>
</html>
