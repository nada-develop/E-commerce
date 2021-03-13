<?php
include("includes/db.php");
include("includes/admin_function.php");
$run_p_cats  =  get_p_cat();
$run_cats = get_cat();
if(isset($_POST['submit'])){
new_product($_POST['product_title'],$_POST['product_cat'],$_POST['cat'],
$_POST['product_price'],$_POST['product_Keywords'],$_POST['product_desc'],
$_FILES['product_image1']['tmp_name'],$_FILES['product_image1']['name'],
$_FILES['product_image2']['tmp_name'],$_FILES['product_image2']['name'],
$_FILES['product_image3']['tmp_name'],$_FILES['product_image3']['name'], "product-image/",);


}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Insert Products</title>
     <!-- <link rel="stylesheet" href="styles/bootstrap.min.css"> -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald&display=swap" rel="stylesheet">

   </head>
<body>
<div class="row"><!--row begin-->
<div class="col-lg-12"><!--col-lg-12 begin-->
  <ol class="breadcrumb">
    <li class="active">
    <i class="fa fa-dashboard"> Dashboard / Insert Products </i>
    </li>
  </ol>
</div><!--col-lg-12 finish-->
</div><!--row finish-->
<div class="row"><!--row begin-->
<div class="col-lg-12"><!--col-lg-12 begin-->
<div class="panel panel-default"><!--panel panel-default begin-->
<div class="panel-heading"><!--panel-heading begin-->
<h3 class="panel-title">
<i class="fa fa-money fa-fw"></i> Insert Product
</h3>
</div><!--panel-heading finish-->
<div class="panel-body"><!--panel-body begin-->
  <form class="form-horizontal" method="post" enctype="multipart/form-data"><!--form begin-->
    <div class="form-group"><!--form-group begin-->
   <label class="col-md-3 control-label"> Product Title</label>
   <div class=" col-md-6">
   <input type="text" name="product_title" class="form-control" required>
   </div>
    </div><!--form-group finish-->
    <div class="form-group"><!--form-group begin-->
   <label class="col-md-3 control-label"> Product Category</label>
   <div class=" col-md-6"><!--col-md-6 begin-->
   <select class="form-control" name="product_cat">
     <option> Select a Category Product</option>
     <?php
     while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {?>
      <option value="<?php echo $row_p_cats['p_cat_id']; ?>"><?php echo $row_p_cats['p_cat_title']; ?></option>
  <?php  }  ?>
   </select>
 </div><!--col-md-6 finish-->
    </div><!--form-group finish-->
    <div class="form-group"><!--form-group begin-->
   <label class="col-md-3 control-label">Category</label>
   <div class=" col-md-6"><!--col-md-6 begin-->
   <select class="form-control" name="cat">
     <option> Select a Category </option>
     <?php
     while ($row_cats = mysqli_fetch_array($run_cats)) {?>
      <option value="<?php echo $row_cats['cat_id']; ?>"><?php echo $row_cats['cat_title']; ?></option>
  <?php  }  ?>
   </select>
 </div><!--col-md-6 finish-->
    </div><!--form-group finish-->
    <div class="form-group"><!--form-group begin-->
   <label class="col-md-3 control-label"> Product Image1</label>
   <div class=" col-md-6">
   <input type="file" name="product_image1" class="form-control" required>
   </div>
    </div><!--form-group finish-->
    <div class="form-group"><!--form-group begin-->
   <label class="col-md-3 control-label"> Product Image2</label>
   <div class=" col-md-6">
   <input type="file" name="product_image2" class="form-control">
   </div>
    </div><!--form-group finish-->
    <div class="form-group"><!--form-group begin-->
   <label class="col-md-3 control-label"> Product Image3</label>
   <div class=" col-md-6">
   <input type="file" name="product_image3" class="form-control">
   </div>
      </div><!--form-group finish-->
   <div class="form-group"><!--form-group begin-->
  <label class="col-md-3 control-label"> Product Price </label>
  <div class=" col-md-6">
  <input type="text" name="product_price" class="form-control" required>
  </div>
    </div><!--form-group finish-->
    <div class="form-group"><!--form-group begin-->
   <label class="col-md-3 control-label"> Product Keywords</label>
   <div class=" col-md-6">
   <input type="text" name="product_Keywords" class="form-control" required>
   </div>
     </div><!--form-group finish-->
     <div class="form-group"><!--form-group begin-->
    <label class="col-md-3 control-label"> Product Desc</label>
    <div class=" col-md-6">
    <textarea name="product_desc" rows="6" cols="19" class="form-control"></textarea>
    </div>
      </div><!--form-group finish-->
      <div class="form-group"><!--form-group begin-->
     <label class="col-md-3 control-label"></label>
     <div class=" col-md-6">
     <input type="submit" name="submit" class=" btn btn-primary form-control" value="submit"  >
     </div>
       </div><!--form-group finish-->
  </form><!--form finish-->
</div><!--panel-body finish-->
</div><!--panel panel-default finish-->

  </div><!--col-lg-12 finish-->
</div><!--row finish-->





    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script> tinymce.init({selector: 'textarea'});</script>
</body>
