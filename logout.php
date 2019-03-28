<?php
ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
 require_once 'Dboperation.php';
 
 $db = new DbOperation(); 
session_start();
session_destroy ();
header("Location: index.php");

?>