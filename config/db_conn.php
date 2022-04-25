<?php

//connct to db

$conn = mysqli_connect("127.0.0.1", "ayk", "aykbaba", "whenis");

if(!$conn) {
  echo "Connection error:". mysqli_connect_error();
}
?>