<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact</title>
</head>
<body>
<h3>Contact Me:</h3>
<p>Name: Most. Sumaia Farzana Nitu</p>
<p>Address: Dhaka Cant</p>
<p>Email: <a href="mailto:sn169779@gmail.com">sn169779@gmail.com</a></p>
<p>Number: 01988892040</p>
<p>FB Id: Sumaiya Farzana Nitu</p>
<hr>
 <?php
  $name = $email = $message = "";
  $error = "";
  $success = "";
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $name = trim($_POST["name"]);

      $email = trim($_POST["email"]);

      $message = trim($_POST["message"]);
 
      if (empty($name) || empty($email) || empty($message)) {

          $error = "All fields are required!";

      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

          $error = "Invalid email format!";

      } else {
   
          $success = "Your message has been sent successfully!";

      }
 
      if (!empty($error)) {

          echo "<script>alert('$error');</script>";

      }

      if (!empty($success)) {

          echo "<script>alert('$success');</script>";

      }

  }

  ?>
 
  <h3>Send me a Message:</h3>
<form action="" method="POST">
<input type="text" name="name" placeholder="Your Name" value="<?php echo htmlspecialchars($name); ?>" required><br><br>
<input type="email" name="email" placeholder="Your Email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>
<textarea name="message" rows="5" placeholder="Your Message" required><?php echo htmlspecialchars($message); ?></textarea><br><br>
<input type="submit" value="Send">
</form>
</body>
</html>

 