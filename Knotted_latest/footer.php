<div class="footer">
&copy; 2024 <span>Knotted</span> All Right Reserved
</div>
</body>
</html>


<script>
function cartCount(cartCount){
document.getElementById("cartCount").innerHTML = cartCount;
}
</script>







<?php
$cartCount = 0;
if(isset($_SESSION['userID'])){
$cartCount = $conn->query("SELECT * FROM cart INNER JOIN products ON cart.productID = products.productID WHERE userID=".$_SESSION['userID'])->num_rows;
}else{
if(isset($cartList)){
$cartCount = count($cartList);		
}else{
if(isset($_COOKIE["cart"])){
$cartData = json_decode($_COOKIE["cart"],true);
$cartCount = count($cartData);
}
}
}
echo "<script>cartCount('".$cartCount."');</script>";
?>