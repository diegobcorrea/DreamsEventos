<?php 
/**
 * AJAX Functions
 *
 * All of these functions enhance the responsiveness of the user interface in
 * the default theme by adding AJAX functionality.
 *
 * For more information on how the custom AJAX functions work, see
 * http://codex.wordpress.org/AJAX_in_Plugins.
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

include('phpmailer/class.phpmailer.php');

function dateConvert($date) {
    $date = explode("-", $date);
    $date = $date[2].'-'.$date[0].'-'.$date[1]; 

    return $date;
}

function dateLatinToDate($date) {
    $date = explode("-", $date);
    $date = $date[2].'-'.$date[1].'-'.$date[0]; 

    return $date;
}

function dateViewFormat($date) {
    $date = explode("-", $date);
    $date = $date[2].'/'.$date[1].'/'.$date[0]; 

    return $date;
}

/**
 * Register AJAX handlers for functionality.
 */
function ajax_register_actions() {
  $actions = array(
    // Directory filters
    'send_contactemail' => 'send_contactemail_callback',
  );

  /**
   * Register all of these AJAX handlers
   *
   * The "wp_ajax_" action is used for logged in users, and "wp_ajax_nopriv_"
   * executes for users that aren't logged in. This is for backpat with BP <1.6.
   */
  foreach( $actions as $name => $function ) {
    add_action( 'wp_ajax_'        . $name, $function );
    add_action( 'wp_ajax_nopriv_' . $name, $function );
  } 
}
add_action( 'after_setup_theme', 'ajax_register_actions', 20 );

function send_contactemail_callback() {
    global $wpdb;

    $results = '';

    $to = 'dreams.eventos.catering@gmail.com';

    $subject = $_POST['subject'];

    $headers = "From: contacto@dreamseventos.pe\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = "<p>Nombre: " . $_POST['name'] . "</p>";
    $message .= "<p>Email: " . $_POST['email'] . "</p>";

    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "mail.dreamseventos.pe";
    $mail->Port = 26;
    $mail->Username = "contacto@dreamseventos.pe";;
    $mail->Password = "dreamseventos1";

    $mail->SetFrom('contacto@dreamseventos.pe', 'Contacto - Dreams Eventos');

    $mail->AddAddress($to);

    $mail->Subject = utf8_decode($subject);

    $mail->MsgHTML( utf8_decode($message) );

    if($mail->Send()) {
        $results = "Message sent!";
    } else {
        $results = "Mailer Error: " . $mail->ErrorInfo;
    }
    // Return the String
    die($results);
}
