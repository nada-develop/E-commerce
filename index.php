<?php
$active = "HOME";
include("includes/header.php");





 ?>
    <div class="container" id="slider"><!--slider begin -->
      <div class="col col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel"><!--carousel slide begin -->
          <ol class="carousel-indicators"><!--carousel-indicators begin -->
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol><!--carousel-indicators finish -->
          <div class="carousel-inner"><!--carousel-inner begin -->
            <?php
          $get_slide = "SELECT * FROM slider LIMIT 0,1";
          $run_slide = mysqli_query($conn,$get_slide);
             while ($row_slide = mysqli_fetch_array($run_slide) )
             {?>
            <div class="item active">
              <img src="admin-area/slides-image/<?php echo $row_slide['slide_image']; ?>" alt="<?php echo $row_slide['slide_name']; ?>" style="width:1100px;height:490px;">
            </div>
                 <?php } ?>
                 <?php
                 $get_slide = "SELECT * FROM slider LIMIT 1,4";
                 $run_slide = mysqli_query($conn,$get_slide);
                    while ($row_slide = mysqli_fetch_array($run_slide) )
                    {?>
                 <div class="item">
                   <img src="admin-area/slides-image/<?php echo $row_slide['slide_image']; ?>" alt="<?php echo $row_slide['slide_name']; ?>" style="width:1100px;height:490px;">
                 </div>
               <?php } ?>
          </div><!--carousel-inner finish -->
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div><!--carousel slide end -->
      </div>
    </div><!--slider end -->
    <div id="advantages"><!--advantages begin -->
      <div class="container"><!--container begin -->
    <div class="same-height-row"><!--same-height-row begin -->
    <div class="col-sm-4"><!--col-sm-4 begin -->
    <div class="box same-height"><!--box same-height begin -->
      <div class="icon"><!--icon begin -->
    <i class="fa fa-heart"></i>
      </div><!--icon end -->
      <h3><a href="#">Best Offeres</a></h3>
      <p>we know to provide the best possible services ever</p>
    </div> <!--box same-height begin -->
    </div><!--col-sm-4 end -->
    <div class="col-sm-4"><!--col-sm-4 begin -->
    <div class="box same-height"><!--box same-height begin -->
      <div class="icon"><!--icon begin -->
    <i class="fa fa-tag"></i>
      </div><!--icon end -->
      <h3><a href="#">Best Prices</a></h3>
      <p>Compare Us With Another Store Site, Who Have The Best Price</p>
    </div> <!--box same-height begin -->
    </div><!--col-sm-4 end -->
    <div class="col-sm-4"><!--col-sm-4 begin -->
    <div class="box same-height"><!--box same-height begin -->
      <div class="icon"><!--icon begin -->
    <i class="fa fa-thumbs-up"></i>
      </div><!--icon end -->
      <h3><a href="#">100% Original</a></h3>
      <p> we Just Offer You The Best And Original Products</p>
    </div> <!--box same-height begin -->
    </div><!--col-sm-4 end -->
    </div><!--same-height-row end -->
      </div><!--container end-->
    </div><!--advantages end -->
    <div id="hot"><!--#hot begin -->
    <div class="box"><!--box begin -->
      <div class="container"><!--container begin -->
        <div class="col-md-12"><!--col-md-12 begin -->
        <h2>Our Latest Products</h2>
      </div><!--col-md-12 end -->
    </div><!--container end -->
    </div><!--box end -->
    </div><!--#hot end -->
    <div class="container" id="content"><!--#content begin -->
      <div class="row"><!--row begin -->
        <?php
      $run_products = getpro();
        while ($row_products = mysqli_fetch_array($run_products)){?>
        <div class="col-sm-4 col-sm-6 single"><!--col-sm-4 col-sm-6 single begin -->
          <div class="product"><!--product begin -->
            <a href="details.php?pro_id=<?php echo $row_products['product_id']; ?>">
             <img  class="img-responsive" src="admin-area/product-image/<?php echo $row_products['product_img1']; ?>" alt="" style="width:1100px;height:270px;">
            </a>
            <div class="text"><!--text begin -->
              <h3>
                 <a href="details.php?pro_id=<?php echo $row_products['product_id']; ?>"><?php echo $row_products['product_title']; ?></a>
              </h3>
              <p class="price"><?php echo $row_products['product_price']; ?></p>
              <p class="button">
           <a href="details.php?pro_id=<?php echo $row_products['product_id']; ?>" class="btn btn-default">View Details</a>
           <a href="details.php?pro_id=<?php echo $row_products['product_id']; ?>" class="btn btn-primary">
            <i class="fa fa-shopping-cart">
            Add To Cart</i>
            </a>
              </p>
            </div><!--text end -->
          </div><!--product end -->
        </div><!--col-sm-4 col-sm-6 single end -->
      <?php } ?>
      </div><!--row end -->

    </div><!--#content end -->
    <div class="container-fluid"><!--container-fluid begin -->
      <div class="row">
      <div class="col-md-3 col-sm-12 other"><!--col-sm-4 col-sm-6 single begin -->
          <div class="product"><!--product begin -->
            <a href="details.php">
             <img  class="img-responsive" src="admin-area/product-image/i.png" alt="" style="width:1100px;height:270px;">
            </a>
          </div><!--.product end-->
        </div><!--col-sm-4 col-sm-6 single end -->
        <div class="col-md-3 col-sm-12 other"><!--col-sm-4 col-sm-6 single begin -->
            <div class="product"><!--product begin -->
              <a href="details.php">
               <img  class="img-responsive" src="admin-area/product-image/j.png" alt="" style="width:1100px;height:270px;">
              </a>
            </div><!--.product end-->
          </div><!--col-sm-4 col-sm-6 single end -->
          <div class="col-md-3 col-sm-12 other"><!--col-sm-4 col-sm-6 single begin -->
              <div class="product"><!--product begin -->
                <a href="details.php">
                 <img  class="img-responsive" src="admin-area/product-image/k.png" alt="" style="width:1100px;height:270px;">
                </a>
              </div><!--.product end-->
            </div><!--col-sm-4 col-sm-6 single end -->
            <div class="col-md-3 col-sm-12 other"><!--col-sm-4 col-sm-6 single begin -->
                <div class="product"><!--product begin -->
                  <a href="details.php">
                   <img  class="img-responsive" src="admin-area/product-image/i.png" alt="" style="width:1100px;height:270px;">
                  </a>
                </div><!--.product end-->
              </div><!--col-sm-4 col-sm-6 single end -->
        </div>
    </div><!--container-fluid end -->
    <?php include("includes/footer.php") ?>

    <script src="js/script.js"></script>
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  <!-- <script src="js/fontawesome.min.js"></script> -->
      </body>
    </html>
