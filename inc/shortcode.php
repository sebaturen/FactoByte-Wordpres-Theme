<?php
/**
 * Shortcode util in this theme:
 */

/* Separator div: solid border 1px */
if ( ! function_exists( 'fbyte_separatero_src' ) ) :
add_shortcode('separador', 'fbyte_separatero_src');
function fbyte_separatero_src()
{
    return "<div class='bord-separador'></div>";
}
endif;
