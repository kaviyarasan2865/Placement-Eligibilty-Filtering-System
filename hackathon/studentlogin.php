<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: cursive;
            background-color: yellow;
        }

        #nav {
            background-color: rgb(0, 0, 0);
            color: rgb(255, 255, 255);
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navlink a {
            text-decoration: none;
            color: rgb(255, 255, 255);
            padding-left: 10px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        .btn-back {
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <?php
    $hostname = "localhost";
    $username = "root";
    $db_password = ""; 
    $database = "hackathon";

    $login_message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $reg_no = $_POST['reg_no'];
        $login_password = $_POST['password']; 
        $conn = new mysqli($hostname, $username, $db_password, $database); 

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM studentlogin WHERE regno = '$reg_no' AND password = '$login_password'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            header("Location: http://localhost/hackathon/form.php");
            exit();
        } else {
            $login_message = "Invalid credentials.";
        }

        $conn->close();
    }
    ?>

    <nav id="nav" class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#home" style="color:rgb(255, 255, 255);">SNSCT</a>
            <div class="navlink">
                <a class="" href="http://localhost/hackathon/home.html">HOME</a>
            </div>
        </div>
    </nav>  

    <div class="container">
        <h2 class="mt-4">Student Login</h2>
        <form class="mt-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="reg_no" class="form-label">Reg No:</label>
                <input type="text" class="form-control" id="reg_no" name="reg_no" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-danger">Login</button>
        </form>

        <a class="btn btn-danger btn-back" href="http://localhost/hackathon/login.html">Back</a>

        <p class="mt-3"><?php echo $login_message; ?></p>
    </div>
</body>
</html>
