<?php 
/**
 * Initialize Visual Composer component for front-end editing
 */
add_action('admin_init', 'cfp_initialize_visual_composer');
function cfp_initialize_visual_composer(){
    
    if( !function_exists( 'vc_map' ) ){
        return;
    }
    
    $templates = cfp_get_templates();
    $template_options = array();
    foreach( $templates as $key => $template ){
        $template_options[ $key ] = isset( $template['name'] ) ? $template['name'] : $key;
    }
    
    vc_map( array(
        'name'     	=> __( 'CodeFlavors Featured Post', 'codeflavors-featured-post' ),
        'description' => __( 'Feature any post type.', 'codeflavors-featured-post' ),
        'base'	  	=> "codeflavors_featured_post",
        'class'    	=> '',
        'icon'     	=> cfp_get_uri( 'assets/admin/images/featured.png' ),
        'category'	=> __( 'Content', 'codeflavors-featured-post' ),
        'params'    => array(
            array(
                'type'       	=> 'dropdown',
        		//'holder'      	=> 'div',
                'admin_label' => true,
                'class'       	=> '',
        		'heading'     	=> __( 'Post type', 'codeflavors-featured-post' ),
        		'param_name'	=> 'post_type',
        		'value'       	=> array_flip( cfp_get_post_types() ),
        		'description'	=> '',
            ),
            array(
                'type' => 'dropdown',
                //'holder' => 'div',
                'class' => '',
                'heading' => __( 'Taxonomy name', 'codeflavors-featured-post' ),
                'param_name' => 'taxonomy',
                'value' => array_flip( cfp_get_taxonomies() ),
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                //'holder' => 'div',
                'class' => '',
                'heading' => __( 'Category/Term', 'codeflavors-featured-post' ),
                'param_name' => 'category',
                'description' => __( 'Enter category/term name or ID', 'codeflavors-featured-post' ),
            ),
            array(
                'type' => 'textfield',
                //'holder' => 'div',
                'class' => '',
                'heading' => __( 'Number of posts', 'codeflavors-featured-post' ),
                'param_name' => 'post_num',
                'value' => '1',
                'description' => __( 'Number of posts to retrieve', 'codeflavors-featured-post' )
            ),
            array(
                'type' => 'textfield',
                //'holder' => 'div',
                'class' => '',
                'heading' => __( 'Post offset', 'codeflavors-featured-post' ),
                'param_name' => 'offset',
                'description' => __( 'Skip posts (ie. to retrieve starting with the second post, set the offset to 1)', 'codeflavors-featured-post' ),
                'value' => '0'
            ),
             array(
                'type' => 'textfield',
                //'holder' => 'div',
                'class' => '',
                'heading' => __( 'Post ID', 'codeflavors-featured-post' ),
                'param_name' => 'post_id',
                'description' => __( 'When set, will override all other parameters and return the post having this ID.', 'codeflavors-featured-post' )
            ),
            array(
                'type' => 'dropdown',
                //'holder' => 'div',
                'class' => '',
                'heading' => __( 'Template', 'codeflavors-featured-post' ),
                'param_name' => 'template',
                'value' => array_flip( $template_options ),
                'description' => __( 'Select one of the available templates to display the featured post.', 'codeflavors-featured-post' ),
            ),
        )
    ));    
}