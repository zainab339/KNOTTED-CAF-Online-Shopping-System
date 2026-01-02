 <?php

 $pageTitle = 'Shopping Cart';
include 'header.php';


if(isset($_SESSION['AdminID'])){
header("Location: AdminOrders.php");
}

$cartList = array();

if(!isset($_SESSION['userID'])){
if(isset($_COOKIE["cart"])){
$cartData = json_decode($_COOKIE["cart"],true);

foreach($cartData as $key => $row){

$cartList[$key] = $conn->query("SELECT * FROM products WHERE productID=".$row['productID'])->fetch_assoc();
$cartList[$key]['cartID'] = $key;
$cartList[$key]['milkType'] = $row['milkType'];
$cartList[$key]['quantity'] = $row['quantity'];
}
}	

}


if(isset($_POST['UpdateQuantity'])){
if(isset($_POST['Quantities'])){
foreach($_POST['Quantities'] as $cartID => $Quantity){	
if($Quantity <= 0 ){
if(isset($_SESSION['userID'])){$conn->query("DELETE FROM cart WHERE cartID=".$cartID);}
if(!isset($_SESSION['userID'])){unset($cartList[$cartID]);}

echo "<hr>";
}else{
if(isset($_SESSION['userID'])){$conn->query("UPDATE cart SET quantity='$Quantity' WHERE cartID=".$cartID);}
if(!isset($_SESSION['userID'])){$cartList[$cartID]['quantity'] = $Quantity;}
}

}

echo ("<script>alert('The Cart has been updated successfully');</script>");
if(!isset($_SESSION['userID'])){
$cookie_value = json_encode($cartList,true);
setcookie('cart', $cookie_value, $cookieExpire, "/"); // 86400 = 1 day
}
}
}



if(isset($_POST['DeleteCartItem'])){
$cartID = $_POST['DeleteCartItem'];
if(isset($_SESSION['userID'])){$conn->query("DELETE FROM cart WHERE cartID=".$cartID);}
if(!isset($_SESSION['userID'])){
	unset($cartList[$cartID]);
$cookie_value = json_encode($cartList,true);
setcookie('cart', $cookie_value, $cookieExpire, "/"); // 86400 = 1 day	
	}
}


if(isset($_POST['delAllCart'])){
if(isset($_SESSION['userID'])){$conn->query("DELETE FROM cart WHERE userID=".$_SESSION['userID']);}
if(!isset($_SESSION['userID'])){
setcookie('cart', '', time()-1000, '/');
$cartList = array();
	}	
}
$TotalAmount = 0;


if(isset($_SESSION['userID'])){
$sql = "SELECT * FROM cart 
 INNER JOIN products ON cart.productID = products.productID 

WHERE userID=".$_SESSION['userID'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
$cartList[] = $row;	  
	  
  }
}
}
	

	




