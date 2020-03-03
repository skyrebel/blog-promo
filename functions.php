<?php

    /******************************************** Activaton du thème et charger scripts et styles    ***************************************************************************/
    function add_theme_scripts()
    {
        // boostrap
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
        wp_enqueue_style('blogBreakers-style', get_stylesheet_uri());
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js');
        wp_enqueue_script( 'jquery-3-js', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js');
        wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js');

        //css
        wp_enqueue_style( 'gitbreakers', get_template_directory_uri() . '/assets/css/style.css', array(), '1.1', 'all');

        //js
        wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array ( 'jquery' ), 1.1, true);

    }
    add_action('wp_enqueue_scripts', 'add_theme_scripts');


    // Ajouter la prise en charge des images mises en avant
    add_theme_support('post-thumbnails');

    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');
    /***************************************************************     controleur img/logo     ***************************************************************************/
    function themename_custom_logo_setup() {
        $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        );
        add_theme_support( 'custom-logo', $defaults );
    }
       add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
    /***************************************************************       widget header        ***************************************************************************/

    function header_widgets_init(){
        register_sidebar(array(

        'name' => 'promo-widget',
        'id' => 'promo-widget',
        'before_widget' => '<div class="col-1 offset-2 bg-orange">',
        'after_widget' => '</div>',
        'before_title' => '<p class="h1 my-4 text-center text-uppercase text-white old-press">',
        'after_title' => '</p>',
        ));
    }

    add_action('widgets_init', 'header_widgets_init');
    /***************************************************************       widget map       ***************************************************************************/

        function front_page_widgets_init(){
            register_sidebar(array(
    
            'name' => 'map-widget',
            'id' => 'map-widget',
            'before_widget' => '<span>',
            'after_widget' => '</span>',
            ));
        }
    
        add_action('widgets_init', 'front_page_widgets_init');
    /***************************************************************       Création du Menu        ***************************************************************************/
    function wpbootstrap_after_setup_theme() {
        // On ajoute un menu^G%le3@kwYE(oZfD!E
        register_nav_menu('header_menu', "Menu du header");
        // On ajoute une classe php permettant de gérer les menus Bootstrap
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    add_action('after_setup_theme', 'wpbootstrap_after_setup_theme');

    register_nav_menus( array(
        'header' => 'Menu Principal',
    ) );

    /***************************************************************     PAGE  redac     ***************************************************************************/

    /***************************************************************   Fonction  Post Type      ***************************************************************************/
    
    /*
   * On utilise une fonction pour créer notre custom post type 'Apprenants'
   */

function wpm_custom_post_type_apprenants()
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
        'label'               => __('apprenants'),
        'description'         => __('La rédaction'),
        'labels'              => $labels,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports'            => array( 'title', 'editor', 'excerpt',  'thumbnail',  'revisions', 'custom-fields', ),
        /* 
           * Différentes options supplémentaires
           */
        'show_in_rest' => true,
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'apprenants'),

    );

    // On enregistre notre custom post type qu'on nomme ici avec ses arguments
    register_post_type('Apprenants', $args);
}

add_action('init', 'wpm_custom_post_type_apprenants', 0);



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
     //$current_nom = get_post_meta($post->ID, '_personnes_nom', true);

    // retrieve the _personnes_age current value
    $nom = get_post_meta($post->ID, '_apprenants_nom', true);
    $prenom = get_post_meta($post->ID, '_apprenants_prenom', true);
    $github  = get_post_meta($post->ID, '_apprenants_github', true);
    $linkedIn   = get_post_meta($post->ID, '_apprenants_linkedIn', true);
    $portfolio   = get_post_meta($post->ID, '_apprenants_portfolio', true);
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

        <h3><?php _e('portfolio', 'apprenants_example_plugin'); ?></h3>
        <p>
            <input type="text" name="portfolio" style="width: 30vw" value="<?php echo $portfolio; ?>" />
        </p>
    </div>
