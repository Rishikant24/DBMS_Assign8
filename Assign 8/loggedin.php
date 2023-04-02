<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  
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

 
<?php 

session_start();
$email = $_POST["email"];
$password = $_POST["password"];

// servername => localhost
        // username => root
        // password => rishikant
        // database name => Assign8
        $conn = mysqli_connect("localhost:3306", "root", "rishikant", "Assign8");

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        $query = "select * from users where email='$email' and password='$password'";
    
        $result = $conn->query($query);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            $_SESSION['id'] = $row[0];
            $_SESSION['ffname'] = $row[1];
            $_SESSION['flname'] = $row[2];
            $_SESSION['femail'] = $row[3];
            $_SESSION['fpassword'] =  $row[4];
               echo "Succesfully Logged In";
               header("Location:dashboard.php");
                exit();
            }
            else {
                echo "Wrong Email or Password!";
            }

?>
<br>
<br>
<a href='index.html'>
<button class="button-3" role="button">Back to LogIn</button>
</a>
<br>
<br>



