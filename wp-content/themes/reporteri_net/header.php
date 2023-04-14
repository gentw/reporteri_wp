<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" >
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, user-scalable=yes" />
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { if(get_option('mvp_favicon')) { ?><link rel="shortcut icon" href="<?php echo esc_url(get_option('mvp_favicon')); ?>" /><?php } } ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_single() ) { ?>
<meta property="og:type" content="article" />
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mvp-post-thumb' ); ?>
		<meta property="og:image" content="<?php echo esc_url( $thumb['0'] ); ?>" />
		<meta name="twitter:image" content="<?php echo esc_url( $thumb['0'] ); ?>" />
	<?php } ?>
<meta property="og:url" content="<?php the_permalink() ?>" />
<meta property="og:title" content="<?php the_title_attribute(); ?>" />
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?php the_permalink() ?>">
<meta name="twitter:title" content="<?php the_title_attribute(); ?>">
<meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
<?php endwhile; endif; ?>
<?php } else { ?>
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?>>
	<?php get_template_part('fly-menu'); ?>
	<div id="mvp-site" class="left relative">
		<div id="mvp-search-wrap">
			<div id="mvp-search-box">
				<?php get_search_form(); ?>
			</div><!--mvp-search-box-->
			<div class="mvp-search-but-wrap mvp-search-click">
				<span></span>
				<span></span>
			</div><!--mvp-search-but-wrap-->
		</div><!--mvp-search-wrap-->
		<?php if(get_option('mvp_wall_ad')) { ?>
			<div id="mvp-wallpaper">
				<?php if(get_option('mvp_wall_url')) { ?>
					<a href="<?php echo esc_url(get_option('mvp_wall_url')); ?>" class="mvp-wall-link" target="_blank"></a>
				<?php } ?>
			</div><!--mvp-wallpaper-->
		<?php } ?>
		<div id="mvp-site-wall" class="left relative">
			<?php if(get_option('mvp_header_leader')) { ?>
				<?php global $post; $mvp_post_layout = get_option('mvp_post_layout'); $mvp_post_temp = get_post_meta($post->ID, "mvp_post_template", true); if ( ( ! $mvp_post_temp && $mvp_post_layout == 'Template 5' && is_single() ) || ( ! $mvp_post_temp && $mvp_post_layout == 'Template 6' && is_single() ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 5' && is_single() ) || ( $mvp_post_temp == "global" && $mvp_post_layout == 'Template 6' && is_single() ) || ( $mvp_post_temp == "temp5" && is_single() ) || ( $mvp_post_temp == "temp6" && is_single() ) ) { } else { ?>
				<div id="mvp-leader-wrap">
					<?php $leader_ad = get_option('mvp_header_leader'); if ($leader_ad && ! is_404()) { echo do_shortcode(html_entity_decode($leader_ad)); } ?>
				</div><!--mvp-leader-wrap-->
				<?php } ?>
			<?php } ?>
			<div id="mvp-site-main" class="left relative">
			<header id="mvp-main-head-wrap" class="left relative">
				<?php $mvp_nav_layout = get_option('mvp_nav_layout'); if( $mvp_nav_layout == "1" ) { ?>
					<nav id="mvp-main-nav-wrap" class="left relative">
						<div id="mvp-main-nav-small" class="left relative">
							<div id="mvp-main-nav-small-cont" class="left">
								<div class="mvp-main-box">
									<div id="mvp-nav-small-wrap">
										<div class="mvp-nav-small-right-out left">
											<div class="mvp-nav-small-right-in">
												<div class="mvp-nav-small-cont left">
													<div class="mvp-nav-small-left-out right">
														<div id="mvp-nav-small-left" class="left relative">
															<div class="mvp-fly-but-wrap mvp-fly-but-click left relative">
																<span></span>
																<span></span>
																<span></span>
																<span></span>
															</div><!--mvp-fly-but-wrap-->
														</div><!--mvp-nav-small-left-->
														<div class="mvp-nav-small-left-in">
															<div class="mvp-nav-small-mid left">
																<div id="mvp-logo" class="mvp-nav-small-logo left relative">
																	<?php if(get_option('mvp_logo_nav')) { ?>
																		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_option('mvp_logo_nav')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
																	<?php } else { ?>
																		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
																	<?php } ?>
																	<?php if ( is_home() || is_front_page() ) { ?>
																		<h1 class="mvp-logo-title"><?php bloginfo( 'name' ); ?></h1>
																	<?php } else { ?>
																		<h2 class="mvp-logo-title"><?php bloginfo( 'name' ); ?></h2>
																	<?php } ?>
																</div><!--mvp-nav-small-logo-->
																<div class="mvp-nav-small-mid-right left">
																	
																	<div class="mvp-nav-menu left">
																		<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
																	</div><!--mvp-nav-menu-->
																</div><!--mvp-nav-small-mid-right-->
															</div><!--mvp-nav-small-mid-->
														</div><!--mvp-nav-small-left-in-->
													</div><!--mvp-nav-small-left-out-->
												</div><!--mvp-nav-small-cont-->
											</div><!--mvp-nav-small-right-in-->
											<div id="mvp-nav-small-right" class="right relative">
												<span class="mvp-nav-search-but fa fa-search fa-2 mvp-search-click"></span>
											</div><!--mvp-nav-small-right-->
										</div><!--mvp-nav-small-right-out-->
									</div><!--mvp-nav-small-wrap-->
								</div><!--mvp-main-box-->
							</div><!--mvp-main-nav-small-cont-->
						</div><!--mvp-main-nav-small-->
					</nav><!--mvp-main-nav-wrap-->
				<?php } else { ?>
					<nav id="mvp-main-nav-wrap" class="mvp_header_mobile left relative">
						<div id="mvp-main-nav-top" class="left relative">
							<div class="mvp-main-box">
								<div id="mvp-nav-top-wrap" class="left relative">
									<div class="mvp-nav-top-right-out left relative">
										<div class="mvp-nav-top-right-in">
											<div class="mvp-nav-top-cont left relative">
												<div class="mvp-nav-top-left-out relative">
													<div class="mvp-nav-top-left">
														<div class="mvp-nav-soc-wrap">
															<?php if(get_option('mvp_facebook')) { ?>
																<a href="<?php echo esc_html(get_option('mvp_facebook')); ?>" target="_blank"><span class="mvp-nav-soc-but fab fa-facebook-f"></span></a>
															<?php } ?>
															<?php if(get_option('mvp_twitter')) { ?>
																<a href="<?php echo esc_html(get_option('mvp_twitter')); ?>" target="_blank"><span class="mvp-nav-soc-but fab fa-twitter"></span></a>
															<?php } ?>
															<?php if(get_option('mvp_instagram')) { ?>
																<a href="<?php echo esc_html(get_option('mvp_instagram')); ?>" target="_blank"><span class="mvp-nav-soc-but fab fa-instagram"></span></a>
															<?php } ?>
															<?php if(get_option('mvp_youtube')) { ?>
																<a href="<?php echo esc_html(get_option('mvp_youtube')); ?>" target="_blank"><span class="mvp-nav-soc-but fab fa-youtube"></span></a>
															<?php } ?>
														</div><!--mvp-nav-soc-wrap-->
														<div class="mvp-fly-but-wrap mvp-fly-but-click left relative">
															<span></span>
															<span></span>
															<span></span>
															<span></span>
														</div><!--mvp-fly-but-wrap-->
													</div><!--mvp-nav-top-left-->
													<div class="mvp-nav-top-left-in">
														<div class="mvp-nav-top-mid left relative logo_main" itemscope itemtype="http://schema.org/Organization">
															<?php if(get_option('mvp_logo')) { ?>
																<a class="mvp-nav-logo-reg" itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img itemprop="logo" src="<?php echo esc_url(get_option('mvp_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
															<?php } else { ?>
																<a class="mvp-nav-logo-reg" itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-large.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
															<?php } ?>
															<?php if(get_option('mvp_logo_nav')) { ?>
																<a class="mvp-nav-logo-small" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_option('mvp_logo_nav')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
															<?php } else { ?>
																<a class="mvp-nav-logo-small" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
															<?php } ?>
															<?php if ( is_home() || is_front_page() ) { ?>
																<h1 class="mvp-logo-title"><?php bloginfo( 'name' ); ?></h1>
															<?php } else { ?>
																<h2 class="mvp-logo-title"><?php bloginfo( 'name' ); ?></h2>
															<?php } ?>
														
														</div><!--mvp-nav-top-mid-->
													</div><!--mvp-nav-top-left-in-->
												</div><!--mvp-nav-top-left-out-->
											</div><!--mvp-nav-top-cont-->
										</div><!--mvp-nav-top-right-in-->
										<div class="mvp-nav-top-right">
											<?php if ( class_exists( 'WooCommerce' ) ) { ?>
												<div class="mvp-woo-cart-wrap">
													<a class="mvp-woo-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart', 'zox-news' ); ?>"><span class="mvp-woo-cart-num"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a><span class="mvp-woo-cart-icon fa fa-shopping-cart" aria-hidden="true"></span>
												</div><!--mvp-woo-cart-wrap-->
											<?php } ?>
											<span class="mvp-nav-search-but fa fa-search fa-2 mvp-search-click"></span>
										</div><!--mvp-nav-top-right-->
									</div><!--mvp-nav-top-right-out-->
								</div><!--mvp-nav-top-wrap-->
							</div><!--mvp-main-box-->
						</div><!--mvp-main-nav-top-->
						<div id="mvp-main-nav-bot" class="left relative">
							<div id="mvp-main-nav-bot-cont" class="left">
								<div class="mvp-main-box">
									<div id="mvp-nav-bot-wrap" class="left">
										<div class="left">
											<div>
												<div class="left">
													<div class="">
														
														<div class="">
															<div class="mvp-nav-menu left">
																<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
															</div><!--mvp-nav-menu-->
														</div><!--mvp-nav-bot-left-in-->
													</div><!--mvp-nav-bot-left-out-->
												</div><!--mvp-nav-bot-cont-->
											</div><!--mvp-nav-bot-right-in-->
											<div class="mvp-nav-bot-right left relative">
												<span class="mvp-nav-search-but fa fa-search fa-2 mvp-search-click"></span>
											</div><!--mvp-nav-bot-right-->
										</div><!--mvp-nav-bot-right-out-->
									</div><!--mvp-nav-bot-wrap-->
								</div><!--mvp-main-nav-bot-cont-->
							</div><!--mvp-main-box-->
						</div><!--mvp-main-nav-bot-->
					</nav><!--mvp-main-nav-wrap-->

					<nav id="mvp_custom_nav_desktop">
						<div class="mvp-main-box">
							<div class="mvp-nav-small-mid_desktop">
								<div id="mvp-logo" class="mvp-nav-small-logo left relative logo_main">
								<?php if(get_option('mvp_logo')) { ?>
									<a class="mvp-nav-logo-reg" itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img itemprop="logo" src="<?php echo esc_url(get_option('mvp_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
								<?php } else { ?>
									<a class="mvp-nav-logo-reg" itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-large.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
								<?php } ?>
								<?php if(get_option('mvp_logo_nav')) { ?>
									<a class="mvp-nav-logo-small" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_option('mvp_logo_nav')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
								<?php } else { ?>
									<a class="mvp-nav-logo-small" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" /></a>
								<?php } ?>
								<?php if ( is_home() || is_front_page() ) { ?>
									<h1 class="mvp-logo-title"><?php bloginfo( 'name' ); ?></h1>
								<?php } else { ?>
									<h2 class="mvp-logo-title"><?php bloginfo( 'name' ); ?></h2>
								<?php } ?>
								</div><!--mvp-nav-small-logo-->
								<div>
								
									<div class="mvp-nav-menu left">
										<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
									</div><!--mvp-nav-menu-->
								</div><!--mvp-nav-small-mid-right-->
							</div><!--mvp-nav-small-mid-->
						</div>
					</nav>
				<?php } ?>
			</header><!--mvp-main-head-wrap-->
			<div style="clear:both;"></div>
			<div id="mvp-main-body-wrap" class="left relative">

			<?php
				if(is_front_page()){        
                        $queryTag1 = new WP_Query( array( 'posts_per_page' => 1, 'orderby'   => 'id',
                        'order' => 'DESC', 'tag' => '1' ) );

						$queryTag2 = new WP_Query( array( 'posts_per_page' => 1, 'orderby'   => 'id',
                        'order' => 'DESC', 'tag' => '2' ) );

						$queryTag3 = new WP_Query( array( 'posts_per_page' => 1, 'orderby'   => 'id',
                        'order' => 'DESC', 'tag' => '3' ) );

						$queryTag4 = new WP_Query( array( 'posts_per_page' => 1, 'orderby'   => 'id',
                        'order' => 'DESC', 'tag' => '4' ) );

						$queryTag5 = new WP_Query( array( 'posts_per_page' => 1, 'orderby'   => 'id',
                        'order' => 'DESC', 'tag' => '5' ) );

						$queryTag6 = new WP_Query( array( 'posts_per_page' => 1, 'orderby'   => 'id',
                        'order' => 'DESC', 'tag' => '6' ) );
					
						$isLive = new WP_Query(array(
							'post_type' => 'post',
							'meta_query' => array(
								array(
									'key' => 'live_article',
									'value' => 'YES',
									'compare' => '=',
								),
							),
							'date_query' => array(
								array(
									'year' => date( 'Y' ),
									'month' => date( 'm' ),
									'day' => date( 'd' ),
								),
							)
						));

						
						
                    ?>
                        <div class="pure-g intro_new_dsng">
                            
                            <div class="pure-u-md-18-24 right_side">
                                <div class="pure-g row-1 main_ballina">
									<?php
									if ( $queryTag1->have_posts() ) { ?>
									<?php $queryTag1->the_post(); ?>
                                    <div class="pure-u-1-1 pure-u-md-9-24 main_ballina_left">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <h1><span class="category-info"><?php echo get_post_meta( get_the_ID(), 'category_name', true );?> /</span><?php echo get_the_title(); ?></h1>
                                        </a>
                                        <p style="padding-top: 64px;"><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                    <div class="pure-u-1-1 pure-u-md-15-24 main_ballina_right">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <div class="ballina_right_bg_mob" style="background: url('<?php echo get_the_post_thumbnail_url()?>'); width: 100%; height: 100%; position: relative; background-size: cover; background-repeat: no-repeat;"></div>
                                        </a>
                                    </div>
									<?php } 
									wp_reset_postdata();
									?>
                                </div>

                                <div class="pure-g row-2 articles_below">
                                    <div class="articles_below_1 pure-u-md-1-3 pure-u-1-2">
										<?php
										if ( $queryTag2->have_posts() ) { ?>
										<?php $queryTag2->the_post(); ?>
                                        <div class="articles_below_1_inner">
                                            <a href="<?php echo get_permalink($query2); ?>">
                                                <img class="img-full" src="<?php echo get_the_post_thumbnail_url()?>">
                                                <h2><span class="category-info"><?php echo get_post_meta( get_the_ID(), 'category_name', true );?> /</span> <?php echo get_the_title(); ?></h2>
                                            </a>
                                        </div>
										<?php } 
										wp_reset_postdata();
										?>
                                    </div>
                                    <div class="articles_below_1 pure-u-md-1-3 latest_articles pure-u-1-1">
									<?php
										if ( $queryTag3->have_posts() ) { ?>
										<?php $queryTag3->the_post(); ?>
                                        <div class="articles_below_1_inner">
                                            <div class="article">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <h2 class="small"><span class="category-info"><?php echo get_post_meta( get_the_ID(), 'category_name', true );?> /</span> <?php echo get_the_title(); ?></h2>
                                                </a>
											</div>
										</div>
										<?php }
										wp_reset_postdata();
										?>

										<?php
										if ( $queryTag4->have_posts() ) { ?>
										<?php $queryTag4->the_post(); ?>
										<div class="articles_below_1_inner">
                                            <div class="article">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <h2 class="small"><span class="category-info"><?php echo get_post_meta( get_the_ID(), 'category_name', true );?> /</span> <?php echo get_the_title(); ?></h2>
                                                </a>
											</div>
										</div>
										<?php } 
										wp_reset_postdata();
										?>

										<?php if ( $queryTag5->have_posts() ) { ?>
											<?php $queryTag5->the_post(); ?>
										<div class="articles_below_1_inner">
                                            <div class="article">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <h2 class="small"><span class="category-info"><?php echo get_post_meta( get_the_ID(), 'category_name', true );?> /</span> <?php echo get_the_title(); ?></h2>
                                                </a>
											</div>
										</div>
										<?php } wp_reset_postdata(); ?>
                                    </div>
                                    <div class="articles_below_1 pure-u-md-1-3 pure-u-1-2">
										<?php if ( $isLive->have_posts() ) { 
											$isLive->the_post(); 
										?>
                                        <div class="articles_below_1_inner">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <img class="img-full" src="<?php echo get_the_post_thumbnail_url() ?>">
                                            
                                                <h2 class="ring-container">
                                                    <div class="ringring"></div>
                                                    <div class="circle"></div>
                                                <span style="margin-left: 40px; padding-right: 1px;"><span style="color: #D10000; margin-left: -13px;">LIVE / </span> <?php echo get_the_title(); ?></span>
                                                </h2>
                                            </a>
                                        </div>
										<?php } elseif ( $queryTag6->have_posts() ) { 
											$queryTag6->the_post(); 
										?>
                                        <div class="articles_below_1_inner">
                                            <a href="<?php echo get_permalink($query2); ?>">
                                                <img class="img-full" src="<?php echo get_the_post_thumbnail_url()?>">
                                                <h2><span class="category-info"><?php echo get_post_meta( get_the_ID(), 'category_name', true );?> /</span> <?php echo get_the_title(); ?></h2>
                                            </a>
                                        </div>
										<?php } wp_reset_postdata(); ?>

                                    </div>
                                </div>

                                
                            </div>

							<div class="pure-u-md-6-24 left_side zindex2001">
								<div class="weather-wrapper">
									<div class="weather-card madrid">
										<h1>E shtune</h1>
										<p>Mars 4, 2023</p>
									</div>
								</div>
								
								<img style="margin-top: 10px;" src="/wp-content/uploads/2023/02/adbanner.jpg">
                            </div>
                        </div>

						<section id="mvp_ad_widget-3" class="mvp-widget-home left relative mvp_ad_widget" style="padding-bottom: 100px;"><div class="mvp-main-box">			
							
						<div class="mvp-widget-ad left relative">
								<span class="mvp-ad-label">Advertisement</span>
								<!-- Revive Adserver iFrame Tag - Generated with Revive Adserver v5.3.1 -->
<iframe id='a713e963' name='a713e963' src='http://reporteri.net/reklamap/www/delivery/afr.php?zoneid=23&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='930' height='180' allow='autoplay'><a href='http://reporteri.net/reklamap/www/delivery/ck.php?n=aa9e2e2f&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://reporteri.net/reklamap/www/delivery/avw.php?zoneid=23&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=aa9e2e2f' border='0' alt='' /></a></iframe>			</div><!--mvp-widget-ad-->
						</div>
					
					</section>

					<?php
					$excluded_posts = array();
					$category_slug = 'lajme';
					$args = array(
						'posts_per_page' => 1,
						'post_type' => 'post',
						'cat' => get_category_by_slug($category_slug)->term_id,
						'orderby' => 'meta_value_num',
						'meta_key' => 'post_views_count', // Assumes you are using a custom field to track post views
					);
					$most_viewed = new WP_Query($args);
					
					?>
												
						<section class="aktualitet_section">
							
							<div class="aktualitet">
								<div class="pure-g aktualitet__row-1">
									
									<div class="pure-u-md-1-3 pure-u-1-2 akutalitet_main">
										<div style="position: absolute; margin-top: -60px;">
											<h4><span class="mvp-widget-home-title">Aktualitet</span></h4>
										</div>
										<div>
											<?php if ($most_viewed->have_posts()) {
											$most_viewed->the_post();
											array_push($excluded_posts, get_the_ID());
											?>
											<a href="<?php echo get_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url()?>"></a>
											<p class="aktualitet_main_category"><?php echo get_post_meta( get_the_ID(), 'category_name', true );?></p>
											<h2 class="aktualitet_title"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h2>
											<p class="aktualitet_description">
												<?php echo get_the_excerpt() ?>
											</p>
											<?php } 
											wp_reset_query();
											?>
										</div>
									</div>
									<?php
										$latest_posts = array();
										$category_ids = array( 219, 217, 218 );
    									foreach ( $category_ids as $category_id ) {
											$args = array(
												'posts_per_page' => 1,
												'cat' => $category_id,
												'orderby' => 'date',
												'order' => 'DESC',
												'post__not_in' => $excluded_posts,
											);
											$showThreeLastedFromSpecifiedCats = new WP_Query( $args );
											
											if ( $showThreeLastedFromSpecifiedCats->have_posts() ) {
												while ( $showThreeLastedFromSpecifiedCats->have_posts() ) {
													$showThreeLastedFromSpecifiedCats->the_post();

													$latest_posts[] = get_post();
												}
											}
											wp_reset_postdata();
										}
										
									?>
									<div class="pure-u-md-1-3 pure-u-1-2 aktualitet_list">
									<?php
										foreach ( $latest_posts as $post ) {
											setup_postdata( $post );
											array_push($excluded_posts, get_the_ID());
									?>
										<div class="pure-g aktualitet_list_inner">
											<div class="pure-u-3-5">
												<h5><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h2>
												<p class="aktualitet_main_category"><?php echo (isset(get_the_category()[0]->name)) ? get_the_category()[0]->name: 'Aktualitet'  ?> / <?php echo (isset(get_the_category()[1]->name)) ? get_the_category()[1]->name: ''  ?></p>
											</div>

											<div class="pure-u-2-5">
												<a href="<?php echo get_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url()?>"></a>
											</div>
										</div>

									<?php 
										}
									
									wp_reset_postdata();
									?>

									</div>
									<div class="pure-u-md-1-3 pure-u-1-1 aktualitet_opinione">
										<div class="heading" style="position: absolute; margin-top: -60px;">
											<h4><span class="mvp-widget-home-title">Opinione</span></h4>
										</div>
										<?php
										$args = array(
											'posts_per_page' => 3,
											'post_type' => 'post',
											'category_name' => 'opinione',
											'orderby' => 'date',
											'order' => 'DESC',
										);
										$opinionet = new WP_Query($args);

										if ( $opinionet->have_posts() ) {
											while ( $opinionet->have_posts() ) {
												$opinionet->the_post();
										?>
										<div class="aktualitet_opinione_inner">
											<h5><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h2>
											<?php if(get_field("opinion") == "JO") { ?>
											<div class="aktualitet_opinione_author">
												<img class="author_image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtMnBs1-2kNl6Pem57dj7D_pYSFZsP9wzC-VIYoRn4iQ&s">
												<p class="author_name">Reporteri.net</p>
											</div>
											<?php } else { ?>
											<div class="aktualitet_opinione_author">
												<img class="author_image" src="<?php echo get_field('imazhi_opinion') ?>">
												<p class="author_name"><?php echo get_field('emri_opinion') ?></p>
											</div>
											<?php } ?>
										</div>
										
										<?php
											}
										}
											wp_reset_postdata();
										?>
									</div>
								</div>

								<div class="pure-g aktualitet__row-2">
									<?php
										$args = array(
											'posts_per_page' => 4,
											'post_type' => 'post',
											'category_name' => 'lajme',
											'orderby' => 'date',
											'order' => 'DESC',
											'post__not_in' => $excluded_posts
										);
										$last_news2 = new WP_Query($args);

										if ( $last_news2->have_posts() ) {
											while ( $last_news2->have_posts() ) {
												$last_news2->the_post();
												array_push($excluded_posts, get_the_ID());
									?>
									<div class="pure-u-md-1-4 pure-u-1-2 aktualitet_more_inner">
										<div>
										<a href="<?php echo get_permalink(); ?>"><img style="width: 100%;" src="<?php echo get_the_post_thumbnail_url()?>"></a>
											<p class="aktualitet_main_category"><?php echo (isset(get_the_category()[0]->name)) ? get_the_category()[0]->name: 'Aktualitet'  ?> / <?php echo (isset(get_the_category()[1]->name)) ? get_the_category()[1]->name: ''  ?></p>
											<h2><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
											<p class="aktualitet_description">
												<?php echo substr(get_the_excerpt(), 0, 100); ?>...
											</p>
										</div>								
									</div>
									<?php
											}
										}
									?>
								
									
								</div>

								<div class="pure-g aktualitet__row-2" style="background: rgba(229, 199, 0, 0.1);">
									<div class="pure-u-md-1-2 col-feat6">
										<section id="mvp-feat6-wrap" class="left relative">
											<?php global $do_not_duplicate; global $post; $recent = new WP_Query(array( 'tag' => get_option('mvp_feat_posts_tags'), 'posts_per_page' => '1', 'ignore_sticky_posts'=> 1 )); while($recent->have_posts()) : $recent->the_post(); $do_not_duplicate[] = $post->ID; ?>
												<a href="<?php the_permalink(); ?>" rel="bookmark">
												<div id="mvp-feat6-main" class="left relative">
													<div id="mvp-feat6-img" class="right relative">
														<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
															<?php the_post_thumbnail('mvp-post-thumb', array( 'class' => 'mvp-reg-img' )); ?>
															<?php the_post_thumbnail('mvp-port-thumb', array( 'class' => 'mvp-mob-img' )); ?>
														<?php } ?>
													</div><!--mvp-feat6-img-->
													<div id="mvp-feat6-text">
														<h2><?php the_title(); ?></h2>
														<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
													</div><!--mvp-feat6-text-->
												</div><!--mvp-feat6-main-->
												</a>
											<?php endwhile; wp_reset_postdata(); ?>
										</section><!--mvp-feat6-wrap-->
									</div>
									<div class="pure-u-md-1-2">
											<div class="pure-g">
												<div class="pure-u-md-1-2 pure-u-1-2 aktualitet_more_inner">
													<div>
													<a href="#"><img src="https://telegrafi.com/wp-content/uploads/2023/01/dialogu-e1629999682391-780x439-1-696x392-1-780x439.jpg"></a>
														<p class="aktualitet_main_category">Aktualitet</p>
														<h2><a href="#">Marrëveshja Kosovë-Serbi e largon ndikimin rus, por jo brenda natës</a></h2>
														<p class="aktualitet_description">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
														</p>
													</div>	
												</div>
												<div class="pure-u-md-1-2 pure-u-1-2 aktualitet_more_inner">
													<div>
														<a href="#"><img src="https://telegrafi.com/wp-content/uploads/2023/01/dialogu-e1629999682391-780x439-1-696x392-1-780x439.jpg"></a>
														<p class="aktualitet_main_category">Aktualitet</p>
														<h2><a href="#">Marrëveshja Kosovë-Serbi e largon ndikimin rus, por jo brenda natës</a></h2>
														<p class="aktualitet_description">
															Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
														</p>
													</div>	
												</div>
											</div>
									</div>
								</div>
							</div>
						</section>

                    <?php                      
                        }
                    ?>