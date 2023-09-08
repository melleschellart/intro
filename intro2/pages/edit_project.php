<?php
$host = "localhost";
$username = "melle";
$password = "glrwachtwoordiskut";
$database = "projecten_intro";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM Projecten WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No project found with ID $id.";
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titel = $_POST['title'];
    $datum = $_POST['date'];
    $uitleg = $_POST['description'];

    $query = "UPDATE Projecten SET titel='$titel', datum='$datum', uitleg='$uitleg' WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "Project updated successfully!<br>";
        echo '<a href="projecten.php">Go back to the projects page</a>';
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No project ID provided.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Project</title>
</head>
<body>

<form action="edit_project.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="title">Title:</label>
    <input type="text" name="title" value="<?php echo $row['titel']; ?>" required><br><br>
    <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo $row['datum']; ?>" required><br><br>
    <label for="description">Description:</label>
    <textarea name="description" rows="4" cols="50" required><?php echo $row['uitleg']; ?></textarea><br><br>
    <input type="submit" value="Update Project">
</form>

</body>
</html>
