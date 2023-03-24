<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //something was posted

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!empty($username) && !empty($email) && !empty($password) && !is_numeric($username))
            {
                //save to database

                $id = random_num(20);
                $query = "insert into users (id,username,email,password) values ('$id','$username','$email','$password')";

                mysqli_query($con, $query);

                header("Location: login.php");
                die;


            }else{
                echo "pls enter info!";
            }
        }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" >
    <title>SIGN UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            background-image: url("image/ae.gif");
height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-form{
            background-color: #a18ae8;
        }
        .login-form button {
    margin-bottom: 20px;
    background-color: skyblue;
}
    </style>
</head>
<body>
    
                <div class="container">
                <div class="row">
            <div class="col-sm-4">
            </div>

            <div class="col-sm-4">

                        <div class="login-form text-light">

                            <p style="font-family: sans-serif;"><center><h3>Sign up</h3></center></p>
                            <form  method = "POST">
                       
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username </label>
                            <input type="text" class="form-control" name="username" required="">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email Address </label>
                            <input type="email" class="form-control" name="email" required="">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required="">
                        </div>
                        
                        <button type="submit" class="btn btn-warning text-light ">REGISTER</button>
                        </form>

                        <a class="text-decoration-none " href="login.php" target="_self">LOGIN</a>
                        </div>
                        
            </div>

            <div class="col-sm-4">
                
            </div>
            </div>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>