<?php
include_once "includes/db.php";

if(isset($_POST['name']))
{
  $name = user_input($_POST['name']);
  $email = user_input($_POST['email']);
  $message = user_input($_POST['message']);

  $name = ucwords($name);

  if(empty($name) || empty($email) || empty($message))
  {
    echo "Please fill all fields";
  }
  else if(!preg_match("/^[a-zA-z\s]*$/", $name))
  {
    echo "Name should be in letters only";
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    echo "Enter valid Email";
  }
  else
  {
    $query = "INSERT INTO feedback (name, email, message, datemade) VALUES ('$name', '$email', '$message', now());";
    $result = mysqli_query($conn, $query);

    if($result)
    {
      echo "success";
    }
    else
    {
      echo "Unable to process request";
    }
  }
}
else {
  header('Location: index.php');
  exit();
}
?>
