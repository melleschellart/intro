<?php
$host = "localhost";
$username = "melle";
$password = "glrwachtwoordiskut";
$database = "projecten_intro";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $message = $_POST["message"];
    
    // Server-side validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "Name, Email, and Message are required fields.";
    } else {
        // Sanitize and insert data using the existing database connection
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $phone = $conn->real_escape_string($phone);
        $company = $conn->real_escape_string($company);
        $message = $conn->real_escape_string($message);
        
        $query = "INSERT INTO contacts (name, email, phone, bedrijfnaam, bericht) 
                  VALUES ('$name', '$email', '$phone', '$company', '$message')";
        
        if ($conn->query($query) === TRUE) {
            // Store a success message in a session variable
            session_start();
            $_SESSION["success_message"] = "Data inserted successfully!";
            
            // Redirect back to the form page
            header("Location: contact.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
