<?php get_header(); ?>

<div class="search-results-container">
    <h1>Resultados para: "<?php echo get_search_query(); ?>"</h1>

    <?php if (have_posts()) : ?>
        <div class="search-results-list">
            <?php 
            $search_query = get_search_query();
            while (have_posts()) : the_post(); 
                $content = get_the_content();
                
                $pos = stripos($content, $search_query);

                if ($pos !== false) {
                    $start = max(0, $pos - 50);
                    $length = strlen($search_query) + 100;
                    $excerpt = substr($content, $start, $length);
                    $excerpt = str_ireplace($search_query, '<mark>'.$search_query.'</mark>', $excerpt);
                } else {
                    $excerpt = wp_trim_words($content, 20);
                }
            ?>
                <div class="search-result-item">
                    <a href="<?php the_permalink(); ?>" class="search-result-title"><?php the_title(); ?></a>
                    <p class="search-result-excerpt"><?php echo $excerpt; ?>...</p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p class="no-results">Nenhum resultado encontrado.</p>
    <?php endif; ?>
</div>

<?php get_footer() ?>
