<?php 
session_start();
include "config/db_conn.php";
include "template/function.php";

$user = isLogged($conn);
$user_id = $user['user_id'];

$day = date("d");
$fullMonth = date('F');


$sql = "SELECT * FROM celebrants WHERE created_by = '$user_id' AND mob = '$fullMonth'";

$result = mysqli_query($conn, $sql);

$celebrants = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<?php 
$pageTitle = "Dashboard";
include "template/head.php"; 
?>

<body>
  <?php   
  $showNav = true;
  include "template/header.php"; ?>

  <div class="container">
    <div class="present">Dashboard - <?php echo $user['username']; ?></div>
    <div class="grid-2">
      <div class="col-1">
        <p><?php 
        $counter = 0;
        
        for ($i=0;$i<count($celebrants);$i++) {
          if ($celebrants[$i]['dob'] == $day) {
            $counter++;
          };
        } 
        echo $counter;

        ?></p>
        <h4>Today</h4>
      </div>
      <div class="col-2">
        <p><?php echo count($celebrants)?></p>
        <h4>This Month</h4>
      </div>
    </div>
    <div class="today-head">Today's birthdays</div>
    <div class="today-list">
      <!-- <p>No birthday today</p> -->
            <!-- <div class="month-content"> -->
        <ul>
        <?php 
        global $day;
        foreach($celebrants as $celebrant):
          if($celebrant["dob"] == $day): ?>
          <?php if($celebrant["yob"] != 0){ $celebrant["yob"] = date("Y")-$celebrant["yob"]."yo";} ?>
          <?php 
            echo "<li>".htmlspecialchars($celebrant["fullname"]). " 
            [".htmlspecialchars($celebrant["mob"])." ".htmlspecialchars($celebrant["dob"])." ".
            htmlspecialchars($celebrant["yob"])."]<span class='call'><a href='tel://".htmlspecialchars($celebrant["phone_number"])."
            '><i class='la la-phone'></i></a></span>
            <span class='chat'><a href='http://wa.me/".htmlspecialchars($celebrant["phone_number"])."'>
            <i class='lab la-whatsapp'></i></a></span></li>"; 
          ?>

        <?php endif; endforeach; ?>
        </ul>
      <!-- </div> -->
    </div>
  </div>

  <?php include "template/footer.php" ?>
  <script src="js/script.js"></script>
</body>

</html>