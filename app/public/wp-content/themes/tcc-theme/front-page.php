<?php get_header() ?>

<?php
  while(have_posts()){
    the_post(); ?>
    <div class="content-block">
      <h2><?php the_title() ?></h2>
      <div class="content">
        <?php the_content() ?>
      </div>
    </div>  
  <?php }
?>
<div class="category-menu">
  <div class="filter-dropdown">
    <button class="filter-btn">
      Filtrar por: <span class="filter-arrow">▾</span>
    </button>
    <div class="filter-panel">
      <ul>
        <li><button class="filter-option" data-orderby="date" data-order="asc">Ordem de Postagem</button></li>
        <li><button class="filter-option" data-orderby="modified" data-order="desc">Recentemente Atualizado</button></li>
        <li><button class="filter-option" data-orderby="title" data-order="asc">Ordem alfabética</button></li>
      </ul>
    </div>
  </div>

  <div class="tri-filters">
    <button class="tri-btn" data-cat="5">1º Tri</button>
    <button class="tri-btn" data-cat="6">2º Tri</button>
    <button class="tri-btn" data-cat="8">3º Tri</button>
  </div>

  <div class="search-container">
    <?php get_search_form(); ?>
    </div>
</div>

<section class="latest-posts">
  <div class="posts-list">
    <?php

    $recent_posts = new WP_Query([
      'posts_per_page' => 6,
      'post_status' => 'publish',
      'orderby' => 'posted',
      'order' => 'DESC',
    ]);

    if ($recent_posts->have_posts()):
      while ($recent_posts->have_posts()): $recent_posts->the_post();
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    ?>
        <article class="post-item">
          <a href="<?php the_permalink(); ?>" class="post-item-link">
           <div class="post-thumbnail">
            <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>">
          </div>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          
        </article>
    <?php
      endwhile;
      wp_reset_postdata();
    else:
      echo '<p>Sem publicações recentes.</p>';
    endif;
    ?>
  </div>
</section>

<?php get_footer(); ?>