<!DOCTYPE html>
<html>
<head>
    <title>Placement Eligibility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <STYLE>
        body{
            font-family:cursive;
            background-color:yellow;
        }
     #nav{

        background-color: rgb(0, 0, 0);
      color:rgb(255, 255, 255);
       
     }
    .navlink a{
        text-decoration: none ;
        color: rgb(255, 255, 255);
        padding-left:10px;
     }
     form{
        padding-left:600px;
     }
     h2{
        text-align:center;
     }

     table,th,td{
        border:2px solid black;
     }
     </style>
</head>
<body>
<nav id="nav" class="navbar navbar-expand-lg  navbar-light  sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#home" style="color:rgb(255, 255, 255);">SNSCT</a>
            
        <div class="navlink">
          <a class="" href="http://localhost/hackathon/home.html">HOME</a>
          
    </nav> 
    
    <br>
    <br>
    <h2> Filtering of eligibility students for company</h2>
    <br>
    <form method="POST">
        <label>Minimum SSLC %:</label>
        <input type="number" name="sslc_min" step="0.01" required><br>
        <br>
        <label>Minimum HSC %:</label>
        <input type="number" name="hsc_min" step="0.01" required><br>
        <br>
        <label>Minimum UG %:</label>
        <input type="number" name="ug_min" step="0.01" required><br>
        <br>
        <label>Maximum Arrears:</label>
        <input type="number" name="max_arrears" required><br>
        <br>
        <label>Required Skills:</label>
        <input type="text" name="required_skills"><br>
        <br>
        <button type="submit" class="btn btn-danger">Check Eligibility</button><br><br>
    </form>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hackathon";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sslc_min = $_POST["sslc_min"];
        $hsc_min = $_POST["hsc_min"];
        $ug_min = $_POST["ug_min"];
        $max_arrears = $_POST["max_arrears"];
        $required_skills = $_POST["required_skills"];

        $sql = "SELECT name, regno, sslcpercentage, hscpercentage, ugpercentage, arrear, skills FROM student";
        $result = $conn->query($sql);

        echo "<center><table id='eligibilityTable'>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Reg No</th>";
        echo "<th>Eligible</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            $eligibility = "Not Eligible";

            if (
                $row["sslcpercentage"] >= $sslc_min &&
                $row["hscpercentage"] >= $hsc_min &&
                $row["ugpercentage"] >= $ug_min &&
                $row["arrear"] <= $max_arrears
            ) {
                $required_skills_array = explode(",", $required_skills);
                $student_skills = explode(",", $row["skills"]);
                
                // Check if all required skills are present in student's skills
                $skills_met = count(array_intersect($required_skills_array, $student_skills)) === count($required_skills_array);

                if ($skills_met) {
                    $eligibility = "Eligible";
                }
            }

            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["regno"] . "</td>";
            echo "<td>" . $eligibility . "</td>";
            echo "</tr>";
        }

        echo "</table></center>";
        $conn->close();
    }
    ?>
</body>
</html>
