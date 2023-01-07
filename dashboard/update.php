<?php
include ("../includes/header.php");
include("../includes/dblink.php");
var_dump($_POST);
session_start();
if(isset($_POST["submit"])){
    $id = $_POST["Id"];
    $name = $_POST["Name"];
    $breed = $_POST["Breed"];
    $age = $_POST["Age"];
    $gender = $_POST["Gender"];


    $updateQuery = "UPDATE dogs SET NAME='$name',BREED = '$breed',AGE_IN_MONTHS = '$age',GENDER = '$gender' WHERE ID = '$id'";
    file_put_contents("log.txt",$updateQuery,FILE_APPEND);
    echo $updateQuery;
    $sql = $connection->query($updateQuery);
    if ($sql === TRUE){
        file_put_contents("log.txt","Record updated successfully",FILE_APPEND);
        $_SESSION['status'] = "Record Updated successfully";
    } else {
        file_put_contents("log.txt","Record didn't update successfully");
        $_SESSION['status'] = "Record was not updated successfully";
    }
    ?>
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
                <img src="..." class="rounded mr-2" alt="...">
                <strong class="mr-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <?php echo $_SESSION['status'];?>
            </div>
        </div>
    </div>
<?php
    header("Location: index.php");


}
?>

