<?php

$DB="onlinefood";
$USER="root";
$PASS="";
$HOST="localhost";
$connect=mysqli_connect($HOST, $USER, $PASS, $DB);
if(!$connect){
    echo "error";
}
    if(!empty($_POST)){
        $vname=$_POST['name'];
        $vphone=$_POST['phone'];
        $vusername=$_POST['username'];
        $vemail=$_POST['email'];
        $vpass=$_POST['pass'];
        $vrepass=$_POST['repass'];
        
        $vlupas="INSERT INTO reg_form(fid,name,phone,username,email,password,repass) VALUES('','$vname','$vphone','$vusername','$vemail','$vpass','$vrepass')";
        if(mysqli_query($connect,$vlupas)){
         echo "<script>window.alert('registration successful');</script>";
        }
    }

?>


<!DOCTYPE html>
<html>

<head>
    <title>Form Validation</title>
    <link type="text/css" rel="stylesheet" href="css/reg_form.css">


</head>

<body>
    <div class="overlay">

        <div class="form">

            <form id="reg_form" method="post" action="">
                <table width="400" border="0" cellpadding="0" cellspacing="10" align="center">
                    <tr>
                        <td>
                            <label for="name">Name<span class="req_star">*</span></label><br />
                            <input type="text" name="name" class="input_field" placeholder="Name">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cell">Phone</label><br />
                            <input type="text" name="phone" id="phone_id" class="input_field" placeholder="Phone">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="username">Username</label><br />
                            <input type="text" name="username" class="input_field" placeholder="Username">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email</label><br />
                            <input type="email" name="email" class="input_field" placeholder="Email">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password</label><br />
                            <input type="password" id="pass_id" name="pass" class="input_field">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="repass">Confirm-Password</label><br />
                            <input type="password" id="repass_id" name="repass" class="input_field">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" class="sub_but" value="SignUp">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/form_validation.js"></script>
</body>

</html>
