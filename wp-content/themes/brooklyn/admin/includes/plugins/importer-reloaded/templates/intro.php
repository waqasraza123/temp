<?php

/**
 * Intro screen and demo select (step 0).
 */

wp_enqueue_media();

$this->render_header(); 

$count = count( ut_demo_importer_info() ); ?>

<div id="ut-importer-form">

	<?php foreach( ut_demo_importer_info() as $key => $demo ) : ?>

	<div class="grid-33 medium-grid-50 tablet-grid-100 mobile-grid-100">

		<div class="ut-dashboard-widget">

			<h3 class="xml-name"><?php echo $demo['name']; ?></h3>

			<input autocomplete="off" type="radio" id="<?php echo $demo['file']; ?>" name="ut_demo_file" value="<?php echo $demo['file']; ?>" class="ut-choose-demo-radio">
			
			<label class="ut-choose-demo" data-xml="<?php echo $demo['file']; ?>" for="<?php echo $demo['file']; ?>">

				<span class="ut-new-badge"><?php echo $demo['id']; ?></span>			
				
				<div id="ut-selected-overlay-<?php echo $key; ?>" class="ut-selected-overlay">
										
					<div class="ut-dashboard-widget-demo-summary">	
					
						<div class="ut-dashboard-widget-demo-summary-header">
			
							<h3><?php esc_html_e( 'Some Facts about this Demo', 'unitedthemes' ); ?></h3>
							
						</div>
						
						<div class="ut-dashboard-widget-demo-summary-content">
						
							<div class="ut-demo-importer-summary-box">
								
								<div class="ut-demo-importer-summary-box-inner">
									
									<div class="ut-demo-importer-summary-count-wrap">
									
										<div class="ut-demo-summmary-loader"></div>
										<span id="ut-demo-importer-summary-pages-<?php echo $key; ?>" class="ut-demo-importer-summary-count"></span>
										
									</div>
									
									<?php esc_html_e( 'Posts Pages and Menus', 'unitedthemes' ); ?>

								</div>	
									
							</div>
							
							<div  class="ut-demo-importer-summary-box">
								
								<div class="ut-demo-importer-summary-box-inner">
									
									<div class="ut-demo-importer-summary-count-wrap">
									
										<div class="ut-demo-summmary-loader"></div>
										<span id="ut-demo-importer-summary-media-<?php echo $key; ?>" class="ut-demo-importer-summary-count"></span>
										
									</div>
									
									<?php esc_html_e( 'Media Files', 'unitedthemes' ); ?>
									
								</div>	

							</div>
							
							<div class="ut-demo-importer-summary-box">
								
								<div class="ut-demo-importer-summary-box-inner">
									
									<div class="ut-demo-importer-summary-count-wrap">
										
										<div class="ut-demo-summmary-loader"></div>
										<span id="ut-demo-importer-summary-comments-<?php echo $key; ?>" class="ut-demo-importer-summary-count"></span>
										
									</div>
									
									<?php esc_html_e( 'Comments', 'unitedthemes' ); ?>
									
								</div>	

							</div>

							<div class="ut-demo-importer-summary-box">
								
								<div class="ut-demo-importer-summary-box-inner">
									
									<div class="ut-demo-importer-summary-count-wrap">
									
										<div class="ut-demo-summmary-loader"></div>	
										<span id="ut-demo-importer-summary-terms-<?php echo $key; ?>" class="ut-demo-importer-summary-count"></span>
										
									</div>
									
									<?php esc_html_e( 'Categories', 'unitedthemes' ); ?>
									
								</div>	

							</div>
							
						</div>
						
						<div class="ut-dashboard-widget-demo-summary-footer">
						
							<form autocomplete="off" class="ut-import-demo-form" method="POST" action="<?php echo esc_attr( $this->get_url( 1 ) ) ?>">
								
								<input type="hidden" name="import_xml_start" value="<?php echo $demo['file']; ?>" />
								<input id="ut-demo-importer-xml-post-id-<?php echo $key; ?>" type="hidden" name="import_id" value="" />
								<?php wp_nonce_field( 'import-upload' ); ?>
								
								<button type="submit" class="ut-ui-button ut-ui-button-health ut-run-importer" disabled><?php _e('Preparing XML' , 'unitedthemes'); ?></button>
								
							</form>
							
							<form action="<?php echo $demo['url']; ?>" target="_blank">
								<button class="ut-ui-button ut-ui-button-demo-preview"><?php _e('Preview Demo' , 'unitedthemes'); ?></button>
							</form>
						
						</div>
						
					</div>
				
				</div>
				
				<img src="<?php echo THEME_WEB_ROOT; ?>/admin/assets/images/importer/<?php echo !empty( $demo['poster'] ) ? $demo['poster'] : $demo['preview'] .'.jpg'; ?>" />

			</label>

		</div>    

	</div>

	<?php endforeach; ?>

</div>	

<?php $this->render_footer();