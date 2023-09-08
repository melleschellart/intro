<?php
$host = "localhost";
$username = "melle";
$password = "glrwachtwoordiskut";
$database = "projecten_intro";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM Projecten WHERE id = '$id'";
    
    if ($conn->query($query) === TRUE) {
        echo "Project deleted successfully!<br>";
        echo '<a href="projecten.php">Go back to the projects page</a>';
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No project ID provided.";
}

$conn->close();
?>
