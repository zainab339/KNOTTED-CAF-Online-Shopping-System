<?php
$pageTitle = 'Product details';
include 'header.php';

if(isset($_SESSION['AdminID'])){
header("Location: AdminOrders.php");
}

$productID = $_GET['id'];
$sql = "SELECT * FROM Products WHERE productID=".$productID;
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  // output data of each row
$productInfo = $result->fetch_assoc();
} else {
  header("Location: index.php");
}




if(isset($_POST['AddToCart'])){
$MessageSuccess = "<script>alert('Added to Cart Successfully');</script>";

$milkType = '';
$quantity = $_POST['quantity'];
if(isset($_POST['milkType'])){
$milkType = $_POST['milkType'];
}

if(isset($_SESSION['userID'])){
$userID = $_SESSION['userID'];
$sql = "INSERT INTO cart (productID , milkType, quantity, userID)
VALUES ('$productID', '$milkType', '$quantity', '$userID')";

if ($conn->query($sql) === TRUE) {
echo $MessageSuccess;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
} // End isset session user id	
else{
$cartList = array();
if(isset($_COOKIE["cart"])){
$cartList = 	json_decode($_COOKIE["cart"],true);
}
$randomKey = rand(0,999999999);
$cartList[$randomKey]['productID'] = $productID;
$cartList[$randomKey]['milkType'] = $milkType;
$cartList[$randomKey]['quantity'] = $quantity;

$cookie_value = json_encode($cartList,true);
setcookie('cart', $cookie_value, $cookieExpire, "/"); // 86400 = 1 day
echo $MessageSuccess;
}
} // End if isset $_POST['AddToCart']





?>            
<style>
  body{
    background-color: whitesmoke;
  }
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  
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
h1{
  font: 500 1rem, sans-serif;
  /* color: #D78180; */
  color: #c3452b;
  margin-top: 0;
  
}

/* The Close Button */
.close {
  color: black;
  float: right;
  background-color: white;
  font-size: 28px;
  font-weight: bold;
  border-radius: 10px;
}

.close:hover,
.close:focus {
  color: #c3452b;
  text-decoration: none;
  cursor: pointer;
}

.button1 {
                background-color: pink;
                border-radius: 15px;
                padding: 10px;
                border: none;
                font-size: 24px; 
                text-decoration: none;
  
  color: black;

}
.button1:hover{
  box-shadow: 0 5px 10px 0 rgba(0,0,0,0.24);
  cursor: pointer;
}
.square{
  background-color: #faedcb;
  width: 400px;
  max-width: 400px;
      margin: 1rem;
      padding: 2rem;
      font: 500 1rem, sans-serif;
      border-radius: 15px;
      margin-bottom: 0;
      
      color: #D78180;
}
.pdesc{
      font: 500 1rem;
      font-family: Georgia, 'Times New Roman', Times, serif;
      
}
.addCart{
 
      font-weight: bold;
      font-size: 1.1rem;
      color: #D78180;
      background-color: #faedcb;
      
      
}
.addCart:hover{
  color: #c3452b;
  cursor: pointer;
}
.myBtn {
/* background-color: gray; */
text-decoration: none;
  
  color: #D78180;
  font-size: 1.1rem;
}
.myBtn:hover {
/* background-color: gray; */
color: black;
  
}

.pImg{
  border-radius: 10px;
  width: 400px;
  height: 300px;
  
}
h3,h5,.price{
  font: 500 1rem, sans-serif;
  margin-top: 1rem;
  margin-bottom: 1rem;
}

</style>  

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><h3>Need Help?</h3></p>
	<br>
	<p><h5>If you have any questions or need assistance, please feel free to contact us.</h5></p>
	<br><br><br>
<a href="contactus.php" class="button1"><b>Contact Us</b></a>	
<button class="close">Close</button>
  </div>
</div>

                   
 <center>           
                <main class="container">
                    <div class="left-column">
                        <img class = "pImg" src="Images/<?php echo $productInfo['productPIC'];?>"alt="<?php echo $productInfo['productName'];?>">  <!-- This is temp. Img will be displayed from DB -->
                    </div>
                    <div class = "square">
                        <div>
                             
                            
                            <h1> <?php echo $productInfo['productName'];?> </h1> <!-- temp code. All product details will be displaed from DB -->
                            <hr>
                            <p class = "pdesc"><?php echo $productInfo['productDescription'];?></p>
                            <hr>
                          </div>
                        <div class="product-configuration">
<form action='' method="POST">
                            <div>
<?php if($productInfo['productCategory'] == 'Coffee'){ ?>
                              <span>Milk type</span>
                                  <div class="milk-choose">
                                      <select name="milkType">
                                        <option value="Regular">Regular</option>
                                        <option value="Almond">Almond</option>
                                        <option value="Oat">Oat</option>
                                    </select>
                                  </div>
<?php } ?>

<br>
												<span class = "price">Price : <?php echo $productInfo['productPrice'];?>SAR</span>
						<br>
                          
                          <div class="product-price">
<?php if($productInfo['productStock'] > 0){ ?>
                            <span>Quantity <input type="number" min="1" max="<?php echo $productInfo['productStock'];?>" name="quantity" value="1" /></span>
							  <br>
                <button type="submit" class="addCart" name="AddToCart">Add to Cart</button>
							  



<?php }else{ echo "<b>Out of Stock</b>";} ?>      
| <a href="#" id="myBtn" class="myBtn">Help</a>
                        </div>
                         </div>  
</form>
                            </div>
                      </div>
                  </main>
<?php
include 'footer.php';
?>





<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span0 = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span0.onclick = function() {
  modal.style.display = "none";
}

span1.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>