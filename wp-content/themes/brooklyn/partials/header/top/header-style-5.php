<?php 

// In development

$theme_header = new UT_Theme_Header();




?>

<?php $theme_header->placeholder(); ?>       
        
<header id="ut-header" class="ut-header ut-header-style-5 <?php $theme_header->header_class(); ?>" data-line-height="<?php echo ut_return_header_config( 'ut_header_height', 80 ); ?>">
    
	<?php get_template_part( 'partials/top', 'header' ); ?> 
	
	<div class="grid-container">
	
		<div class="ut-header-perspective">

			<div class="ut-header-front">

				<?php if( ut_return_header_config( 'ut_header_top_hide_logo', 'no' ) == 'no' ) $theme_header->create_site_logo(); ?>               
				
				<?php $theme_header->create_menu( array('grid-100 hide-on-tablet hide-on-mobile') ); ?> 

			</div>

		</div><!-- close .ut-header-perspective -->
		
	</div>
    
</header><!-- close header -->