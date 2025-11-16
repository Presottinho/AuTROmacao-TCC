<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
  <label class="search-label">
    <input 
      type="search" 
      class="search-input" 
      placeholder="Pesquisar posts..." 
      value="<?php echo get_search_query(); ?>" 
      name="s" 
      required
    />
    <button type="submit" class="search-button">
      🔍
    </button>
  </label>
</form>