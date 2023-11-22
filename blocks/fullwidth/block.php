<?php
/**
 * Block Name: Full Width
 * Description: 
 */

	$txttitle = !empty( get_field('intro_title','') ) ? '<h2 class="full">'.get_field('intro_title','').'</h2>': '';
	$txttext_area = !empty( get_field('intro_text_area','') ) ? '<p class="full">'.get_field('intro_text_area','').'</p>': '';
?>

		<div class="about-us bottomservice">
			<div class="container">
				
				<div class="intro">
					<?php echo $txttitle.$txttext_area;?>
					<div class="clearfix"></div>
				</div> <!-- /.intro -->
			</div> <!-- /.container -->
		</div>