<?php

        /***************************************************************   Activaton du thème    ***************************************************************************/
    function add_theme_scripts()
    {
        wp_enqueue_style('style', get_stylesheet_uri());

        // wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all');

        // wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);

        //
    }
    add_action('wp_enqueue_scripts', 'add_theme_scripts');


    // Ajouter la prise en charge des images mises en avant
    add_theme_support('post-thumbnails');

    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');


        /***************************************************************   Bootsrap    ***************************************************************************/
    // ajout utiliation de BootStrap
    function bootstrap_scripts_enqueue()
    {
        // all styles
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
        wp_enqueue_style('blogBreakers-style', get_stylesheet_uri());
    
        // all scripts
        // wp_enqueue_script( 'jquery-3-js', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js');
        // wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js');
    }
    add_action('wp_enqueue_scripts', 'bootstrap_scripts_enqueue', 80);


        /***************************************************************       Création du Menu        ***************************************************************************/


    function header_widgets_init()
    {

        register_sidebar(array(

            'name' => 'Ma nouvelle zone de widget',
            'id' => 'new-widget-area',
            'before_widget' => '<div class="nwa-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="nwa-title">',
            'after_title' => '</h2>',
        ));
    }

add_action('widgets_init', 'header_widgets_init');

    /**
     * Register navigation menus uses wp_nav_menu in five places.
     */

    function gitbreakers_menus()
    {

        $locations = array(
            'primary'  => __('Desktop Horizontal Menu', 'gitbreakers'),
            'expanded' => __('Desktop Expanded Menu', 'gitbreakers'),
            'mobile'   => __('Mobile Menu', 'gitbreakers'),
            'footer'   => __('Footer Menu', 'gitbreakers'),
            'social'   => __('Social Menu', 'gitbreakers'),
        );

        register_nav_menus($locations);
    }

    add_action('init', 'gitbreakers_menus');


        /***************************************************************     Fin Création du Menu        ***************************************************************************/



        /***************************************************************     Début Fonction  Post Type      ***************************************************************************/


    
    /*
   * On utilise une fonction pour créer notre custom post type 'Apprenants'
   */

function wpm_custom_post_type()
{

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(
        // Le nom au pluriel
        'name'                => _x('Apprenants', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name'       => _x('Apprenant', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name'           => __('Apprenants'),
        // Les différents libellés de l'administration
        'all_items'           => __('Tous les Apprenants'),
        'view_item'           => __('Voir les Apprenants'),
        'add_new_item'        => __('Ajouter un nouvel Apprenant'),
        'add_new'             => __('Ajouter'),
        'edit_item'           => __('Editer un profil'),
        'update_item'         => __('Modifier un profil'),
        'search_items'        => __('Rechercher un Apprenant'),
        'not_found'           => __('Apprenant non trouvée'),
        'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type

    $args = array(
        'label'               => __('Apprenants'),
        'description'         => __('Tout tout tout'),
        'labels'              => $labels,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports'            => array('title'),
        /* 
           * Différentes options supplémentaires
           */
        'show_in_rest' => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'Apprenants'),

    );

    // On enregistre notre custom post type qu'on nomme ici avec ses arguments
    register_post_type('apprenants', $args);
}

add_action('init', 'wpm_custom_post_type', 0);

//ajouter un <menu>


    /***************************************************************       Fin Fonction Post Type        ***************************************************************************/



    /***************************************************************      Debut Méta Box        ***************************************************************************/

/**
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function apprenants_add_meta_boxes($post)
{
    add_meta_box('apprenants_meta_box', __('apprenants', 'apprenants_example_plugin'), 'apprenants_build_meta_box', 'apprenants', 'normal', 'low');
}
add_action('add_meta_boxes_apprenants', 'apprenants_add_meta_boxes');

function apprenants_build_meta_box($post)
{
    // make sure the form request comes from WordPress
    wp_nonce_field(basename(__FILE__), 'apprenants_meta_box_nonce');

    // retrieve the _personnes_nom current value
    // $current_nom = get_post_meta($post->ID, '_personnes_nom', true);

    // retrieve the _personnes_age current value
    $nom = get_post_meta($post->ID, '_apprenants_nom', true);
    $prenom = get_post_meta($post->ID, '_apprenants_prenom', true);
    $github  = get_post_meta($post->ID, '_apprenants_github', true);
    $linkedIn   = get_post_meta($post->ID, '_apprenants_linkedIn', true);


?>
    <div class='inside'>
        <h3><?php _e('nom', 'apprenants_example_plugin'); ?></h3>
        <p>
            <input type="text" name="nom" style="width: 30vw" value="<?php echo $nom; ?>" />
        </p>

        <h3><?php _e('prenom', 'apprenants_example_plugin'); ?></h3>
        <p>
            <input type="text" name="prenom" style="width: 30vw" value="<?php echo $prenom; ?>" />
        </p>

        <h3><?php _e('github', 'apprenants_example_plugin'); ?></h3>
        <p>
            <input type="text" name="github" style="width: 30vw" value="<?php echo $github; ?>" />
        </p>

        <h3><?php _e('linkedIn', 'apprenants_example_plugin'); ?></h3>
        <p>
            <input type="text" name="linkedIn" style="width: 30vw" value="<?php echo $linkedIn; ?>" />
        </p>

    </div>
<?php
}

        /***************************************************************      Fin Méta Box        ***************************************************************************/



        /***************************************************************       Début Save Meta Box        ***************************************************************************/

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */

function apprenants_save_meta_box_data($post_id)
{
    // verify taxonomies meta box nonce
    if (!isset($_POST['apprenants_meta_box_nonce']) || !wp_verify_nonce($_POST['apprenants_meta_box_nonce'], basename(__FILE__))) {
        return;
    }

    // return if autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // store custom fields values
    // nom string
    if (isset($_REQUEST['nom'])) {
        update_post_meta($post_id, '_apprenants_nom', sanitize_text_field($_POST['nom']));
    }

    // store custom fields values
    // prénom string
    if (isset($_REQUEST['prenom'])) {
        update_post_meta($post_id, '_apprenants_prenom', sanitize_text_field($_POST['prenom']));
    }

    // store custom fields values
    // github string
    if (isset($_REQUEST['github'])) {
        update_post_meta($post_id, '_apprenants_github', sanitize_text_field($_POST['github']));
    }

    // store custom fields values
    //linkedIn string
    if (isset($_REQUEST['linkedIn'])) {
        update_post_meta($post_id, '_apprenants_linkedIn', sanitize_text_field($_POST['linkedIn']));
    }
}
add_action('save_post_apprenants', 'apprenants_save_meta_box_data');


/***************************************************************      Fin Save Meta Box        ***************************************************************************/