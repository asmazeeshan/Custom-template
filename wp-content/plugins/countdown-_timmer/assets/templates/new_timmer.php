<?php
$result = null;
if(isset($_GET['id']) && !empty($_GET['id'])){
    global $wpdb;
    $table_name = $wpdb->prefix . "countdown";
    $result = $wpdb->get_row( "SELECT * FROM $table_name where id =".$_GET['id']);
    // var_dump($_POST);die;
}
if(isset($_POST['submit']))
{
    $title          = $_POST['title'];
    $time           = $_POST['date'];
    $after_expiry   = $_POST['expire'];
    $message        = $_POST['expiry-msg'];
    $created_at     = date("Y-m-d H:i:s");

    insertdata_in_database($title, $time, $after_expiry, $message, $created_at);
 
}
?>

<div class="container">
    <h1>Add New Timmer</h1>
    <form method="POST" id="new_timmer" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-2" for="title">Add Timer title</label>
        <div class="col-sm-10">
        <input class="form-control" type="text" name="title" id="title" value="<?php echo !empty($result) ? $result->title : '' ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date">Set start date and time</label>
        <div class="col-sm-10">
        <input class="form-control" type="datetime-local" name="date" id="date" value="<?php echo !empty($result) ? $result->time : '' ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="after-expire">After Expiry</label>
        <div class="col-sm-10">
        <select class="form-control" name="expire" id="after_expire">
        <option value="">Select Options</option>
        <option value="hide" <?php echo !empty($result) && $result->after_expiry == 'hide' ? 'Selected' : '' ?>>Hide</option>
        <option value="message"<?php echo !empty($result) && $result->after_expiry == 'message' ? 'Selected' : '' ?>>Show Message</option>
        </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
        <textarea class="form-control" name="expiry-msg" id="expiry-msg" value="<?php echo !empty($result) ? $result->message : '' ?>"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
        <input class="btn btn-success" type="submit" name="submit" value="Submit" id="submit-btn">
        </div>
    </div>
    </form>
</div>

