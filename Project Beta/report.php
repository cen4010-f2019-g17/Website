<html>
    <head>
        <title>Campus Snapshot Staff</title>
        <meta name="Campus Snapshot Staff Page">
        <meta name ="Kyle Barrows, Brayan Villier">
        
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    
    <body>
       <div class="text-center">
            <h1 class="title">Report</h1>
            <p>To report an issue, please fill out all fields.</p>
            <a href="viewIssues.html">View issues</a>
        </div>
        
        <div class="container">
            <form method="post" action="report.php">
                     <div>
                        <label>Location: <input type="text" name="location" autofocus></label>
                    </div>
                     <div>
                        <label>Description: <input type="text" name="description" class="description-input" ></label>
                    </div>
                 <button type="submit" class="btn btn-primary" id="report" name="report">Report Event</button>
            </form>
        </div> 
    </body> 
</html>

<?php      
//$servername = "https://lamp.cse.fau.edu/phpMyAdmin/index.php";
$username = "cen4010fal19_g17";
$password = "p3MeukoGdT";
$dbname = "cen4010fal19_g17";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    $conn = mysqli_connect("localhost", $username, $password, $dbname); //Connect to mysql server
    if($conn-> connect_error){
        die("Connection failed: ". $conn->connect_error); //Display error message
    }
    
    $location = $_POST["location"];
    $description = $_POST["description"];
    $sql = "INSERT INTO campusSnapshot_Issues (Location, Descrition) VALUES($location, $description)";
    
    if(mysqli_query($conn, $sql))
    {
        echo "Report uploaded successfully.";
    }
    else 
    {
        echo "Error: could not upload. " .mysqli_error($conn);
    }
    
    $conn->close();
    
}
?>
