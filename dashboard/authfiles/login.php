<?php
session_start();
include("../../includes/dblink.php");
include("../../includes/functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //SOMETHING HAS BEEN POSTED
    $user_name = $_POST['user_name'];
    $password =  $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

        //READ FROM DB
        $query = "SELECT * FROM users WHERE user_name = '$user_name'";

        $result = $connection->query($query);

       file_put_contents("log.txt","Hello",FILE_APPEND);
        if ($result) {

            if (mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data["password"] === $password)
                {
                    $_SESSION['user_id'] = $user_data["USER_ID"];
                    header("Location: ../../Dashboard/index.php");
                    die;
                } else
                {
                    echo "wrong password or username";
                }
            }
        }

    } else
    {
        echo "Please enter some valid information";
        var_dump($_POST);
    }

}
?>


<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<head>
    <title>Login</title>
</head>
<body>

<style type="text/css">

    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button{

        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box{

        background-color: white;
        margin-top: 2rem;
        margin-left: 30rem;
        width: 300px;
        padding: 20px;
        border: #0a53be solid 1px;
    }

</style>

<div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input id="text" type="text" class="form-control" name="user_name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input  type="password" class="form-control" id="text" name="password">
        </div>

        <input  class="btn-primary" type="submit" value="Login"><br><br>

        <a href="signup.php">Click to Signup</a><br><br>
    </form>
</div>
</body>
</html>
