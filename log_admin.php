<?php

$DB="onlinefood";
$USER="root";
$PASS="";
$HOST="localhost";
$connect=mysqli_connect($HOST, $USER, $PASS, $DB);

if(!$connect){
    echo "error";
}



 if(isset($_POST['submit']))
 {
        $vusername=$_POST['username'];
        $vpass=$_POST['pass'];
        $vlupas="SELECT * FROM reg_form WHERE username='$vusername' and password='$vpass'";
     
     echo $vlupas;
     
      
       try{
           $c=new PDO("mysql:host=localhost;dbname=onlinefood",'root','');
           $c->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           $p=$c->query($vlupas);
           echo $p->rowCount();
           if($p->rowCount()>0){
               header('Location:indexadmin.php');
            echo "<script>window.alert('connection successful');</script>";
           }
           else{
               header('Location:log_form.php');
           }
           
       }catch(PDOException $ex){
           echo "<script>window.alert('connection error');</script>";
       }
              
//      var_dump($total);
//        if( $total == 1){
//   	header('location:index.php');
//     echo "<script>window.alert('connection successful');</script>";
//        }
//        else{
//     	 echo "<script>window.alert('connection error');</script>";
//        }

  
 }


?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="css/reg_form.css">


</head>

<body>
    <div class="overlay">

        <div class="form">

            <form id="reg_form" action="log_form.php" method="POST">
                <table width="400" border="0" cellpadding="0" cellspacing="10" align="center">
                    <tr>
                        <td>
                            <label for="username">Username</label><br />
                            <input type="text" name="username" class="input_field" placeholder="User Name">

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
                            <input type="submit" name="submit" class="sub_but" value="LogIn">
<!--                            <input type="button" class="sub_but" value="SignUp" onclick="window.location.href='http://localhost/prj/reg_form.php'" />-->
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