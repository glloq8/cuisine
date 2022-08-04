<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Rechercher','sl_theme') ?>" name="s" />
    <button type="submit" class="search-submit">
        <svg>
            <use xlink:href="#search"></use>
        </svg>
    </button>
</form>