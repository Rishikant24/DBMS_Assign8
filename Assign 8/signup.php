<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Styling a SignUp Form</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
  <div class="signupFrm">
    <div class="wrapper">
    <form action="welcome.php" method="post">
      <h1 class="title">Sign up</h1>


      <div class="inputContainer">
        <input type="text" class="input" name = "first_name" id = "fname" placeholder="a" value="<?php echo $set_firstName;?>">
        <label for="" class="label">First Name</label>
        <span id = "blankMsg" style="color:red"> </span> <br><br>  

        <p class="err-msg">
    
        <?php if($fnameErr!=1){ echo $fnameErr; }?>
           </p>
      </div>

      <div class="inputContainer">
        <input type="text" class="input" name = "last_name" id = "lname" placeholder="a" value="<?php echo $set_lastName;?>">
        <label for="" class="label">Last Name</label>
        <span id = "blankMsg2" style="color:red"> </span> <br><br>  
        <p class="err-msg"> 
    
    <?php if($lnameErr!=1){ echo $lnameErr; } ?>
                </p>
      </div>

      <div class="inputContainer">
        <input type="email" class="input" name = "email" id = "email" placeholder="a" value="<?php echo $set_email;?>">
        <label for="" class="label">Email</label>

        <p class="err-msg">
    
<?php if($emailErr!=1){ echo $emailErr; } ?>
            </p>
      </div>

      <div class="inputContainer">
        <input type="password" class="input" name = "password" id = "pswd1" placeholder="a">
        <label for="" class="label">Password</label>
        <span id = "message1" style="color:red"> </span> <br><br>  
        <p class="err-msg">
                
<?php if($passErr!=1){ echo $passErr; } ?>
            </p>
      </div> 

      <div class="inputContainer">
        <input type="password" class="input" id = "pswd2"  name = "cpassword" placeholder="a">
        <label for="" class="label">Confirm Password</label>
        <span id = "message2" style="color:red"> </span> <br><br>  

        <!-- <p class="err-msg">
                
<?php if($cpassErr!=1){ echo $cpassErr; } ?>
            </p> -->
      </div>

      <input type="submit" class="submitBtn" value="Sign up">
    </form>
    </div>
  </div>

</body>
</html>