<?php
// No direct include
if( !defined('ABSPATH') ){
	die();
}

final class CFP_Shortcodes{
    
    /**
     * Store registered templates
     * @var array
     */
    protected $templates = array();
    
    /**
     * Store all shortcodes data
     */
    protected $shortcodes = array();
    
    /**
     * Constructor
     */
    public function __construct(){
        // allow third party plugins and themes to register new templating functions
        $this->templates = apply_filters( 'cfp_register_template', $this->templates );
    }
    
    /**
     * Contains all shortcodes implementations
     *
     * @param strong $shortcode - return a single shortcode by key
     * @return array
     */
    public function shortcodes( $shortcode = false ){
        // remove this and replace with your own shortcodes
        $this->shortcodes['codeflavors_featured_post'] = array(
            'callback' => array( $this, 'featured_post' ),
            'atts' => array(
                'category' => array(
                    'desc'  => __( 'The category/taxonomy ID to retrieve the latest post from.', 'codeflavors-featured-post' ),
                    'value' =>   ''
                ),
                'taxonomy' => array(
                    'desc' => __( 'The taxonomy name, if retrieving from anything else other than regular categories.', 'codeflavors-featured-post' ),
                    'value' =>  ''
    
                ),
                'post_type' => array(
                    'desc' => __( 'The post type that should be retrieved from the given taxonomy. Not required when featuring regular posts.', 'codeflavors-featured-post' ),
                    'value' => ''
                ),
                'post_num' => array(
                    'desc' => __( 'The number of posts to retrieve.', 'codeflavors-featured-post' ),
                    'value' => 1
                ),
                'offset' => array(
                    'desc' => __( 'First row to return (ie. a value of 1 means it will return starting with the second most recent post).', 'codeflavors-featured-post' ),
                    'value' => 0
                ),
                'post_id'  => array(
                    'desc' => __( 'A post ID. This will retrieve the exact post ID and will override all other parameters if set.', 'codeflavors-featured-post' ),
                    'value' => 0
                ),
                'template' => array(
                    'desc' => __( 'The featured post template to use when displaying a post.', 'codeflavors-featured-post' ),
                    'value' => 'default'
                ),
            	'cols_xs' => array(
            		'desc' => __( 'Number of columns on small devices (ie. phones)', 'codeflavors-featured-post' ),
            		'value' => 1
            	),
            	'cols_sm' => array(
            		'desc' => __( 'Number of columns on tablet', 'codeflavors-featured-post' ),
            		'value' => 1
            	),
            	'cols_md' => array(
            		'desc' => __( 'Number of columns on desktop computers', 'codeflavors-featured-post' ),
            		'value' => 2
            	)
            )
        );
    
        if( $shortcode ){
            if( array_key_exists( $shortcode , $this->shortcodes ) ){
                return $this->shortcodes[ $shortcode ];
            }else{
                return false;
            }
        }
        return $this->shortcodes;
    }
    
