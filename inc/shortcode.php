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

/* get last N product */
if ( ! function_exists( 'fbyte_last_roduct_src')):
    add_shortcode('last_product', 'fbyte_last_roduct_src');
    function fbyte_last_roduct_src($atts)
    {
        extract(shortcode_atts(array(
            'max' => 3
        ), $atts));

        /* is numeric 'max' enter for user? */
        if (!is_numeric($max) || $max < 1)
        {
            $max = 3;
        }

        /* args get last post */
        $args = array(
            'numberposts' => $max
        );

        $lastPost = wp_get_recent_posts( $args );

        $html = '<div class="lasProductList">';
        foreach ($lastPost as $post)
        {
            $img = get_the_post_thumbnail($post['ID'], 'fbyte-product');
            $html .= "
                <article id='$post[ID]' class='col-sm-4'>
                    <a href='$post[guid]' title='$post[post_title]' >
                        $img
                        <h3><a href='$post[guid]' rel='bookmark'>$post[post_title]</h3>
                    </a>
                </article>
            ";
        }
        $html .= '</div>';

        return $html;
    }
endif;
