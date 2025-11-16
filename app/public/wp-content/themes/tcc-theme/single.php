<?php get_header(); ?>

<main class="single-post-container">
  <?php 
    if (have_posts()):
      while (have_posts()): the_post(); 
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1 class="single-post-title"><?php the_title(); ?></h1>
      <div class="single-post-meta">
        Publicado em <?php echo get_the_date(); ?> por <?php the_author(); ?>
      </div>

      <?php if (has_post_thumbnail()): ?>
        <div class="single-post-thumbnail">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <div class="single-post-content">
        <?php the_content(); ?>
      </div>

      <div class="single-post-footer">
      </div>
    </article>
  <?php 
      endwhile;
    endif;
  ?>
</main>

<?php get_footer(); ?>
