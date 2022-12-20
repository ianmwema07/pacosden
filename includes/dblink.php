<?php
$connection = new mysqli("localhost","root","root","pacosden");

if($connection->connect_error()){
    file_put_contents("log.txt","Connection Error".$connection->connect_error());
    exit();
}
