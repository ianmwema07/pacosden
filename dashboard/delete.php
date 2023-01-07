<?php
include("../includes/dblink.php");

if(isset($_POST["submit"])){
    $id = $_POST["id"];

    $deleteQuery = "DELETE FROM dogs WHERE ID = '$id'";

    if ($connection->query($deleteQuery) === TRUE) {
        file_put_contents("log.txt","Record deleted successfully",FILE_APPEND);
    } else {
        file_put_contents("log.txt", "Record not deleted successfully", FILE_APPEND);
    }
    header("Location: index.php");

}
