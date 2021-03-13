<div id="footer"><!--footer begin-->
  <div class="container"><!--container begin-->
  <div class="row"><!--row begin-->
  <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->
   <h4>Pages</h4>
   <ul>
     <li><a href="../cart.php">Shopping Cart</a></li>
     <li><a href="../contact.php">Contact Us</a></li>
     <li><a href="../shop.php">Shop</a></li>
     <li><a href="my_account.php">My Account</a></li>
   </ul>
<hr>
    <h4>User section</h4>
<ul>
  <?php
    if (!isset($_SESSION["customer_email"])) {
          echo "<a href='../checkout.php'>Log in</a>";
        } else{
          echo "<a href='my_account.php?my_orders'>My Account</a>";
        }
       ?>
       <li>
         <?php
         if (!isset($_SESSION["customer_email"])) {
               echo "<a href='../checkout.php'>Log in</a>";
             } else{
               echo "<a href='my_account.php?edit_account'>Edit Account</a>";
             }
            ?>
          </li>
</ul>
<hr class="hidden-md hidden-sm hidden-lg">
  </div><!--col-sm-6 col-md-3 end-->
  <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->
  <h4>Top Products Categories</h4>
   <ul>
     <?php
   // $conn = mysqli_connect("localhost","root","","bazzar_store");
   $get_p_cats = "SELECT * FROM product_categories";
    $run_p_cats = mysqli_query($conn,$get_p_cats);
    while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
     $p_cat_id = $row_p_cats['p_cat_id'];
    $p_cat_title = $row_p_cats['p_cat_title'];
    echo "
           <li>
              <a href='../shop.php?p_cat=$p_cat_id'>
                  $p_cat_title
              </a>
           </li>";
             }?>
     <!-- <li><a href="#">Jackets</a></li>
      <li><a href="#">Accessories</a></li>
       <li><a href="#">Electronics</a></li>
       <li><a href="#">Shoes</a></li> -->
   </ul>
   <hr class="hidden-md  hidden-lg">
    </div><!--col-sm-6 col-md-3 end-->
    <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->
   <h4>Find US:</h4>
   <p><!--P begin-->
<strong>BAZZAR Media inc.</strong>
</br>Nasr-city
</br>Egypt
</br>01098166981
</br>Engnadagomaa@yahoo.com
<strong>ENG Nada</strong>
   </p><!--P END-->
   <a href="../contact.php">Check Our Page</a>
   <hr class="hidden-md  hidden-lg">
        </div><!--col-sm-6 col-md-3 end-->
        <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 begin-->
      <h4>Get The News</h4>
      <p class="text-muted">
      Dont Miss Our Latest Update Products </p>
    <form class="" action="index.html" method="post"><!--form begin-->
      <div class="input-group"><!--input-group begin-->
        <input type="text" name="email" class="form-control">
        <span class="input-group-btn"><!--input-group-btn begin-->
         <input type="submit" value="subscribe" class="btn btn-default">
        </span><!--input-group-btn finish-->
      </div><!--input-group finish-->
    </form><!--form finish-->
    <hr>
    <h4>Keep In Touch</h4>
    <p class="social">
<a href="../#" class="fa fa-facebook"></a>
<a href="../#" class="fa fa-twitter"></a>
<a href="../#" class="fa fa-instagram"></a>
<a href="../#" class="fa fa-google-plus"></a>
    </p>
        </div><!--col-sm-6 col-md-3 end-->

</div><!--row end-->
</div><!--container end-->
</div><!--footer end-->
<div class="copyright"><!--copy right begin-->
  <div class="container"><!--container begin-->
  <div class="col-md-6"><!--col-md-6 begin-->
<p class="pull-left">&copy; 2020 Bazzar All Rights Are Reserved. </p>
  </div><!--col-md-6 finish-->
  <div class="col-md-6"><!--col-md-6 begin-->
    <i class="fa fa-cc-visa visafooter" ></i>
    <i class="fa fa-cc-mastercard"></i>
      </div><!--col-md-6 finish-->
</div><!--container finish-->
</div><!--copy right finish-->
