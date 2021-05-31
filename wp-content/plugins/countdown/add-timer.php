<?php

if(isset($_POST['submit']))
{
    $title          = $_POST['title'];
    $time           = $_POST['date'];
    $expire   = $_POST['expire'];
    $expire_msg        = $_POST['expire-msg'];
    $created_at     = date("Y-m-d H:i:s");

    insertdata_in_database($title, $time, $after_expiry, $expire_msg, $created_at);
 
}
?>
<div class="rev-form-container">
<h1>Add New Timmer</h1>
<div class="form" >
<form method="POST">
  <div>
    <label for="title" >Add Timer title:</label>
    <input type="text" name="title" id="title" value="<?php echo !empty($result) ? $result->title : '' ?>">
  </div>
  <div>
    <label for="date">Set start date and time:</label>
    <input type="datetime-local" name="date" id="date" value="<?php echo !empty($result) ? $result->time : '' ?>">
  </div>
  <div>
  <label for="after-expire">After Expiry:</label>
  <select name="expire" id="after-expire">
    <option value="">Select Options</option>
    <option value="hide" <?php echo !empty($result) && $result->after_expiry == 'hide' ? 'Selected' : '' ?>>Hide</option>
    <option value="message" <?php echo !empty($result) && $result->after_expiry == 'message' ? 'Selected' : '' ?>>Show Message</option>
  </select>
  </div>
  <div>
    <textarea name="expire-msg" id="expire-msg" rows="6" cols="50"></textarea>
  </div>
  <div >
    <input type="submit" name="submit" value="Submit">
  </div>
  </form>
</div>
</div>
