<?php

include "template/function.php";
include "config/db_conn.php";

$error['msg'] = "";
$errors = ['username' => '', 'email' => '', 'dob' => '', 'password' => ''];
$username = $email = $dob = $password = $cpassword = $user_id = "";

if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $email  = htmlspecialchars($_POST['email']);
    $dob  = htmlspecialchars($_POST['dob']);
    $password  = htmlspecialchars($_POST['password']);
    $cpassword  = htmlspecialchars($_POST['cpassword']);
    $user_id = random_id();

    if (!empty($username) && !empty($email) && !empty($password) && !empty($cpassword)) {
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $username)) {
            $error['msg'] = "Invalid username, special characters are not allowed";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['msg'] = "Email is invalid, please try again";
        }
        if (!($password !== $cpassword)) {
            if (!(strlen($password) < 5 || strlen($password) > 15)) {
                $password = md5($password);
            } else {
                $error['msg'] = "Password length must be > 5 and < 15";
            }
        } else {
            $error['msg'] = "Password confirmation does not match";
        }
        
        //backend validation
        $validate = "SELECT username, email from users";
        $result = mysqli_query($conn, $validate);
        $existing = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        if ($result) {
            foreach ($existing as $exists) {
                if ($exists['username'] == $username) {
                    $error['msg'] = "Username exists, login instead";
                }
                    
                if ($exists['email'] == $email) {
                    $error['msg'] = "Email exists, login instead";
                }
            }
        } else {
            echo mysqli_error($conn);
        }
    } else {
        $error['msg'] = "Required (*) fields must be filled";
    }

    if (array_filter($error)) {
        echo "persisting errors";
    } else {

        $username = mysqli_real_escape_string($conn, $username);
        $dob = mysqli_real_escape_string($conn, $dob);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $user_id = mysqli_real_escape_string($conn, $user_id);

        $sql = "INSERT INTO users(username,dob,email,user_id,password) VALUES('$username','$dob','$email','$user_id','$password')";

        if (mysqli_query($conn, $sql)) {
            header('location: login.php');
        } else {
            echo mysqli_error($conn);
        }
    }

    //  print_r($errors);
}

?>


<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Register";
include "template/head.php";
?>

<body>
  <?php
  $showNav = false;
  include "template/header.php"; ?>

  <div class="container">
    <div class="present">User Registration</div>
    <form action="" class="form" method="POST">
      <div class="error">
        <?php
          echo $error['msg']."<br>";
        ?>
      </div>
      <input type="text" name="username" class="input-field" placeholder="Username *"
        value="<?php echo $username; ?>">
      <div class="dob"><label for="dob">Date Of Birth:</label><input type="date" name="dob" class="input-field"
          value="<?php echo $dob; ?>"></div>
      <input type="text" name="email" class="input-field" placeholder="Email address *"
        value="<?php echo $email; ?>">
      <input type="password" name="password" class="input-field" placeholder="Password *">
      <input type="password" name="cpassword" class="input-field" placeholder="Confirm Password *">
      <input type="submit" class="input-button" name="register" value="REGISTER ACCOUNT">
      <p>Registered? <a href="login.php">Login Here</a></p>
    </form>
  </div>

  <?php include "template/footer.php" ?>
  <script src="js/script.js"></script>
</body>

</html>