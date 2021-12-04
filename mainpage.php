<?php
session_start();
if (!isset($_SESSION['sessionid'])) {
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('../lab2/login.php')</script>";
}
include_once("dbconnect.php");

if (isset($_GET['id'])) {
 
      $id = $_GET['id'];
      $sqldelete = " DELETE FROM `products` WHERE code = '$id'";
     
      if ($conn->exec($sqldelete)) {
          echo "<script> alert('Product Deletion Success')</script>";
          echo "<script>window.location.replace('mainpage.php')</script>";
      } else {
          echo "<script> alert('Failed To Delete Product')</script>";
          echo "<script>window.location.replace('mainpage.php')</script>";
      }
  
    }

if (isset($_GET['button'])) {
  $op = $_GET['button'];
  $option = $_GET['option'];
  $search = $_GET['search'];
  if ($op == 'search') {
      if ($option == "nama") {
          $sqlproduct = "SELECT * FROM `products` WHERE name LIKE '%$search%'";
      }
      if ($option == "code") {
          $sqlproduct = "SELECT * FROM `products` WHERE code LIKE '%$search%'";
      }
  }
} else {
  $sqlproduct = "SELECT * FROM products";
}

$stmt = $conn->prepare($sqlproduct);
$stmt->execute();
$number_of_result = $stmt->rowCount();
$stmt = $conn->prepare($sqlproduct);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://kit.fontawesome.com/ac93d662e6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <img src="images/heda.png" alt="shop banner">
    <title>Bella Cosa</title>
</head>

<body>


<div  class="w3-bar  w3-blue-gray">
<a  href="logout.php"  class="w3-bar-item  w3-button  w3-right">Logout</a>
<a  href="newitem.php"  class="w3-bar-item  w3-button  w3-left">New Product</a>
</div>

<div class="w3-card w3-container w3-padding w3-margin w3-round w3-pale-red">
        <h4>Product Search</h4>
        <form action="mainpage.php">
          <div class="w3-row">
                <div class="w3-half w3-container">
                    <p><input class="w3-input w3-block w3-round w3-border" type="search" id="idsearch" name="search" placeholder="Enter search term" /></p>
                </div>
                <div class="w3-half w3-container">
                    <p><select class="w3-input w3-block w3-round w3-border" name="option" id="srcid">
                            <option value="nama">By Product Name</option>
                            <option value="code">By Product Code</option>
                            
                        </select>
                    <p>
                </div>
             </div>
            <div class="w3-container">
                <p><button class="w3-button w3-light-gray w3-round w3-right" type="submit" name="button" value="search">search</button></p>
          </div>

        </form>
</div>

<div  class="w3-grid-template">
<?php
foreach  ($rows  as  $product)  {

$name  =  $product['name'];
$prodesc  =  $product['prodesc'];
$quantity  =  $product['quantity'];
$price  =  $product['price'];
$pcode = $product['code'];
echo  "<div  class='w3-center  w3-padding'>"; 
echo  "<div  class='w3-card-4  w3-pale-green'>"; 
echo  "<header  class='w3-container  w3-pale-blue'"; 
echo  "<h5>$name</h5>";
echo  "</header>";
echo  "<img  class='w3-image'  src=images/product/$pcode.png"  .
"  onerror=this.onerror=null;this.src='../lab2/images/products.png'"
.  "  style='width:100%;height:250px'>";
echo  "<div  class='w3-container  w3-left-align'><hr>";
echo  "<p><i  class='fa  fa-barcode'  style='font-size:16px'></i> &nbsp&nbspCode: $pcode<br>
<i class='fa fa-archive'  style='font-size:16px'></i> &nbsp&nbsp$quantity in stock<br>
<i  class='fa  fa-money'  style='font-size:16px'></i> &nbsp&nbspRM$price<br></p><hr>";
echo "<table class='w3-table'><tr>
            <td class='w3-center'><a href=updateitem.php?id=$pcode>
            <i class='fa fa-edit' style='font-size:32px' onClick=
            'return updateDialog()' style='text-decoration:none'></i></a></td>
            <td class='w3-center'><a href='mainpage.php?id=$pcode'>
            <i class='fa fa-trash-o' style='font-size:32px' onClick=
            'return deleteDialog($pcode)' style='text-decoration:none'></i></a></td>
            </tr></table>";
echo  "</div>"; 
echo  "</div>"; 
echo  "</div>";
}
?>
</div>


<footer class="footer has-background-primary-light">
  <div class="content has-text-centered">
    <p>
      <a aria-setsize="50">Bella Cosa</a><br>
      <i class="fab fa-facebook"></i><a href="https://www.facebook.com/akmalsyfq">Find me on facebook</a><br>
      <i class="fab fa-shopify"></i><a
        href="https://shopee.com.my/product/91037664/9126330878?smtt=0.91039142-1635165472.3">Follow me at shopee</a>
      <i class="fas fa-paper-plane"></i><a href="mailto:akmalsyfq@gmail.com">Contact me through email</a>
    </p>
    <bold>COPYRIGHT</bold><i class="far fa-copyright"></i> 2021. All rights reserved.

    </p>
  </div>
</footer>

</body>

</html>
