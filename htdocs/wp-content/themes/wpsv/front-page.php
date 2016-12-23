<?php
/**
 * The template for displaying the front page.
 *
 * Contains all front page specific parts.
 *
 * @package WordPress Sverige
 */
get_header(); ?>

    <div class="container">
      <section id="header-content" class="row">
        <!-- Start welcome -->
        <section id="welcome" class="section col-md-7 col-xs-12">
          <div>

        	<?php while ( have_posts() ) : the_post(); ?>

            	<?php the_content('Läs mer'); ?>

            <section id="latest-downloads">
							<h3>Ladda ner senaste WordPress <sup><a href="<?php echo esc_url( home_url( '/filer/hjalp/' ) ); ?>" class="dl-help-link" title="Behöver du hjälp med filen?"><i class="fa fa-question-circle"></i></a></sup></h3>
								<div id="dl-btns">
									<?php // Get main download IDs
  									$dlsvse = get_post_meta($post->ID, '_dl_meta_sv_se', true);
  									$dlinter = get_post_meta($post->ID, '_dl_meta_inter', true);
									?>
									<div class="col-md-6 dl-btn-sv">
										<?php echo do_shortcode('[download id="'. $dlsvse .'" template="front"]'); ?>
									</div>
									<div class="col-md-6 dl-btn-inter">
										<?php echo do_shortcode('[download id="'. $dlinter .'" template="front"]'); ?>
									</div>
									<p class="col-md-12"><a href="<?php echo esc_url( home_url( '/filer/information-for-filer/' ) ); ?>" class="extra-download-link">Behöver du andra format? Information för filer &rarr;</a></p>
								</div>
            </section>

					<?php endwhile; ?>

          </div>
        </section>
        <!-- End welcome -->
        <!-- Start Slider -->
        <section class="section col-md-5 hidden-xs">
          <!-- Start SLIDER LOOP -->
          <?php // WP_Query arguments
          $slider_args = array (
                'posts_per_page' 	=> '3',
                'post_type' 		=> 'wpsvse_slider'
          );

          // The Query
          $slider_query = new WP_Query( $slider_args ); ?>

          <div id="header-slider" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

              <?php // The Loop
              if ( $slider_query->have_posts() ) {
                while ( $slider_query->have_posts() ) {
                  $slider_query->the_post(); ?>

                  <div class="item">
                    <div class="carousel-caption">
                      <?php the_content(); ?>
                    </div>
                  </div>

              <?php }
              }

            // Restore original Post Data
            wp_reset_postdata(); ?>
            <!-- End SLIDER LOOP -->

            </div>
            <a class="left carousel-control" href="#header-slider" data-slide="prev">
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control" href="#header-slider" data-slide="next">
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
          </div>
        </section><!-- End Slider -->
      </section>
    </div>
   	</div>
	<!-- End Top-part -->

    <!-- Start Latest News -->
	<section id="latest-news" class="section">
		<div class="container">
			<div class="row">
      <!-- Start NEWS LOOP -->
      <?php // WP_Query arguments
			  $news_args = array ( 'posts_per_page' => '3' );

			  // The Query
			  $news_query = new WP_Query( $news_args );

			  // The Loop
			  if ( $news_query->have_posts() ) {
				  while ( $news_query->have_posts() ) {
					  $news_query->the_post(); ?>

                    <div class="col-md-4 article-item">
                        <article>
                          <div class="news-meta">
                          	  <div class="comments-meta"><?php comments_popup_link('0 kommentarer', '1 kommentar', '% kommentarer'); ?></div>
                              <time datetime="<?php the_time('c'); ?>"><?php the_time('l, j F'); ?></time>
                              <a href="<?php the_permalink() ?>" title="Direktlänk till <?php the_title_attribute(); ?>" class="img-overlay">
							  						<?php if ( has_post_thumbnail() ) {
                                	the_post_thumbnail( 'post-image', array('class' => 'img-responsive') );
                        	  } else { ?>
                              	<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" />
                              <?php } ?>
                              </a>
                          </div>
                          <div class="news-title-frame">
                              <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                              <div class="category-meta">Postat under <?php the_category(', '); ?></div>
                          </div>
                        </article>
                    </div>

			  <?php  }
			  }

			  // Restore original Post Data
			  wp_reset_postdata(); ?>
      <!-- End NEWS LOOP -->
			</div>
		</div>
	</section>
	<!-- End Latest News -->

	<!-- Start Sponsor -->
	<section id="sponsor" class="section">
		<div class="container">
			<div class="row">
         <!-- Start SPONSOR WIDGET -->
           <?php if ( ! dynamic_sidebar( 'sponsor-widget' ) ) : endif; // end sidebar widget area ?>
         <!-- End SPONSOR WIDGET -->
			</div>
		</div>
	</section>
	<!-- End Sponsor -->

	<!-- Start Latest Blog Header -->
	<section id="latest-blog-header" class="section">
		<div class="container">
			<div class="row">
				<div class="section-headline white-heading">
					<h2>Senaste ur bloggen</h2>
					<span>Det senaste ur <?php bloginfo( 'name' ); ?>s blogg</span>
				</div>
			</div>
		</div>
    <div class="carr-down"></div>
	</section>
	<!-- End Latest Blog Header -->

	<!-- Start Latest Blog Items -->
	<section id="latest-blog-items" class="section">
	<div class="container">
        <div class="row">
          <div class="blog-item-content">
              <!-- Start BLOG LOOP -->
              <?php // WP_Query arguments
              $args = array (
                  'post_type'		=> 'wpsvse_blog',
                  'posts_per_page'	=> '4',
              );

              // The Query
              $blog_query = new WP_Query( $args );

              // The Loop
              if ( $blog_query->have_posts() ) {
                  while ( $blog_query->have_posts() ) {
                      $blog_query->the_post(); ?>

                    <article class="col-md-3 blog-item article-item">
                        <a href="<?php the_permalink() ?>" title="Direktlänk till <?php the_title_attribute(); ?>" class="img-overlay">
												<?php if ( has_post_thumbnail() ) {
                              the_post_thumbnail( 'post-image', array('class' => 'img-responsive img-thumbnail') );
                        } else { ?>
                          <img class="img-responsive img-thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" />
                        <?php } ?>
                        </a>
                        <h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                        <span><i class="fa fa-clock-o"></i> <time datetime="<?php the_time('c'); ?>"><?php the_time('j F'); ?></time> <i class="fa fa-comments-o"></i> <?php comments_number( '0 kommentarer', '1 kommentar', '% kommentarer' ); ?></span>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink() ?>" class="btn-primary btn-sm">Läs mer</a>
                    </article>

              <?php  }
              }

              // Restore original Post Data
              wp_reset_postdata(); ?>
              <!-- End BLOG LOOP -->
            <div class="clearfix"></div>
          </div>
        </div>
	</div>
	</section>
	<!-- End Latest Blog Items -->

	<!-- Start Statistics -->
	<section id="statistics" class="section">
		<div class="container">
			<div class="row">
        <!-- Start SITEWIDE STATISTICS -->
        <?php // Check if bbPress plugin is loaded
        if ( class_exists( 'bbPress' ) ) { ?>

        <?php $stats = bbp_get_statistics(); ?>
				<?php do_action( 'bbp_before_statistics' ); ?>
        <div class="clearfix col-sm-6 col-md-3">
					<div class="stats">
						<i class="fa fa-group"></i>
						<h1><?php echo esc_html( $stats['user_count'] ); ?><span>Medlemmar</span></h1>
					</div>
				</div>
				<div class="clearfix col-sm-6 col-md-3">
					<div class="stats">
						<i class="fa fa-thumb-tack"></i>
						<h1><?php echo esc_html( $stats['reply_count'] ); ?><span>Ämnen</span></h1>
					</div>
				</div>
				<div class="clearfix col-sm-6 col-md-3">
					<div class="stats">
						<i class="fa fa-comments"></i>
						<h1><?php echo esc_html( $stats['topic_count'] ); ?><span>Svar</span></h1>
					</div>
				</div>

				<?php do_action( 'bbp_after_statistics' ); ?>

        <?php unset( $stats ); ?>

        <?php }
        // Check if BuddyPress plugin is loaded
        if ( class_exists( 'buddypress' ) ) { ?>
				<div class="clearfix col-sm-6 col-md-3">
					<div class="stats">
						<i class="fa fa-sitemap"></i>
						<h1><?php echo bp_get_total_group_count(); ?><span>Grupper</span></h1>
					</div>
				</div>
        <?php } ?>
      <!-- End SITEWIDE STATISTICS -->
			</div>
		</div>
	</section>
	<!-- End Statistics -->

	<!-- Start Activity -->
	<section id="activity" class="section">
		<div class="container">
			<div class="row">
				<div class="section-headline">
					<h2>Aktivitetsflöde</h2>
					<span>Följ den senaste <a href="<?php echo esc_url( home_url( '/aktivitet/' ) ); ?>">aktiviteten</a> på <?php bloginfo( 'name' ); ?></span>
				</div>
			</div>
      <?php // Check if BuddyPress plugin is loaded
      if ( class_exists( 'buddypress' ) ) { ?>

			<div class="row">
				<?php bp_get_template_part( 'activity/front' ); ?>
			</div>
		</div>

    <?php } else { ?>
      <p style="text-align:center;"><strong>BuddyPress är inte aktiverat.</strong></p>
    <?php } ?>

	</section>
	<!-- End Activity -->

	<!-- Start Other -->
	<section id="other" class="section">
		<div class="container">
			<div class="row col-md-6">

          <div class="section-headline">
            <h2>Aktiva grupper</h2>
            <span>Skapa kontakter via olika <a href="<?php echo esc_url( home_url( '/grupper/' ) ); ?>">grupper</a> inom WordPress</span>
          </div>

          <?php // Check if BuddyPress plugin is loaded
          if ( class_exists( 'buddypress' ) ) { ?>

          <div id="bp-groups">
            <?php bp_get_template_part( 'groups/front' ); ?>
          </div>

          <?php } else { ?>
            <p style="text-align:center;"><strong>BuddyPress är inte aktiverat.</strong></p>
          <?php } ?>

      </div>

      <div class="row col-md-6 twitter-container">
          <div class="section-headline">
            <h2>Socialt med WordPress?</h2>
            <span>Få koll på vad som skrivs om WordPress <a href="https://twitter.com/hashtag/wpse?src=hash">#wpse</a></span>
          </div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#wpse-twitter" role="tab" data-toggle="tab">#wpse</a></li>
              <li><a href="#wpsvse-twitter" role="tab" data-toggle="tab">@WPSverige</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
              <div class="tab-pane text-center active" id="wpse-twitter">
                <?php if ( ! dynamic_sidebar( 'twitter-wpse' ) ) : endif; ?>
              </div>
              <div class="tab-pane text-center" id="wpsvse-twitter">
                <?php if ( ! dynamic_sidebar( 'twitter-wpsverige' ) ) : endif; ?>
              </div>
          </div>
		</div>
	</section>
	<!-- End Other -->

<?php get_footer(); ?>
