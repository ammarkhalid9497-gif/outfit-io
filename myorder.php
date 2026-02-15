<?php

$con = mysqli_connect('localhost','root','','data');


function getOrders(){
    global $con;

    $sql = "SELECT * FROM orders";
    $res = mysqli_query($con,$sql);
    $num = mysqli_num_rows($res);

    if ($num==0) {
      echo "No order found.";
    }

    while($row = mysqli_fetch_assoc($res)){
   
        $orderId = $row['id'];
        $orderPrice = $row['totalprice'];

        echo '
          
        <div class="col-6 col-sm-4 col-md-3 col-lg-2  mb-3">
        <div class="ccard">
        <p> <strong>Order ID:</strong> '.$orderId.'</p>
        <p<strong>Total Price: $</strong>'.$orderPrice.'</p>
        <a href = "orderdetail.php?orderid='.$orderId.'" class="btn-outline-dark btn-sm btn add-to-cart">See Detail</a>
        </div>
        </div>
        
        ';

    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./css/bootstrap.css">
     <link rel="stylesheet" href="./css/style.css">
    <title>Orders</title>
</head>
<body>

      <a href='./index.php' class='btn btn-dark mt-3 ms-3'>Go To Home</a>

    <div class="container">
    <div class="row mt-5">
      <div class="col">
        <h1 style=" text-align: center;">
         Your Orders
        </h1>
      </div>
    </div>
    <div class="row wbox mt-5 " style="display: flex; justify-content: center;align-items: center;overflow-x: hidden; gap: 10px;">
        <?php
        getOrders();
      ?>
  </div>
</body>
</html>