<?php
session_start();

include "config/db_conn.php";
include "template/function.php";

$user = isLogged($conn);

?>
<!DOCTYPE html>
<html lang="en">

<?php $pageTitle = "My Profile";
include "template/head.php"; ?>

<body>
  <?php   
  $showNav = true;
  include "template/header.php"; ?>

  <div class="container">
    <div class="present">My Profile</div>
    <div class="avatar">
      <img src="avat.png" class="user-avatar">
    </div>
    <div class="me-body">
      <ul>
        <li>
          
        </li>
      </ul>
    </div>
  </div>

  <?php include "template/footer.php" ?>
  <script src="js/script.js"></script>
</body>

</html>