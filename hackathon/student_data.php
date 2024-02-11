<!DOCTYPE html>
<html>
<head>
    <title>Student Data</title>
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

        h2 {
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border: 2px solid black;
        }

        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#home" style="color:rgb(255, 255, 255);">SNSCT</a>
            <div class="navlink">
                <a class="" href="http://localhost/hackathon/home.html">HOME</a>
            </div>
        </div>
    </nav> 

    <br><br>
    <div class="container">
        <h2>Student Marks and Skills Details</h2>
        <br> 
        <br> 
        <center>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Reg No</th>
                        <th>Department</th>
                        <th>SSLC %</th>
                        <th>HSC %</th>
                        <th>UG %</th>
                        <th>PG %</th>
                        <th>Skills</th>
                        <th>Arrear</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "hackathon"; 

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT name, regno, dept, sslcpercentage, hscpercentage, ugpercentage, pgpercentage, skills, arrear FROM student"; 
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["regno"] . "</td>";
                        echo "<td>" . $row["dept"] . "</td>";
                        echo "<td>" . $row["sslcpercentage"] . "</td>";
                        echo "<td>" . $row["hscpercentage"] . "</td>";
                        echo "<td>" . $row["ugpercentage"] . "</td>";
                        echo "<td>" . $row["pgpercentage"] . "</td>";
                        echo "<td>" . $row["skills"] . "</td>";
                        echo "<td>" . $row["arrear"] . "</td>";
                        echo "</tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </center>
        <br> 
        <br> 
        <center>
            <button class="btn btn-danger"><a href="http://localhost/hackathon/elegibility.php" style="text-decoration:none;color:white;">Filtering of Eligible Students</a></button>
        </center>
    </div>
</body>
</html>
