  
<?php
include 'connection.php';

if(isset($_POST['done']))
{
    $from = $_GET['Id'];
    $to = $_POST['to'];
    $amt = $_POST['amount'];
    $q = "SELECT * from list where Id=$from";
    $query = mysqli_query($con,$q);
    $q1 = mysqli_fetch_array($query);
    $q = "SELECT * from list where Id=$to";
    $query = mysqli_query($con,$q);
    $q2 = mysqli_fetch_array($query);


 if($amt > $q1['Credits'])
    {

        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Insufficent Balance!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hIdden="true">&times;</span>
        </button>
      </div>';
    }
    
 
    else {
        

        $newCredit = $q1['Credits'] - $amt;
        $q = "UPDATE list set Credits=$newCredit where Id=$from";
        mysqli_query($con,$q);
     


        $newCredit = $q2['Credits'] + $amt;
        $q = "UPDATE list set Credits=$newCredit where Id=$to";
        mysqli_query($con,$q);
           
        $sender = $q1['Name'];
        $receiver = $q2['Name'];
        $q = "INSERT INTO `transaction`(`sender`,`receiver`, `amount`) VALUES ('$sender','$receiver','$amt')";
        $tns=mysqli_query($con,$q);
        if($tns){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Transaction sucessfull!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hIdden="true">&times;</span>
            </button>
          </div>';
        }
       
        $newCredit= 0;
        $amt =0;
       
     
    }
    
}
?>

<html>
    <head>
        <title>Transaction</title>
       
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<style>
     
.jumbotron{
    background-color:#F7DC6F ;
    color:black;
    margin-top:4rem;;
	margin-left:3rem;
	margin-right:3rem;
}

.btn{
    margin-top:3rem;
	}




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
    <div class="jumbotron">
 


<h2>Transaction</h2>
        <form method="post" name="tcredit"><br/>
            <?php
                include 'connection.php';
                $sId=$_GET['Id'];
                $q = "SELECT * FROM  list where Id=$sId";
                $query=mysqli_query($con,$q);
                if(!$query)
                {
                    echo "Error ".$q."<br/>".mysqli_error($con);
                }
                $res=mysqli_fetch_array($query);
            ?>
            <label> <b>From</b> </label><br/>

            <table class="table text-center table-striped table-bordered">

            <tr class="table-hover">
            <th class="table-active">
            Name</th>
            <th class="table-active">Email</th>
            <th class="table-active">Credits</th>
            </tr>

            <tr>
            <td class="table-info">
            <?php echo $res['Name'];?></td>
                    <td class="table-info"><?php echo $res['Email'] ;?></td>
    
                   <td class="table-info"> <?php echo $res['Credits'] ;?></td>

                   </tr>
            
            </table>
              
            <label>To</label>
            <select class=" form-control" name="to" style="margin-bottom:5%;">
            <option value="" disabled selected> To </option>
            <?php
                include 'connection.php';
                $sId=$_GET['Id'];
                $q = "SELECT * FROM list where Id!=$sId";
                $query=mysqli_query($con,$q);
                if(!$query)
                {
                    echo "Error ".$q."<br/>".mysqli_error($con);
                }
                while($res = mysqli_fetch_array($query)) {
            ?>
                <option class="table text-center table-bordered table-striped table-dark" value="<?php echo $res['Id'];?>">
                
    

           <?php echo $res['Name'] ;?> &nbsp
              <?php echo $res['Email'] ;?> &nbsp
                
               <?php echo $res['Credits'] ;?> 
               
                

                </option>
            <?php } ?>
            </select> <br>
            <label>Amount</label>
            <input type="number" Id="amm" class="form-control" name="amount" min="0" required/> 
            
  
            
            <button class="btn btn-info text-center" name="done" type="submit" >Transfer</button>
            <a href="users.php" class="btn btn-success"> View Users</a>
        </form>
    </div>
    </body>
</html>
