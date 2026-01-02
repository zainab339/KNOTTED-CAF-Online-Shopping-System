<?php



$pageTitle = "Product Management";
include 'header.php';

if(!isset($_SESSION['AdminID'])){
header("Location: index.php");
}




if(isset($_GET['Delete']) AND isset($_GET['id'])){
$productID = $_GET['id'];
$conn->query("DELETE FROM products WHERE productID=$productID");	
echo ("<script>alert('The product has been successfully deleted');</script>");
}


if(isset($_POST['Edit'])){
$products = $_POST['products'];

if(!empty($_POST['products'])){
foreach($_POST['products'] as $productID => $value){
	$price = $value['productPrice'];
	$stock = $value['productStock'];
$conn->query("UPDATE products SET productPrice='".$price."',productStock='$stock' WHERE productID=$productID");	
}
echo ("<script>alert('The changes have been saved successfully');</script>");

}	
}
?>


<style>
.square3 {
                background-color: white;
                border-radius: 25px;
                border: 2px ;
                padding: 20px; 
                margin-top: 20px;
                width: 400px;
}
				
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

.button2 {
                background-color: #FFF89A;
                border-radius: 15px;
                margin-top: 20px;
                margin-bottom: 10px;
                padding: 5px;
                padding-left: 40px;
                padding-right: 40px;
                border: none;
                font-size: 26px; 
                text-decoration: none;
}
</style>				
				
    <div class="container">
	
<center>	
                <form method="post">
                    Search:
					<input type="text" name="q[productName]" placeholder="By Product Name...." />
					<select name="q[productCategory]">
					<option value="">By Category</option>
					<option value="Tea">Tea</option>
					<option value="Coffee">Coffee</option>
					<option value="Sweet">Sweet</option>
					</select>
                    <select name="SortBy">
					<option value="">Sort By</option>
					<option value="productID DESC">Latest First</option>
					<option value="productID ASC">Oldest First</option>
					<option value="productPrice DESC">Price High To Low</option>
					<option value="productPrice ASC">Price Low To High</option>
					<option value="productStock DESC">Stock High To Low</option>
					<option value="productStock ASC">Stock Low To High</option>
					</select>
					<input type="submit" value="Search!" />
                </form>
</center>				
<hr>
<form action="" method="POST">
<?php
$WHERE = '';
$SortBy = '';
$cond = array();

if(isset($_POST['q'])){
foreach($_POST['q'] as $key => $value){
if(!empty($value)){
$cond[] = $key." LIKE '%".$value."%'";
}
}
}
if(isset($_POST['SortBy'])){
if(!empty($_POST['SortBy'])){
$SortBy = " ORDER BY ".$_POST['SortBy'];
}
}

if(!empty($cond)){$WHERE = "WHERE ".implode(" AND ",$cond);}
echo "<hr>";
$sql = "SELECT * FROM products ".$WHERE.$SortBy;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>

        <div class="card" style="display:inline-block">
        <div class="square3">
		<img src="Images/<?php echo $row['productPIC'];?>" alt="<?php echo $row['productName'];?>">
		<h3><?php echo $row['productName'];?></h3>
Price : <input  type="number" step="0.01" name="products[<?php echo $row['productID'];?>][productPrice]" value="<?php echo $row['productPrice'];?>" required /><br>
Stock : <input  type="number" step="1" min="0"  name="products[<?php echo $row['productID'];?>][productStock]" value="<?php echo $row['productStock'];?>" required /><br>

    <a href="ProductManagement.php?Delete&id=<?php echo $row['productID'];?>" class="button1"><b>Delete</b></a>

        </div>
        </div>


<?php }
} else {
echo ' 0 results';
}
?>
<center>
    <button type="submit" name="Edit" class="button2"><b>Save!</b></button>
</center>

<?php
include 'footer.php';
?>