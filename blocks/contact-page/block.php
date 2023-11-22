<?php
/**
 * Block Name: Contact Page
 * Description: 
 */


$block_id = 'contact-page_' . $block['id'];
if( !empty($block['anchor']) ) { $block_id = $block['anchor']; }

$class_name = 'contact-page';
if( !empty($block['class_name']) ) { $class_name .= ' ' . $block['class_name']; }


?>


<main class="contact">

		<div class="container">
			
			<h1>Ready to start a project?</h1>

			<div class="contact-form">
					
			<?php echo do_shortcode('[wpforms id="407"]'); ?>

			</div>

			<ul class="contact-info">
				<li>contact</li>
				<li><span class="mailaddress"><?php echo contactdetails('emailtext');?></span></li>
				<li><?php echo contactdetails('phonetext');?></li>
                <li><br><br><?php echo contactdetails('address');?></li>
			</ul>

			<div class="clearfix"></div>

		</div> <!-- /.container -->
		
	</main>