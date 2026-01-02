<?php
//Ayesha 
include 'connect.php';
include 'header.php'; 

if(isset($_SESSION['AdminID'])){
  header("Location: AdminOrders.php");
  exit;
}

if(isset($_SESSION['userID'])){
  header("Location: index.php");
  exit;
}

$pageTitle = 'Signup';
$errors = array('email' => '', 'password' => '', 'confirmPass' => '');
$email = '';
$userPassword = '';
$confirmPass = '';

if(isset($_POST['submit'])){
  // Get the email
  $email = trim($_POST['email']);
  // Password
  $userPassword = md5($_POST['password']);
  // Confirm
  $confirmPass = md5($_POST['confirmPass']);

  // Check if username already exists
  $check = mysqli_query($conn, "SELECT userName FROM users WHERE userName = '$email'");
  $rows = mysqli_num_rows($check);
  if ($rows > 0){
    $errors['email'] = 'Username already exists';
  }

  // Check if passwords match
  if($userPassword != $confirmPass){
    $errors['confirmPass'] = 'Passwords do not match';
  }

  // Insert query if no errors
  if(empty(array_filter($errors))){
    $query = "INSERT INTO users (userName, userPassword, userType) VALUES ('$email', '$confirmPass', 'user')";
    if ($conn->query($query) === TRUE){
      $userID = mysqli_insert_id($conn);
      $_SESSION["userID"] = $userID;
      $_SESSION['userName'] = $email;
      header("Location: index.php");
      exit;
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
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
    .signupBody {
       background-image: url(Images/bg.jpg);
      background-size: cover; 
      background-position: center; 
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    h1 {
      margin-bottom: 1rem;
      margin-top: 0;
      text-align: center;
      color: #D78180;
    }
    .FormArea {
      align-items: center;
      justify-content: center;
      background-color: white;
      width: 400px;
      max-width: 400px;
      margin: 1rem;
      padding: 2rem;
      font: 500 1rem, sans-serif;
      border-radius: 15px;
    }
    .input input {
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
    .fbtn {
      width: 100%;
      padding: 1rem 2rem;
      font-weight: bold;
      font-size: 1.1rem;
      background-color: #fdf8ea;
      border: none;
      border-radius: 30px;
      color: #D78180;
    }
    .fbtn:hover {
      background-color: #faedcb;
      border-color: #D78180;
      cursor: pointer;
    }
    .fbtn:active {
      transform: scale(0.98);
    }
    .red-error {
      color: red;
      text-decoration: none;
      margin-bottom: 1rem;
      display: block;
    }
    .loginlink {
      padding: 1rem 2rem;
      font-size: 1.1rem;
      color: #D78180;
    }
  </style>
  <script>
    function validateForm() {
      var pass = document.getElementById('password').value;
      var Cpass = document.getElementById('confirmPass').value;
      if (pass.length < 8) {
        document.getElementById('passError').innerHTML="Length of the password should be atleast 8 characters<br>";
        return false;
      }else{
        document.getElementById('passError').innerHTML="";
      }

      
      if (pass !== Cpass) {
        // alert("Passwords do not match");
        
        document.getElementById('confPass').innerHTML="Passwords do not match<br>";
        return false;
      }else{
        document.getElementById('confPass').innerHTML="";
      }
      return true;
      
    }
  </script>
</head>
<body>
  <main class="signupBody">
    <center>
        
      <div class="FormArea">
        <form class="form" method="post" onsubmit="return validateForm()">
          <h1 class="form_title">Signup</h1>
          <div class="input">
            <input type="email" name="email" placeholder="Email Address" required>
          </div>
          <span id = 'email' class="red-error">
            <?php echo $errors['email'] ?> 
          </span>
          <div class="input">
            <input type="password" name="password" id="password" placeholder="Create a password" required>
          </div>
          <span class="red-error" id = 'passError'>
            <?php echo $errors['password'] ?> 
          </span>
          <div class="input">
            <input type="password" name="confirmPass" id="confirmPass" placeholder="Confirm your password" required>
          </div>
          <span class="red-error" id = 'confPass'>
            <?php echo $errors['confirmPass'] ?> 
          </span>
          <button type = "submit" class="fbtn" name="submit">submit</button>
        </form>
        <div class="loginlink">
          Already have an account? <label for="login"><a href="login.php" class="link">Login</a></label>
        </div>
      </div>
    </center>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
