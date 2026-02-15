<?php

include('addtocart.php');
$totalPrice = totalPrice();
$con = mysqli_connect('localhost', 'root', '', 'data');
$query = "SELECT * FROM cart";
$res = mysqli_query($con,$query);
if(mysqli_num_rows($res) == 0) {
echo "your cart is empty";
exit();
}
$query = "INSERT INTO orders(userid,totalprice) VALUES (1,'$totalPrice')";
$order_boss =  mysqli_query($con,$query);
if ($order_boss){
$order_id = mysqli_insert_id($con);
while($cart_item = mysqli_fetch_assoc($res)){
    $pid = $cart_item['productid'];
    mysqli_query($con,"INSERT INTO order_items(orderid,productid,price) VALUES ('$order_id','$pid','$totalPrice')");
}
 mysqli_query($con,"DELETE FROM cart");
 echo "<script>alert('order placed'); window.location = 'myorder.php'</script>";
 
}
?>