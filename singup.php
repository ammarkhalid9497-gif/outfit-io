<?php
$con = mysqli_connect('localhost','root','','data');
 if($con){
    echo 'Connected</br>';
 }else{
    echo "Connection fail.";
 }


 if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];

    $sql = "INSERT INTO data (name , email , password , address , phone) VALUES ('$name','$email','$password','$address','$phone')";
  
    $result =  mysqli_query($con,$sql);

    if ($result) {
       echo 'Data inserted.';
    }
    else{
        echo 'Data failed to insert.';
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
      height: 350px;
      display: flex;
      flex-direction:column;
      justify-content: center;
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
 
<form  class='main' action="ammar1.php" method='POST'>
  <h2>Sign Up!</h2>
<input required type="text" name='name' placeholder='Enter your name'>
<input required type="email" name='email' placeholder='Enter your email'>
<input required type="text" name='address' placeholder='Enter your address'>
<input required type="number" name='phone' placeholder='Enter your phone no'>
<input required type="password" name='password' placeholder='Enter your password'>
 <button name='submit'>Submit</button>

</form>
<a href="ammar3.php">Login</a>

    
</body>
</html>