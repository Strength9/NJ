<?php
/**
 * Block Name: Home Page
 * Description: 
 */


$block_id = 'home-page_' . $block['id'];
if( !empty($block['anchor']) ) { $block_id = $block['anchor']; }

$class_name = 'home-page';
if( !empty($block['class_name']) ) { $class_name .= ' ' . $block['class_name']; }


// Hero Text
$introductionstrapline = !empty( get_field('introduction_strapline','') ) ? '<h2>'.get_field('introduction_strapline','').'</h2>': '';
$introductiontitle = !empty( get_field('introduction_title','') ) ? '<h1>'.get_field('introduction_title','').'</h1>': '';
$link = get_field('hero_link',''); 
if( $link) { $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? $link['target'] : '_self'; $hero_link = '<a class="btn" href="'.esc_url( $link_url ).'" target="'.esc_attr($link_target).'" title="'.esc_html( $link_title ).'">'.esc_html( $link_title ).'</a>'; } else { $hero_link = ''; };
$image = get_field('hero_background',''); if( !empty( $image ) ) { echo '<style> .hero { background-image: url('.esc_url($image['url']).'); } </style>'; };

$imagelogo = get_field('footer_logo','options'); 
if( !empty( $imagelogo ) ) {
	$headerimagelogo = '<img src="'.esc_url($imagelogo['url']).'" alt="'.esc_attr($imagelogo['alt']).'" class=""/>';
} else {
	$headerimagelogo = '';
};

?>

<div class="homenj hero">	
		 	<div class="navigationbar">   
				<a href="<?php echo home_url(); ?>" title="Nj Graphique" class="headerlogo">
					<?php echo $headerimagelogo ;?>
				</a>

				<a href="#" title="Menu" class="menuicon">
					<i class="fa-light fa-bars"></i>
				</a>

			</div>
		<div class="content">
				<?php echo $introductionstrapline;?>
				<?php echo $introductiontitle ;?>
				<?php echo $hero_link;?>
		</div> <!-- /.content -->
</div> 
<main>
<?php	

	// About Intro Text
	$aboutstrapline = !empty( get_field('about_section_strapline','') ) ? '<h3>'.get_field('about_section_strapline','').'</h3>': '';
	$abouttitle = !empty( get_field('about_section_title','') ) ? '<h2>'.get_field('about_section_title','').'</h2>': '';
	$abouttext_area = !empty( get_field('about_section_text_area','') ) ? get_field('about_section_text_area',''): '';
	// Service Text
	$service_text_1 = !empty( get_field('service_text_1','') ) ? '<h3>'.get_field('service_text_1','').'</h3>': '';
	$service_text_2 = !empty( get_field('service_text_2','') ) ? '<h3>'.get_field('service_text_2','').'</h3>': '';
	$service_text_3 = !empty( get_field('service_text_3','') ) ? '<h3>'.get_field('service_text_3','').'</h3>': '';
	$service_text_4 = !empty( get_field('service_text_4','') ) ? '<h3>'.get_field('service_text_4','').'</h3>': '';

	$service_strapline_1 = !empty( get_field('service_strapline_1','') ) ? '<h2>'.get_field('service_strapline_1','').'</h2>': '';
	$service_strapline_2 = !empty( get_field('service_strapline_2','') ) ? '<h2>'.get_field('service_strapline_2','').'</h2>': '';
	$service_strapline_3 = !empty( get_field('service_strapline_3','') ) ? '<h2>'.get_field('service_strapline_3','').'</h2>': '';
	$service_strapline_4 = !empty( get_field('service_strapline_4','') ) ? '<h2>'.get_field('service_strapline_4','').'</h2>': '';

	$image = get_field('service_image_1',''); 
	if( !empty( $image ) ) { $service_image_1 = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" class="img-cover">'; } else { $service_image_1 = ''; };
	$image = get_field('service_image_2','');
	if( !empty( $image ) ) { $service_image_2 = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" class="img-cover">';} else { $service_image_2 = '';};
	$image = get_field('service_image_3','');
	if( !empty( $image ) ) { $service_image_3 = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" class="img-cover">';} else { $service_image_3 = '';};
	$image = get_field('service_image_4','');
	if( !empty( $image ) ) { $service_image_4 = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" class="img-cover">';} else { $service_image_4 = '';};
?>
	<div class="about">
		<div class="info">
			<div class="content">
				<?php echo $aboutstrapline;?>
				<?php echo $abouttitle;?>
				<?php echo $abouttext_area;?>
			</div> <!-- /.content -->
		</div> <!-- /.info -->

		<div class="services">
		<div class="njareas">
			<div class="njarea_content">
				<?php echo $service_image_1;?>
				<div class="hoverbox"> 
						<?php echo $service_strapline_1.$service_text_1;?>
				</div> 
			</div>
			<div class="njarea_content">
				<?php echo $service_image_2;?>
				<div class="hoverbox"> 
						<?php echo $service_strapline_2.$service_text_2;?>
				</div> 
			</div>
			<div class="njarea_content">
				<?php echo $service_image_3;?>
				<div class="hoverbox"> 
						<?php echo $service_strapline_3.$service_text_3;?>
				</div> 
			</div>
			<div class="njarea_content">
				<?php echo $service_image_4;?>
				<div class="hoverbox"> 
						<?php echo $service_strapline_4.$service_text_4;?>
				</div> 
			</div>
		</div>
					

		</div> <!-- /.services -->

		<div class="clearfix"></div>

	</div> <!-- /.about -->

	<!-- Portfolio -->
	<div class="portfolio_grid" id="works">
		<?php echo portfoliolink('1','')?>
		<div class="wrapper">
		<?php echo portfoliolink('2', '')?>
		<?php echo portfoliolink('3', '')?>
		</div> <!-- .wrapper -->
		<?php echo portfoliolink('4', '')?>
		<div class="clearfix"></div>
	</div><!-- /.portfolio_grid -->

		
<?php echo clientlogos();?>
<?php echo calltoaction();?>

</main> <!-- /main -->
