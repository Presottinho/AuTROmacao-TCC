<?php get_header(); ?>

<main>
  <h1>Hello World</h1>
  <p>This is a filler content</p>
  <p>this is another filler content</p>
  
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      the_title('<h2>', '</h2>');
      the_content();
    endwhile;
  else :
    echo '<p>No content found</p>';
  endif;
  ?>
</main>

<?php get_footer(); ?>