    /**
     * Demo shortcode implementation
     *
     * @param array $atts
     * @return string;
     */
    public function featured_post( $atts = array() ){
        // get shortcode details
        $data = $this->get_atts( 'codeflavors_featured_post' );
        
        // merge user attributes with defaults
        extract( shortcode_atts(
            $data,
            $atts,
            'codeflavors_featured_post'
        ), EXTR_SKIP );
        
        // set a default for the currently extracted post
        $posts = false;
    
        // if post ID is set, extract the post
        if( $post_id ){
            $post = get_post( $post_id );
            if( $post && !is_wp_error( $post ) ){
                $posts = array( $post );
            }
        }else{
            $post_num = absint( $post_num );
            if( $post_num < 1 ){
                return $this->error( __( 'Posts number must be greater than 0. No featured posts displayed.', 'codeflavors-featured-post' ) );
            }
            
            // the following options are: get the latest post type OR get the latest post type from category
            $args = array(
                'posts_per_page'      => $post_num,
                'offset'              => absint( $offset ),
                'suppress_filters'    => false,
                'post_status'         => ( $post_type == 'attachment' ? 'inherit' : 'publish' ),
                'orderby'             => 'post_date',
                'order'               => 'DESC',
                'post_type'           => ( $post_type ? $post_type : 'post' )
            );
    
            if( $category ){
                $args['tax_query'][] = array(
                    'taxonomy' 	=> ( !empty( $taxonomy ) ? $taxonomy : 'category' ),
                    'field'		=> ( !is_numeric( $category ) ? 'name' : 'id' ),
                    'terms'		=> $category
                );
            }           
            
            $posts = get_posts( $args );
        }
        
        if( !$posts || is_wp_error( $posts ) ){
            // posts not found, maybe show an error?
            return $this->error( __( 'There were no posts matching your criteria. Please review the shortcode or widget attributes.', 'codeflavors-featured-post' ) );
        }
    
        // the output
        $output   = '';
        $template = !empty( $template ) ? $template : 'default';
        // get post taxonomies
        $taxonomy = !empty( $taxonomy ) ? $taxonomy : 'category';
        
        // process the columns classes
        $allowed = array( 1, 2, 3, 4, 6, 12 );
        $cols_xs = ( in_array( $cols_xs, $allowed ) ? $cols_xs : $data['cols_sm'] );
        $cols_sm = ( in_array( $cols_sm , $allowed ) ? $cols_sm : $data['cols_md'] );
        $cols_md = ( in_array( $cols_md, $allowed ) ? $cols_md : $data['cols_md'] );
        $wrapper_classes = array(
        	'cfp-grid-item',	
        	'col-xs-' . ( 12 / $cols_xs ),
        	'col-sm-' . ( 12 / $cols_sm ),
        	'col-md-' . ( 12 / $cols_md )
        ); 
        // set the wrapper for each item
        $before = '<div class="' . implode( ' ', $wrapper_classes ) . '">';
        $after = '</div>';
        
        // iterate posts
        foreach( $posts as $k => $post ){
            $terms = wp_get_post_terms( $post->ID, $taxonomy );
            // get post featured image
            $image = false;
            $image_url = false;
            $post_thumbnail_id = 'attachment' == $post->post_type ? $post->ID : get_post_thumbnail_id( $post->ID );
            if( $post_thumbnail_id ){
                $image = wp_get_attachment_image( $post_thumbnail_id, 'full' );
                $image_url = wp_get_attachment_image_url( $post_thumbnail_id, 'full' );
            }
    
            if( array_key_exists(  $template, $this->templates ) ){            	
            	$output .= $before . call_user_func( $this->templates[ $template ]['output_callback'], $post, $terms, $image, $image_url ) . $after;
            }else{
                return $this->error( sprintf( __( "The template %s couldn't be found.", 'codeflavors-featured-post' ), '<strong>"' . $template . '"</strong>' ) );
            }
        }
    
        /**
         * Return output. Wrap everything into a fluid bootstrap.css container
         */
        return '<div class="container-fluid codeflavors-featured-posts-container"><div class="grid">' . $output . '</div></div>';
    }
    
    /**
     * Return the shortcode default attributes as a simple associative array
     * @param string $shortcode
     */
    public function get_atts( $shortcode ){
        $data = $this->shortcodes[ $shortcode ];
        $result = array();
        if( $data ){
            foreach( $data['atts'] as $attr => $details ){
                $result[ $attr ] = $details['value'];
            }
        }
        return $result;
    }
    
    /**
     * 
     * @return Ambigous <multitype:, mixed>
     */
    public function get_templates(){
        return $this->templates;
    }
    
    private function error( $err ){
        if( current_user_can( 'edit_posts' ) ){
            return '<div class="cf-query-error error"><strong style="color:red;">' . __('CodeFlavors Featured Post error', 'codeflavors-featured-post') . ': </strong>' . $err . '</div>';    
        }
    }
}

/**
 * Shortcodes class. Implements all plugin shortcodes
 *
 * @since 1.0
 * @package Video WP plugin
 */
class CFP_Register_Shortcodes{
	
	/**
	 * @var instance
	 **/
	private static $instance = null;
	/**
	 * Store CFP_Shortcodes() object
	 * @var object
	 */
	private static $codes_obj = null;
	
	static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new CFP_Register_Shortcodes;
		}
		
		return self::$instance;
	}
	
	/**
	 * Constructor, implements the shortcodes
	 */
	private function __construct(){
	    
	    if( !isset( self::$instance ) ){
	       self::$instance = $this;
	    }
	    
	    self::$codes_obj = new CFP_Shortcodes;
	    $shortcodes = self::$codes_obj->shortcodes();
	    
	    foreach( $shortcodes as $tag => $data ){
			add_shortcode( $tag , $data['callback'] );
		}
	}
	
	/**
	 * Returns all registered shortcodes
	 * @return array
	 */
	static function get_shortcodes(){
		return self::$codes_obj->shortcodes();
	}
	
	/**
	 * Returns all registered templates
	 */
	static function get_templates(){
	    return self::$codes_obj->get_templates();
	}
}

CFP_Register_Shortcodes::init();