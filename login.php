<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //something was posted

           
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ( !empty($email) && !empty($password) )
            {
                //read to database

               
                $query = "select * from users where email = '$email' limit 1";

               $result = mysqli_query($con, $query);

               if($result){
                if($result && mysqli_num_rows($result) > 0 ){

                    $user_data = mysqli_fetch_assoc($result);
                   
                    if($user_data['password'] === $password){

                       $_SESSION['id'] = $user_data['id'];
                        header("Location: index.php");
                        die;
                    }
                } 
               }
               

               echo "CHECK YOUR EMAIL OR PASSWORD!";
            }else{
                echo "CHECK YOUR EMAIL OR PASSWORD!";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>LOGIN</title>
   <style>
    .login-form{
            background-color: #a18ae8;
        }
        .login-form button {
    margin-bottom: 20px;
    background-color: skyblue;
}
       login-form button.hover{
        background-color: lightpink;
       }

    body{
       background-image: url("image/ae.gif");
height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
    }

   </style>
</head>
<body >

    <div class="container">
        <div class="row">
    <div class="col-sm-4">
    </div>

    <div class="col-sm-4">

                <div class="login-form text-light">
                     <p style="font-family: sans-serif;"><center><h3>Log in</h3></center></p>
                    <form method = "post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address </label>
                    <input type="email" class="form-control" name="email" required>
                    
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                
                <button id="button" type="submit" class="btn btn-warning text-light  my-3" value="login" >Log-in </button>
                </form>

                <a class="text-decoration-none" href="signup.php" target="_self">SIGN-UP</a>
                </div>
                
    </div>

    <div class="col-sm-4">
        
    </div>
    </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>