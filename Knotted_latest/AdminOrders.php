<?php
$pageTitle = "Control Panel - Order history";
include 'header.php';

// if(!isset($_SESSION['AdminID'])){
// header("Location: index.php");
// }


if(isset($_GET['Delete']) AND isset($_GET['id'])){
$id = $_GET['id'];
$conn->query("DELETE FROM orders WHERE orderID=$id");	
echo ("<script>alert('The Order has been successfully deleted');</script>");
}

?>




        <style>
            
            * {
            font-family: "work-sans", "sans-serif";
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
            transition: .2s linear;
        }
 
        html{
            height: 100%;
        }
            
            body { 
                font-family: "work-sans", "sans-serif";
                min-height: 100%;
                display: flex;
                flex-direction: column;
            }
            
            


            
            .square {
                background-color: white;
                border-radius: 25px;
                border: 2px;
                padding: 10px; 
                margin-left: 10px;
                width: 400px;
				 text-align: left;

				}
            
             .square2 {
                background-color: white;
                border-radius: 25px;
                border: 2px;
                padding: 10px; 
                margin-left: 10px;
                margin-top: 20px;
                margin-bottom: 10px;
                width: 400px;
                height: 150px;}
            
            .square3 {
                background-color: white;
                position: absolute; 
                 top: 200px; 
                 left: 500px; 
                border-radius: 25px;
                border: 2px ;
                padding: 20px; 
                margin-top: 20px;
                width: 400px;
                height: 150px;}
            
            
            
            .button2 {
                background-color: #FFF89A;
                border-radius: 15px;
                position: absolute; 
                margin-top: 20px;
                padding: 5px;
                padding-left: 40px;
                padding-right: 40px;
                 top: 400px; 
                 left: 650px;
                border: none;
                font-size: 10px; 
            }
            
              .footer {
            background-color: #faedcb;
            color: #c3452b;
            padding: 30px 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: auto;
        }

        .footer span {
            font-weight: bold;
            color: #FFBE98;
        }

        .header {
            padding: 20px;
            height: 100px;
        }


               .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        .cart .login {
            color: black;}
            
        /*.footer{
            margin-top: auto;
        }*/
.button1 {
                background-color: pink;
                border-radius: 15px;
                padding: 5px;
                border: none;
                font-size: 10px; 
                text-decoration: none;
  text-decoration: none;
  color: black;

}             
h1 {
      margin-bottom: 1rem;
      margin-top: 0;
      text-align: center;
      color: #D78180;
    }
    </style>
    <main>
<center>
    <br>
    <h1>Order history</h1>
	<br>
    <hr>
	
	
<?php
$sql = "SELECT * FROM orders ORDER BY orderID DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  if($row['EmailMeOffers'] == 1){
		  $EmailMeOffers = 'Yes';
	  }else{
		  $EmailMeOffers = 'No';
	  }

echo '
<div class="square">
<h4>Order Summary <span>#'.$row['orderID'].'</span></h4>
<h5>'.$row['Email'].'|'.$row['Fname'].' '.$row['Lname'].' Email Offers : '.$EmailMeOffers.'</h5>
<h5>'.$row['Country'].'|'.$row['City'].'|'.$row['Address'].'</h5>
<ul>
'.nl2br($row['OrderSummary']).'
</ul>
<h4>Total amount: <span>'.number_format($row['TotalAmount'],2).'SAR</span></h4>
<h5>Payment Method: '.$row['PaymentMethod'].'</h5>
    <a href="?Delete&id='.$row['orderID'].'" class="button1"><b>Delete</b></a>

</div>
<br>
';

  }
} else {
  echo "<div class='square'>You do not have any orders!.</div>";
}

?>

</center>
</main>
<?php
include 'footer.php';
?>