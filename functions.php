<?php
// Añade soporte para varias características del tema
function cusco_creativos_theme_support() {
    add_theme_support('title-tag'); // Soporte para etiquetas de título dinámicas
    add_theme_support('custom-logo'); // Soporte para logotipo personalizado
    add_theme_support('post-thumbnails'); // Soporte para imágenes destacadas
}
add_action('after_setup_theme', 'cusco_creativos_theme_support');

// Registra los menús de navegación
function cusco_creativos_menus() {
    $locations = array(
        'primary' => __('Menú principal', 'cusco-creativos'), // Menú principal
        'footer'  => __('Elementos del menú del pie de página', 'cusco-creativos'), // Menú del pie de página
    );
    register_nav_menus($locations); // Registra los menús con WordPress
}
add_action('init', 'cusco_creativos_menus');


// Registra y encola estilos y scripts
function cusco_creativos_register_assets() {
    $version = wp_get_theme()->get('Version'); // Obtiene la versión del tema para evitar problemas de caché

    // Encola los estilos
    wp_enqueue_style('cusco_creativos-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
    wp_enqueue_style('cusco_creativos-slippry', get_template_directory_uri() . '/assets/css/slippry.css', array(), $version, 'all');
    wp_enqueue_style('cusco_creativos-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), $version, 'all');
    wp_enqueue_style('cusco_creativos-style', get_template_directory_uri() . '/assets/css/style.css', array(), $version, 'all');
    wp_enqueue_style('cusco_creativos-google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic|Playfair+Display:400,400italic,700,700italic|Sarina', array(), null);

    // Encola los scripts
    wp_enqueue_script('cusco_creativos-jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', array(), '1.12.4', true);
    wp_enqueue_script('cusco_creativos-slippry', get_template_directory_uri() . '/assets/js/slippry.js', array('cusco_creativos-jquery'), $version, true);
    wp_enqueue_script('cusco_creativos-main', get_template_directory_uri() . '/assets/js/main.js', array('cusco_creativos-jquery', 'cusco_creativos-slippry'), $version, true);
}
add_action('wp_enqueue_scripts', 'cusco_creativos_register_assets');

?>
