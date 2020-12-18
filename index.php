<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title></title>

    <script>
      <!--
        var ScrollMsg= "Payroll and Management System - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link rel="stylesheet" href="assets/css/login.css">

</head>
<style>
  
  
  
</style>


<body class="hold-transition login-page">
<?php
  require('connect_db.php');
  session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = stripslashes($username);
        $username = mysqli_real_escape_string($con,$username);

        $password = stripslashes($password);
        $password = mysqli_real_escape_string($con,$password);

        //Checking is user existing in the database or not
         $query = "SELECT * FROM `Admin` WHERE username='$username' and password='$password'";
         $result = mysqli_query($con,$query) or die(mysqli_error());
         $row = mysqli_num_rows($result);

        // $query1 = "SELECT * FROM `Cashier' WHERE username='$username' and password='$password'";
        // $result = mysqli_query($con,$query1) or die(mysqli_error());
        // $row = mysqli_num_rows($result);

          $query2 ="SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'";
          $result = mysqli_query($con,$query2) or die(mysqli_error());
          $row2 = mysqli_num_rows($result);

         $query3= "SELECT * FROM `Pharmacist` WHERE username='$username' and password='$password'";
         $result = mysqli_query($con,$query3) or die(mysqli_error());
         $row3 = mysqli_num_rows($result);



        if($row==1)
        {

          $_SESSION['username'] = $username;
          header("Location: admin.php");
        }elseif ($row==2) {
          # code...
          $_SESSION['cashier_id']=$row[0];
$_SESSION['first_name']=$row[1];
$_SESSION['last_name']=$row[2];
$_SESSION['staff_id']=$row[3];
$_SESSION['username']=$row[4];
          $_SESSION['username'] = $username;

          header("Location: cashier.php");
        }elseif ($row2==1) {
          # code...
          $_SESSION['username'] = $username;
          header("Location: pharmacist.php");
        }elseif ( $row3==1) {
          # code...
          $_SESSION['username'] = $username;
          header("Location: manager.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid Keyword, please try again.');
            window.location.href='index.php';
          </script>
          <?php    
        }
    }
    
    else
    {
?>


<br><br><br><br><br><br><br><br>
<div class="container">
  <section id="content">
 <form action="" method="post">
      <h1>Login Form</h1>
      <div>
        <input name=username type="text" placeholder="Enter Username" required>
        <!-- <input type="text" placeholder="Username" required="" id="username" /> -->
      </div>
      <div>
        <input name=password type="password" placeholder="Enter Password" required>
        <!-- <input type="password" placeholder="Password" required="" id="password" /> -->
      </div>
      <div>
        <input type="submit" value="Log in" />
        <!-- <a href="index.php">Back to Home</a> -->
        <!-- <a href="">Forgot password?</a> -->
      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->


<?php } ?>


  </body>
</html>