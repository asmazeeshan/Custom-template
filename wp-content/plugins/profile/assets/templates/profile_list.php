<?php

global $wpdb;
$table_name = $wpdb->prefix . "profile";
$results = $wpdb->get_results( "SELECT * FROM $table_name");

?>
<div class="container">
    <table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>About User</th>
        <th></th>
    </thead>
    <tbody>
    <?php

    if(!empty($results))
    {
    foreach ($results as $user){
        echo '<tr>';
            echo '<td>' . $user->id . '</td>';
            echo '<td>' . $user->firstname . '</td>';
            echo '<td>' . $user->lastname . '</td>';
            echo '<td>' . $user->email . '</td>';
            echo '<td>' . $user->phone . '</td>';
            echo '<td>' . $user->about . '</td>';
            echo '<td>'; ?> 
            <a href="<?php echo admin_url('/admin.php?page=add-new-staff&id='.$user->id); ?>">Edit</a>
            <!-- <a href="#" target="_blank">Delete</a> -->
        <?php echo '</td>'; ?>
    <?php
        echo '</tr>';
    }
    }
    ?>

    
    </tbody>
    </table>
</div>
