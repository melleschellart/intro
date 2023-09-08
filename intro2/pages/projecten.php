<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>


    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" id="nav">
      <div class="container-fluid">
        <a class="navbar-brand" href="">Mijn Portofolio</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="navbar-collapse collapse" >
          <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../root/root.html">H0me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../pages/aboutme.html">About me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" id="current" href="../pages/projecten.php">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../pages/contact.php">Contact</a>
            </li>
            

            <li id="dropdown" class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownForm" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Add Project
              </a>
              <div id="shit" class="dropdown-menu p-4" aria-labelledby="dropdownForm">
                  <form  id="background" action="../pages/add_project.php" method="post" enctype="multipart/form-data" id="form">
                      <label for="title"> <div id="labeltext"> Title:</div></label>
                      <input class="pr" type="text" name="title" required><br><br>
                      <label for="date"> <div class="label"> Date:</div></label>
                      <input class="pr" type="date" name="date" required><br><br>
                      <label for="description"> <div class="label">Description:</div></label>
                      <textarea class="pr" name="description" rows="4" cols="50" required></textarea><br><br>
                      <label for="image"> <div class="label">Image:</div></label>
                      <input class="pr" type="file" name="image" accept="image/*" required><br><br>
                      <label for="password"> <div class="label">Password:</div></label>
                      <input class="pr" type="password" name="password" required><br><br>
                      <input class="pr" type="submit" value="Add Project">
                  </form>
              </div>
          </li>
          </ul>
</nav>
          <div class="scrollable-div">
        <?php
        $host = "localhost";
        $username = "melle";
        $password = "glrwachtwoordiskut";
        $database = "projecten_intro";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM Projecten";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<h2>Projects:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h2>" . $row['titel'] .  "<br></h2>";
                echo "<p>Date: " . $row['datum'] . "</p>";
                echo "<h3>Description:</h3> <br> <p1>" . $row['uitleg'] . "</p1>";
				echo "<img class='project-image' src='data:image/jpeg;base64," . base64_encode($row['foto']) . "' width='640' height='360'>";               echo "<br clear='both'>"; 
				echo "<a href='edit_project.php?id=" . $row['id'] . "'>Edit</a>"; 
        echo "<a href='delete_project.php?id=" . $row['id'] . "'>Delete</a>";
            }
        } else {
            echo "No projects found";
        }

        $conn->close();
        ?>
    </div>
          
    <canvas id="Canvas"></canvas>
    <script src="../js/stars.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
