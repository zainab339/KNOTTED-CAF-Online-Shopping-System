<?php
$pageTitle = "New Product";
include 'header.php';

if(!isset($_SESSION['AdminID'])){
header("Location: index.php");
}



if(isset($_POST['AddProduct'])){
$prodcutPIC = '';
##################
$FileTypeAllowed = array('png','jpg','jpeg','gif');
$uploaddir = 'Images/';
$uploadfile = $uploaddir . basename($_FILES['prodcutPIC']['name']);
$file_type = explode('.',$_FILES['prodcutPIC']['name']);
$file_type = end($file_type);
$file_name = 'p_'.rand(100000,999999). '.' . $file_type;
$uploadfile = $uploaddir . $file_name;
if(in_array($file_type, $FileTypeAllowed)){
if (move_uploaded_file($_FILES['prodcutPIC']['tmp_name'], $uploadfile)) {
$prodcutPIC = $file_name;
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productStock = $_POST['productStock'];
$productCategory = $_POST['productCategory'];
$productDescription = $_POST['productDescription'];






$sql = "INSERT INTO products (productPIC, productName, productPrice,productStock,productCategory,productDescription)
VALUES ('$prodcutPIC','$productName','$productPrice','$productStock','$productCategory','$productDescription')";

if ($conn->query($sql) === TRUE) {
echo ("<script>alert('Product Added successfully');</script>");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}







}
}else{
echo ("<script>alert('File Not Allowed');</script>");
}
#####################








}
?>


<style>
.square3 {
                background-color: white;
                /* border-radius: 25px;
                border: 2px ;
                padding: 20px; 
                margin-top: 20px;
                width: 400px; */
				text-decoration: left;

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
                background-color: white;
                /* background-color: #faedcb; */
                border-radius: 15px;
                margin-top: 20px;
                margin-bottom: 0px;
                padding: 5px;
                padding-left: 40px;
                padding-right: 40px;
                border: 2px black solid;
                font-size: 26px; 
                text-decoration: none;
}
.button2:hover {
      background-color: #faedcb;
      border-color: #D78180;
      cursor: pointer;
    }

input, select, textarea, file {
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 1rem;
  font: 500 1rem, sans-serif;
      width: 100%;
      padding: 0.50rem;
      box-sizing: border-box;
     
      border: 1px solid #faedcb;
      outline: none;
      background: #fdf8ea;
      cursor: pointer;
}
input:focus {
      border-color: #faedcb;
      background-color: #ffffff;
    }
    input:focus::placeholder {
      color: transparent;
    }
.card{
	  text-align: left;

}
body{
  background-image: url(/Images/bg.jpg);
      background-size: cover; 
      background-position: center; 
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
    .formarea{
      
      background-color: white;
      width: 400px;
      max-width: 400px;
      margin: 1rem;
      padding: 2rem;
      font: 500 1rem, sans-serif;
      border-radius: 15px;
    }
    
  
</style>				
			
		<body>
      <main>
    <!-- <div class="container"> -->
	
	<center>
    <div class="formarea">
    <h1>Add New Product</h1>
	<br>
    <hr>
    
<form action="" method="POST" enctype="multipart/form-data">

        <div class="card" style="display:inline-block">
        <div class="square3">
Product PIC: <input type="file" name="prodcutPIC" /><br>
Product Category: <select name="productCategory" required>
<option value="Tea">Tea</option>
<option value="Coffee">Coffee</option>
<option value="Sweet">Sweet</option>
</select>
<br>
Product Name: <input type="text" name="productName" placeholder="Product Name..." required /><br>
Price: <input  type="number" step="0.01" name="productPrice" placeholder="Product Price..."  required /><br>
Stock: <input  type="number" step="1" min="0"  name="productStock" value="1" placeholder="Product Stock..." required /><br>
Product Description:<br>
<textarea name="productDescription" placeholder="product Description...">

</textarea>
        </div>
        </div>
		<br>
    <button type="submit" name="AddProduct" class="button2"><b>Add!</b></button>
</center>

</form>
  </div>  
  <!-- </div> -->
    </main>
    </body>	
<?php
include 'footer.php';
?>