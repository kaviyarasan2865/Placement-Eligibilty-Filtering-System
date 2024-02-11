<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Information Form</title>
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
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php

    $name = $reg_no = $department = $sslc = $hsc = $ug = $pg = $skills = $arrear = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $reg_no = $_POST['reg_no'];
        $department = $_POST['department'];
        $sslc = $_POST['sslc'];
        $hsc = $_POST['hsc'];
        $ug = $_POST['ug'];
        $pg = $_POST['pg'];
        $skills = $_POST['skills'];
        $arrear = $_POST['arrear'];

        
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "hackathon";

        
        $conn = new mysqli($hostname, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database
        $sql = "INSERT INTO student (name, regno, dept, sslcpercentage, hscpercentage, ugpercentage, pgpercentage, skills, arrear) VALUES ('$name', '$reg_no', '$department', '$sslc', '$hsc', '$ug', '$pg', '$skills', '$arrear')";

        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
        <h2 class="mt-4">Student Information Form</h2>
        <form class="mt-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row mb-3">
                <div class="col">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            

            <div class="col">
                <label for="reg_no" class="form-label">Reg No:</label>
                <input type="number" class="form-control" id="reg_no" name="reg_no" required>
            </div></div>

            <div class="row mb-3">
            <div class="col">
                <label for="department" class="form-label">Department:</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
            <div class="col">
                <label for="sslc" class="form-label">SSLC %:</label>
                <input type="number" step="0.01" class="form-control" id="sslc" name="sslc" required>
            </div></div>

            <div class="row mb-3">
            <div class="col">
                <label for="hsc" class="form-label">HSC %:</label>
                <input type="number" step="0.01" class="form-control" id="hsc" name="hsc" required>
            </div>

            <div class="col">
                <label for="ug" class="form-label">UG %:</label>
                <input type="number" step="0.01" class="form-control" id="ug" name="ug" required>
            </div></div>

            <div class="row mb-3">
            <div class="col">
                <label for="pg" class="form-label">PG %:</label>
                <input type="number" step="0.01" class="form-control" id="pg" name="pg" required>
            </div>

            <div class="col">
                <label for="skills" class="form-label">Skills:</label>
                <input type="text" class="form-control" id="skills" name="skills" required>
            </div></div>

            <div class="row mb-3">
            <div class="col">
                <label for="arrear" class="form-label">Arrear:</label>
                <input type="number" class="form-control" id="arrear" name="arrear">
            </div></div>
            <br><br>
           
            <center><button type="submit" class="btn btn-danger">Submit</button>
            </center>
            
        </form>
    </div>
</body>
</html>
