<?php
/**
 * Template Name: Donde ir
 */
     
	get_header();

	$query_args = array (
		'post_type' => 'gc_atractivos'
	);

	$loop = new WP_Query ($query_args);

    require_once('php/twitteroauth/twitteroauth.php');

    $consumer_key = 'xhuMt9tWHP1t6aJWsJuIw';
    $consumer_secret = 'dVtaxGcQIUeilvcrS3akQTbX91yjWMaDJGFUeSHr5I';
    $access_token = '75446347-x2BkWQxzKMGYaYNgw9I3odKAb0JS2UFX1WagTMopU';
    $access_token_secret = 'uNFIGBqjhXjpsMMTjNBPkVzrwVkf0CWmBgaynzJZ0Hs';

    $connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
    $tweets = $connection->get('https://api.twitter.com/1.1/search/tweets.json?result_type=recent&q=%23ConstanzaRD')->statuses;

?>
			<?php while (have_posts()) : the_post(); ?>
				<h1 id="subheader" class="wrap">
					<span><?php the_title(); ?></span>
					<div class="fullbanner to_right">
						<script type="text/javascript">
							<!--
								google_ad_client = "ca-pub-8397939586383038";
								/* 468x60, creado 1/06/10 */
								google_ad_slot = "4670795372";
								google_ad_width = 468;
								google_ad_height = 60;
							//-->
						</script>
						<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
					</div>
				</h1>

				<div id="container" class="wrap" role="main">
					<div id="dondeir">
						<div class="fullpage">
							<ul class="breadcrumbs">
								<li><a href="<?php echo bloginfo('url') ?>">Inicio</a></li>
								<li>Donde ir</li>
							</ul>
						</div>

						<div class="donde_ir_sections">
							<section id="donde_ir_post_content">
								<?php the_content() ?>
							</section>

							<section id="donde_ir_tweets">
								<h2 class="tweets_title">Tweets Constanza</h2>
								<span class="constanza_hashtag">Hashtag #ConstanzaRD</span>
								<div class="tweets_container">
									<ul id="constanza_tweets">
										<?php foreach ($tweets as $tweet) : ?>
											<li>
												<p>
													<strong><?php echo $tweet->user->name; ?>: </strong>
													<?php echo $tweet->text; ?> 
													<span class="time">
														<?php echo time_passed(strtotime($tweet->created_at)); ?>
													</span>
												</p>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</section>
						</div>

						<div id="map_container">
							<div id="dondeir_map">
								
							</div>
							<ul id="marker_list" class="visuallyhidden">
								<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<?php if (($geo_lat = get_post_meta (get_the_ID(), 'geo_lat', TRUE)) && ($geo_long = get_post_meta (get_the_ID(), 'geo_long', TRUE))): ?>
										<li data-geo_lat="<?php echo $geo_lat; ?>" data-geo_long="<?php echo $geo_long; ?>">
											<div class="circled">
												<div class="inside">
													<?php if (has_post_thumbnail()) : ?>
														<?php the_post_thumbnail ('thumbnail'); ?>
													<?php else : ?>
														<img class="wp-post-image" src="<?php bloginfo('template_url') ?>/images/atractivos_listing_thumb_guide.png" alt="">
													<?php endif; ?>
												</div>
											</div>
											<h3 class="loc_header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<p class="loc_excerpt"><?php echo get_the_excerpt(); ?></p>
										</li>
									<?php endif; ?>
								<?php endwhile; ?>
							</ul>
						</div><!-- #map_container -->
						<div id="dondeir_share">
							<!-- Share on Twitter -->
							<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

							<!-- Share on FB -->
							<div class="fb-like" data-send="false" data-width="315" data-show-faces="false"></div>

							<!-- Share on Google+ -->
							<div class="g-plus" data-action="share"></div>

							<script type="text/javascript">
							  (function() {
							    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							    po.src = 'https://apis.google.com/js/plusone.js';
							    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
							  })();
							</script>
						</div>
					</div><!-- #dondeir -->
			<?php endwhile ?>
<?php get_footer() ?>