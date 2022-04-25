<?php
session_start();

include "config/db_conn.php";
include "template/function.php";

$user = isLogged($conn);
$user_id = $user['user_id'];

$sql = "SELECT id, fullname, dob, mob, yob, phone_number FROM celebrants WHERE created_by = '$user_id' ORDER BY dob";

$result = mysqli_query($conn, $sql);

$celebrants = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);


// print_r($celebrants);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $del = "DELETE FROM celebrants WHERE id=$id";
    $conn->query($del);

    header("location: all.php");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "All Birthdays";
include "template/head.php";
?>

<body>
  <?php
  $showNav = true;
  include "template/header.php"; ?>

  <div class="container">
    <div class="present">All Birthdays</div>
    <div class="month-head">January</div>

    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "January"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [January ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">February</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "February"):  
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [February ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">March</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "March"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [March ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">April</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "April"):  
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [April ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">May</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "May"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [May ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">June</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "June"):  
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [June ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">July</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "July"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [July ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">August</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "August"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [August ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">September</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "September"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [September ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">October</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "October"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [October ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>

    <div class="month-head">November</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "November"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [November ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>
    
    <div class="month-head">December</div>
    <div class="month-content">
      <ul>
        <?php foreach ($celebrants as $celebrant):
            $id = htmlspecialchars($celebrant['id']);
            $fullname = htmlspecialchars($celebrant['fullname']);
            $mob = htmlspecialchars($celebrant['mob']);
            $dob = htmlspecialchars($celebrant['dob']);
            $yob = htmlspecialchars($celebrant['yob']);
            $phone_number = htmlspecialchars($celebrant['phone_number']);
          
            if ($mob == "December"): 
        ?>
        <?php 
          if ($yob != 0) {
            $yob = date("Y")-$yob."yo";
          }
        ?>
        <?php
          echo "<li>".$fullname. " [December ".$dob." ".$yob."]
          <span class='trash'><a href='all.php?delete=".$id."'><i class='la la-trash'></i></a></span>
          <span class='edit'><a href='edit.php?edit=".$id."'><i class='la la-edit'></i></a></span>
          <span class='call'><a href='tel://".$phone_number."'><i class='la la-phone'></i></a></span>
          <span class='chat'><a href='http://wa.me/".$phone_number."'>
          <i class='lab la-whatsapp'></i></a></span></li>";
        ?>

        <?php 
          endif; 
          endforeach; 
        ?>
      </ul>
    </div>
    <!-- <div class="form"><label for="sort">Sort by:</label>
      <select name="sort">
        <option value="Month"></option>
      </select></div> -->
  </div>

  <?php include "template/footer.php" ?>
  <script src="js/script.js"></script>
</body>

</html>