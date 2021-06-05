<?php

function new_profile_create_db() {

global $wpdb;

$charset_collate = $wpdb->get_charset_collate();

$table_name = $wpdb->prefix . 'profile';

$sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    phone varchar(255) NOT NULL,
    about varchar(255) NOt NULL,
    created_at datetime NOT NULL,
    PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
}


function insertdata_in_database($firstname, $lastname, $email, $phone, $about){
    global $wpdb;
    $table_name = $wpdb->prefix . 'profile';
    $wpdb->insert($table_name, array(
                'firstname'  =>$firstname,
                'lastname'   => $lastname,
                'email'      => $email,
                'phone'      => $phone,
                'about'      => $about,
                'created_at' => date("Y-m-d H:m:s")
              ),array('%s')
    );
}

function updatedata_in_database($id , $firstname, $lastname, $email, $phone, $about){
    global $wpdb;
    $table_name = $wpdb->prefix . 'profile';
    $data = array(
        'firstname'  =>$firstname,
        'lastname'   => $lastname,
        'email'      => $email,
        'phone'      => $phone,
        'about'      => $about,
        'created_at' => date("Y-m-d H:m:s")
    );
    $where = array(
        'id' => $id
    );
    $wpdb->update($table_name, $data, $where);
    
}

function profile_form_data_callback(){
    global $wpdb;

    // table name by dynamic prefix
    $table_name = $wpdb->prefix . "profile";

    //Fetch record for Edit Screen start
    $results = null;

    if(isset($_GET['id']) && !empty($_GET['id']) ){
        $results = $wpdb->get_row( "SELECT * FROM $table_name where id =". $_GET['id']);
    }
    //Fetch record for Edit Screen end

    //Add new record in database

    if(isset($_POST['submit']))
    {
        $firstname  = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $email  = $_POST['email'];
        $phone  = $_POST['phone'];
        $about  = $_POST['about'];

        if(isset($_GET['id']) && !empty($_GET['id'])){
            updatedata_in_database($_GET['id'],$firstname, $lastname, $email, $phone, $about);
        }else{

            insertdata_in_database($firstname, $lastname, $email, $phone, $about);
        }
    
    } ?>
    <h1 style="text-align:center">Profile Data</h1>
    <div class="container">
    <form method="POST" id="new_timmer" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-2" for="firstname">Firstname</label>
        <div class="col-sm-10">
        <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo !empty($results->firstname) ? $results->firstname : '' ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="lastname">Lastname</label>
        <div class="col-sm-10">
        <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo !empty($results->lastname) ? $results->lastname : '' ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email</label>
        <div class="col-sm-10">
        <input class="form-control" type="text" name="email" id="email" value="<?php echo !empty($results->email) ? $results->email : '' ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="phone">Phone No</label>
        <div class="col-sm-10">
        <input class="form-control" type="text" name="phone" id="phone" value="<?php echo !empty($results->phone) ? $results->phone : '' ?>">
        </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-2" for="about">About</label>
        <div class="col-sm-10">
        <textarea class="form-control" name="about" id="about"><?php echo !empty($results->about) ? $results->about : '' ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <input class="btn btn-success" type="submit" name="submit" value="Submit" id="submit-btn">
        </div>
    </div>
    </form>
</div>
<?php
}
