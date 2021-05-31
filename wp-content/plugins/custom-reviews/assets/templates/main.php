<?php

global $wpdb;
$table_name = $wpdb->prefix . "custom_review";
$results = $wpdb->get_results( "SELECT * FROM $table_name"); 

?>
  <table>
  <thead>
    <th>ID</th>
    <th>Title</th>
    <th>Review</th>
    <th>Client</th>
    <th>Designation</th>
  </thead>
  <tbody>
<?php

if(!empty($results))
{
  foreach ($results as $review){
    echo '<tr>';
    echo '<td>' . $review->id . '</td>';
    echo '<td>' . $review->title . '</td>';
    echo '<td>' . $review->review . '</td>';
    echo '<td>' . $review->client_name . '</td>';
    echo '<td>' . $review->designation . '</td>';
?>
    <?php echo '<td>'; ?> <a href="<?php get_permalink(); ?>" target="_blank">Edit</a><?php echo '</td>'; ?>
    <?php echo '<td>'; ?> <a href="#" target="_blank">Delete</a><?php echo '</td>'; ?>
<?php
    echo '</tr>';
  }
}
?>
  </tbody>
</table>