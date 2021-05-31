<?php


get_header(); ?>
 
<div id="primary" class="site-content">
<div id="content" role="main">
 <div class="wrapper">
 <div id="post-content">
<?php while ( have_posts() ) : the_post(); ?>
                 
<h1 class="entry-title"><?php the_title(); ?></h1>
 
<div class="entry-content">
 
<?php the_content(); ?>
 <div class="movies-area">
    <?php 
        $youtube_id = get_field("youtube_id");
        $audio = get_field("upload_audio");
        $vimeo_id = get_field("vimeo_id");
    if(!empty($audio)) :
    ?>
        <audio controls>
            <source src="<?php echo $audio?>" type="audio/mp3">
        </audio>
    <?php
    endif; 
    if(!empty($youtube_id)) :
    ?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php
    endif;
    if(!empty($vimeo_id)) :
    ?>
        <iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id ?>" width="640" height="272" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
        <p><a href="https://vimeo.com/29474908">09232011</a> from <a href="https://vimeo.com/charlesbergquist">Charles Bergquist</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
    <?php
    endif;
    ?>
    </div>
 
</div><!-- .entry-content -->
 
<?php endwhile; // end of the loop. ?>
</div> <!-- post-content -->


 </div><!-- wrapper -->
</div><!-- #content -->
</div><!-- #primary -->
 

<?php get_footer(); ?>