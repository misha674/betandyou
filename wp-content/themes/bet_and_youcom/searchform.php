<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e('Что будем искать?'); ?>" />
<input type="submit" class="sim" name="submit"  value="<?php esc_attr_e('Поиск'); ?>" />
</form>