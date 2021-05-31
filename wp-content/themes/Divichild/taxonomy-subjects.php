<?php

get_header(); ?>
 
<div id="primary" class="site-content">
<div id="content" role="main">
 <div class="wrapper">
 <div id="post-content">
 <?php
    $terms = get_queried_object();
 ?>
 <h2 class="mainh2">
    <?php echo strtoupper($terms->taxonomy), ':', ucwords($terms->name); ?>
 </h2>

<?php while ( have_posts() ) : the_post(); ?>
                 
<h1 class="entry-title"><?php the_title(); ?></h1>
 
<div class="entry-content">
 
<?php the_content(); ?>
<a href="<?php the_permalink(); ?>">Read More</a>
 
</div><!-- .entry-content -->
 
<?php endwhile; // end of the loop. ?>
</div> <!-- post-content -->


 </div><!-- wrapper -->
</div><!-- #content -->
</div><!-- #primary -->
 

<?php get_footer(); ?>