<?php

$db= mysqli_connect("localhost", "root", "", "mejores");
 
 
if(session_status() == PHP_SESSION_NONE){
   session_start();
}