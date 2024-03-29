<?php

class ATR_Public {

    private $theme_name;
    private $version;

    public function __construct($theme_name, $version) {
        
        $this->theme_name = $theme_name;
        $this->version = $version;

    }

    public function enqueue_styles(){

        wp_enqueue_style(
            'normalize',
            ATR_DIR_URI . 'public/css/normalize.css',
            array(),
            '8.0.1',
            'all'
        );
    
        wp_enqueue_style(
            'public-css',
            ATR_DIR_URI . 'public/css/atr-public.css',
            array(),
            '1.0.0',
            'all'
        );
    
        wp_enqueue_style(
            'bootstrap-css',
            ATR_DIR_URI . 'helpers/bootstrap-5.3.0/css/bootstrap.min.css',
            array(),
            '5.3.0',
            'all'
        );

        //archivos fontawesome css
        wp_enqueue_style(
            'brands',
            ATR_DIR_URI . 'helpers/fontawesome-6.2.1/css/brands.min.css',
            [],
            '6.2.1',
            'all'
        );
        wp_enqueue_style(
            'fontawesome',
            ATR_DIR_URI . 'helpers/fontawesome-6.2.1/css/fontawesome.min.css',
            [],
            '6.2.1',
            'all'
        );

    }

    
    public function enqueue_scripts() {
    
        wp_enqueue_script(
            'public-js',
            ATR_DIR_URI . '/public/js/atr-public.js',
            ['jquery', 'bootstrap-min'],
            '1.0.0',
            true
        );
    
        wp_enqueue_script(
            'bootstrap-min',
            ATR_DIR_URI . '/helpers/bootstrap-5.3.0/js/bootstrap.min.js',
            ['jquery'],
            '5.3.0',
            true
        );

        //Scripts fontawesome
        wp_enqueue_script(
            'fontawesome-js',
            ATR_DIR_URI . '/helpers/fontawesome-6.2.1/js/fontawesome.min.js',
            [],
            '6.2.1',
            true
        );
        wp_enqueue_script(
            'brands-js',
            ATR_DIR_URI . '/helpers/fontawesome-6-2-1/js/brands.min.js',
            [],
            '6.2.1',
            true
        );

    }


    /**
     * Aqui cargamos alguna funciones para ajustar el menu del frontend
     */
    public function atr_theme_support() {

        // Registrar el menu
        register_nav_menus([
            'menu_principal' => __('Menu Principal', 'pruebas'),
            'menu_redes_sociales' => __('Menu Redes Sociales', 'pruebas')
        ]);

        //Array para añadir las propiedades del logo
        $logo = [
            'width'       => 230,
            'height'      => 80,
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => array('pruebas', 'un sitio web de pruebas')
        ];

        add_theme_support('custom-logo', $logo);

        //Añade la imagen destacada a todas las paginas y post
        add_theme_support('post-thumbnails');

        //widgets
        add_theme_support('widgets');
    }

    public function atr_register_sidebars() {

        /**
         * Sidebar para el blog
         */
        register_sidebar( array(
            'name'          => __('sidebar blog', 'pruebas'),
            'id'            => 'blog',
            'description'   => __('Sidebar para el blog', 'pruebas'),
            'before_widget' => '<div class="%1$s" id="widget-blog">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-blog">',
            'after_title'   => '</h3>'
        ));

        /**
         * Sidebar para la pagina de contacto
         */
        register_sidebar(array(
            'name'          => __('sidebar contacto', 'pruebas'),
            'id'            => 'contacto',
            'description'   => __('Sidebar para el contacto', 'pruebas'),
            'before_widget' => '<div class="%1$s" id="widget-contacto">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-contacto">',
            'after_title'   => '</h3>'
        ));
    }
}