<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];



 if(isset($_POST['add_to_cart'])){

$message[]="please login first to use cart system";
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header1.php'; ?>

<div class="heading">
   <h3>our shop</h3>
   <p> <a href="home.php">home</a> / shop </p>
</div>

<section class="products">

   <h1 class="title">Hot products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <?php $item_qty=$fetch_products['quantity']; ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rs<?php echo $fetch_products['price']; ?>/-</div>
      <div class="quantity" name="stock"><h2><?php echo $fetch_products['quantity']; ?> items remaining</h2></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type ="hidden" name="stock_quantity" value="<?php echo $fetch_products['quantity']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <?php
      if($item_qty<1){
          ?>
      <input type="submit" value="No items" name="no_item" class="btn">
      <?php }
      else
      { ?>
           <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      <?php }?>
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">No products added yet!</p>';
      }
      ?>
   </div>

</section>








<?php include 'footer1.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>