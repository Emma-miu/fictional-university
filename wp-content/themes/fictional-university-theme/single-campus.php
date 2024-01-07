<?php get_header();
  while(have_posts()) : the_post();
  pageBanner();
?>

<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Campuses</a> <span class="metabox__main"><?php the_title(); ?> </span>
    </p>
  </div>

  <div class="generic-content"><?php the_content(); ?></div>

  <?php 
  //related program
   $relatedProgram = new WP_Query(array(
     'post_type' => 'program',
     'posts_per_page' => -1,
     'orderby' => 'title',
     'order' => 'ASC',
     'meta_query' => array(
       array(
         'key' => 'related_campus',
         'compare' => 'LIKE',
         'value' => '"' . get_the_id() . '"',
       )
     ),
   ));

   if ($relatedProgram->have_posts()) :

   echo '<hr class="section-break">';
   echo '<h2 class="headline headline--medium">Program(s) available at this campus</h2>';
   echo '<ul class="min-list link-list">';
   while($relatedProgram->have_posts()) : $relatedProgram->the_post(); ?>
  <li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </li>
  <?php endwhile; echo '</ul>'; wp_reset_postdata(); endif; ?>

</div>

<?php endwhile;
get_footer();
?>