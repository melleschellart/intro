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

  

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example" id="nav">
    <div class="container-fluid">
      <a class="navbar-brand" href="">Mijn Portofolio</a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarsExample03" >
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../root/root.html">H0me</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../pages/aboutme.html">About me</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../pages/projecten.php">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" id="current" href="../pages/contact.php">Contact</a>
          </li>
          

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownForm" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Add Project
            </a>
            <div id="shit" class="dropdown-menu p-4" aria-labelledby="dropdownForm">
                <form  id="background"  action="add_project.php" method="post" enctype="multipart/form-data" id="form">
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
        
      </div>
    </div>
  </nav>
  <?php
    session_start();
    if (isset($_SESSION["success_message"])) {
        echo '<div style="color: green;">' . $_SESSION["success_message"] . '</div>';
        unset($_SESSION["success_message"]);
    }
    ?>
    
  

    <form action="submit_form.php" method="POST" id="contact"> 
  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" id="email" class="form-control">
    </div>
  </div>
  <div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" id="name" class="form-control">
    </div>
  </div>

  <div class="row mb-3">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="tel" name="phone" id="phone" class="form-control">
    </div>
  </div>

  <div class="row mb-3">
    <label for="company" class="col-sm-2 col-form-label">Company</label>
    <div class="col-sm-10">
      <input type="text" name="company" id="company" class="form-control">
    </div>
  </div>

  <div class="row mb-3">
    <label for="message" class="col-sm-2 col-form-label">Message</label>
    <div class="col-sm-10">
      <textarea name="message" rows="5" id="message" ></textarea>
    </div>
  </div>

  <button type="submit" value="Submit" class="btn btn-primary">Send</button>
</form>
    </div>
      
    
    
    <canvas id="Canvas"></canvas>
    <script src="../js/stars.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>