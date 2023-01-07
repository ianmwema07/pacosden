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
        //SAVE TO DB
        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id,user_name,password)VALUES ('$user_id','$user_name','$password')";
        $connection->query($query);

        header("Location: login.php");

    } else
    {
        echo "Please enter some valid information";
        var_dump($_POST);
    }

}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
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

    .text{
        color: white;
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

        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

</style>

<div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

        <label class="text" for="user_name">User Name</label> <input id="text" type="text" name="user_name"><br><br>
        <label class="text" for="password">Password</label> <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Signup"><br><br>

        <a href="login.php">Click to Login</a><br><br>
    </form>
</div>
</body>
</html>
