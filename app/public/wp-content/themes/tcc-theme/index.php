<?php get_header();

query_posts(array('order' => 'ASC'));

if ( have_posts() ) :
  while ( have_posts() ) : the_post(); ?>
    <div>
      <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    </div> 
  <?php endwhile;
endif; 

get_footer(); ?>