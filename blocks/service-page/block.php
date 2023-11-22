<?php
/**
 * Block Name: Service Page
 * Description: 
 */

$servicestrapline = !empty( get_field('text_data_strapline','') ) ? '<h3>'.get_field('text_data_strapline','').'</h3>': '';
$servicetitle = !empty( get_field('text_data_title','') ) ? '<h2>'.get_field('text_data_title','').'</h2>': '';
$servicetext = !empty( get_field('text_data_text_area','') ) ? get_field('text_data_text_area',''): '';

$image = get_field('side_image',''); 
if( !empty( $image ) ) {
	$sideimage = ' style="background-image: url('.$image["url"].');" ';
} else {
	$sideimage = '';
};


$image_left_or_right = !empty( get_field('image_left_or_right','') ) ? get_field('image_left_or_right',''): '';
?>


<div class="njserviceblock <?php echo $image_left_or_right;?>">
	<div class="image eqrewsd" <?php echo $sideimage;?>></div>
	<div class="data">
			<div>
				<?php echo  $servicestrapline;?>			
				<?php echo $servicetitle;?>		
				<?php echo $servicetext ;?>
			</div> <!-- /.content -->

	</div>

</div>