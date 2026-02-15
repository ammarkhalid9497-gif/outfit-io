<?php
$con = mysqli_connect('localhost', 'root', '', 'data');
$order_id = $_GET['orderid'];
$sql = mysqli_query($con,"SELECT order_items.*,product.name,product.img,product.price FROM order_items JOIN product ON order_items.productid = product.id WHERE order_items.orderid = '$order_id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
     <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>

    <a href='./index.php' class='btn btn-dark mt-3 ms-3'>Go To Home</a>

    <div class = "container">
        <h1>order detail</h1>
        <table class = "table table-sm table-border overflow-x-auto">
          <thead>
            <tr>
                <th>product</th>
                <th>price</th>
                <th>quantity</th>
            </tr>
          </thead>  
          <tbody>
            <?php
            while ($product = mysqli_fetch_assoc($sql)){
            ?>
            <tr>
                <td>
                    <img src = "<?php echo $product['img'];?>" width="50" height="40">
                    <?php echo $product['name'];?>
                </td>
                <td>
                    <?php echo $product['price'];?>

                </td>
                <td>
                    01
                </td>
            </tr>
         <?php }?>
          </tbody>

        </table>

    </div>
</body>
</html>