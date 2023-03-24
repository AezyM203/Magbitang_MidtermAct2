<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
    
?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" >
    <script src ="script.js" defer></script>
    <title>DETAILS | (Create,Read,Update,Delete)</title>

    


    <style>
        body{
            background-image: url("image/ae.gif");
height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;      
        }
    </style>
</head>
<body>
  

<div class="container mt-4 float-end">

<?php include('message.php'); ?>


<div class="row">
    <div class="col-sm-12 my-1">
        <div class="card bg-dark text-light">
            <div class="card-header border-warning ms-2 my-2 me-2">

            <p> Hello, <span class="text-warning"> <?php echo $user_data['username'];?> </span> !</p>
                <h4>Record Of Client 
                    <a href="create.php"  class="btn btn-primary float-end ">Create </a>
                    <a href="search.php"   class="btn btn-info float-end me-2">Search </a>
                </h4> <br>

                
            </div>

            <div class="card-body my-3">

                <table class="table table-bordered table-dark table-striped border-warning">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       

                        <?php 

                            $query = "SELECT * FROM crud";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $info)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $info['id']; ?></td>
                                        <td><?= $info['fname']; ?></td>
                                        <td><?= $info['lname']; ?></td>
                                        <td><?= $info['age']; ?></td>
                                        
                                        <td>
                                            <a href="view.php?id=<?= $info['id']; ?>" class="btn btn-info btn-sm">Read</a>
                                            <a href="update.php?id=<?= $info['id']; ?>" class="btn btn-success btn-sm">Update</a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_info" value="<?=$info['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> Emty Records Detected </h5>";
                            }

                        ?>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>



    
        <div class="row">
            <div class="d-flex flex-column justify-content-between col-auto bg-dark min-vh-100">
                <div class= "mt-4">
                    <a href="" class="text-white text-decoration-none d-flex align-items-center ms-4" role="button"> 
                        <span class="fs-5"> SIDEBAR</span>
                    </a>
                    <hr class="text-white">
                    <ul class="nav nav-pills flex-column mt-2 mt-sm-0" id="menu">
                        <li class="nav-item my-3">
                            <a href="#" class="nav-link text-white" aria-current="page" >
                                
                            <i class="fa fa-gauge"></i>
                            <span class="ms-2">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item my-3">
                        <a href="#" class="nav-link text-white" aria-current="page" >
                                
                                <i class="fa fa-house"></i>
                                <span class="ms-2">Home</span>
                                </a>
                        </li>

                        <li class="nav-item my-3 disabled">
                        <a href="#sidemenu" data-bs-toggle="collapse" class="nav-link text-white" aria-current="page" >
                                
                                <i class="fa fa-table"></i>
                                <span class="ms-2">Client Info</span>
                                <i class="fa fa-caret-down"></i>
                                </a>
                            <ul class="nav collapse ms-1 flex-column" id="sidemenu" data-bs-parent="#menu">
                                <li class="nav-item"> 
                                    <a href="" class="nav-link text-white ps-5 " aria-current="page" >Stats</a>
                                </li>

                                
                                <li class="nav-item ps-4  ">
                                    <a href="" class="nav-link text-white">Career</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item my-3">
                        <a href="#" class="nav-link text-white" aria-current="page" >
                                
                                <i class="fa fa-users"></i>
                                <span class="ms-2">User</span>
                                </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="dropdown open my-4">
                    <a class="btn border-none outline-none text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" id="triggerId" aria-expanded="false">
                       <i class="fa fa-user"></i> <span>Settings</span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item my-3" href="#">User profile</a>
                        <a class="dropdown-item my-3" href="login.php">Log Out</a>
                        
                    <div>
                    </div>
                </div>
            </div>
        </div>
    





    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>