<form action="<?php bloginfo('url'); ?>/" method="get">
    <input placeholder="Search GrowthBox ..." type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <input class="search" type="submit" value="Search" />
</form>