<?php
}

        


    /***************************************************************   Save Meta Box        ***************************************************************************/

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

        // store custom fields values
        //portfolio string
        if (isset($_REQUEST['portfolio'])) {
            update_post_meta($post_id, '_apprenants_portfolio', sanitize_text_field($_POST['portfolio']));
        }
    }
    add_action('save_post_apprenants', 'apprenants_save_meta_box_data');

    /***************************************************************    PROJETS      ***************************************************************************/


    /***************************************************************    Post Type      ***************************************************************************/
    
    /*
   * On utilise une fonction pour créer notre custom post type 'Projets'
   */

  function wpm_custom_post_type_projets()
  {
  
      // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
      $labels = array(
          // Le nom au pluriel
          'name'                => _x('projets', 'Post Type General Name'),
          // Le nom au singulier
          'singular_name'       => _x('projet', 'Post Type Singular Name'),
          // Le libellé affiché dans le menu
          'menu_name'           => __('projets'),
          // Les différents libellés de l'administration
          'all_items'           => __('Tous les projets'),
          'view_item'           => __('Voir les projets'),
          'add_new_item'        => __('Ajouter un nouveau projet'),
          'add_new'             => __('Ajouter'),
          'edit_item'           => __('Editer un projet'),
          'update_item'         => __('Modifier un projet'),
          'search_items'        => __('Rechercher un projet'),
          'not_found'           => __('Projet non trouvée'),
          'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
      );
  
      // On peut définir ici d'autres options pour notre custom post type
  
      $args = array(
          'label'               => __('projets'),
          'description'         => __('Projets Réalisés'),
          'labels'              => $labels,
          // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
          'supports'            => array( 'title', 'editor', 'excerpt',  'thumbnail',  'revisions', 'custom-fields', ),
          /* 
             * Différentes options supplémentaires
             */
          'show_in_rest' => true,
          'hierarchical'        => false,
          'public'              => true,
          'has_archive'         => true,
          'rewrite'             => array('slug' => 'projets'),
  
      );
  
      // On enregistre notre custom post type qu'on nomme ici avec ses arguments
      register_post_type('projets', $args);
  }
  
  add_action('init', 'wpm_custom_post_type_projets', 0);
  
  
  
      /***************************************************************       Fin Fonction Post Type        ***************************************************************************/
  
  
  
      /***************************************************************      Debut Méta Box        ***************************************************************************/
  
  /**
   * Add meta box
   *
   * @param post $post The post object
   * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
   */
  function projets_add_meta_boxes($post)
  {
      add_meta_box('projets_meta_box', __('projets', 'projets_example_plugin'), 'projets_build_meta_box', 'projets', 'normal', 'low');
  }
  add_action('add_meta_boxes_projets', 'projets_add_meta_boxes');
  
  function projets_build_meta_box($post)
  {
      // make sure the form request comes from WordPress
      wp_nonce_field(basename(__FILE__), 'projets_meta_box_nonce');
  
      // retrieve the _personnes_nom current value
      // $current_nom = get_post_meta($post->ID, '_personnes_nom', true);
  
      // retrieve the _personnes_age current value
      $lien = get_post_meta($post->ID, '_projets_lien', true);
  
  ?>
      <div class='inside'>
          <h3><?php _e('lien vers votre projet', 'projets_example_plugin'); ?></h3>
          <p>
              <input type="text" name="lien" style="width: 30vw" value="<?php echo $lien; ?>" />
          </p>
      </div>
  <?php
  }
  
          /***************************************************************      Fin Méta Box        ***************************************************************************/
  
  

    /***************************************************************  Save Meta Box        ***************************************************************************/
  
    /**
     * Store custom field meta box data
     *
     * @param int $post_id The post ID.
     * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
     */
    
    function projets_save_meta_box_data($post_id)
    {
        // verify taxonomies meta box nonce
        if (!isset($_POST['projets_meta_box_nonce']) || !wp_verify_nonce($_POST['projets_meta_box_nonce'], basename(__FILE__))) {
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
        //lien string
        if (isset($_REQUEST['lien'])) {
            update_post_meta($post_id, '_projets_lien', sanitize_text_field($_POST['lien']));
        }
        
    }
    add_action('save_post_projets', 'projets_save_meta_box_data');

