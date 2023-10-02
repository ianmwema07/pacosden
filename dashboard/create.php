<?php
include('../includes/dblink.php');
if(isset($_POST['submit'])){
    $name = $_POST['Name'];
    $breed = $_POST['Breed'];
    $age = $_POST['Age'];
    $gender = $_POST['Gender'];
    $higestPriorityValue;

    $maxPriorityValueQuery = "SELECT MAX(PRIORITY) AS highest_priority FROM dogs";

    $priorityRows = $connection->query($maxPriorityValueQuery);

    if($row = $priorityRows->fetch_assoc()) {

//        file_put_contents("log.txt","This is the priority".print_r($row, true)."\n", FILE_APPEND);
        $higestPriorityValue = $row['highest_priority'];
        print_r($higestPriorityValue);
        file_put_contents("log.txt","\n"."higest priority value ". $higestPriorityValue,FILE_APPEND);
        $higestPriorityValue++;
//        $logData = "This is the priority: " . print_r($row, true) . "\n";
        // Write the log data to the file
//        fwrite($logFile, $logData);
    }



    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');
    $data = 0;

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $data = 3;
            } else {
                echo "your file is too large";
            }
        } else {
            echo "There was an error uploading your file";
        }
    } else {
        echo "you cannot upload files of this type";
    }
    if($data == 3){
        $fileNewName = uniqid('',true).".".$fileActualExt;
        $fileDestination = '../uploads/'.$fileNewName;
        move_uploaded_file($fileTmpName,$fileDestination);
        $insQuery = "INSERT INTO dogs (NAME,AGE_IN_MONTHS,GENDER,IMAGE,BREED,PRIORITY) VALUES ('$name','$age','$gender','$fileNewName','$breed','$higestPriorityValue')";
        $connection->query($insQuery);
        header("Location: index.php?uploadsuccess");
    }

}

