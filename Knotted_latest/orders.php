<?php

$pageTitle = "Order history";
include 'header.php';

if(isset($_SESSION['AdminID'])){
header("Location: AdminOrders.php");
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
            
    </style>
<center>

    <h3 style="text-align: center;">Order history</h3>
	<br>
    <hr>
	
	
<?php
$ordersInfo = array();
if(isset($_SESSION['userID'])){
$sql = "SELECT * FROM orders WHERE userID=".$_SESSION['userID'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$ordersInfo[] = $row;
  }
}
}else{
if(isset($_COOKIE["orders"])){
$ordersInfo = 	json_decode($_COOKIE["orders"],true);
}
}



if(!empty($ordersInfo)){	
foreach($ordersInfo as $row){
echo '
<div class="square">
<h4>Order Summary <span>#'.$row['orderID'].'</span></h4>
<ul>
'.nl2br($row['OrderSummary']).'
<li>Total amount: <span>'.number_format($row['TotalAmount'],2).'SAR</span></li>
</ul>
</div>
<br>
';
}
}else {
  echo "<div class='square'>You do not have any orders!.</div>";
}








?>

</center>
<?php
include 'footer.php';






?>