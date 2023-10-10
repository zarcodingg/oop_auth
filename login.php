<?php
include_once 'models/Auth.php';

if(isset($_POST['login'])){
    $data = [
        "username" => $_POST['username'],
        "password" => $_POST['password'],
    ];
    
    $result = Auth::login($data);

    // die(var_dump($result));
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Login</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</head>

<body>
    <div class="container mt-3">
        <?php if(isset($result)) : ?>
            <div class="alert alert-<?php $result["status"] === 'error' ? print("danger") : print("success") ?>">
                <?= $result["message"] ?>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-header text-center">
                <span class="h3">Login</span>
            </div>
            <div class="card-body ">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password">
                      <button type="button" onclick="togglePasswordVisibility()">
                      <i class="fas fa-eye"></i><script>
                        const passwordInput = document.getElementById("password");
                        const toggleButton = document.getElementById("togglePassword");

                        
                    </script>
                    </button>
                      
                     

                    </div>
                    <div class="d-grip gap-2">
                        <button name="login" type="submit" class="btn btn-primary" >Login</button>
                        <a href="http://home.php"></a>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="text-center">Not a user <a href="register.php">Register Now</a></div>
            </div>
        </div>
    </div>
</body>

</html>