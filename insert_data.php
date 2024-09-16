<?php include('dbcon.php'); ?>


<?php

function specialChars($str)
{
    return preg_match('/[^a-zA-Z]/', $str) > 0;
}

if (isset($_POST['add_students'])) {
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $age = $_POST['age'];
}


if (empty($fname)) {
    header("location:myform.php?error=First name is empty");
    exit();
} else if (specialChars($fname)) {
    header("location:myform.php?error=First name has special characters or numbers");
    exit();
}

if (empty($lname)) {
    header("location:myform.php?error=Last name is empty");
    exit();
} else if (specialChars($lname)) {
    header("location:myform.php?error=First name has special characters or numbers");
    exit();
}


if (empty($age)) {
    header("location:myform.php?error=Age is empty");
    exit();
} else if (!is_numeric($age)) {
    header("location:myform.php?error=Age should be a number");
    exit();
} else if ((int)$age <= 0) {
    header("location:myform.php?error=Age must be a non-negative number");
    exit();
}


$query = "insert into `students` (`first_name`, `last_name`, `age`) values ('$fname', '$lname', '$age')";

$result = mysqli_query($connection, $query);



if (!$result) {
    die("Query failed");
} else {
    header('location:index.php');
}
?>
