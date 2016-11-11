<?php

/**
 * Costume post secction, change name to "Productos", disable tags, etc
 */

add_action( 'admin_menu', 'fbyte_change_post_label' );
function fbyte_change_post_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = 'Productos';
    $submenu['edit.php'][5][0] = 'Nuevo';
    $submenu['edit.php'][10][0] = 'Agregar Producto';
    $submenu['edit.php'][16][0] = 'Etiquetas';
}

add_action( 'init', 'fbyte_change_post_object' );
function fbyte_change_post_object()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Productos';
    $labels->singular_name = 'Productos';
    $labels->add_new = 'Agregar Producto';
    $labels->add_new_item = 'Agregar Productos';
    $labels->edit_item = 'Editar Producto';
    $labels->new_item = 'Productos';
    $labels->view_item = 'Ver Productos';
    $labels->search_items = 'Buscar Productos';
    $labels->not_found = 'No hay productos encontrados';
    $labels->not_found_in_trash = 'No se encontraron productos en la basura';
    $labels->all_items = 'Todos los productos';
    $labels->menu_name = 'Productos';
    $labels->name_admin_bar = 'Productos';
 }

// Remove tags support from posts
add_action('init', 'fbyte_unregister_tags');
function fbyte_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
