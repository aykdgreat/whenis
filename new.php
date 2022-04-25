<?php
session_start();

include "config/db_conn.php";
include "template/function.php";

$user = isLogged($conn);

$error = ['msg' => ''];
$fullname = $dob = $mob = $yob = $phone_number = "";

if (isset($_POST['save'])) {
  $fullname = trim(htmlspecialchars($_POST["fullname"]));
  $dob = htmlspecialchars($_POST["dob"]);
  $mob = htmlspecialchars($_POST["mob"]);
  $yob = htmlspecialchars($_POST["yob"]);
  $phone_number = htmlspecialchars($_POST["phone_number"]);

  if (!empty($fullname) && !empty($dob) && !empty($mob)) {
    if (!preg_match('/^[a-zA-Z\'()\s]+$/', $fullname)) {
      $error['msg'] = "Invalid name, special characters & numbers not allowed";
    }
  } else {
    $error['msg'] = "Required fields must be filled (*)";
  }

  if (!array_filter($error)) {
    $created_by = $user['user_id'];
    $fullname = mysqli_real_escape_string($conn, $fullname);
    $dob = mysqli_real_escape_string($conn, $dob);
    $mob = mysqli_real_escape_string($conn, $mob);
    $yob = mysqli_real_escape_string($conn, $yob);
    $phone_number = mysqli_real_escape_string($conn, $phone_number);

    $sql = "INSERT INTO celebrants(fullname,dob,mob,yob,phone_number,created_by) VALUES('$fullname','$dob','$mob','$yob','$phone_number','$created_by')";

    if (mysqli_query($conn, $sql)) {
      header('location: all.php');
    } else {
      echo mysqli_error($conn);
    }
  } else {
    // echo "persisting errors";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = "Add Birthday";
include "template/head.php"; ?>

<body>
  <?php
  $showNav = true;
  include "template/header.php"; ?>

  <div class="container">
    <div class="present">
      Add Birthday
    </div>
    <form action="" class="form" method="POST">
      <div class="error">
        <?php
        echo $error['msg']."<br>";
        ?>
      </div>
      <input type="text" name="fullname" class="input-field" placeholder="Fullname*"
      value="<?php echo htmlspecialchars($fullname); ?>">
      <div class="b-details">
        <!--<input type="number" name="dob" class="input-field" placeholder="Day: 00*" value="<?php echo htmlspecialchars($dob); ?>">-->
        <select name='dob' class='input-field'>
          <option value='' <?php if ($dob == '') { echo 'selected'; } ?>>* Day</option>
          <option value='01' <?php if ($dob == '01') { echo 'selected'; } ?>>01</option>
          <option value='02' <?php if ($dob == '02') { echo 'selected'; } ?>>02</option>
          <option value='03' <?php if ($dob == '03') { echo 'selected'; } ?>>03</option>
          <option value='04' <?php if ($dob == '04') { echo 'selected'; } ?>>04</option>
          <option value='05' <?php if ($dob == '05') { echo 'selected'; } ?>>05</option>
          <option value='06' <?php if ($dob == '06') { echo 'selected'; } ?>>06</option>
          <option value='07' <?php if ($dob == '07') { echo 'selected'; } ?>>07</option>
          <option value='08' <?php if ($dob == '08') { echo 'selected'; } ?>>08</option>
          <option value='09' <?php if ($dob == '09') { echo 'selected'; } ?>>09</option>
          <option value='10' <?php if ($dob == '10') { echo 'selected'; } ?>>10</option>
          <option value='11' <?php if ($dob == '11') { echo 'selected'; } ?>>11</option>
          <option value='12' <?php if ($dob == '12') { echo 'selected'; } ?>>12</option>
          <option value='13' <?php if ($dob == '13') { echo 'selected'; } ?>>13</option>
          <option value='14' <?php if ($dob == '14') { echo 'selected'; } ?>>14</option>
          <option value='15' <?php if ($dob == '15') { echo 'selected'; } ?>>15</option>
          <option value='16' <?php if ($dob == '16') { echo 'selected'; } ?>>16</option>
          <option value='17' <?php if ($dob == '17') { echo 'selected'; } ?>>17</option>
          <option value='18' <?php if ($dob == '18') { echo 'selected'; } ?>>18</option>
          <option value='19' <?php if ($dob == '19') { echo 'selected'; } ?>>19</option>
          <option value='20' <?php if ($dob == '20') { echo 'selected'; } ?>>20</option>
          <option value='21' <?php if ($dob == '21') { echo 'selected'; } ?>>21</option>
          <option value='22' <?php if ($dob == '22') { echo 'selected'; } ?>>22</option>
          <option value='23' <?php if ($dob == '23') { echo 'selected'; } ?>>23</option>
          <option value='24' <?php if ($dob == '24') { echo 'selected'; } ?>>24</option>
          <option value='25' <?php if ($dob == '25') { echo 'selected'; } ?>>25</option>
          <option value='26' <?php if ($dob == '26') { echo 'selected'; } ?>>26</option>
          <option value='27' <?php if ($dob == '27') { echo 'selected'; } ?>>27</option>
          <option value='28' <?php if ($dob == '28') { echo 'selected'; } ?>>28</option>
          <option value='29' <?php if ($dob == '29') { echo 'selected'; } ?>>29</option>
          <option value='30' <?php if ($dob == '30') { echo 'selected'; } ?>>30</option>
          <option value='31' <?php if ($dob == '31') { echo 'selected'; } ?>>31</option>
        </select>
        <!-- <input type="text" name="mob" class="input-field" placeholder="Mth: 01/January/Jan*" value="<?php echo htmlspecialchars($mob); ?>"> -->
        <select name="mob" class="input-field">
          <option value="">* Month</option>
          <option value="January" <?php if ($mob == "January") { echo "selected"; } ?>>January</option>
          <option value="February" <?php if ($mob == "February") { echo "selected"; } ?>>February</option>
          <option value="March" <?php if ($mob == "March") { echo "selected"; } ?>>March</option>
          <option value="April" <?php if ($mob == "April") { echo "selected"; } ?>>April</option>
          <option value="May" <?php if ($mob == "May") { echo "selected"; } ?>>May</option>
          <option value="June" <?php if ($mob == "June") { echo "selected"; } ?>>June</option>
          <option value="July" <?php if ($mob == "July") { echo "selected"; } ?>>July</option>
          <option value="August" <?php if ($mob == "August") { echo "selected"; } ?>>August</option>
          <option value="September" <?php if ($mob == "September") { echo "selected"; } ?>>September</option>
          <option value="October" <?php if ($mob == "October") { echo "selected"; } ?>>October</option>
          <option value="November" <?php if ($mob == "November") { echo "selected"; } ?>>November</option>
          <option value="December" <?php if ($mob == "December") { echo "selected"; } ?>>December</option>
        </select>
        <!-- <input type="number" name="yob" class="input-field" placeholder="Year: 2000" value="<?php echo htmlspecialchars($yob); ?>"> -->
        <select name='yob' class='input-field'>
          <option value='' <?php if ($yob == '') { echo 'selected'; } ?>>Year</option>
          <option value='2022' <?php if ($yob == '2022') { echo 'selected'; } ?>>2022</option>
          <option value='2021' <?php if ($yob == '2021') { echo 'selected'; } ?>>2021</option>
          <option value='2020' <?php if ($yob == '2020') { echo 'selected'; } ?>>2020</option>
          <option value='2019' <?php if ($yob == '2019') { echo 'selected'; } ?>>2019</option>
          <option value='2018' <?php if ($yob == '2018') { echo 'selected'; } ?>>2018</option>
          <option value='2017' <?php if ($yob == '2017') { echo 'selected'; } ?>>2017</option>
          <option value='2016' <?php if ($yob == '2016') { echo 'selected'; } ?>>2016</option>
          <option value='2015' <?php if ($yob == '2015') { echo 'selected'; } ?>>2015</option>
          <option value='2014' <?php if ($yob == '2014') { echo 'selected'; } ?>>2014</option>
          <option value='2013' <?php if ($yob == '2013') { echo 'selected'; } ?>>2013</option>
          <option value='2012' <?php if ($yob == '2012') { echo 'selected'; } ?>>2012</option>
          <option value='2011' <?php if ($yob == '2011') { echo 'selected'; } ?>>2011</option>
          <option value='2010' <?php if ($yob == '2010') { echo 'selected'; } ?>>2010</option>
          <option value='2009' <?php if ($yob == '2009') { echo 'selected'; } ?>>2009</option>
          <option value='2008' <?php if ($yob == '2008') { echo 'selected'; } ?>>2008</option>
          <option value='2007' <?php if ($yob == '2007') { echo 'selected'; } ?>>2007</option>
          <option value='2006' <?php if ($yob == '2006') { echo 'selected'; } ?>>2006</option>
          <option value='2005' <?php if ($yob == '2005') { echo 'selected'; } ?>>2005</option>
          <option value='2004' <?php if ($yob == '2004') { echo 'selected'; } ?>>2004</option>
          <option value='2003' <?php if ($yob == '2003') { echo 'selected'; } ?>>2003</option>
          <option value='2002' <?php if ($yob == '2002') { echo 'selected'; } ?>>2002</option>
          <option value='2001' <?php if ($yob == '2001') { echo 'selected'; } ?>>2001</option>
          <option value='2000' <?php if ($yob == '2000') { echo 'selected'; } ?>>2000</option>
          <option value='1999' <?php if ($yob == '1999') { echo 'selected'; } ?>>1999</option>
          <option value='1998' <?php if ($yob == '1998') { echo 'selected'; } ?>>1998</option>
          <option value='1997' <?php if ($yob == '1997') { echo 'selected'; } ?>>1997</option>
          <option value='1996' <?php if ($yob == '1996') { echo 'selected'; } ?>>1996</option>
          <option value='1995' <?php if ($yob == '1995') { echo 'selected'; } ?>>1995</option>
          <option value='1994' <?php if ($yob == '1994') { echo 'selected'; } ?>>1994</option>
          <option value='1993' <?php if ($yob == '1993') { echo 'selected'; } ?>>1993</option>
          <option value='1992' <?php if ($yob == '1992') { echo 'selected'; } ?>>1992</option>
          <option value='1991' <?php if ($yob == '1991') { echo 'selected'; } ?>>1991</option>
          <option value='1990' <?php if ($yob == '1990') { echo 'selected'; } ?>>1990</option>
          <option value='1989' <?php if ($yob == '1989') { echo 'selected'; } ?>>1989</option>
          <option value='1988' <?php if ($yob == '1988') { echo 'selected'; } ?>>1988</option>
          <option value='1987' <?php if ($yob == '1987') { echo 'selected'; } ?>>1987</option>
          <option value='1986' <?php if ($yob == '1986') { echo 'selected'; } ?>>1986</option>
          <option value='1985' <?php if ($yob == '1985') { echo 'selected'; } ?>>1985</option>
          <option value='1984' <?php if ($yob == '1984') { echo 'selected'; } ?>>1984</option>
          <option value='1983' <?php if ($yob == '1983') { echo 'selected'; } ?>>1983</option>
          <option value='1982' <?php if ($yob == '1982') { echo 'selected'; } ?>>1982</option>
          <option value='1981' <?php if ($yob == '1981') { echo 'selected'; } ?>>1981</option>
          <option value='1980' <?php if ($yob == '1980') { echo 'selected'; } ?>>1980</option>
          <option value='1979' <?php if ($yob == '1979') { echo 'selected'; } ?>>1979</option>
          <option value='1978' <?php if ($yob == '1978') { echo 'selected'; } ?>>1978</option>
          <option value='1977' <?php if ($yob == '1977') { echo 'selected'; } ?>>1977</option>
          <option value='1976' <?php if ($yob == '1976') { echo 'selected'; } ?>>1976</option>
          <option value='1975' <?php if ($yob == '1975') { echo 'selected'; } ?>>1975</option>
          <option value='1974' <?php if ($yob == '1974') { echo 'selected'; } ?>>1974</option>
          <option value='1973' <?php if ($yob == '1973') { echo 'selected'; } ?>>1973</option>
          <option value='1972' <?php if ($yob == '1972') { echo 'selected'; } ?>>1972</option>
          <option value='1971' <?php if ($yob == '1971') { echo 'selected'; } ?>>1971</option>
          <option value='1970' <?php if ($yob == '1970') { echo 'selected'; } ?>>1970</option>
          <option value='1969' <?php if ($yob == '1969') { echo 'selected'; } ?>>1969</option>
          <option value='1968' <?php if ($yob == '1968') { echo 'selected'; } ?>>1968</option>
          <option value='1967' <?php if ($yob == '1967') { echo 'selected'; } ?>>1967</option>
          <option value='1966' <?php if ($yob == '1966') { echo 'selected'; } ?>>1966</option>
          <option value='1965' <?php if ($yob == '1965') { echo 'selected'; } ?>>1965</option>
          <option value='1964' <?php if ($yob == '1964') { echo 'selected'; } ?>>1964</option>
          <option value='1963' <?php if ($yob == '1963') { echo 'selected'; } ?>>1963</option>
          <option value='1962' <?php if ($yob == '1962') { echo 'selected'; } ?>>1962</option>
          <option value='1961' <?php if ($yob == '1961') { echo 'selected'; } ?>>1961</option>
          <option value='1960' <?php if ($yob == '1960') { echo 'selected'; } ?>>1960</option>
          <option value='1959' <?php if ($yob == '1959') { echo 'selected'; } ?>>1959</option>
          <option value='1958' <?php if ($yob == '1958') { echo 'selected'; } ?>>1958</option>
          <option value='1957' <?php if ($yob == '1957') { echo 'selected'; } ?>>1957</option>
          <option value='1956' <?php if ($yob == '1956') { echo 'selected'; } ?>>1956</option>
          <option value='1955' <?php if ($yob == '1955') { echo 'selected'; } ?>>1955</option>
          <option value='1954' <?php if ($yob == '1954') { echo 'selected'; } ?>>1954</option>
          <option value='1953' <?php if ($yob == '1953') { echo 'selected'; } ?>>1953</option>
          <option value='1952' <?php if ($yob == '1952') { echo 'selected'; } ?>>1952</option>
          <option value='1951' <?php if ($yob == '1951') { echo 'selected'; } ?>>1951</option>
          <option value='1950' <?php if ($yob == '1950') { echo 'selected'; } ?>>1950</option>
        </select>
      </div>
      <input type="number" name="phone_number" class="input-field" placeholder="Phone Number: +234......"
      value="<?php echo htmlspecialchars($phone_number); ?>">
      <div class="btn-group">
        <input type="submit" class="input-button" value="Save Details" name="save">
        <input type="reset" class="input-button" value="Reset Info" name="reset">
      </div>
    </div>
  </form>
</div>

<?php include "template/footer.php" ?>
<script src="js/script.js"></script>
</body>

</html>