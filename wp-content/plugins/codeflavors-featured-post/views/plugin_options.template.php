<div class="wrap">
    <h1><?php _e( 'CodeFlavors Featured Post', 'codeflavors-featured-post' );?></h1>
    
    <p>
        <?php _e( 'Below you can find a brief description of the shortcode implemented by the plugin.', 'codeflavors-featured-post' );?><br />
        <?php printf( __( 'For more information about this plugin, please see the %sdocumentation%s.', 'codeflavors-featured-post' ), '<a href="'.cfp_plugin_url( 'documentation/wordpress-featured-post/' ).'">', '</a>' );?>
        <?php printf( __( "If you're in trouble let us know %son the forum%s.", 'codeflavors-featured-post' ), '<a href="' . cfp_plugin_url( 'codeflavors-forums/forum/codeflavors-featured-post/' ) . '">', '</a>' );?>
    </p>
    
    <p>
        <?php 
            printf( 
                __( "We would appreciate it very much if you could take the time and %sleave a review%s for this plugin, thank you.", 'codeflavors-featured-post' ),
                '<a href="https://wordpress.org/support/view/plugin-reviews/codeflavors-featured-post" target="_blank">',
                '</a>'
            );?>
    </p>
    
    <?php 
        $shortcodes = cfp_get_shortcodes();
        foreach( $shortcodes as $shortcode => $data ):
    ?>
    
    <h2>[<?php echo $shortcode;?>]</h2>
    
    <ol>
        <?php foreach( $data['atts'] as $attr => $details ):?>
        <li>
            <strong><?php echo $attr;?></strong> : <?php echo $details['desc'];?> <em>( <?php _e( 'default', 'codeflavors-featured-post' )?> : <?php cfp_value_to_txt( $details['value'] );?> )</em>
        </li>
        <?php endforeach;?>
    </ol>
    
    <?php endforeach;?> 
      
</div>