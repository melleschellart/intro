<?php
$host = "localhost";
$username = "melle";
$password = "glrwachtwoordiskut";
$database = "projecten_intro";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT titel FROM Projecten";
$result = $conn->query($query);
$projectTitles = array();

while ($row = $result->fetch_assoc()) {
    $projectTitles[] = $row['titel'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>
</head>
<body>
    

    
</body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectTitle = $_POST['project'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $image = $_FILES['image']['tmp_name'];
    $imageData = addslashes(file_get_contents($image));
    $password = $_POST['password'];
    
    $correctPassword = "glrwachtwoordiskut";
    
    if ($password !== $correctPassword) {
        die("Incorrect password. Access denied.");
    }
    
    $query = "INSERT INTO Projecten (titel, datum, uitleg, foto) VALUES ('$projectTitle', '$date', '$description', '$imageData')";
    
    if ($conn->query($query) === TRUE) {
        echo "Project added successfully!<br>";
        echo '<a href="../root/root.html">Go back to the site</a>';
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
