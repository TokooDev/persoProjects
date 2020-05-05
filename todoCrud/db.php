<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'todo'
) or die(mysqli_erro($mysqli));

?>