<?php
session_start();
include 'connect.php';
ob_start();
if(isset($pageTitle)){
$pageTitle = " | ".$pageTitle;
}else{
$pageTitle = '';
}


$cookieExpire = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Knotted<?php echo $pageTitle;?> </title>
    <link rel="stylesheet" href="css/styleHM.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
	
	

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

        .container {
            padding: 15px 9%;
            padding-bottom: 100px;
        }

        .container .card {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 15px;}

            .container .card .card-content {
                box-shadow: 0 5px 10px;
                border-radius: 5px;
                background: white;
                text-align: center;
                padding: 30px 20px;
            }

            .container .card .card-content img {
                height: 80px;
            }

            .container .card .card-content h3 {
                color: #444;
                font-size: 22px;
                padding: 10px 0;
                margin-bottom: 10px;
            }

            .container .card .card-content p {
                color: #777;
                font-size: 15px;
                line-height: 1.8;
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

.cart .login  {
    color: black;
}


.acart {
    position:relative;
    padding-top:20px;
    display:inline-block;
}
.notify-badge{
    position: absolute;
    right:-20px;
    top:-2px;
    background:brown;
    text-align: right;
    border-radius: 30px 30px 30px 30px;
    color:white;
    padding:5px 10px;
    font-size:small;
}  




</style>
</head>

<body>
    <header class="header" style="background-color: #faedcb;">
        <div class="container">
            <img class="logo" src="Images/Knotted logo.png" width="80" height="65" alt="Knotted" />
<?php
if(!isset($_SESSION['AdminID'])){ ?>
            <a style="color: black;" class="acart" href="cart.php">
<span class="notify-badge" id="cartCount">0</span>			
			<i style="font-size:24px" class="fa">&#xf07a;</i>
			</a>
			<?php
}
if(isset($_SESSION['AdminID'])){echo '<b><h3>Control Panel</h3></b>';}
if(!isset($_SESSION['userID']) AND !isset($_SESSION['AdminID'])){
	echo '<a style="color: black;" href="login.php"><i style="font-size:24px" class="fas">&#xf406;</i></a>';
}
?>
            <div class="links">
                <span class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <ul>
<?php
if(isset($_SESSION['AdminID'])){
echo "<li><a href='AdminOrders.php'>Order History</a></li>
<li><a href='messages.php'>Messages</a></li>
<li><a href='AdminAddProduct.php'>New Product</a></li>
<li><a href='ProductManagement.php'>Product Management</a></li>
";
}else{?>
				    <li><a href="index.php">Home</a></li>
					<li><a href="orders.php">Order history</a></li>
                    <li><a href="category.php?category=Tea">Tea</a></li>
                    <li><a href="category.php?category=Coffee">Coffee</a></li>
                    <li><a href="category.php?category=Sweet">Sweet</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
<?php
}
if(isset($_SESSION['userID']) OR isset($_SESSION['AdminID'])){
echo '<li><a href="logout.php">Logout</a></li>';
}
?>
					
                </ul>
            </div>
        </div>
    </header>
	
