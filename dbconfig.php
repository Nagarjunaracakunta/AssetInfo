<?php


$db = mysqli_connect('localhost', 'root', '', 'Ericsson');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  
  
  ?>

