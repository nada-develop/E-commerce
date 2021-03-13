<?php
function get_p_cat(){
GLOBAL $conn;
$pro_cat = "SELECT * FROM product_categories";
$run_p_cats = mysqli_query($conn,$pro_cat);
return $run_p_cats;
}
function get_cat(){
GLOBAL $conn;
$cat = "SELECT * FROM categories";
$run_cats = mysqli_query($conn,$cat);
return $run_cats;
}
function new_product($title,$product_cat,$cat,$price,$Keywords,$desc, $tname1,$fname1,$tname2,$fname2,$tname3,$fname3,$folder){
GLOBAL $conn;
  move_uploaded_file($tname1, $folder . $fname1);
  move_uploaded_file($tname2, $folder . $fname2);
  move_uploaded_file($tname3, $folder . $fname3);
$pro = "INSERT INTO products (p_cat_id,cat_id,Date,product_title,product_img1,
product_img2,product_img3,product_price,product_keywords,product_desc) VALUES('$product_cat','$cat',NOW(),'$title','$fname1','$fname2','$fname3','$price','$Keywords','$desc')";
$run_new_pro = mysqli_query($conn,$pro);

}


 ?>
