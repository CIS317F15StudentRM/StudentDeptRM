<?php
session_start(); 
if(!isset($_SESSION["login_user"])){
  redirect_to("index.php");
}
?>