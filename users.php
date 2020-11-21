
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style.css" rel="stylesheet" type="text/css">
    <title>Document</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


   
   

   
</head>
<body>
<header>
<div class="header_menu">
<div class="logo">
<img src="https://www.thesparksfoundationsingapore.org/images/logo_small.png" alt="splogo">
</div>
<div class="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="contact.html">Contact us</a></li>
</ul>
</div>
</div>
<div class="container">
<br>
 <h1>All users
 </h1>

 <hr>
.
 <a href="insert.php" class="btn btn-success text-center"> Add Users</a>
 <br><br>
 
 <div class="table-responsive-sm">
  <table class="table text-center table-striped  table-bordered">
  <thead class="thead-dark">
    <tr class="table-hover">
    <th class="th-sm">Name</th>
    <th class="th-sm">Email</th>
    <th class="th-sm">Credits</th>
    <th class="th-sm"> Process</th>
    </tr>
</thead>
<?php

include 'connection.php';

$q ="select * from list";

$query =mysqli_query($con, $q);

while($pe = mysqli_fetch_array($query))
{
    ?>
<tr>
<td class="table-info"><?php
    echo $pe['Name'];
    ?></td>

 <td class="table-info">
 <?php   
    echo $pe['Email'];

    ?>
    </td>
    <td class="table-info"><?php
    echo $pe['Credits'];

?>
</td>
<td class="table-info"><a href="transfer.php?Id= <?php echo $pe['Id'] ;?>"class="text-red"> <button type="button" class="btn btn-success">Transfer</button></a></td>



<?php
}

?>
</tbody>
</table>
</div>
</div>

</header>
</body>
</html>
