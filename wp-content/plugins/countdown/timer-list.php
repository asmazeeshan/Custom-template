<?php

global $wpdb;
$table_name = $wpdb->prefix . "countdown";
$results = $wpdb->get_results( "SELECT * FROM $table_name"); 

?>
<div class="container">
    <table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Time</th>
        <th>After Expiry</th>
        <th>Message</th>
        <th>Action</th>
    </thead>
    <tbody>
    <?php

    if(!empty($results))
    {
    foreach ($results as $timmer_data){
        echo '<tr>';
        echo '<td>' . $timmer_data->id . '</td>';
        echo '<td>' . $timmer_data->title . '</td>';
        echo '<td>' . $timmer_data->time . '</td>';
        echo '<td>' . $timmer_data->after_expiry . '</td>';
        echo '<td>' . $timmer_data->message . '</td>';
    ?>
        <?php echo '<td>'; ?> 
        <a href="<?php echo admin_url('/admin.php?page=add-new-review&id='.$timmer_data->id); ?>">Edit</a>
        <a href="#" target="_blank">Delete</a>
        <?php echo '</td>'; ?>
    <?php
        echo '</tr>';
    }
    }
    ?>
    </tbody>
    </table>
</div>
