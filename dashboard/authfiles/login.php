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

        file_put_contents("log.txt","This is the query ---->".$query."\n","FILE_APPEND");
        if ($result) {

            if (mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data["PASSWORD"] === $password)
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

        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

</style>

<div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <a href="signup.php">Click to Signup</a><br><br>
    </form>
</div>
</body>
</html>
