<form class="searchform" role="search" method="get" action="<?php echo home_url('/'); ?>">
  <input type="search" placeholder="Suche" value="<?php echo get_search_query() ?>" name="s" title="Search" id="example-search-input">
  <button type="search">
    <i class="fa fa-search"></i>
  </button>
</form>
