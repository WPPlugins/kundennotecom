<?php 


function getKnWidget($url) {
    $request_url =  $url;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $request_url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function kundennoteWidget($atts) 
{
    $options = get_option( 'kundennote_settings' );
	
	$w = shortcode_atts( array(
        'style' => '',
    ), $atts );

    return getKnWidget("https://kundennote.com/app/widget/"
        .$options['kundennote_text_field_id']
        .".php?w="
		.$w['style']);
}
    
add_shortcode('kundennote', 'kundennoteWidget');





?>
