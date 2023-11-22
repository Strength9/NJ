<?php
/**
 * Block Name: Text Page
 * Description: 
 */


 	$txtstrapline = !empty( get_field('txt_strapline','') ) ? '<h3>'.get_field('txt_strapline','').'</h3>': '';
	$txttitle = !empty( get_field('txt_title','') ) ? '<h2>'.get_field('txt_title','').'</h2>': '';
	$txttext_area = !empty( get_field('txt_text_area','') ) ? get_field('txt_text_area',''): '';
?>


<main class="legal">

		<div class="container">
			
		<?php echo $txtstrapline.$txttitle.$txttext_area;?>
		</div> <!-- /.container -->
		
	</main>