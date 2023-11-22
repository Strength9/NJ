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
                case 'address':
                    $address = !empty( get_field('address','options') ) ? get_field('address','options') : '';
                    return $address;
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




function navigationmenu($class = '') {

    $email_icon = !empty( get_field('email_icon','options') ) ? get_field('email_icon','options'): 'Email';
    $contact_email_address = !empty( get_field('contact_email_address','options') ) ? '<li class="firstsmaller"><a href="mailto:'.get_field('contact_email_address','options').'" title="Email Us">'.$email_icon.' '.get_field('contact_email_address','options').'</a></li>' : '';

    $telephone_icon = !empty( get_field('telephone_icon','options') ) ? get_field('telephone_icon','options'): 'Telephone';
    $contact_phone_number = !empty( get_field('contact_phone_number','options') ) ? '<li class="smaller"><a href="tel:'.format_number(get_field('contact_phone_number','options')).'" title="Get in touch by Phone">'.$telephone_icon.' '.get_field('contact_phone_number','options').'</a></li>' : '';

    $whatsapp_icon = !empty( get_field('whatsapp_icon','options') ) ? get_field('whatsapp_icon','options'): 'WhatsApp';
    $contact_whatsapp_number = !empty( get_field('contact_whatsapp_number','options') ) ? '<li class="smaller"><a href="https://wa.me/'.format_number(get_field('contact_whatsapp_number','options')).'" title="Get in touch via Whatsapp">'.$whatsapp_icon.' '.get_field('contact_whatsapp_number','options') .'</a></li>' : '';

   

    $tnav  = wp_nav_menu( array(  'menu' => 'MainHeader', 'container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 1 , 'items_wrap' => '<ul class="'.$class.'">%3$s'.$contact_email_address.$contact_phone_number.$contact_whatsapp_number.'</ul>' ) );
    

    return $tnav;
}


function topheader() {
    $tnav  = wp_nav_menu( array(  'menu' => 'MainHeader', 'container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 1 , 'items_wrap' => '<header class="header-default">
    <div class="container">
        <a href="'.home_url().'">
            <img src="/wp-content/uploads/2023/11/NJGraphique.svg" alt="NJ Graphique" class="logo">
        </a>
        <a href="#" class="nav-open"><i></i></a>
        <nav class="navigation"><ul>%3$s</ul></nav> 
        <div class="clearfix"></div>
    </div> 
</header> ' ) );
    

return $tnav;
    
}




// Portfolio Images
function portfoliolink($id = '', $area='') {

	$output = '<a href=""> <div class="portfolio-item"> <div class="portfolio-item-overlay"> <div class="info"> <h2 class="portfolio-item-title">Area Title '.$id.'</h2> <h3 class="portfolio-item-category">Brand '.$id.'</h3> </div> </div>  </div> </a>';

	$pit = !empty( get_field('portfolio_item_portfolio_item_title_'.$id,'') ) ? '<h2 class="portfolio-item-title">'.get_field('portfolio_item_portfolio_item_title_'.$id,'').'</h2>': '';
	$pitbr = !empty( get_field('portfolio_item_portfolio_item_strapline_'.$id,'') ) ? '<h3 class="portfolio-item-category">'.get_field('portfolio_item_portfolio_item_strapline_'.$id,'').'</h3>': '';

	$image = get_field('portfolio_item_portfolio_item_image_'.$id,'');
	if( !empty( $image ) ) { $pimg = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'"  class="img-cover">';} else { $pimg = '';};

	$link = get_field('portfolio_item_portfolio_item_link_'.$id,'');
	if( $link) {
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
		$output = '<a class="" href="'.esc_url( $link_url ).'" target="'.esc_attr($link_target).'" title="'.esc_html( $link_title ).'">
		<div class="portfolio-item">'.$pimg.'
				<div class="portfolio-item-overlay">
					<div class="info">'.$pit.$pitbr.'</div>
				</div>
		</div>
		</a>';
	};

	return $output;

}


function clientlogos() {
        if( have_rows('client_logos','options') ):
        $clientlogos = '';
            while( have_rows('client_logos','options') ) : the_row();

                $image = get_sub_field('client_logo');
                if( !empty( $image ) ) {
                    $clientlogos  .= ' <li class="splide__slide"><img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'"/></li>';
                };

            endwhile;

            $clientlogos  .= '';

        else : $clientlogos  = ''; endif;



    $splide = '<section class="logo-slider">
    <div class="container">			
		<div class="holder">
		    <div class="splide" id="splide_insurance">
		    	<div class="splide__track"><ul class="splide__list">'.$clientlogos.'</ul>
		    	</div>
		    </div>
		</div>
        
    </div>
</section>';

 return  $splide;
}



function calltoaction() {

$calltoaction = '<div class="cta_01"><div class="content"><h2>Ready to start a project?</h2>
<p>We care about you and your success and we want to show you just how much we do</p><a href="/contact-us/" class="btn">Get in touch</a></div></div> <!-- /.cta_01 -->';

return $calltoaction;

}


function teammembers() {
    if( have_rows('team_members','options') ):
       // $teammember = '<div class="team">';
        $teammember = '';
        while( have_rows('team_members','options') ) : the_row();
        
            $member_name = get_sub_field('member_name');
            $member_job_title = get_sub_field('member_job_title');
            $image = get_sub_field('member_image');
            if( !empty( $image ) ) {


                $teammember  .= '<div class="njteam"><img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" class="img-cover"><div class="hoverbox"> <div class="info">  <h2>'.$member_name.'</h2> <h3>'.$member_job_title.'</h3> </div> </div> </div>';
            };

        endwhile;
        $teammember  .= '</div>';

    else :  $teammember  = ''; endif;

    return  $teammember ;
}




?>
