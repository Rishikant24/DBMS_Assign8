<html>
<body>
    <head> 
        <style>
    .button-3 {
  appearance: none;
  background-color: #2ea44f;
  border: 1px solid rgba(27, 31, 35, .15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
  font-size: 14px;
  font-weight: 600;
  line-height: 20px;
  padding: 6px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
  box-shadow: none;
  outline: none;
}

.button-3:hover {
  background-color: #2c974b;
}

.button-3:focus {
  box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
  outline: none;
}

.button-3:disabled {
  background-color: #94d3a2;
  border-color: rgba(27, 31, 35, .1);
  color: rgba(255, 255, 255, .8);
  cursor: default;
}

.button-3:active {
  background-color: #298e46;
  box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
}
</style>
</head>
<body>
<h2>Dashboard </h2>
    Welcome, 

    <?php 

      session_start();
      if(empty($_SESSION))
      {
        header("Location:index.html");
      }



    $f_name = $_SESSION['ffname'];
    $l_name = $_SESSION['flname'];
    $email = $_SESSION['femail'];
    $pswd = $_SESSION['fpassword']; 
    echo $f_name . ' ';
    echo $l_name;
    echo '';
    echo '<h3>Current Information:</h3> <br>';
    echo 'First Name: ' . $f_name .'<br>';
    echo 'Last Name: ' .  $l_name .'<br>';
    echo 'Email Id: ' . $email .'<br>';
?>



<!-- HTML !-->
<br>
<a href='UpdateInfo.php'>
<button class="button-3" role="button">Update Info</button>
</a>
<br>
<br>
<!-- <a href='#' href="deleteac.php?option=delete" onclick="return (confirm('This is a permanent action !!! Are you sure you want to delete your account ???'));>
<button class="button-3" role="button" >Delete Account</button>
</a> -->
<a href="deleteac.php" onclick="return confirm('This is a permanent action !!! Are you sure you want to delete your account ???');"><button class="button-3" role="button" >Delete Account</button></a>
<br>
<br>
<a href='logout.php'>
<button class="button-3" role="button">Log Out</button>
</a>

