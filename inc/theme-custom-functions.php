<?php

/**
 * Formats a given number by adding a leading zero if it doesn't start with 0 or 4, replacing the leading 0 with 4, and removing any spaces.
*/

function format_number($number){
    $number = preg_replace('/[^0-9]/', '', $number);

    if(is_numeric($number)){
        if($number[0] != 0 && $number[0] != 4){
            $number = "0".$number;
        }

        if($number[0] == 0){
            $number[0] = str_replace("0","4",$number[0]);
            $number = "4".$number;
        }
        $number = str_replace(" ","",$number);
        return $number;
        
    } else {
        return false;
    }
};


/**
 * Returns contact details based on the specified return type.
 */
function contactdetails($returntype) {

	switch ($returntype) {
        case 'email':
            $email_icon = !empty( get_field('email_icon','options') ) ? get_field('email_icon','options'): 'Email';
            $contact_email_address = !empty( get_field('contact_email_address','options') ) ? '<a href="mailto:'.get_field('contact_email_address','options').'" title="Email Us">'.$email_icon.'</a>' : '';
            return $contact_email_address;
            break;
        case 'phone':
            $telephone_icon = !empty( get_field('telephone_icon','options') ) ? get_field('telephone_icon','options'): 'Telephone';
            $contact_phone_number = !empty( get_field('contact_phone_number','options') ) ? '<a href="tel:'.format_number(get_field('contact_phone_number','options')).'" title="Get in touch by Phone">'.$telephone_icon.'</a>' : '';
            return $contact_phone_number;
            break;
        case 'whatsapp':
            $whatsapp_icon = !empty( get_field('whatsapp_icon','options') ) ? get_field('whatsapp_icon','options'): 'WhatsApp';
            $contact_whatsapp_number = !empty( get_field('contact_whatsapp_number','options') ) ? '<a href="https://wa.me/'.format_number(get_field('contact_whatsapp_number','options')).'" title="Get in touch via Whatsapp">'.$whatsapp_icon.'</a>' : '';
            return $contact_whatsapp_number;
            break;
        case 'emailtext':
            $email_icon = !empty( get_field('email_icon','options') ) ? get_field('email_icon','options'): 'Email';
            $contact_email_address = !empty( get_field('contact_email_address','options') ) ? '<a href="mailto:'.get_field('contact_email_address','options').'" title="Email Us">'.$email_icon.' '.get_field('contact_email_address','options').'</a>' : '';
            return $contact_email_address;
            break;
        case 'phonetext':
            $telephone_icon = !empty( get_field('telephone_icon','options') ) ? get_field('telephone_icon','options'): 'Telephone';
            $contact_phone_number = !empty( get_field('contact_phone_number','options') ) ? '<a href="tel:'.format_number(get_field('contact_phone_number','options')).'" title="Get in touch by Phone">'.$telephone_icon.' '.get_field('contact_phone_number','options').'</a>' : '';
            return $contact_phone_number;
            break;
        case 'whatsapptext':
            $whatsapp_icon = !empty( get_field('whatsapp_icon','options') ) ? get_field('whatsapp_icon','options'): 'WhatsApp';
            $contact_whatsapp_number = !empty( get_field('contact_whatsapp_number','options') ) ? '<a href="https://wa.me/'.format_number(get_field('contact_whatsapp_number','options')).'" title="Get in touch via Whatsapp">'.$whatsapp_icon.' '.get_field('contact_whatsapp_number','options') .'</a>' : '';
            return $contact_whatsapp_number;
            break;
            case 'emailonly':
                $contact_email_address = !empty( get_field('contact_email_address','options') ) ? '<a href="mailto:'.get_field('contact_email_address','options').'" title="Email Us">'.get_field('contact_email_address','options').'</a>' : '';
                return $contact_email_address;
                break;
            case 'phoneonly':
                $contact_phone_number = !empty( get_field('contact_phone_number','options') ) ? '<a href="tel:'.format_number(get_field('contact_phone_number','options')).'" title="Get in touch by Phone">'.get_field('contact_phone_number','options').'</a>' : '';
                return $contact_phone_number;
                break;
            case 'whatsapponly':
                $contact_whatsapp_number = !empty( get_field('contact_whatsapp_number','options') ) ? '<a href="https://wa.me/'.format_number(get_field('contact_whatsapp_number','options')).'" title="Get in touch via Whatsapp">'.get_field('contact_whatsapp_number','options') .'</a>' : '';
                return $contact_whatsapp_number;
                break;
        default:
            return 'Please specify a return type';
            break;
    }
};

/**
 * Returns a list of social media links as an unordered list.
 */
function socialmedia() {

    // Check rows exists.
    if( have_rows('social','options') ):
    $sociallist = '<ul class="socialmedia">';
    while( have_rows('social','options') ) : the_row();

        $icon = !empty( get_sub_field('social_icon') ) ? get_sub_field('social_icon'): '';

        $link = get_sub_field('social_link'); 
        if( $link) {
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            $liitem = '<li><a class="" href="'.esc_url( $link_url ).'" title="'.esc_attr($link_title).'" target="'.esc_attr($link_target).'">'.$icon.'</a></li>';
        } else {
            $liitem = '';
        };


        $sociallist .= $liitem;
    endwhile;
    $sociallist .= '</ul>';
    else :
        $sociallist = '';
    endif;

    return $sociallist;

}

/**
 * Returns a breadcrumb list.
 */
function createbreadcrumb() {
    global $post;
    // Get the IDs of the page ancestors
    $ancestor_ids = get_post_ancestors( $post->ID );
    $ancestor_ids = array_reverse( $ancestor_ids );
    $breadcrumb = '<ul class="breadcrumb">';
    $breadcrumb .= '<li><a href="' . get_home_url() . '">Home</a></li>';

    foreach ( $ancestor_ids as $ancestor_id ) {
        $ancestor_title = get_the_title( $ancestor_id );
        $ancestor_url = get_permalink( $ancestor_id );
        $breadcrumb .= '<li><a href="' . $ancestor_url . '">' . $ancestor_title . '</a></li>';
    };
    // Add the current page to the breadcrumb
    $breadcrumb .= '<li class="current">' . get_the_title( $post->ID ) . '</li>';
    $breadcrumb .= '</ul>';

    return $breadcrumb;
}

/**
 * Add support for excerpts to pages.
 */
add_post_type_support( 'page', 'excerpt' );
?>
