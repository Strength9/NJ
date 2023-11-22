<?php
/**
 * Block Name: NJ Header
 * Description: 
 */

$imagelogo = get_field('header_logo','options'); 
if( !empty( $imagelogo ) ) {
	$headerimagelogo = '<img src="'.esc_url($imagelogo['url']).'" alt="'.esc_attr($imagelogo['alt']).'" class=""/>';
} else {
	$headerimagelogo = '';
};


 $imagebg = get_field('headerbg',''); 
 if( !empty( $imagebg ) ) {
	 $headerbg = '<style>.pageheader { background-image: url('.$imagebg["url"].'); } </style>';
 } else {
	 $headerbg = '';
 };


?>
<?php echo $headerbg;?>

<header class="pageheader">

 	<div class="navigationbar">   
 		<a href="<?php echo home_url(); ?>" title="Nj Graphique" class="headerlogo">
 			<?php echo $headerimagelogo ;?>
		</a>

		<a href="#" title="Menu" class="menuicon">
			<i class="fa-light fa-bars"></i>
		</a>

	</div>

		
</header>

