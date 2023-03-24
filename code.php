<?php
session_start();
require 'config.php';

if(isset($_POST['delete_info']))
{
    $id= mysqli_real_escape_string($con, $_POST['delete_info']);

    $query = "DELETE FROM crud WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_info']))
{
    $id= mysqli_real_escape_string($con, $_POST['id']);

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $age = mysqli_real_escape_string($con, $_POST['age']);


    $query = "UPDATE crud SET fname='$fname', lname='$lname', age='$age' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_info']))
{
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
   

    $query = "INSERT INTO crud (fname,lname,age) VALUES ('$fname','$lname','$age')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = " Created Successfully";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "REQUIRED TO INPUT DATA!";
        header("Location: create.php");
        exit(0);
    }
}

?>