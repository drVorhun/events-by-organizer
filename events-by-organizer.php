
<ul>
<?php
$args = array(
    'post_status'=>'publish',
    'post_type'=>'tribe_organizer',
    'posts_per_page'=>-1,
    'order'=>'ASC',
    'orderby'=>'title'
);
$get_posts = null;
$get_posts = new WP_Query();
$get_posts->query($args);
if($get_posts->have_posts()) : while($get_posts->have_posts()) : $get_posts->the_post(); ?>

        <li>
          <a href="<?php echo tribe_get_organizer_website_url(); ?>" target="_blank"><?php echo tribe_get_organizer() ?></a>
		  
		  

						<?php
						$args = array(
								'post_type'      => array(TribeEvents::POSTTYPE), // use post_type IN () to avoid old tribe queries
								'posts_per_page' => -1,
								'order' => 'ASC',
								'meta_query' => array(
										array(
												'key' => '_EventOrganizerID',
												'value' => get_the_ID(),
												'compare' => 'LIKE'
										)
								),
								'orderby'=>'date'
							  );
							  $events = new WP_Query( $args );
							  
							  if($events->have_posts()) : ?>
							<ul>
									<li><b>Upcoming Events</b></li>							  
							  <?php while ( $events->have_posts() ) : $events->the_post();
							  ?><li>
								<div class="entry-date">
								  <span class="start"><?php echo tribe_get_start_date(); ?></span>
								</div>
								<div class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
								
								</li>
							  <?php
							endwhile; ?>
					
							</ul>
				
							<?php endif;
							wp_reset_query();
						?>

		  
        </li>

<?php
  endwhile;
  endif;
  wp_reset_query();
?>
</ul>