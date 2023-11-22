<?php
/**
 * Block Name: About Page
 * Description: 
 */

$introductiontitle = !empty( get_field('aboutintro_title','') ) ? '<h2  class="full">'.get_field('aboutintro_title','').'</h2>': '';
$about_intro_text= !empty( get_field('about_intro_text','') ) ? '<p class="full">'.get_field('about_intro_text','').'</p>': '';
$about_main_text_field= !empty( get_field('about_main_text_field','') ) ? get_field('about_main_text_field',''): '';

$image = get_field('about_side_image',''); 
if( !empty( $image ) ) {
	$aboutside = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" class="img-cover"/>';
} else {
	$aboutside = '';
};

?>


<div class="about-us">
		<div class="container">
			
			<div class="intro">
				<?php echo  $introductiontitle. $about_intro_text;?>

                <div class="clearfix"></div>
			</div> <!-- /.intro -->
        </div> <!-- /.container -->
</div>

<div class="container">
	<div class="aboutnj">
		<div class="image">
			<?php echo $aboutside;?>
            
        </div>

        <div class="content">

            <div class="intro">
				<?php echo $about_main_text_field;?>
            </div> <!-- /.intro -->
		</div>
	</div>
</div>