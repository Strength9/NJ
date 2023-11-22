<?php
$imagelogo = get_field('footer_logo','options'); 
if( !empty( $imagelogo ) ) {
	$headerimagelogo = '<img src="'.esc_url($imagelogo['url']).'" alt="'.esc_attr($imagelogo['alt']).'" class=""/>';
} else {
	$headerimagelogo = '';
};
?>
<footer class="footer-extended">

<div class="info">

    <div class="container">
        



        <ul>
            <li>address</li>
            <li><?php echo contactdetails('address');?></li>
        </ul>

       <?php echo  wp_nav_menu( array(  'menu' => 'FootLinks', 'container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 1 , 'items_wrap' => '<ul><li>The Useful bits..</li>%3$s</ul>' ) ) ;?>

       <?php echo  wp_nav_menu( array(  'menu' => 'FootLegal', 'container'  => '', 'container_class' => '', 'container_id'    => '',   'depth' => 1 , 'items_wrap' => '<ul><li>The Legal bits..</li>%3$s</ul>' ) ) ;?>

       <ul>
            <li>contact</li>
            <li><span class="mailaddress"><?php echo contactdetails('emailtext');?></span></li>
            <li><?php echo contactdetails('phonetext');?></li>
            <li class="socialbits"><?php echo socialmedia();?></li>
        </ul>

    </div> <!-- /.container -->

    <div class="clearfix"></div>

</div><!-- /.info -->

<div class="copyright-section">
    
    <div class="container">

        <p class="copyright"><?php 
        
        echo !empty( get_field('copyright_disclaimer','options') ) ? get_field('copyright_disclaimer','options'): '';?></p>

    </div> <!-- /.container -->

</div> <!-- /.copyright-section -->

</footer> <!-- /.footer-extended -->

<div class="full-screen-nav">

<div class="container">
    
    <a href="#" class="nav-close"><i class="ti-close"></i></a>
    <a href="<?php echo home_url(); ?>" title="Nj Graphique" class="navlogo">
 			<?php echo $headerimagelogo ;?>
		</a>
    <nav>
    <?php echo navigationmenu("collapsible-nav"); ?>
    <?php echo socialmedia();?>
    </nav> 

</div> <!-- /.container -->

</div> 

<?php wp_footer(); ?>

</body>
</html>