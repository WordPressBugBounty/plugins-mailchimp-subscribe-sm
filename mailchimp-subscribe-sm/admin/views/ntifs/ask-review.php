<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function plugOPB_check_installation_date_msf() {
 
    $nobug = "";
    $userId = get_current_user_id();
    $nobug = get_option('plugOPB_hide_bugs1two_'.$userId);
    
    $nobugHoliday = get_option('plugOPB_hide_specialOffer_'.$userId);

    if (!$nobugHoliday) {

        if ( ! function_exists('ulpb_available_pro_widgets') ) {
            add_action( 'admin_notices', 'plugOPB_display_lto_disc_notice_msf' );
        }

    }


}
add_action( 'admin_init', 'plugOPB_check_installation_date_msf' );


function plugOPB_display_lto_disc_notice_msf() {
 
    include "lto-notice.php";
    echo ltoNoticeDefault();

}


function plugOPB_set_no_bug_msf() {
 
    $nobug = "";
    if ( isset( $_GET['plugOPB_hide_bugs'] ) ) {
        $nobug = esc_attr( $_GET['plugOPB_hide_bugs'] );
    }

    $welcomeNoticeNobug  = '';
    if ( isset( $_GET['plugOPB_hide_welcome_notice'] ) ) {
        $welcomeNoticeNobug = esc_attr( $_GET['plugOPB_hide_welcome_notice'] );
    }

    

    $holidaybug = '';
    if ( isset( $_GET['plugOPB_hide_holiday'] ) ) {
        $holidaybug = esc_attr( $_GET['plugOPB_hide_holiday'] );
    }
    if ( 1 == $holidaybug ) {
        $userId = get_current_user_id();
        add_option( 'plugOPB_hide_specialOffer_'.$userId, TRUE );
    }

    
    //delete_option( 'plugOPB_hide_specialOffer_'.get_current_user_id() );
    
 
} add_action( 'admin_init', 'plugOPB_set_no_bug_msf', 5 );

?>