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
        $username = mysqli_real_escape_string($conn,$username);

        $password = stripslashes($password);
        $password = mysqli_real_escape_string($conn,$password);

        //Checking is user existing in the database or not
         $query = "SELECT * FROM `Admin` WHERE username='$username' and password='$password'";
         $result = mysqli_query($con,$query) or die(mysqli_error());
         $rows = mysqli_num_rows($result);

         $quer = "SELECT * FROM `Cashier' WHERE username='$username' and password='$password'";
          $result = mysqli_query($conn,$quer) or die(mysqli_error());
          $row = mysqli_num_rows($result);

          $querry = "SELECT * FROM `manager` WHERE username='$username' and password='$password'";
          $result = mysqli_query($conn,$querry) or die(mysqli_error());
          $rowss = mysqli_num_rows($result);

         $queryy = "SELECT * FROM `Pharmacist` WHERE username='$username' and password='$password'";
         $result = mysqli_query($con,$queryy) or die(mysqli_error());
         $rowws = mysqli_num_rows($result);



        if($rows==1)
        {
          $_SESSION['username'] = $username;
          header("Location: index.php");
        }elseif ($row==1) {
          # code...
          $_SESSION['username'] = $username;
          header("Location: user.php");
        }elseif ($rowss==1) {
          # code...
          $_SESSION['username'] = $username;
          header("Location: manager.php");
        }elseif ( $rowws==1) {
          # code...
          $_SESSION['username'] = $username;
          header("Location: admin.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid Keyword, please try again.');
            window.location.href='login.php';
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