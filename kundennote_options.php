<?php
add_action( 'admin_menu', 'kundennote_add_admin_menu' );
add_action( 'admin_init', 'kundennote_settings_init' );


function kundennote_add_admin_menu(  ) { 

        add_options_page( 'kundennote.com Bewertungssiegel', 'kundennote.com', 'manage_options', 'kundennote', 'kundennote_options_page' );

}


function kundennote_settings_init(  ) { 

        register_setting( 'pluginPage', 'kundennote_settings' );

            add_settings_section(
                        'kundennote_pluginPage_section', 
                                __( '', 'wordpress' ), 
                                        'kundennote_settings_section_callback', 
                                                'pluginPage'
                                                    );

            add_settings_field( 
                        'kundennote_text_field_id', 
                                __( 'kundennote.com ID: ', 'wordpress' ), 
                                        'kundennote_text_fields_render_id', 
                                                'pluginPage', 
                                                        'kundennote_pluginPage_section' 
                                                            );

            add_settings_field( 
                        'kundennote_text_field_css', 
                                __( 'eigene CSS Anweisungen: ', 'wordpress' ), 
                                        'kundennote_text_fields_render_css', 
                                                'pluginPage', 
                                                        'kundennote_pluginPage_section' 
                                                            );



}


function kundennote_text_fields_render_id(  ) { 

        $options = get_option( 'kundennote_settings' );
            ?>
    <input type='text' class='textfield' name='kundennote_settings[kundennote_text_field_id]' value='<?php echo $options['kundennote_text_field_id']; ?>'>
    <br /><small><?php echo __('Die kundennote.com ID finden Sie im kundennote.com <a href="https://kundennote.com/app/login" target="_blank">Administrationsbereich</a> unter <i>Widget einbinden &raquo; Tab: WORDPRESS VERSION</i>'); ?></small>
   <?php

}

function kundennote_text_fields_render_css(  ) { 

        $options = get_option( 'kundennote_settings' );
            ?>
     <textarea rows="10" class="textfield" name='kundennote_settings[kundennote_text_field_css]' >
<?php echo $options['kundennote_text_field_css']; ?>
</textarea>
<br /><small><?php echo __('Fügen Sie hier Ihre eigenen CSS Anweisungen ein um den Abstand oder die Positionierung des Bewertungssiegels an Ihre Website anzupassen.'); ?></small>
   <?php

}

function kundennote_settings_section_callback(  ) { 

        echo __( 'Hier konfigurieren Sie das kundennote.com Plugin zur Anzeige Ihres Bewertungssiegels auf Ihrer Website.<br /><br /><strong>HINWEIS:</strong> Um das Bewertungssiegel in Ihrer Website zu platzieren verwenden Sie das Widget unter <i>Design &raquo; Widgets</i>.<br>Sie können eines der Bewertungssiegel auch über die Shortcodes <i>[kundennote]</i>, <i>[kundennote style="1"]</i>, <i>[kundennote style="2"]</i>, ... einfügen. Mit <i>style=[Nummer]</i> umgehen Sie die Einstellung des Standard-Siegels, die Sie in Ihrem kundennote.com Account gespeichert haben und können somit verschiedene Bewertungssiegel auf Ihrer Website platzieren.<br><br>', 'wordpress' );

}


function kundennote_options_page(  ) { 

        ?>
<div class="knOptionsWrap">
	<div class="header">
    	<h2><?php echo __('kundennote.com Bewertungssiegel'); ?></h2>
	</div>
    <div class="content">
        <form action='options.php' method='post'>
            <?php
            settings_fields( 'pluginPage' );
            do_settings_sections( 'pluginPage' );
            submit_button();
            ?>
        </form>
    </div>
</div>
<div class="knCopyright">&copy; <?php echo date('Y'); ?> kundennote.com</div>
    <?php

}

add_action('wp_head','kundennote_css');

function kundennote_css() {
    
    $options = get_option( 'kundennote_settings' );

    $output="<style>".$options['kundennote_text_field_css']."</style>";

    echo $output;

}



function kundennote_settings_link($links) {  
	
	$settings_link = '<a href="options-general.php?page=kundennote">Einstellungen</a>';  
	
	array_unshift($links, $settings_link);  
	
	return $links;  
} 
add_filter("plugin_action_links_".KUNDENNOTE_BASENAME, 'kundennote_settings_link' ); 

function kundennote_admin_head() {
        echo ' <link rel="stylesheet" type="text/css" href="'. plugins_url( 'css/admin.css', __FILE__ ) .'">';
}
add_action( 'admin_head', 'kundennote_admin_head' );

?>
