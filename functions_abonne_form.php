<?php


// GET POSTED DATA FROM FORM
// TO DO REMAME FUNCTION
add_action( 'admin_post_nopriv_abonne_form',  'process_abonne_form'   );
add_action( 'admin_post_abonne_form',  'process_abonne_form' );



function process_abonne_form() {

    $referer = $_SERVER['HTTP_REFERER'];
    $referer =  explode('?',   $referer);
    $referer = $referer[0];

    // IF DATA HAS BEEN POSTED
    if ( isset($_POST['action'])  && $_POST['action'] == 'abonne_form'   ) {


            if ( trim($_POST['last_name']) != '' &&
                 trim($_POST['email']) != '' &&
                 trim($_POST['subscription_type']) != ''
              ) {
                // SEND EMAILS TO THE ADMIN AND THE PERSON WHO SUBMITTED
                send_abonne_emails( $_POST);
                wp_redirect( $referer . '?success' );

            } else {
                wp_redirect( $referer . '?error=fields_not_filled' );
            }


        exit;


    } else {
            wp_redirect( $referer . '?error=wrong_action' );
    };


}



function send_abonne_emails($data){



    $headers = 'From: GoOut Website <info@gooutmag.ch>' . "\r\n";
    $emailheader = file_get_contents(dirname(__FILE__) . '/emails/email_header.php');
    $emailfooter = file_get_contents(dirname(__FILE__) . '/emails/email_footer.php');
    add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));



    $subject = 'Nouvelle abonne';

    $fields = abonne_fields();
    $content = '<p>Une nouvelle inscription a été enregistrée pour le camp d’été :</p><ul>';
    foreach ($fields as $key => $value) :
        $content .=  '<li> <strong>'. $value.'</strong>: '.  sanitize_text_field( $data[$key] ) .' </li>';
    endforeach;
    $content .= '</ul>';



    $email_total = $emailheader  . $content . $emailfooter;
    wp_mail( 'harvey.charles@gmail.com' , $subject, $email_total, $headers );



    remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );



}



function abonne_fields(){

    return array(
        'subscription_type' => 'subscription type',
        'first_name' => 'Prenom',
        'last_name' => 'Nom',
        'phone' => 'phone',
        'email' => 'email',
        'road' => 'road',
        'postcode' => 'postcode',
        'town' => 'ville',
        'message' => 'message'

    );

};



?>
