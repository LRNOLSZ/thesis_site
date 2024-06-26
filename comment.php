<?php
// Start session (if not already started)
session_start();

// Include database connection
include("connections.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs (in this case, just the comment)
    $comment = htmlspecialchars($_POST['comment']); // You can add more sanitization as needed

    // Assuming you have user_id in session (modify as per your authentication method)
     $user_id = $_SESSION['user_id'];

    // Database insert query
    $query = "INSERT INTO comments (user_id, comment) VALUES (?, ?)";

    // Prepare and bind parameters
    $stmt = $con->prepare($query);
    $stmt->bind_param("is", $_SESSION['user_id'], $comment);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page or do something else if needed
        header("Location: user3.php");
        exit();
    } else {
        // Handle errors
        echo "Error: " . $con->error;
    }

    // Close statement and database connection
    
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave a Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: var(--secondary-color2);
        }
        .comment-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: var(--primary-color1);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        :root {
  --primary-color1: #D9985F; /* Blue */
  --secondary-color2: #91B7D9; /* Gray */
   /* Yellow */
  --primary-color4: #454743;
}
.navbar{
    background-color: var(--primary-color1)
}
    </style>
    <!--fa icons-->
  <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>

<!-- Box icons -->
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
<nav class=" cd navbar navbar-expand-lg ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bx bx-bowl-rice bx-md"></i><span>RMS</span>
        </a>
        <button class=" ms-auto navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="   collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="user3.php" alt="home" ><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>


            
          </ul>

        </div>
      </div>
    </nav>
<div class="container">
    <div class="comment-form">
        <h1 class="text-center mb-4">Leave a Comment</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" class="form-control" rows="5" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
