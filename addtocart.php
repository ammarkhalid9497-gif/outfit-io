<?php
$con = mysqli_connect ('localhost', 'root', '', 'data');

$proId = $_GET['productid'] ?? null;
$action = $_GET['action'] ?? null;


if ($action == 'add' && !empty($proId)) {

    // Cast to integer to prevent SQL injection and invalid data
    $proId = (int)$proId;

    // Check if product exists before inserting
    $checkProduct = mysqli_query($con, "SELECT id FROM product WHERE id = $proId");
    if (mysqli_num_rows($checkProduct) > 0) {
        $sql = mysqli_query($con, "INSERT INTO cart(productid) VALUES ($proId)");
        if ($sql) {
            echo "<script>alert('Product is added to cart')</script>";
        } else {
            echo "Product is not added";
        }
    } else {
        echo "Invalid product ID: Product not found";
    }
}


function getCartProduct(){
    global $con;

    $sql = "SELECT cart.id, cart.productid, product.name, product.price, product.img 
              FROM cart 
              INNER JOIN product ON cart.productid = product.id";

    $res = mysqli_query($con,$sql);
    $num = mysqli_num_rows($res);

    if ($num==0) {
      echo "No product found.";
    }

    while($row = mysqli_fetch_assoc($res)){
   
        $productId = $row['id'];
        $productName = $row['name'];
        //$productCat = $row['category'];
        $productImg = $row['img'];
        $productPrice = $row['price'];

        echo '
          
        <div class="perent">
        <div class="child1">
         <img src="'.$productImg.'" alt="">
         <div>
            <h4> '.$productName.'</h4>
            <p> Rs.'.$productPrice.'</p>
         </div>
        </div>
        <div class="child2">
            <p>DEL</p>


        </div>
        


    </div>
        
        ';

    }



}


function totalItem(){
    global $con;
    $query = "SELECT COUNT(*) AS total_items FROM cart";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_items'];    
}

function totalPrice(){
   global $con;
    $query = "SELECT SUM(product.price) AS total_price FROM cart JOIN product ON cart.productid = product.id; ";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_price'];   
}

$totalItems = totalItem();
$totalPrice = totalPrice();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Document</title>
</head>
<style>
    .perent{
        background-color: antiquewhite;
        width: 600px;
        height: 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-radius: 15px;
        margin-bottom:10px;

    }
    .child1{
         display: flex;
         align-items: center;
         gap: 20px;
         justify-content: center;
         img {
            width: 60px;
            height: 60px;
         }
    }
    .child2{
        background-color: brown;
        color:white ;
        padding: 0px 10px ;
        border-radius: 5px;

    }
    .main{
        display: flex;
        justify-content: space-around;
        gap: 20px;
        
    }

    .right{
        padding: 20px;
        background-color: whitesmoke;
        height: 200px;
    }
    .ab{
        display: flex;
        justify-content: space-around;
    }
</style>
<body>
    <a href='./index.php' class='btn btn-dark mt-3 ms-3'>Go To Home</a>
<div class = 'main mt-4' >
   <div class = 'left'>
     <?php 
    getCartProduct();
    ?>
    </div>
    <div class = right>
        <h3>Order Summary</h3>
        <div class='ab'>
          <div>
             <p>Items</p>
            <p>Total</p>
          </div>
          <div>
             <p> 
                 <?php 
                 echo $totalItems;
                 ?>
             </p>
            <p>
                 <?php 
                 echo $totalPrice;
                 ?>
            </p>
          </div>

        </div>
        <a href ="submitorder.php" class='btn btn-dark'>order now</a>
    </div>    
 </div>  
</body>
</html>
