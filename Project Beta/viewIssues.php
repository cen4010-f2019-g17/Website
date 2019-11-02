<html>
    <head>
        <title>Campus Snapshot View</title>
        <meta name="Campus Snapshot Staff Page">
        <meta name ="Kyle Barrows, Brayan Villier">
        
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    
    <body>
       <div class="text-center">
            <h1 class="title">Issues</h1>
            <p>View all current issues on campus</p>
            <a href="report.html">Report an issue</a>
        </div>
        
        <table>
            <tr>
                <th>Location</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            <?php
            
            $servername = "https://lamp.cse.fau.edu/phpMyAdmin/index.php";
            $username = "cen4010fal19_g17";
            $password = "p3MeukoGdT";
            $dbname = "cen4010fal19_g17";
            
            
            $conn = mysqli_connect("localhost", $username, $password, $dbname);
            if($conn-> connect_error){
                die("Connection failed: ". $conn->connect_error);
            }
            
            $sql = "SELECT Location, Description, Status from campusSnapshot_Issues";
            $result = $conn-> query($sql);
            
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr><td>". $row["Location"] ."</td><td>". $row["Description"] ."</td><td>". $row["Status"] ."</td></tr>";
                }
            }
            else {
                echo "0 result";
            }
            
            $conn-> close();
            ?>
        </table>
    </body> 
</html>