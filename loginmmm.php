<?php
$con = mysqli_connect('localhost','root','','value');
if($con){
    echo 'connected</br>';
}else{
    echo "connected fail.";
}
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];

   $sql = "SELECT * FROM data WHERE name='$name' AND address='$address'";
      $result = mysqli_query($con,$sql);

  
    if (mysqli_num_rows($result) === 1) {
       header("Location: home.php") ;
       exit();
    }
    else{
        echo 'Invalid name or address.';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ammar2.php" method='POST'>
    <input required type="text" name='name' placeholder='Enter your name'>
<input required type="text" name='address' placeholder='Enter your address'>
 <button name='submit'>Submit</button>

    </form>
    
</body>
</html>