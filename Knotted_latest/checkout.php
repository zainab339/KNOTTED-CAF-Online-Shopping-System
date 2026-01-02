<?php
//Ayesha
if(isset($_SESSION['AdminID'])){
header("Location: AdminOrders.php");
}




$last_id = '';
if(isset($_POST['Checkout']) OR isset($_POST['ConfirmCheckout'])){
}else{
header("Location: index.php");	
}

	$errors = array();
	$ProductCart = array();

$cartInfo = array();

if(isset($_SESSION['userID'])){
$sql = "SELECT * FROM cart 
 INNER JOIN products ON cart.productID = products.productID 
WHERE userID=".$_SESSION['userID'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$cartInfo[] = $row;
$productID = $row['productID'];
$Quantity = $row['quantity'];
if(isset($ProductCart[$productID])){$ProductCart[$productID] += $Quantity;}else{$ProductCart[$productID] = $Quantity;}
}
foreach($ProductCart as $productID => $Quantity){
$productInfo = $conn->query("SELECT productName,productStock FROM products WHERE productID=".$productID)->fetch_assoc();
if($Quantity > $productInfo['productStock']){
$errors[] = $productInfo['productName']."Available 	".$productInfo['productStock']." IN Stock!";
}
}
} else {
  $errors[] = 'Cart Empty!';
}
}else{
if(!empty($cartList)){
foreach($cartList as $row){
$cartInfo[] = $row;
$productID = $row['productID'];
$Quantity = $row['quantity'];	
if(isset($ProductCart[$productID])){$ProductCart[$productID] += $Quantity;}else{$ProductCart[$productID] = $Quantity;}
foreach($ProductCart as $productID => $Quantity){
$productInfo = $conn->query("SELECT productName,productStock FROM products WHERE productID=".$productID)->fetch_assoc();
if($Quantity > $productInfo['productStock']){
$errors[] = $productInfo['productName']."Available 	".$productInfo['productStock']." IN Stock!";
}
}

}
}else {
  $errors[] = 'Cart Empty!';
}

}









$TotalAmount = 0;
$orderInfo = '';
if(!empty($cartInfo)){
foreach($cartInfo as $cart){
	$milkType = '';
	if(!empty($cart['milkType'])){
	$milkType = '('.$cart['milkType'].')';	
	}
$orderInfo .= '<li><span>'.$cart['quantity'].'X '.$cart['productName'].$milkType.'</span> <span>'.number_format($cart['productPrice'] * $cart['quantity'],2).'</span></li>';
$TotalAmount += $cart['productPrice'] * $cart['quantity'];
}
}



if(isset($_POST['ConfirmCheckout'])){
$MessageSuccess = '';
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Email = $_POST['Email'];
$Country = $_POST['country'];
$City = $_POST['City'];
$Address = $_POST['address'];
$PaymentMethod = $_POST['PaymentMethod'];

if(isset($_POST['EmailMeOffers'])){$EmailMeOffers = 1;}else{$EmailMeOffers = 0;}
if(isset($_SESSION['userID'])){
$userID = $_SESSION['userID'];
$sql = "INSERT INTO orders (userID,Fname,Lname,Email,EmailMeOffers,Country,City,Address,PaymentMethod,OrderSummary,TotalAmount)
VALUES ('$userID', '$Fname','$Lname','$Email','$EmailMeOffers','$Country','$City','$Address','$PaymentMethod','$orderInfo','$TotalAmount')";
if ($conn->query($sql) === TRUE) {
  $MessageSuccess = "<h1>Thank you for your purchase</h1>";
 $last_id = "#".$conn->insert_id;
$conn->query("DELETE FROM cart WHERE userID=".$userID);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}else{
$ordersData = array();
if(isset($_COOKIE["orders"])){
$ordersData = 	json_decode($_COOKIE["orders"],true);
}
$randomKey = rand(0,999999999);
$ordersData[$randomKey]['orderID'] = $randomKey;
$ordersData[$randomKey]['Fname'] = $Fname;
$ordersData[$randomKey]['Lname'] = $Lname;
$ordersData[$randomKey]['Email'] = $Email;
$ordersData[$randomKey]['country'] = $Country;
$ordersData[$randomKey]['City'] = $City;
$ordersData[$randomKey]['address'] = $Address;
$ordersData[$randomKey]['PaymentMethod'] = $PaymentMethod;
$ordersData[$randomKey]['OrderSummary'] = $orderInfo;
$ordersData[$randomKey]['TotalAmount'] = $TotalAmount;



$cookie_value = json_encode($ordersData,true);
setcookie('orders', $cookie_value, $cookieExpire, "/"); // 86400 = 1 day
 $last_id = "#".$randomKey;
setcookie('cart', '', time()-1000, '/'); 
$cartList = array();
}

foreach($ProductCart as $productID => $Quantity){
$conn->query("UPDATE products SET productStock=productStock-$Quantity WHERE productID=$productID");
}

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
                height: 150px;}
            
             .square2 {
                background-color: white;
                border-radius: 25px;
                border: 2px;
                padding: 10px; 
                margin-left: 10px;
                margin-top: 20px;
                margin-bottom: 10px;
                width: 400px;
				}
            
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
                }
            
            
            
            .button2 {
                background-color: #FFF89A;
                border-radius: 15px;
                margin-top: 20px;
                padding: 5px;
                padding-left: 40px;
                padding-right: 40px;

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

		
<?php if(empty($errors)){ 
if(!isset($_POST['ConfirmCheckout'])){ ?>
            <form class="square" action="" method="POST">
        <div>
            <h3 style="text-align: center;">Shipping Information</h3>
                <label for="Fname">First Name:</label>
                <input  type="text"  name="Fname" required>
				<br>
                <label for="Lname">Last Name:</label>
                <input type="text" name="Lname" required>
                <br>

                <label for="email">Email:</label>
                <input placeholder="Email" type="email" name="Email" value="" required />
                <br>
                
                <input type="checkbox" name="EmailMeOffers">
                <label for="checkbox">Email me with offers</label>
                <br>

                <label for="address">Address</label>
                <input  type="search" name="address" required placeholder="123 street..">
                <br>

                <label for="Country">Country</label>
                <select name="country" >
                <option>Saudi Arabia</option>
            </select>

            <label for="City">City</label>
                <select name="City" >
                <option>Khobar</option>
                <option>Dammam</option>
            </select>
        </div>
        
        <div class = "square2">
            
            <h4>Payment</h4>  
               <label><input type="radio" name="PaymentMethod" value="Cash on delivery" checked >Cash on delivery</label>
               <label><input type="radio" name="PaymentMethod" value="Credit Card">Credit Card</label> 
        </div>
<?php } ?>
        <div class="square3">
            <h4>Order Summary <span><?php echo $last_id;?></span></h4>
            <ul>
<?php
echo nl2br($orderInfo);
?>
                <li>Total amount: <span><?php echo number_format($TotalAmount,2);?> SAR</span></li>
            </ul>
			
<?php if(!isset($_POST['ConfirmCheckout'])){ ?>
        <button class="button2" type="submit" name="ConfirmCheckout"><h2>Pay Now</h2></button>
<?php } ?>
        </div>

              </form>

<?php
}else{
	echo '	<div class = "square2"><div><ul>';
	foreach ($errors as $error){
echo '	
	<li>'.$error.'</li>
	';
}
echo "</ul></div><br><a href='cart.php'> Back To Cart</a>";
echo '</div>';
}


?>