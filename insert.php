  
<?php

include 'connection.php';?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Credits=$_POST['Credits'];

$q="INSERT INTO `list` (`Name`,`Email`, `Credits`)VALUES('$Name','$Email','$Credits')";

$query=mysqli_query($con,$q);
if($query){
	echo"<script>alert('User added successfully')</script>";
}
else{
	echo"<script>alert('User not  added successfully')</script>";
}
if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
	$emailErr="Invalid email format";
}
}
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>

body{
  background-image:url("https://cutewallpaper.org/21/plain-yellow-backgrounds/Plain-Yellow-Background-Vector-Images-over-760-.jpg");
  background-size:cover;
  
}
.container{
  margin:0 auto;

  margin-top:150px;
}
.jumbotron{
  background-color:grey;
  color:white;
}

.text-center{
  margin-top:30px;
}


</style>
</head>
<body>

  <div class="container">
<div class="jumbotron">
    <form action="insert.php" method="post" class="form-horizontal">
    <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" placeholder="Enter the name...." name="Name" required>
    <label for="Email">Email</label>
    <input type="email" class="form-control" placeholder="Enter the email...." name="Email" required>
    <label for="Credits">Credits</label>
    <input type="number" class="form-control"  placeholder="Enter the credits...." name="Credits" min="0" required>
   <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button>
   <a href="index.php" class="btn btn-info">Home</a>
   <a href="users.php" class="btn btn-success">View Users</a>
    </div></div>
    </form>
    </div>

</div>


    
</body>
</html>
