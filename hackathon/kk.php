<!DOCTYPE html>
<html>
<head>
    <title>Student Search</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="search_query" placeholder="Enter search query">
        <button type="submit">Search</button>
    </form>

    <table id="studentTable">
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

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hackathon";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['search_query'])) {
            $search_query = $_GET['search_query'];
            $sql = "SELECT name, regno, dept, sslcpercentage, hscpercentage, ugpercentage, pgpercentage, skills, arrear FROM student WHERE name LIKE '%$search_query%' OR regno LIKE '%$search_query%'";
        } else {
            $sql = "SELECT name, regno, dept, sslcpercentage, hscpercentage, ugpercentage, pgpercentage, skills, arrear FROM student";
        }

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
    </table>
</body>
</html>
