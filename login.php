<?php
session_start();
include "config/db_conn.php";

$error = ['msg' => ''];
$user_email = $password = $user_id = "";

if (isset($_POST['login'])) {
    $user_email = htmlspecialchars($_POST['user_email']);
    $password = htmlspecialchars($_POST['password']);
   
    if (!empty($_POST["user_email"]) && !empty($_POST['password'])) {
        $validate = "SELECT * FROM users WHERE username = '$user_email' OR email = '$user_email' limit 1";
        $result = mysqli_query($conn, $validate);
    
        if ($result && mysqli_num_rows($result) > 0) {
            global $password;
            $user = mysqli_fetch_assoc($result);
      
            if (!(md5($password) != $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                header('location: index.php');
                die;
            } else {
                $error['msg'] = "Incorrect Password!";
            }
        } else {
            $error['msg'] = "Incorrect Username or Email!";
        }
    } else {
        $error['msg'] = "Fields cannot be empty";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Login";
include "template/head.php"; ?>

<body>
  <?php
  $showNav = false;
  include "template/header.php";
  ?>

  <div class="container">
    <div class="present">User Login</div>
    <form action="" class="form" method="POST">
      <div class="error">
        <?php
        echo $error['msg']."<br>";
        ?>
      </div>
      <input type="text" name="user_email" class="input-field" placeholder="Email or Username"
        value="<?php echo $user_email; ?>">
      <input type="password" name="password" class="input-field" placeholder="Password">
      <a href="#" class="forgot">Forgot Password?</a>
      <input type="submit" class="input-button" value="LOGIN TO YOUR ACCOUNT" name="login">
      <p>New? <a href="register.php">Register Here</a></p>
    </form>
  </div>

  <?php include "template/footer.php" ?>
  <script src="js/script.js"></script>

</body>

</html>