<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function header_widgets_init() {
 
    register_sidebar( array(
   
    'name' => 'Ma nouvelle zone de widget',
    'id' => 'new-widget-area',
    'before_widget' => '<div class="nwa-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="nwa-title">',
    'after_title' => '</h2>',
    ) );
   }
   
   add_action( 'widgets_init', 'header_widgets_init' );


   

   /*
   * On utilise une fonction pour créer notre custom post type 'Apprenants'
   */
   
   function wpm_custom_post_type()
   {
   
       // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
       $labels = array(
           // Le nom au pluriel
           'nom'                => _x('Apprenants', 'Post Type General Name'),
           // Le nom au singulier
           'prenom'       => _x('Apprenant', 'Post Type Singular Name'),
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
   
       // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
       register_post_type('personnes', $args);
   }
   
   add_action('init', 'wpm_custom_post_type', 0);
   
   
   /**
    * Add meta box
    *
    * @param post $post The post object
    * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
    */
   function personnes_add_meta_boxes($post)
   {
       add_meta_box('Apprenants_meta_box', __('Apprenants', 'Apprenants_example_plugin'), 'Apprenants_build_meta_box', 'Apprenants', 'normal', 'low');
   }
   add_action('add_meta_boxes_Apprenants', 'Apprenants_add_meta_boxes');
   
   function Apprenants_build_meta_box($post)
   {
       // make sure the form request comes from WordPress
       wp_nonce_field(basename(__FILE__), 'Apprenants_meta_box_nonce');
   
       // retrieve the _personnes_nom current value
       // $current_nom = get_post_meta($post->ID, '_personnes_nom', true);
   
       // retrieve the _personnes_age current value
       $nom = get_post_meta($post->ID, '_Apprenants_nom', true);
       $prenom = get_post_meta($post->ID, '_Apprenants_prenom', true);
       $github  = get_post_meta($post->ID, '_Apprenants_github', true);
       $linkedIn   = get_post_meta($post->ID, '_Apprenants_linkedIn', true);
   
   
   ?>
       <div class='inside'>
           <h3><?php _e('nom', 'Apprenants_example_plugin'); ?></h3>
           <p>
               <input type="text" name="nom" value="<?php echo $nom; ?>" />
           </p>

           <h3><?php _e('prenom', 'Apprenants_example_plugin'); ?></h3>
           <p>
               <input type="text" name="prenom" value="<?php echo $prenom; ?>" />
           </p>

           <h3><?php _e('github', 'Apprenants_example_plugin'); ?></h3>
           <p>
               <input type="text" name="github" value="<?php echo $github; ?>" />
           </p>

           <h3><?php _e('linkedIn', 'Apprenants_example_plugin'); ?></h3>
           <p>
               <input type="text" name="linkedIn" value="<?php echo $linkedIn; ?>" />
           </p>
       </div>
   <?php
   }
   
   /**
    * Store custom field meta box data
    *
    * @param int $post_id The post ID.
    * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
    */
   function Apprenants_save_meta_box_data( $post_id ){
       // verify taxonomies meta box nonce
       if ( !isset( $_POST['Apprenants_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['Apprenants_meta_box_nonce'], basename( __FILE__ ) ) ){
           return;
       }
   
       // return if autosave
       if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
           return;
       }
   
       // Check the user's permissions.
       if ( ! current_user_can( 'edit_post', $post_id ) ){
           return;
       }
   
       // store custom fields values
       // age string
       if ( isset( $_REQUEST['age'] ) ) {
           update_post_meta( $post_id, '_Apprenants_nom', sanitize_text_field( $_POST['nom'] ) );
       }
       
       // store custom fields values
       // ville string
       if ( isset( $_REQUEST['prenom'] ) ) {
           update_post_meta( $post_id, '_Apprenants_prenom', sanitize_text_field( $_POST['prenom'] ) );
       }

       // store custom fields values
       // ville string
       if ( isset( $_REQUEST['github'] ) ) {
        update_post_meta( $post_id, '_Apprenants_github', sanitize_text_field( $_POST['github'] ) );
    }

    // store custom fields values
       // ville string
       if ( isset( $_REQUEST['linkedIn'] ) ) {
        update_post_meta( $post_id, '_Apprenants_linkedIn', sanitize_text_field( $_POST['linkedIn'] ) );
    }

   }
   add_action( 'save_post_Apprenants', 'Apprenants_save_meta_box_data' );
   