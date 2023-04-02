<html>
<body>

    <?php

session_start();

session_unset();

// destroy the session
session_destroy();

echo '<script type="text/javascript">

window.onload = function () { alert("Succesfully Logged Out"); }

</script>';

sleep(2);
header("Location:index.html");

?>