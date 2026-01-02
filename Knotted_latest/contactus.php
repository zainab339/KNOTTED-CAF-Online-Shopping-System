<?php
$pageTitle = "Contact US";
include 'header.php';

if(isset($_SESSION['AdminID'])){
header("Location: index.php");
}



?>


<style>
.square3 {
                background-color: white;
                
                border-radius: 25px;
                border: 2px ;
                padding: 20px; 
                margin-top: 20px;
				text-decoration: left;
        

}
.square4{
  background-color: white;
                
                border-radius: 25px;
                border: 2px ;
                padding: 20px; 
                margin-top: 20px;
				/* text-decoration: left; */
        align-items: center;
        justify-content: center;
       width: 600;
       height: 450;
       border: 0;
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
                border-radius: 30px;
                margin-top: 20px;
                margin-bottom: 10px;
                padding: 5px;
                padding-left: 40px;
                padding-right: 40px;
                border: none;
                font-size: 24px; 
                text-decoration: none;
                color: #D78180;
                
}
.button2:hover{
     
     box-shadow: 0 5px 10px 0 rgba(0,0,0,0.24);
      cursor: pointer;
}

.button2:active {
      transform: scale(0.95);
    }
input, select, textarea, file {
  display: inline-block;
  /* border: 1px solid #ccc;
  border-radius: 4px; */
  box-sizing: border-box;
  margin-bottom: 1rem;
      display: block;
      width: 100%;
      padding: 0.5rem;
      box-sizing: border-box;
      border-radius: 4px;
      border: 1px solid #faedcb;
      outline: none;
      background: #fdf8ea;
      cursor: pointer;
      font: 500 1rem, sans-serif;
      margin-top: 0.25rem;
}
input:focus ,textarea:focus{
      border-color: #faedcb;
      background-color: #ffffff;
    }
    input:focus::placeholder , textarea:focus::placeholder{
      color: transparent;
    }
.card{
	  text-align: left;
    width: 500px;
    max-width: 500px;
    opacity: 1;

}
h1 {
 
      margin-bottom: 1rem;
      margin-top: 0;
      text-align: center;
      color: #D78180;
    }
</style>				
			
			
    <div class="container">
	<!-- <h1>Contact US</h1> -->
	<br>
    <hr>
	<center>
<form action="" method="POST">
<?php

if(isset($_POST['SendMessage'])){
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];
$sql = "INSERT INTO messages (Name, Email, Phone,Subject,Message)
VALUES ('$Name','$Email','$Phone','$Subject','$Message')";

if ($conn->query($sql) === TRUE) {
echo'
      <div class= "square3">
            <p>'.$Name.'. Thank you for 
         the message! We will respond as soon as possible</p>
      <p class = "head">The following information has been saved in our database:</p>
      <p>Name: '.$Name.'</p>
      <p>Email: '.$Email.'</p>
      <p>Phone: '.$Phone.'</p>
       </div>
';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
        <div class="card" style="display:inline-block">
        <div class="square3">
        <h1>Contact US</h1>
Name: <input type="text" name="Name" placeholder="Name..." required /><br>
Email: <input type="email" name="Email" placeholder="Email..." required /><br>
Phone: <input type="text" name="Phone" placeholder="+966...." required /><br>
Subject: <input type="text" name="Subject" placeholder="Subject..." required /><br>
Message:<br>
<textarea name="Message" placeholder="product Description..."></textarea>
        </div>
        </div>
		<br>
    <button type="submit" name="SendMessage" class="button2"><b>Send Message!</b></button>
</form>



        <div  style="display:inline-block">
        <div class="square4">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3582.4913030282073!2d50.14738469999999!3d26.1155193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49db002321402f%3A0xb03918cf88f09e70!2sKnotted!5e0!3m2!1sar!2ssa!4v1715613953276!5m2!1sar!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>

</center>

    </div>



<?php
include 'footer.php';
?>