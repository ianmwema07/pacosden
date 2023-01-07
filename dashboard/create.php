<?php
include('../includes/dblink.php');
if(isset($_POST['submit'])){
    var_dump($_POST);
    $name = $_POST['Name'];
    $breed = $_POST['Breed'];
    $age = $_POST['Age'];
    $gender = $_POST['Gender'];


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
        $insQuery = "INSERT INTO dogs (NAME,AGE_IN_MONTHS,GENDER,IMAGE,BREED) VALUES ('$name','$age','$gender','$fileNewName','$breed')";
        $connection->query($insQuery);
        header("Location: index.php?uploadsuccess");
    }

}

