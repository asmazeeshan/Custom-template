<?php
  include 'assets/templates/table.php';
?>

<div class="rev-form-container">
<h1>Add New Review</h1>
  <div class="form">
    <form method="POST">
      <div class="row">
        <label>Title:</label>
        <input type="text" name="title" required />
      </div>
      <div class="row">
        <label>Review:</label>
        <textarea id="text" name="text" rows="6" cols="50" required></textarea>
      </div>
      <div class="row">
        <label>Name:</label>
        <input type="text" name="name" required />
      </div>
      <div class="row">
        <label>Designation:</label>
        <input type="text" name="designation" />
      </div>
      <div class="row">
        <input type="submit" name="submit" value="Submit" />
      </div>
      <?php
        if(isset($_POST['submit'])){
          
          $title = $_POST['title'];
          $review = $_POST['text'];
          $client_name = $_POST['name'];
          $designation = $_POST['designation'];
          $date = '';

          $res = insertdata($title, $review, $client_name, $designation, $date);
          if($res){
        ?>
        <div class="row msg-row">
          <p class="msg"><?php echo $res; ?></p>
        </div>
        <?php 
          }
        }
        ?>
    </form>
  </div>
</div>