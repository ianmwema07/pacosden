<?php
session_start();
include("../includes/header.php");
include("../includes/dblink.php");
include("../includes/functions.php");
 check_login($con);

$sql = "SELECT * FROM dogs ";

$rows = $connection->query($sql);

?>
<!-- Button trigger modal -->
<link rel="stylesheet" href="../assets/css/style.css">
<div class="row">
    <div class=" mt-10 justify-content-end ">
        <div class="d-flex">
            <div class="me-lg-0 p-2">
                <button type="button" style="margin-top: 20px; float:right;" class="add-dog btn btn-success ml-auto p-2" data-toggle="modal" data-target="#exampleModal">
                    Add Dog Details &nbsp; &nbsp; <span class="mdi mdi-plus-box-outline"></span>
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Dog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../dashboard/create.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="Name" placeholder="Name" class="form-control" id="name" aria-describedby="name"  required>
                            </div>
                            <div class="form-group">
                                <label for="breed">Breed</label>
                                <input type="text" name="Breed" placeholder="Breed" class="form-control" id="breed" aria-describedby="breed"  required>
                            </div>
                            <div class="form-group">
                                <label for="name">Age</label>
                                <input type="number" name="Age" placeholder="Age in months" class="form-control" id="age" aria-describedby="age"  required>
                            </div>
                            <div class="form-group">
                                <label for="name">Upload Image</label>
                                <input type="file" name="image" placeholder="image" class="form-control" id="image" aria-describedby="image" required>
                            </div>
                            <div class="form-group">
                                <label for="breed">Dog Type</label>
                                <select name="Gender" class="custom-select" id="validationCustom04" required>
                                    <option value="stud">Stud</option>
                                    <option value="female">Female</option>
                                    <option value="puppy">Puppy</option>
                                </select>
                            </div>
                            <input type="submit" name="submit" value="submit" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="align-content: center;align-items: center;margin: 30px">
    <center>
        <?php while($row = $rows->fetch_assoc()): ?>
            <div class="card" style="width: 18rem;margin-bottom: 2em;">
                <img class="card-img-top" src="../uploads/<?php echo $row['IMAGE']; ?>" alt="image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['NAME'] ?></h5>
                    <ul style="list-style-type: none">
                        <li>Breed : <?php echo $row['BREED'] ?> </li>
                        <li>Gender : <?php echo $row['GENDER'] ?> </li>
                        <li>Priority : <?php echo $row['PRIORITY'] ?> </li>
                    </ul>
                </div>
                <div class="card-footer">
                     <a href="" style="margin-right: 3rem;" data-toggle="modal" data-target="#editModal<?php echo $row['ID']; ?>"><span class="mdi mdi-circle-edit-outline">Edit</span></a>
                    <div class="modal fade" id="editModal<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../dashboard/update.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" value="<?php echo $row['ID']; ?>" name="Id" class="form-control" id="id" aria-describedby="id">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" value="<?php echo $row['NAME']; ?>" name="Name" placeholder="Name" class="form-control" id="name" aria-describedby="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="breed">Breed</label>
                                            <input type="text" value="<?php echo $row['BREED']; ?>" name="Breed" placeholder="Breed" class="form-control" id="breed" aria-describedby="breed" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Age</label>
                                            <input type="number" value="<?php echo $row['AGE_IN_MONTHS']; ?>" name="Age" placeholder="Age in months" class="form-control" id="age" aria-describedby="age" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Priority</label>
                                            <input type="number" value="<?php echo $row['PRIORITY']; ?>" name="priority" placeholder="Priority" class="form-control" id="priority" aria-describedby="priority" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="breed">Dog Type</label>
                                            <select name="Gender" class="custom-select" id="validationCustom04" required>
                                                <option value="stud">Stud</option>
                                                <option value="female">Female</option>
                                                <option value="puppy">Puppy</option>
                                            </select>
                                        </div>
                                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a data-toggle="modal" data-target="#deleteModal<?php echo $row['ID']; ?>"><span class="mdi mdi-trash-can">Delete</span></a>
                    <div class="modal fade" id="deleteModal<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this record?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="../dashboard/delete.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['ID']; ?>" name="id">
                                        <input type="submit" class="btn btn-outline-danger" name="submit" value="Yes">
                                    </form>

                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </center>

</div>


<?php
include("../includes/footer.php");
?>
