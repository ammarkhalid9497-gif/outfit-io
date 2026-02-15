<?php



$con = mysqli_connect('localhost','root','','data');
 if($con){
    echo 'Connected</br>';
 }else{
    echo "Connection fail.";
 }


 
session_start();

 if ( isset($_SESSION['login']) && $_SESSION['login']==true) {
   header('location: index.php');
   exit();
 }



 if (isset($_POST['submit'])) {

   $email = $_POST['email'];
   $password = $_POST['password'];

    $sql = "SELECT * FROM data WHERE email='$email' AND password='$password'";
  
    $result =  mysqli_query($con,$sql);



    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
      
       $_SESSION['login'] = true;
       $_SESSION['user-name'] = $row['name'];
       $_SESSION['user-email'] = $row['email'];
       header("Location: index.php") ;
       exit();
    }
    else{
        echo 'Invalid email or password.';
    }

 }





?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=2q22, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   body {
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background-color: rgb(11, 110, 110);
    color:white;
  }

   .main {
      background-color: aquamarine;
      width: 350px;
      height: 250px;
      display: flex;
      flex-direction:column;
      justify-content: start;
      align-items: center;
      gap:8px;

      & h2{
         color:black;
      }
    }

    input {
      padding: 7px 10px;
    }
     button {
        background-color: black;
        color: white;
        padding: 5px 25px;
        border-radius: 8px;
        cursor: pointer;
      }
      a{
          color:white;
      }

</style>
<body>
 
<form class='main' action="" method='POST'>
  <h2>Login!</h2>

<input required type="email" name='email' placeholder='Enter your email'>
<input required type="password" name='password' placeholder='Enter your password'>
 <button name='submit'>Submit</button>

</form>
<a href="ammar1.php">Register</a>
    
</body>
</html>