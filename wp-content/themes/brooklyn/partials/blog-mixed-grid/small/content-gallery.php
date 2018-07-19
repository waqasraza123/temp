<article id="post-<?php the_ID(); ?>" <?php post_class( ut_get_article_size('ut-blog-grid-article clearfix') ); ?>>
    
    <div class="ut-blog-grid-article-inner">
    
        <div class="entry-meta entry-meta-top <?php echo !get_post_format_gallery_content() ? 'entry-meta-top-has-border' : ''; ?> clearfix">

            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ', ', 'unitedthemes' ) );
                if ( $categories_list && unitedthemes_categorized_blog() ) :
            ?>
            <span class="ut-sticky"><i class="fa fa-thumb-tack"></i></span>
            <span class="cat-links"><i class="fa fa-folder-open-o"></i><?php printf( esc_html__( '%1$s', 'unitedthemes' ), $categories_list ); ?></span> 

            <?php endif; ?>

        </div>
        <!-- close entry-meta -->    
            
        <?php if( get_post_format_gallery_content() ) : ?>

            <div class="ut-format-gallery">

                <?php the_post_format_gallery_content(); ?>

                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>">

                    <div class="ut-meta-post-icon"><i class="Bklyn-Core-Solid-Photo-Library" aria-hidden="true"></i></div>

                </a>
                
                <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?>">
                
                    <div class="date-format">
                        <span class="day"><?php the_time('d'); ?></span>
                        <span class="month"><?php the_time('M'); ?> <?php the_time('Y'); ?></span>
                    </div>
                
                </a>                                        

            </div>     
                      
        <?php elseif( has_post_thumbnail() && !get_post_format_gallery_content() ) : ?>
            
            <!-- ut-post-thumbnail -->
            <div class="ut-post-thumbnail">     

                <div class="entry-thumbnail">

                    <?php
                    /* featured image */ 
                    $fullsize   = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); 
                    $fullsizeID = ut_get_attachment_id_from_url( $fullsize );

                    $thumbnail = ut_resize( $fullsize , '720' , '600', true , true, true );
                    $caption = get_post( $fullsizeID )->post_excerpt; ?>  

                    <a title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>" href="<?php the_permalink(); ?>">                

                        <figure class="ut-post-thumbnail-caption-wrap">

                            <img alt="<?php echo esc_attr( $caption ); ?>" class="wp-post-image" src="<?php echo $thumbnail; ?>">

                            <?php if ( $caption ) : ?>

                                <figcaption class="ut-post-thumbnail-caption"><?php echo $caption; ?></figcaption>

                            <?php endif; ?>

                        </figure>

                    </a>  

                    <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?>">

                        <div class="date-format">
                            <span class="day"><?php the_time('d'); ?></span>
                            <span class="month"><?php the_time('M'); ?> <?php the_time('Y'); ?></span>
                        </div>

                    </a>

                </div>                                                                                                                         

            </div><!-- close ut-post-thumbnail -->                                                                                   
                                                  
        <?php else : ?>
            
            <div class="date-format ut-blog-grid-has-no-thumbnail">

                <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?>">                         

                    <span class="day"><?php the_time('d'); ?></span>
                    <span class="month"><?php the_time('M'); ?> <?php the_time('Y'); ?></span>

                </a>

            </div>
        
        <?php endif; ?>
            
        <a class="ut-blog-link" title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">     
              
            <div class="ut-blog-grid-content-wrap"> 

                <?php if( get_the_title() ) :?>

                    <header class="entry-header">

                        <h2 class="entry-title"><?php the_title(); ?></h2>          

                    </header>
                    <!-- close entry-header -->

                <?php endif; ?> 

                <!-- entry-content -->
                <div class="entry-content clearfix">

                    <?php if( !has_post_thumbnail() && !get_post_format_gallery_content() ) : ?>

                        <?php echo unite_get_excerpt_by_id( $post, ot_get_option( 'ut_blog_grid_excerpt_length', 20 ) * 1.5 ); ?>

                    <?php else : ?>

                        <?php echo unite_get_excerpt_by_id( $post, ot_get_option( 'ut_blog_grid_excerpt_length', 20 ) ); ?>

                    <?php endif; ?>

                </div>
                <!-- entry-content -->

            </div>
        
        </a>
        
        <div class="entry-meta clearfix">

            <span class="author-links"><i class="fa fa-user-o"></i><?php the_author_posts_link(); ?></span>

            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>

                <span class="comments-link"><i class="fa fa-comments-o"></i><?php comments_popup_link(esc_html__('No Comments', 'unitedthemes'), esc_html__('1 Comment', 'unitedthemes'), esc_html__('% Comments', 'unitedthemes')); ?></span>

            <?php endif; ?>       

        </div>            
                        
    </div>
    
</article>
<!-- #post-<?php the_ID(); ?> -->