if(isset($_POST['Checkout']) OR isset($_POST['ConfirmCheckout'])){
include 'checkout.php';
}else{
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

            body{
    
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
  
  }
  main{
      flex: 1;
  }
  h1 {
      margin-bottom: 1rem;
      margin-top: 0;
      text-align: center;
      color: #D78180;
    }
           
            
       
            
            table {
              width: 80%;
              margin-left: 90px;
              }
            
           td {
               text-align: center;
               padding: 15px; }     
                
            th, td {
           border-bottom: 1px solid #ddd;}
            
            
                 .button1 {
                
                /* border-radius: 15px; */
                margin-top: 20px;
                margin-bottom: 10px;
                padding: 5px;
                padding-left: 40px;
                padding-right: 40px;
                border: none;
                /* font-size: 10px;  */
                text-decoration: none;
                /* width: 100%; */
                font-weight: bold;
                font-size: 1.1rem;
                border-radius: 30px;
               
                color: #c3452b;
                height: 50px;
                width:250px ;
                background-color: #faedcb;
      
            }
            
            .button1:hover , .button_delAllCart:hover {
                box-shadow: 0 5px 10px 0 rgba(0,0,0,0.24);
                cursor: pointer;
                color: white;
            }
            .button1:hover{
                /* background-color: #FFF89A; */
                color: #D78180;
            }
               .button2 {
                
                /* background-color: #F2D8D8; */
                
                width: 250px;
                height: 40px;
                background-color: #FFBE98;
                color: #c3452b;
                border-radius: 15px;
                
                margin-bottom: 10px;
                padding: 5px;
                padding-left: 40px;
                padding-right: 40px;
                border: none;
                font-size: 10px;
                text-decoration: none;
                font-weight: bold;
                font-size: 1.1rem;
                border-radius: 30px;
                
            }
            .button2:hover {
                
      color: white;
      box-shadow: 0 5px 10px 0 rgba(0,0,0,0.24);
      cursor: pointer;
    }
            a{
                color: #c3452b;
            }
            
            a:hover{
                color: white;
            }
            
            .footer {
            background-color: #faedcb;
            color: #c3452b;
            padding: 30px 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
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
 
.button_del {
                background-color: pink;
                /* border-radius: 25px; */
                padding: 5px;
                border: none;
                width: 100px;
                height: 30px;
                /* font-size: 10px;  */
                /* text-decoration: none;
  text-decoration: none; */
  color: white;
  font-weight: bold;
                font-size: 1.1rem;
                border-radius: 30px;

} 
.button_del:hover{
    cursor: pointer;
    box-shadow: 0 5px 10px 0 rgba(0,0,0,0.24);
    color: black;
    
}   
.saveButtons{
    border-radius: 2px;
    font-weight: bold;
    color: #D78180;
}
.saveButtons:hover{
    cursor: pointer;
}


.orderAmt{
    height: 60px;
    text-align:right;
    font-size: 1.1rem;
}

.button_delAllCart{
	                padding: 5px;
                    background-color: #FFBE98;
                color: #c3452b;
                
                margin-bottom: 10px;
                padding: 5px;
                padding-left: 40px;
                padding-right: 40px;
                border: none;
                font-size: 10px;
                text-decoration: none;
                font-weight: bold;
                font-size: 1.1rem;
                border-radius: 30px;
                width: 200px;
                height: 40px;
				
}
        
        </style>
    <body>
        <main>
<form action="" method="POST">
<div class="productTable">

    <br>
    <h1 style="text-align: center;">Shopping Cart</h1>
    <hr>
<!--table showing products added to cart-->
<table>
    <thead>
        <tr>
		    <th>PIC</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
<?php
if (!empty($cartList)) {
  // output data of each row
  foreach($cartList as $row){
echo '
        <tr>
            <td> <img src="Images/'.$row['productPIC'].'" width="100" height="100"alt="'.$row['productName'].'" /></td><td>'.$row['productName'].'<br>'.$row['milkType'].'</td>
            <td> <input type="number" min="0" max="'.$row['productStock'].'" name="Quantities['.$row['cartID'].']" value="'.$row['quantity'].'" /></td>
            <td>'.$row['quantity'] * $row['productPrice'].'</td>
<td>
<button class="button_del" type="submit" name="DeleteCartItem" value="'.$row['cartID'].'"><b>Delete</b></button>
</td>
        </tr>
';
$TotalAmount += $row['quantity'] * $row['productPrice'];
		}

?>
    </tbody>
    <tfoot>
        <tr class="orderAmt">
            <th>Total Order Amount</th>
            <th></th>
            <th ><?php echo $TotalAmount;?> SAR</th>
        </tr>
    </tfoot>
    
 <?php
} else {
  echo "<tr><td colspan='4'>Your shopping cart is empty.</td></tr>";
}
?>   
</table>
</div>


<!--Total amount + checkout and continue shopping buttons-->
<div class="orderAmount">
    <center>
        <div >
    <button type="submit" name="UpdateQuantity" class="saveButtons">Save Updated Quantity</button>
	<br>
    <br>
    <!-- <button type="submit" name="Checkout" class = "button1">Checkout Now</button> -->
    
	<button class = "button_delAllCart" type="submit" name="delAllCart">Empty Cart</button>
	
    <button class = "button2"><a href="index.php" style = "text-decoration: none;">Continue shopping</a></button>
    
<br>
<button type="submit" name="Checkout" class = "button1">Checkout Now</button></div>
</center>
</div>

	</form>
    </main>
    </body>
<?php
}
include 'footer.php';
?>