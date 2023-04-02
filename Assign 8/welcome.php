<html>
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


<?php 

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

$nameErr = "Data inserted succesfully!!!";

// by default, error messages are empty
$valid=$fnameErr=$lnameErr=$emailErr=$passErr=$cpassErr='';

// by default,set input values are empty
$set_firstName=$set_lastName=$set_email='';  

   //input fields are Validated with regular expression
   $validName="/^[a-zA-Z ]*$/";
   $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
   $uppercasePassword = "/(?=.*?[A-Z])/";
   $lowercasePassword = "/(?=.*?[a-z])/";
   $digitPassword = "/(?=.*?[0-9])/";
   $spacesPassword = "/^$|\s+/";
   $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
   $minEightPassword = "/.{8,}/";

 //  First Name Validation
if(empty($first_name)){
   $fnameErr="First Name is Required"; 
}
else if (!preg_match($validName,$first_name)) {
   $fnameErr="Digits are not allowed";
}else{
   $fnameErr=true;
}

//  Last Name Validation
if(empty($last_name)){
   $lnameErr="Last Name is Required"; 
}
else if (!preg_match($validName,$last_name)) {
   $lnameErr="Digits are not allowed";
}
else{
   $lnameErr=true;
}

//Email Address Validation
if(empty($email)){
  $emailErr="Email is Required"; 
}
else if (!preg_match($validEmail,$email)) {
  $emailErr="Invalid Email Address";
}
else{
  $emailErr=true;
}
    
// password validation 
if(empty($password)){
  $passErr="Password is Required"; 
} 
elseif (!preg_match($uppercasePassword,$password) || !preg_match($lowercasePassword,$password) || !preg_match($digitPassword,$password) || !preg_match($symbolPassword,$password) || !preg_match($minEightPassword,$password) || preg_match($spacesPassword,$password)) {
  $passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
}
else{
   $passErr=true;
}

// form validation for confirm password
if($cpassword!=$password){
   $cpassErr="Password and Confirm Password fields do not match!";
}
else{
   $cpassErr=true;
}

// check all fields are valid or not
if($fnameErr==1 && $lnameErr==1 && $emailErr==1 && $passErr==1 && $cpassErr==1)
{
   $valid="All fields are validated successfully";


   //legal input values
   $firstName= legal_input($first_name);
   $lastName=  legal_input($last_name);
   $email=     legal_input($email);
   $password=  legal_input($password);

   // here you can write Sql Query to insert user data into database table

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

        $id = uniqid();
        // We are going to insert the data into our users table
        $sql = "INSERT INTO users VALUES ('$id', '$firstName',
            '$lastName','$email','$password')";

        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            echo "<h3>Registration Successful</h3>";

            echo nl2br("Please Login");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        echo '<script type="text/javascript">

            window.onload = function () { alert("Registration Succesful"); }

        </script>';


        //sleep(5);
        //header("Location:login.html");
}else{
     // set input values is empty until input field is invalid

    echo "ERORR REGISTERING !!! PLEASE TRY AGAIN";
    echo "<br>";
    if($fnameErr!=1)
    {
        echo $fnameErr;
    }
    else if($lnameErr!=1)
    {
        echo $lnameErr;
    }
    else if($emailErr!=1)
    {
        echo $emailErr;
    }
    else if($passErr!=1)
    {
        echo $passErr;
    }
    else if($cpassErr!=1)
    {
        echo $cpassErr;
    }

    $set_firstName=$first_name;
    $set_lastName= $last_name;
    $set_email=    $email;
}



// convert illegal input value to ligal value formate
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>

<br>
<br>
<a href='signup.php'>
<button class="button-3" role="button">Back to Sign Up</button>
</a>
<br>
<br>
<a href='index.html'>
<button class="button-3" role="button">LogIn</button>
</a>
<br>
<br>
</body>
</html>