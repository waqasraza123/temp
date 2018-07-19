<?php 

// In development

$theme_header = new UT_Theme_Header();




?>

<?php $theme_header->placeholder(); ?>       
        
<header id="ut-header" class="ut-header ut-header-style-1 <?php $theme_header->header_class(); ?>" data-line-height="<?php echo ut_return_header_config( 'ut_header_height', 80 ); ?>">
    
	<div class="grid-container">
	
		<div class="ut-header-perspective">

			<div class="ut-header-front">

				<?php get_template_part( 'partials/top', 'header' ); ?> 
				
				<?php $theme_header->create_site_logo(); ?>               
				
				<?php get_template_part( 'partials/navigation/nav', 'default' ); ?>

			</div>

		</div><!-- close .ut-header-perspective -->
		
	</div>
    
</header><!-- close header -->