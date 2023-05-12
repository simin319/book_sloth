<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
    header("location:index.php");  
 }  
?>
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
   <h1>Admin Login</h1>
</div>
</div>
 <div class="container">
      <div id="login">
        <form method="post">
          <fieldset class="clearfix">
            <p><span class="fontawesome-user"></span><input type="text"  name="emp_id" value="Admin ID" onBlur="if(this.value == '') this.value = 'Admin ID'" onFocus="if(this.value == 'Admin ID') this.value = ''" required></p> 
            <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> 
            <p><input type="submit" name="sub"  value="Login"></p>
          </fieldset>
        </form>
      </div>
</body>
</html>

<?php
   include('db.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myadmid = mysqli_real_escape_string($con,$_POST['emp_id']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      $sql = "SELECT email FROM admin WHERE emp_id = '$myadmid' and pass = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
         
         $_SESSION['user'] = $myadmid;
         
         header("location: index.php");
      }else {
         echo '<script>alert("Your Login Credentials are invalid") </script>' ;
      }
   }
?>
