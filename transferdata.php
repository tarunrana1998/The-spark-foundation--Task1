
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

    <style>

 
    </style>
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
<br>
<div class="container">
<h2>Transaction History</h2>

<hr>
    <table class="table text-center table-striped table-hover  table-responsive-sm thead-dark ">
    <thead class="thead-dark">
    <tr class="table-hover">
    <th>Sender</th>
    <th>Receiver</th>
    <th>Credits</th>
  
    </tr>
</thead>
<tbody>
<?php

include 'connection.php';

$q ="select * from transaction";

$query =mysqli_query($con, $q);

while($pe = mysqli_fetch_array($query))
{
    ?>
<tr>
<td class="table-info"><?php
    echo $pe['sender'];
    ?></td>

 <td class="table-info">
 <?php   
    echo $pe['receiver'];

    ?>
    </td>
    <td class="table-info"><?php
    echo $pe['amount'];

?>


<?php
}

?>
</tbody>
</table>
</div>

</body>
</html>
