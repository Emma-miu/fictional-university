<?php get_header();

pageBanner( array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in our world',
));
?>



<div class="container container--narrow page-section">
  <?php 
  while(have_posts()) : the_post(); 
    get_template_part('/template-parts/content', 'event');
  endwhile; 
  echo paginate_links();
  ?>
  <hr class="section-break">
  <p>Looking for a recap of our past events? <a href="<?php echo esc_url(site_url('past-events')); ?>">Check out our Past Events archive</a></p>
</div>

<?php get_footer();?>