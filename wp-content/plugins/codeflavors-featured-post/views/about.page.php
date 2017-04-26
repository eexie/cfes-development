<?php 
	// No direct access
if( !defined( 'ABSPATH' ) ){
	die();
}
?>
<div class="wrap about-wrap">
	<h1><?php _e( 'CodeFlavors Featured Post', 'codeflavors-featured-post' );?> <?php echo CFP_VERSION;?></h1>
	<div class="about-text"><?php _e( 'Thank you for using CodeFlavors Featured Post, the plugin that gives you the easiest way to showcase featured posts.', 'codeflavors-featured-post' );?></div>
	<div class="wp-badge cfp-page-logo"><?php printf( __( 'Version %s', 'codeflavors-featured-post' ), CFP_VERSION );?></div>
	<p class="cfp-page-actions">
		<a href="<?php menu_page_url( 'cfp-options' );?>" class="button button-primary"><?php _e( 'Plugin options', 'codeflavors-featured-post' );?></a>
		<a href="<?php echo cfp_plugin_url( 'documentation/wordpress-featured-post/' );?>" target="_blank"><?php _e( 'Docs & Tuts', 'codeflavors-featured-post' );?></a>
	</p>
	
	<div class="changelog under-the-hood feature-list">
		<h3><?php _e( 'Features' ); ?></h3>
	
        <div class="feature-section col two-col">
        	<div>
        		<h4><?php _e( 'Feature any post type', 'codeflavors-featured-post' ); ?></h4>
                <p><?php _e( 'You can choose to feature any publicly registered post type available.', 'codeflavors-featured-post' ); ?></p>
        
                <h4><?php _e( 'Create your own templates', 'codeflavors-featured-post' ); ?></h4>
                <p><?php _e( 'By default, the plugin comes with only two templates: Default and Fancy. If none of the two themes apply to your project, you can easily create your own theme that you can use to feature posts on your website.', 'codeflavors-featured-post' );?></p>
                
                <h4><?php _e('Highly compatible', 'codeflavors-featured-post')?></h4>
                <p><?php _e( 'The plugin is compatible out-of-the-box with Visual Composer plugin and also with any WordPress theme.', 'codeflavors-featured-post' );?></p>
            
            </div>
            <div class="last-feature">
        	    <h4><?php _e( 'Shortcode and widget', 'codeflavors-featured-post' ); ?></h4>
                <p><?php _e( 'You can feature posts by both using the shortcode that the plugin implements or by using the widget added by the plugin.', 'codeflavors-featured-post' );?></p>
        
                <h4><?php _e( 'Plenty of options', 'codeflavors-featured-post' ); ?></h4>
                <p><?php _e( "Featured posts can be selected by ID or as the latest posts from any given category or post type. You can even skip some posts, it's all up to you!", 'codeflavors-featured-post' );?></p>
        	</div>
           
            <hr />
        
            <div class="return-to-dashboard">
            	<a href="<?php menu_page_url( 'cfp-options' ); ?>"><?php _e( 'Plugin options', 'codeflavors-featured-post' );?></a>
            </div>
        </div>
	</div>
</div>