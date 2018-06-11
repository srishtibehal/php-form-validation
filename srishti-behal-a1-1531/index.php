<?php

if(isset($_GET["submit-btn"])) {
    $err = NULL;
    $success = false;
    
    if ($_GET["fullname"]) {
        $fn = $_GET["fullname"];
    } else{
        $err = "<br>Your Name?</br>";
    }

    if($_GET["email"]) {
        if (filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) {
            $em = $_GET["email"];
        } else {
            $err .= "<b>Invalid Email!</br>";
        }
        
    } else {
        $err .= "<br>Email?</br>";
    }
    
    if($_GET["message"]) {
        $m = $_GET["message"];
    } else{
        $err .= "<br>Message?</br>";
    }
    
    
    if (!empty($fn) && !empty($em) && !empty($m)){
        $success = true;
    
        $fb = "<p class=\"feedback\">Hello $fn. Your email is: $em. Your message is: <strong>$m</strong></p>";
    }
    /*
    if (isset($fn)&& $success = true) {
        echo "<br>Hello $fn</br>";
    }
    
    if (!empty($em)){
        $success = true;
        echo "<br>Thank you for your email: $em</br>";
    }
    if (!empty($m)) {
        $success = true;
         echo "<br>Thank you for your message: $m </br>";
    }
    */
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Handle Form Submit</title>
    <link href="./css/styles.css" rel="stylesheet">
</head>
<body>
    <h1>Form Assignment</h1>
        <div class= "form">
            <form action = "index.php" method="get">
              <fieldset>
                  <legend>Full name</legend>
                   <label>Full name</label>
                    <input type="text" name="fullname" value="<?php if (isset($fn) && !$success) { echo $fn; } ?>">
                           <br>
                           <br>
                    <label>Email</label>
                    <input type="text" name="email">
                           <br>
                           <br>
                        <p>
                    <label>Text-Area</label>
                       <br>
                       <br>
                        <textarea name="message"></textarea>
                        </p>
                    <input type="Submit" name="submit-btn" value="submit"> 
                </fieldset>
            </form>
    </div>
    <?php
    if(isset($fb)) {
        echo $fb;
    }
    if(isset($err)) {
        echo $err;
    }
    ?>
</body>
</html>