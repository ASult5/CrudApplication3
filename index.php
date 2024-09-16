<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php 
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
    exit();
}
?>  


<div class="container"> 
    <div class="box1">
        <h2>All Students</h2>
        <button class="btn btn-primary">
            <a href="myform.php" class="button">Add Students</a></button>
    </div>

    <?php
if (isset($_SESSION['email'])) {
    $name = $_SESSION['email'];
    echo "<p style='color:white; text-align:center; width:100%; font-size: 26px'>" . "Welcome Back ". $name . "!"."</p>";
}
?>

    <table class="table table-hover table-bordered table-striped rounded">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $query = "select * from `students`";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("query failed");
            } else {

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                        <td><a href="delete_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

            <?php



                }
            }
            ?>



        </tbody>
    </table>


    <button class="btn btn-danger logout-btn">
            <a href="login.php" onclick="logout()">Logout</a></button>

<script>

    function logout() {
        if (confirm("Are you sure you want to logout?")) {
            window.location.href = 'logout.php'; 
        }
    }

</script>


    <?php include('footer.php'); ?>