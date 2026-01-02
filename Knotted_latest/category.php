<?php

if(!isset($_GET['category'])){
header("Location: index.php");
}

$category = $_GET['category'];

$pageTitle = $category;



include 'header.php';

if(isset($_SESSION['AdminID'])){
header("Location: AdminOrders.php");
}
?>  
<style>
body{
    
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
  
  }
  main{
      flex: 1;
  }
  
</style>

<body>
    <main>
    <div class="container">
        <div class="card">
		
<?php
$sql = "SELECT * FROM products WHERE productCategory='".$category."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
            <div class="card-content">
                <img src="Images/<?php echo $row['productPIC'];?>" alt="<?php echo $row['productName'];?>">
                <h3><?php echo $row['productName'];?></h3>
                <p><?php echo $row['productPrice'];?>SR</p>
                <a href="ProductDetails.php?id=<?php echo $row['productID'];?>">
                    <button class="btn btn-outline-success" type="button">View Product</button></a>
            </div>

<?php }
} else {
echo ' 0 results';
}
?>

        </div>
    </div>
    </main>
</body>
<?php
include 'footer.php';
?>