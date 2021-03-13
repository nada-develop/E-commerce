<?php
$active='Contact';
include("includes/header.php");
 ?>
<div id="content"><!--#content begin -->
<div class="container"><!--container begin -->
  <div class="col-md-12"><!--col-md-12 begin -->
    <ul class="breadcrumb"><!--breadcrumb begin -->
      <li>
<a href="index.php">Home</a>
      </li>
      <li>Contact</li>
    </ul><!--breadcrumb finish -->
  </div><!--col-md-12finish -->
  <div class="col-md-3"><!--col-md-3 begin -->

<?php
include("includes/sidebar.php");
 ?>
  </div><!--col-md-3 finish -->
  <div class="col-md-9"><!--col-md-9 begin -->
    <div class="box"><!--box begin -->
      <div class="box-header"><!--box-header begin -->
        <center>
          <h2> Feel Free To Contact Us </h2>
          <p class="text-muted">
   IF You Have any questions, Feel Free To Contact Us. Our Customer services Work <strong> 24/7 </strong>
          </p>
        </center>
        <form class="" action="contact.php" method="post"><!--form begin-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Name</label>
          <input type="text" class="form-control" name="name" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Email</label>
          <input type="text" class="form-control" name="email" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Subject</label>
          <input type="text" class="form-control" name="subject" required >
          </div><!--form-grioup finish-->
          <div class="form-group"><!--form-grioup begin-->
          <label>Message</label>
          <textarea name="message" class="form-control"></textarea>
          </div><!--form-grioup finish-->
          <div class="text-center"><!--text-center begin-->
           <button type="submit" name="submit" class="btn btn-primary">
           <i class="fa fa-user-md"></i> Send Message
           </button>
          </div>
        </form><!--form finish-->
         <?php
           if(isset($_POST['submit']))
          //admin recieves messages with this
          $sender_name = $_POST['name'];
          $sender_email = $_POST['email'];
          $sender_subject = $_POST['subject'];
          $sender_message = $_POST['message'];
          $receiver_mail = "engnadagomaa@yahoo.com";
          mail($receiver_mail,$sender_name,$sender_subject,$sender_message,$sender_email);
          $email = $_POST['email'];
          $subject = "welcome To Web Site";
          $msg = "Thanks For Sending Us Message ";
          $from = "engnadagomaa@yahoo.com";
          mail($email,$subject,$msg,$from);
          echo "<h2>your message has sent successfully</h2>";
          ?>


      </div><!--box-header finish -->
    </div><!--box finish -->
  </div><!--col-md-9 finish -->










</div><!--container finish -->
</div><!--#content finish -->

<?php include("includes/footer.php") ?>


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  <!-- <script src="js/fontawesome.min.js"></script> -->
  </body>
</html>
