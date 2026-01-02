<?php
$pageTitle = 'Log In';
include 'header.php';


if(isset($_SESSION['AdminID'])){
header("Location: AdminOrders.php");
}

if(isset($_SESSION['userID'])){
header("Location: index.php");
}
?>

<?php
if(isset($_POST['Login'])){
$userName = $_POST['userName'];
$userNamePassword = md5($_POST['userPassword']);

$sql = "SELECT * FROM users WHERE userName='$userName' AND userPassword='$userNamePassword'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  // output data of each row
$row = $result->fetch_assoc();

if($row['userType'] == 'user'){
$_SESSION['userID'] = $row['userID'];
$_SESSION['userName'] = $row['userName'];
header("Location: index.php");

}
if($row['userType'] == 'admin'){
$_SESSION['AdminID'] = $row['userID'];
$_SESSION['userName'] = $row['userName'];
header("Location: AdminOrders.php");
}
} else {
  echo "<br><span class=spanC>Username/password is incorrect</span>";


}
}



 
?>

<style>
.spanC{
    display: block;
    color: red;
    font: 500 1rem, sans-serif;
    justify-content: center;
    text-align: center;
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
  .spanC{
    color: red;
    font: 500 1rem, sans-serif;
    justify-content: center;
  }
  .loginStyle{
    display: flex;
    flex-direction: column;
    background-image: url(Images/bg.jpg);
     background-size: cover; 
      background-position: center; 
      
  }
  
.logForm
{
  background-color: white;
      width: 400px;
      max-width: 400px;
      margin: 1rem;
      padding: 2rem;
      font: 500 1rem, sans-serif;
      border-radius: 15px;
      
      justify-content: center;
}

h1 {
      margin-bottom: 1rem;
      margin-top: 0;
      
      color: #D78180;
    }
input {
      margin-bottom: 1rem;
      display: block;
      width: 100%;
      padding: 0.75rem;
      box-sizing: border-box;
      border-radius: 4px;
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
    .loginbtn{
     
      width: 100%;
      padding: 1rem 2rem;
      font-weight: bold;
      font-size: 1.1rem;
      background-color: #fdf8ea;
      border: none;
      border-radius: 30px;
      color: #D78180;
    }
    .loginbtn:hover {
      background-color: #faedcb;
      border-color: #D78180;
      cursor: pointer;
    }
    .loginbtn:active {
      transform: scale(0.98);
    }
    
</style>	
<body class="loginStyle">
  <main >
  <center>
    <div class="logForm">
      <!---Login page--->
        <h1>Login</h1>
        <br>
      <div class="login form">
        <form class="form" method="POST" action="">
          <div class="input">
          <p><input type="text" name='userName' placeholder="Email Address" /></p>
         <p> <input type="password" name='userPassword' placeholder="Password" /></p>
         <p> <input type="submit" value="Login" name="Login" class="loginbtn" ></p>
        </div>
        </form>
		<br>

        <!-- switching to sign up form-->
        <div class="signup">
          <span class="signup"
            >Don't have an account?
           <label><a href="Signup.php"> Sign up</a></label>
          </span>
        </div>
     
      </div>
            </div>
            </main>
</body>
<?php
include 'footer.php';
?>