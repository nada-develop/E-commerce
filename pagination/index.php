<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>
</head>
<body>
<?php
$conn = mysqli_connect("localhost","root","","characters");
//define how many results you want per page
$results_per_page = 5;
//find out the no of products are stored in db
$sql = "SELECT * FROM alphabets";
$result = mysqli_query($conn,$sql);
$no_pro = mysqli_num_rows($result);
// display to all products fron db

while ($pro = mysqli_fetch_array($result)) {
  echo $pro["id"] . ' ' . $pro["pagination"] . ' <br>';
}
//determine no.of total pages are available
$total_pages = ceil($no_pro/$results_per_page);
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}
 $start_limit = ($page-1) * $results_per_page;
for ($page=1;$page<=$total_pages;$page++){
echo '<a href="index.php?page=' . $page . '">' . $page . '</a>';

}


?>

</body>
</html>
